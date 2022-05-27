<?php 
namespace App\Entities;

/**
 * 
 */
class Product
{
	private $id;
	private $currencyId;
	private $productTypeId;
	private $name;
	private $sku;
	private $price;
	private $productType;
	private $currency;
	//id property
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    //currency id property
    public function getCurrencyId()
    {
        return $this->currencyId;
    }
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
    }
    //product type id property
    public function getProductTypeId()
    {
        return $this->productTypeId;
    }
    public function setProductTypeId($productTypeId)
    {
        $this->productTypeId = $productTypeId;
    }
	//name property
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    //sku property
    public function getSku(){
        return $this->sku;
    }
    public function setSku($sku){
        $this->sku = $sku;
    }
    //price property
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    //relations
    public function getProductType(){
       return $this->productType;
    }
    public function setProductType(ProductType $productType){
        $this->productType=$productType;
    }
    public function getCurrency(){
        return $this->currency;
    }
    public function setCurrency(Currency $currency){
        $this->currency=$currency;
    }

}