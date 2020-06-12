<?php


namespace App\Repositories\Review;


use App\Repositories\EloquentRepository;

class ReviewEloquentRepository extends EloquentRepository implements ReviewRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Review::class;
    }
}
