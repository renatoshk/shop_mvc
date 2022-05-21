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
    private $productType;
    private $price;
    private $symbol;
    private $attributes;

    public function __construct(Product $product, Currency $currency, ProductType $productType, array $attributes)
    {
        $this->setProductId($product->getId());
        $this->setSku($product->getSku());
        $this->setPrice($product->getPrice());
        $this->setPrice($product->getPrice());
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
        return $this->productId;
    }
    public function setSku($sku){
        $this->sku=$sku;
    }
    //price
    public function getPrice(){
        return $this->productId;
    }
    public function setPrice($price){
        $this->price=$price;
    }
    //product type
    public function getProductType(){
        return $this->productType;
    }
    public function setProductType(ProductType $productType){
        $this->productType=$productType;
    }
    //currency
    public function getCurrency(){
        return $this->currency;
    }
    public function setCurrency(Currency $currency){
        $this->currency=$currency;
    }
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
        return $this->attributes;
    }
}