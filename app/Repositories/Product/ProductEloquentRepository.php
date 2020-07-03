<?php


namespace App\Repositories\Product;
use App\Product;
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
            ->leftJoin('product_statuses','p.status_id','=','product_statuses.id')
            ->select('p.*','categories.name as category','producers.name as producer', 'product_statuses.name as status',
                DB::raw('p.amount
            - (SELECT IFNULL(SUM(transaction_products.amount),0) FROM transaction_products 
            INNER JOIN transactions ON transaction_products.transaction_id = transactions.id
            INNER JOIN transaction_statuses ON transaction_statuses.id = transactions.status_id
            WHERE transaction_products.product_id = p.id AND transaction_statuses.id <> 5) AS amount'));
    }

    public function getPhotosOfProduct($id)
    {
        $product = Product::find($id);
        return $product->photos()->pluck('photo');
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
            ->leftJoin('reviews','p.id','=','reviews.product_id')
            ->select('p.*','categories.name as category',
                'producers.name as producer',
                DB::raw('AVG(reviews.rating) as rating'),
                  DB::raw('COUNT(reviews.rating) as amount_rating'),
                DB::raw('p.amount
            - (SELECT IFNULL(SUM(transaction_products.amount),0) FROM transaction_products 
            INNER JOIN transactions ON transaction_products.transaction_id = transactions.id
            INNER JOIN transaction_statuses ON transaction_statuses.id = transactions.status_id
            WHERE transaction_products.product_id = p.id AND transaction_statuses.id <> 5) AS amount'))
            ->where('p.id',$id)
            ->groupBy('p.id')
            ->get();
    }
    public function searchProductByName($name)
    {
        return DB::table('products as p')
            ->leftJoin('categories', 'p.category_id', '=', 'categories.id')
            ->leftJoin('producers', 'producers.id', '=', 'p.producer_id')
            ->select('p.*', 'categories.name as category', 'producers.name as producer')
            ->where('p.name', 'LIKE', '%' . $name . '%')
            ->get();
    }

    public function getReviewProduct($id)
    {
        $review = DB::table('products as p')
            ->join('reviews', 'p.id', '=', 'reviews.product_id')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->select('users.name', 'reviews.content', 'reviews.rating')
            ->where('p.id', $id)
            ->get();
        return $review;
    }


    public function query(){
        return DB::table('products as p')
            ->leftJoin('categories','p.category_id','=','categories.id')
            ->leftJoin('producers','producers.id','=','p.producer_id')
            ->leftJoin('product_statuses','p.status_id','=','product_statuses.id')
            ->select('p.*','categories.name as category','producers.name as producer', 'product_statuses.name as status',
             DB::raw('p.amount
            - (SELECT IFNULL(SUM(transaction_products.amount),0) FROM transaction_products 
            INNER JOIN transactions ON transaction_products.transaction_id = transactions.id
            INNER JOIN transaction_statuses ON transaction_statuses.id = transactions.status_id
            WHERE transaction_products.product_id = p.id AND transaction_statuses.id <> 5) AS amount'));
    }


    public function getSaleProduct()
    {
        return $this->query()->where('discount','>',0);

    }

    public function getNewProduct()
    {
       return $this->query()->where('product_statuses.name',3);
    }
    public function filterProductByPrice($start,$end){
        return $this->query()->where('product_statuses.name',3);
    }
}
