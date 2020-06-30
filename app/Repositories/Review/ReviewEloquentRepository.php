<?php


namespace App\Repositories\Review;


use App\Product;
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


    public function getProductReview($id)
    {
        $product = Product::find($id);
        return $product->reviews->toArray();
    }

}
