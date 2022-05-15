<?php 
namespace App\Entities;

/**
 * 
 */
class ProductAttributesValues
{
	private $product_id;
	private $attribute_id;
	private $value;

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