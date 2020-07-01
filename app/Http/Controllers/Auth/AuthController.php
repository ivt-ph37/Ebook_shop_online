<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
    //    $this->middleware('auth:api', ['except' => ['login','register','logout','me','refresh']]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function updateUser(Request $request,$id){

        $data = $request->all();
        $check = false;
        try{
            DB::beginTransaction();
            $user = User::find($id);
            if ($request->has('name')){
                if (is_null($request->get('name')) != true ){
                    $user->name = $request->get('name');
                }
            }
            if ($request->has('phone_number')){
                if (is_null($request->get('phone_number')) != true ){
                    $user->phone_number = $request->get('phone_number');
                }
            }

            if ($request->has('birthday')){
                if (is_null($request->get('birthday')) != true ){
                    $user->birthday = $request->get('birthday');
                }
            }

            if ($request->has('email')){
                if (is_null($request->get('email')) != true ){
                    $user->email = $request->get('email');
                }
            }
            if ($request->has('address')){
                if (is_null($request->get('address')) != true ){
                    $user->address = $request->get('address');
                }
            }


            if ($request->has('password')){
                if (is_null($request->get('password')) != true ){
                    $user->password = Hash::make($request->get('password'));
                }
            }

            if ($request->has('address_id')){
                if (is_null($request->get('address_id')) != true ){
                    $user->address_id = $request->get('address_id');
                }
            }
            $user->save();

            DB::table('user_roles')->where('user_id', $id)->delete();
            $userCreate = User::find($id);
            $userCreate->roles()->attach([3]);
            DB::commit();
            $check =  $userCreate->toArray()+['role' => $userCreate->roles()->pluck("name")->toArray()[0]];
        }catch (Exception $ex){
            DB::rollback();
            return response()->json($check);
        }
        return response()->json($check);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = auth()->user();
        if ($user) {
            return response()->json([
                'status' => 400,
                'message' => 'You must login before logout',
                'data' => $this->guard()->user()],400
            );
        }
        return response()->json([
            'status' => 400,
            'message' => 'You must login before logout',
            'data' => ''
        ],400);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $user = auth()->user();
        if ($user) {
            $this->guard()->logout();
            return response()->json(['message' => 'Successfully logged out'],200    );
        }

        return response()->json([
            'status' => 400,
            'message' => 'You must login before logout',
            'data' => ''
        ],400);
    }

    public function register(Request $request){

        try {
            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone_number' => $request->get('phone_number'),
                'address' => $request->get('address'),
                'address_id' => $request->get('address_id'),
                'password' => Hash::make($request->get('password')),
            ]);
            $user->roles()->attach([3]);
            return response()->json([
                'status' => 200,
                'message' => 'User created successfully',
                'data' => $user
            ],200);
        }catch (\Exception $ex){
            return response()->json([
                'status' => 400,
                'message' => 'Not Ok',
                'data' => ''
            ],400);
        }

    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    { $user = auth()->user();
        if ($user) {
            return $this->respondWithToken($this->guard()->refresh());
        }
        return response()->json([
            'status' => 400,
            'message' => 'You must login to refresh',
            'data' => ''
        ],400);

    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $user = auth()->user();
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone_number' => $user->phone_number,
            'address' => $user->address,
            'address_id' => $user->address_id,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60 * 24,
            'role' => $user->roles->pluck('name'),

        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}
