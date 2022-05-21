<?php
namespace App\Services;

use App\Entities\Product;
use App\Repositories\ProductRepository;

class ProductService
{
    public function getProducts(){
        $productRepository=new ProductRepository();
        $products=$productRepository->all();
        foreach ($products as $product){
            echo '<pre>';
            var_dump($product);die;
            echo '</pre>';
        }
        echo '<pre>';
        var_dump($products);
        echo '</pre>';
        die;
        return $products;
    }

}