<?php


namespace App\Models;

//DTO TO ORGANIZE ONLY DATA THAT WE NEED
use App\Entities\Attribute;
use App\Entities\ProductType;

class AttributeModel
{
    public $attributeId;
    public $productTypeId;
    public $attributeName;
    public $attributeType;
    public $attributeDescription;
    public $attributeUnit;

    public function __construct(Attribute $attribute)
    {
        $this->setAttributeId($attribute->getId());
        $this->setProductTypeId($attribute->getProductTypeId());
        $this->setAttributeName($attribute->getName());
        $this->setAttributeType($attribute->getType());
        $this->setAttributeDescription($attribute->getDescription());
        $this->setAttributeUnit($attribute->getUnit());

    }
    //product type id
    public function getProductTypeId(){
        return $this->productTypeId;
    }
    public function setProductTypeId($productTypeId){
        $this->productTypeId=$productTypeId;
    }
    //attribute id
    public function getAttributeId(){
        return $this->attributeId;
    }
    public function setAttributeId($attributeId){
        $this->attributeId=$attributeId;
    }
    //attribute name
    public function getAttributeName(){
        return $this->attributeName;
    }
    public function setAttributeName($attributeName){
        $this->attributeName=$attributeName;
    }
    //atribute type
    public function getAttributeType(){
        return $this->attributeType;
    }
    public function setAttributeType($attributeType){
        $this->attributeType=$attributeType;
    }
    //attribute description
    public function getAttributeDescription(){
        return $this->attributeDescription;
    }
    public function setAttributeDescription($attributeDescription){
        $this->attributeDescription=$attributeDescription;
    }
    //attribute unit
    public function getAttributeUnit(){
        return $this->attributeUnit;
    }
    public function setAttributeUnit($attributeUnit){
        $this->attributeUnit=$attributeUnit;
    }
}