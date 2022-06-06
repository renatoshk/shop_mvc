<?php


namespace App\Validation;


use App\Repositories\ProductRepository;

class ProductValidation
{
    public $response;
    public function validate($data){
        if(empty($data['name'])){
            $this->response['name_empty']="Name cannot be empty!";
            return false;
        }
        if(empty($data['sku'])){
            $this->response['sku_empty']="Sku cannot be empty!";
            return false;
        }
        if(empty($data['price'])){
            $this->response['price_empty']="Price cannot be empty!";
            return false;
        }
        if(empty($data['product_type_id'])){
            $this->response['product_type_empty']="Product type cannot be empty!";
            return false;
        }
        return true;
    }
}