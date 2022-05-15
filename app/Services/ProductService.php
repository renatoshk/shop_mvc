<?php
namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    public function getProducts(){
        $productRepository=new ProductRepository();
        $products=$productRepository->getProducts();
        return $products;
    }

}