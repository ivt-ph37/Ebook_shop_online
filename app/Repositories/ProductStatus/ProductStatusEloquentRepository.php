<?php


namespace App\Repositories\ProductStatus;


use App\Repositories\EloquentRepository;

class ProductStatusEloquentRepository extends EloquentRepository implements ProductStatuRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\ProductStatus::class;
    }
}
