<?php


namespace App\Repositories\Address;


use App\Repositories\EloquentRepository;

class AddressEloquentRepository extends EloquentRepository implements AddressRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
     return \App\Address::class;
    }
}
