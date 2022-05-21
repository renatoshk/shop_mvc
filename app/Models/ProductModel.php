<?php


namespace App\Models;

//DTO TO ORGANIZE ONLY DATA THAT WE NEED
use App\Entities\Attribute;
use App\Entities\Currency;
use App\Entities\Product;
use App\Entities\ProductType;

class ProductModel
{
    private $productId;
    private $sku;
    private $productTypeName;
    private $price;
    private $symbol;
    private $attributes;

    public function __construct(Product $product, Currency $currency, ProductType $productType)
    {
        $this->setProductId($product->getId());
        $this->setSku($product->getSku());
        $this->setPrice($product->getPrice());
        $this->setSymbol($currency->getSymbol());
        $this->setProductTypeName($productType->getName());
        $this->setAttributes($productType->getAttributes());
    }
    //product id
    public function getProductId(){
        return $this->productId;
    }
    public function setProductId($productId){
        $this->productId=$productId;
    }
    //sku
    public function getSku(){
        return $this->sku;
    }
    public function setSku($sku){
        $this->sku=$sku;
    }
    //price
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price=$price;
    }
    //product type
    public function getProductTypeName(){
        return $this->productTypeName;
    }
    public function setProductTypeName($productTypeName){
        $this->productTypeName=$productTypeName;
    }
    //currency
    public function getSymbol(){
        return $this->symbol;
    }
    public function setSymbol($symbol){
        $this->symbol = $symbol;
    }
    //attribute
    public function getAttributes(){
        return $this->attributes;
    }
    public function setAttributes($attributes){
        $this->attributes=$attributes;
    }
}