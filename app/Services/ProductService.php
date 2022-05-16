<?php
namespace App\Services;

use App\Entities\Product;
use App\Repositories\ProductRepository;

class ProductService
{
    public function getProducts(){
        $productRepository=new ProductRepository();
        $products=$productRepository->getProducts();
        foreach ($products as $product){
            echo '<pre>';
            var_dump($product->currency_name);
            echo '</pre>';
        }
        die;
        return $products;
    }

}