<?php
namespace App\Repositories;

use App\Entities\Attribute;
use App\Entities\Currency;
use App\Entities\ProductAttributesValues;
use App\Entities\ProductType;
use App\Libraries\Database;
use App\Entities\Product;
use App\Helpers\Helper;
use App\Repositories\Interfaces\RepositoryInterface;

class ProductRepository implements RepositoryInterface
{
    public function all(){
        $db=new Database();
        $helper=new Helper();
        $db->query('SELECT products.id as id,
		products.name as name,
		products.sku as sku,
		products.price as price,
		product_types.id as product_type_id,
		product_types.name as product_type_name,
		attributes.id as attribute_id,
		attributes.name as attribute_name,
		attributes.unit as attribute_unit,
		attributes.description as attribute_description,
		product_attributes_values.id as product_attribute_id,
		product_attributes_values.value as product_attribute_value,
		currencies.id as currency_id,
		currencies.name as currency_name,
		currencies.symbol as currency_symbol
		FROM products
		INNER JOIN currencies ON currencies.id=products.currency_id
		INNER JOIN product_types ON product_types.id=products.product_type_id
		INNER JOIN attributes ON attributes.product_type_id=product_types.id
		INNER JOIN product_attributes_values ON product_attributes_values.attribute_id=attributes.id
		'
        );
        $results=$db->fetchAssocArray();
//        echo '<pre>';
//        var_dump($results);die;
//        echo '</pre>';
        $data=[];
        $attrs=[];
        foreach ($results as $result){
            //product object
            $product=new Product();
            $product->setId($result['id']);
            $product->setName($result['name']);
            $product->setSku($result['sku']);
            $product->setPrice($result['price']);
            //currency object
            $currency=new Currency();
            $currency->setId($result['currency_id']);
            $currency->setName($result['currency_name']);
            $currency->setSymbol($result['currency_symbol']);
            //product type object
            $productType=new ProductType();
            $productType->setId($result['product_type_id']);
            $productType->setName($result['product_type_name']);
            //attribute type object
            $attribute=new Attribute();
            $attribute->setId($result['attribute_id']);
            $attribute->setName($result['attribute_name']);
            $attribute->setUnit($result['attribute_unit']);
            $attribute->setDescription($result['attribute_description']);
            //product attribute values object type
            $productAttributeValue=new ProductAttributesValues();
            $productAttributeValue->setId($result['product_attribute_id']);
            $productAttributeValue->setProductId($result['id']);
            $productAttributeValue->setAttributeId($result['attribute_id']);
            $productAttributeValue->setValue($result['product_attribute_value']);
            $attribute->setProductAttributeValue($productAttributeValue);
            //prepare array of objects with, one to many relations between product type and attributes
            $attrs[$productType->getId()][]=$attribute;
            //fill objects with data
            $productType->attributes($attrs);
            $product->setCurrency($currency);
            $product->setProductType($productType);
            //set final result
            $data[$product->getId()]=$product;
            //remove other objects
            $next=next($results);
            if($helper->checkCurrentAndNextValues($next,$result, 'product_type_id')){
                unset($attrs[$productType->getId()]);
            }
        }
        return $data;
    }
}