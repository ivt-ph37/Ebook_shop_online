<?php


namespace App\Repositories\OrderStatus;


use App\Repositories\EloquentRepository;

class OrderStatusEloquentRepository extends EloquentRepository implements OrderStatusRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
       return \App\TransactionStatus::class;
    }
}
