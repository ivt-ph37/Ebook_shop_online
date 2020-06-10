<?php


namespace App\Repositories\Product;


interface ProductRepositoryInterface
{

    public function getProducts();
    public function getProductByCategory($id);
    public function showProductById($id);
}
