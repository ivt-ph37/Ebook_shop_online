<?php


namespace App\Repositories\PhotoArray;


use App\PhotoArray;
use App\Repositories\EloquentRepository;

class PhotoArrayEloquentRepository extends  EloquentRepository implements PhotoArrayRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\PhotoArray::class;
    }



}
