<?php
namespace App\Services;

use App\Entities\Product;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;

class ProductService
{
    public function getProducts(){
        $productRepository=new ProductRepository();
        $products=$productRepository->all();
        $data=[];
        foreach ($products as $product){
            $productModel=new ProductModel($product,$product->getCurrency(),$product->getProductType());
            $data[$product->getId()]=$productModel;
        }
        return $data;
    }

}