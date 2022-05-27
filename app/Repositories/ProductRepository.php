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
        $db->query('SELECT products.id as id,
		products.name as name,
		products.sku as sku,
		products.price as price,
		product_types.id as product_type_id,
		product_types.name as product_type_name,
		currencies.id as currency_id,
		currencies.name as currency_name,
		currencies.symbol as currency_symbol
		FROM products
		INNER JOIN currencies ON currencies.id=products.currency_id
		INNER JOIN product_types ON product_types.id=products.product_type_id
		'
        );
        $products=$db->fetchAssocArray();
        //get attributes and their values
        $attributesRepository=new AttributesRepository();
        $attributesData=$attributesRepository->all();
        //organize attributes
        $organizedAttributes=[];
        foreach ($attributesData as $attributeData){
            //set values to attribute entity
            $attribute=new Attribute();
            $attribute->setId($attributeData['id']);
            $attribute->setProductTypeId($attributeData['product_type_id']);
            $attribute->setName($attributeData['name']);
            $attribute->setUnit($attributeData['unit']);
            $attribute->setType($attributeData['type']);
            //set values to product attributes  entity
            $productAttributesValues=new ProductAttributesValues();
            $productAttributesValues->setId($attributeData['product_attributes_values_id']);
            $productAttributesValues->setProductId($attributeData['product_id']);
            $productAttributesValues->setAttributeId($attributeData['attribute_id']);
            $productAttributesValues->setValue($attributeData['product_attributes_value']);
            //pass product attributes values to  object  attributes
            $attribute->setProductAttributeValue($productAttributesValues);
            $organizedAttributes[$attributeData['product_id']][$attributeData['product_type_id']][] = $attribute;
        }
        $data=[];
        //add product data and merge with many attributes
        foreach ($products as $result){
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
            //fill objects with data
            $productType->setAttributes($organizedAttributes[$result['id']]);
            $product->setCurrency($currency);
            $product->setProductType($productType);
            //set final result
            $data[]=$product;
        }
        return $data;
    }
    public function store(Product $product){
        $db=new Database();
        $db->query("INSERT INTO products(product_type_id, currency_id,sku,name,price) VALUES(:product_type_id,:currency_id,:sku,:name,:price)");
        $db->bind(":product_type_id",$product->getProductTypeId());
        $db->bind(":currency_id",$product->getCurrencyId());
        $db->bind(":sku",$product->getSku());
        $db->bind(":name",$product->getName());
        $db->bind(":price",$product->getPrice());
        $newInsertedProductId=$db->getLastInsertedId();
        if($newInsertedProductId){
            $db->query("INSERT INTO product_attributes_values(product_id, attribute_id,value) VALUES(:product_id,:attribute_id,:value)");
            foreach ($product->getProductType()->getAttributes() as $attribute)
            {
                $db->bind(":product_id",$newInsertedProductId);
                $db->bind(":attribute_id",$attribute->getId());
                $db->bind(":value",$attribute->getProductAttributeValue()->getValue());
                $db->execute();
            }
            return true;
        }
        return false;
    }
    //find by ids
    public function findByIds($ids){
        $db=new Database();
        $db->query('SELECT * FROM products WHERE id IN (:ids)');
        foreach ($ids as $id){
            $db->bind(':ids',$id);
            $db->execute();
        }
        $results=$db->fetchAssocArray();
        echo "<pre>";
        var_dump($results);die;
        echo "</pre>";
    }
    public function bulkDestroy($ids){

    }
}