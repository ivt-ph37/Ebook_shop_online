<?php


namespace App\Repositories\Role;


use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\App;

class RoleEloquentRepository extends EloquentRepository implements RoleRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Role::class;
    }
}
