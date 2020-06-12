<?php


namespace App\Repositories\Producer;


use App\Repositories\EloquentRepository;

class ProducerEloquentRepository extends EloquentRepository implements ProducerRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
      return \App\Producer::class;
    }
}
