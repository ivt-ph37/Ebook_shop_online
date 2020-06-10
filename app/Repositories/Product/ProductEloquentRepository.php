<?php


namespace App\Repositories\Product;
use DB;

use App\Category;
use App\Repositories\EloquentRepository;

class ProductEloquentRepository extends EloquentRepository implements ProductRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Product::class;
    }

    public function getProducts()
    {
        return DB::table('products as p')
            ->leftJoin('categories','p.category_id','=','categories.id')
            ->leftJoin('producers','producers.id','=','p.producer_id')
            ->select('p.*','categories.name as category','producers.name as producer')
            ->get();
    }

    public function getProductByCategory($id)
    {
        $singleCategory = Category::find($id);
        return $singleCategory->products;
    }

    public function showProductById($id)
    {
        return DB::table('products as p')
            ->leftJoin('categories','p.category_id','=','categories.id')
            ->leftJoin('producers','producers.id','=','p.producer_id')
            ->select('p.*','categories.name as category','producers.name as producer')
            ->where('p.id',$id)
            ->get();
    }
}
