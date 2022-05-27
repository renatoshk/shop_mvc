<?php


namespace App\Models;


use App\Entities\Currency;
use App\Entities\ProductType;

class ProductCreationModel
{
    private $sku;
    private $currencyId;
    private $productTypeId;
    private $productType;
    private $name;
    private $price;

    public  function __construct(array $data,ProductType $productType,Currency $currency)
    {
        //set main information to product
        $this->setProductTypeId($productType->getId());
        $this->setProductCurrencyId($currency->getId());
        $this->setProductName($data['name']);
        $this->setProductSku($data['sku']);
        $this->setProductPrice($data['price']);
        $this->setProductType($productType);
    }

    //name property
    public function getProductName(){
        return $this->name;
    }
    public function setProductName($name){
        $this->name = $name;
    }
    //sku property
    public function getProductSku(){
        return $this->sku;
    }
    public function setProductSku($sku){
        $this->sku = $sku;
    }
    //currency id property
    public function getProductCurrencyId(){
        return $this->currencyId;
    }
    public function setProductCurrencyId($currencyId){
        $this->currencyId = $currencyId;
    }
    //product TYPE id property
    public function getProductTypeId(){
        return $this->productTypeId;
    }
    public function setProductTypeId($productTypeId){
        $this->productTypeId = $productTypeId;
    }
    //price property
    public function getProductPrice(){
        return $this->price;
    }
    public function setProductPrice($price){
        $this->price = $price;
    }
    //pass objects
    //product TYPE id property
    public function getProductType(ProductType $productType){
        return $this->productType;
    }
    public function setProductType(ProductType $productType){
        $this->productType = $productType;
    }
}