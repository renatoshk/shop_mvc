<?php 
namespace App\Entities;

/**
 * 
 */
class ProductAttributesValues
{
	private $id;
	private $product_id;
	private $attribute_id;
	private $value;

    //id property
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
	//product_id property
    public function getProductId()
    {
        return $this->product_id;
    }
    public function setProductId($productId)
    {
        $this->product_id = $productId;
    }
    //attribute_id property
    public function getAttributeId()
    {
        return $this->attribute_id;
    }
    public function setAttributeId($attributeId)
    {
        $this->attribute_id = $attributeId;
    }
    //value property
    public function getValue()
    {
        return $this->value;
    }
    public function setValue($value)
    {
        $this->value = $value;
    }
}