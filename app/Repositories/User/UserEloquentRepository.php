<?php


namespace App\Repositories\User;


use App\Repositories\EloquentRepository;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\User::class;
    }

    public function getUsers()
    {
        return DB::table('users')
            ->leftJoin('user_roles','users.id','=','user_roles.user_id')
            ->leftJoin('roles','user_roles.role_id','=','roles.id')
            ->select('users.id','users.name','users.phone_number','users.email',
                'users.address','users.password','users.profile_photo','users.birthday',
                'users.address_id','users.remember_token',DB::raw('GROUP_CONCAT(roles.name) as role'))
            ->groupBy('users.id');
    }
    public function getUserById($id){

        $user = User::find($id);
        $roles = $user->roles()->get()->pluck('name','id');

        return ['user' => $user->toArray(),
            'role' => $roles->toArray()];

    }

    public function addUser(array $data)
    {
        $check = false;
        try{
            DB::beginTransaction();
            $userCreate = User::create([
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'email' => $data['email'],
                'address' => $data['address'],
                'address_id' => $data['address_id'],
                'birthday' => $data['birthday'],
                'password' => Hash::make($data['password'])
            ]);
            $userCreate->roles()->attach($data['roles']);
            DB::commit();
            $check = true;
        }catch (Exception $ex){
            DB::rollback();
            return $check;
        }
        return $check;
    }

    public function updateUser($id,array $data)
    {
        $check = false;
        try{
            DB::beginTransaction();
            User::where('id',$id)->update([
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'address' => $data['address'],
                'address_id' => $data['address_id'],
                'birthday' => $data['birthday'],
                'password' => Hash::make($data['password'])
            ]);
            DB::table('user_roles')->where('user_id', $id)->delete();
            $userCreate = User::find($id);
            $userCreate->roles()->attach($data['roles']);
            DB::commit();
            $check = true;
        }catch (Exception $ex){
            DB::rollback();
            return $check;
        }
        return $check;
    }

    public function deleteUser($id)
    {
        $check = false;
        try {
            DB::beginTransaction();
            $user = User::find($id);
            $user->delete($id);
            $user->roles()->detach();
            DB::commit();
            $check = true;
        }catch (Exception $ex){
            DB::rollback();
        }
        return $check;
    }
}
