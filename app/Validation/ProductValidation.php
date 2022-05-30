<?php


namespace App\Validation;


class ProductValidation
{
    public function validateProduct($data){
        if(empty($data['name'])){
            return false;
        }
        if(empty($data['sku'])){
            return false;
        }
        if(empty($data['price'])){
            return false;
        }
        if(empty($data['product_type_id'])){
            return false;
        }
        return true;
    }
}