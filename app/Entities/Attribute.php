<?php 
namespace App\Entities;

/**
 * 
 */
class Attribute
{
	private $id;
	private $product_type_id;
	private $name;
	private $unit;
	private $description;
	//id property
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    //product type id property
    public function getProductTypeId()
    {
        return $this->product_type_id;
    }
    public function setProductTypeId($productTypeId)
    {
        $this->product_type_id = $productTypeId;
    }
	//name property
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    //symbol property
    public function getUnit(){
        return $this->unit;
    }
    public function setUnit($unit){
        $this->unit = $unit;
    }
    //description property
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }
}