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
}