<?php


namespace App\Models;

//DTO TO ORGANIZE ONLY DATA THAT WE NEED
use App\Entities\ProductType;

class ProductTypeModel
{
    private $productTypeId;
    private $productTypeName;

    public function __construct(ProductType $productType)
    {
        $this->setProductTypeId($productType->getId());
        $this->setProductTypeName($productType->getName());
    }
    //product type
    public function getProductTypeId(){
        return $this->productTypeId;
    }
    public function setProductTypeId($productTypeId){
        $this->productTypeId=$productTypeId;
    }
    public function getProductTypeName(){
        return $this->productTypeName;
    }
    public function setProductTypeName($productTypeName){
        $this->productTypeName=$productTypeName;
    }
}