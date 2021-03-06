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
	private $type;
	private $unit;
	private $description;
	private $productAttributeValue;
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
    //type property
    public function getType(){
        return $this->type;
    }
    public function setType($type){
        $this->type = $type;
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
    //relations
    public function getProductAttributeValue(){
        return $this->productAttributeValue;
    }
    public function setProductAttributeValue(ProductAttributesValues $productAttributeValue){
        $this->productAttributeValue=$productAttributeValue;
    }
}