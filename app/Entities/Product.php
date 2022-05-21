<?php 
namespace App\Entities;

/**
 * 
 */
class Product
{
	private $id;
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