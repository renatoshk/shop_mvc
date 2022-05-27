<?php
namespace App\Repositories;

use App\Entities\Attribute;
use App\Libraries\Database;

use App\Repositories\Interfaces\RepositoryInterface;

class AttributesRepository implements RepositoryInterface
{
    //all
    public function all(){
        $db=new Database();
        $db->query("SELECT attributes.id as id,
                    attributes.product_type_id as product_type_id,
                    attributes.name as name,
                    attributes.unit as unit,
                    attributes.type as type,
                    attributes.description as description,
                    product_attributes_values.id as product_attributes_values_id,
                    product_attributes_values.product_id as product_id,
                    product_attributes_values.attribute_id as attribute_id,
                    product_attributes_values.value as product_attributes_value
                 FROM attributes
                 INNER JOIN product_attributes_values ON attributes.id=product_attributes_values.attribute_id");
        return $db->fetchAssocArray();
    }
    //get attributes by product type id
    public function getByProductTypeId($productTypeId){
        $db=new Database();
        $db->query("SELECT * FROM attributes WHERE product_type_id = :product_type_id");
        //bind values
        $db->bind(':product_type_id', $productTypeId);
        $results=$db->fetchAssocArray();
        $data=[];
        foreach ($results as $result){
            $attribute=new Attribute();
            $attribute->setId($result['id']);
            $attribute->setProductTypeId($result['product_type_id']);
            $attribute->setName($result['name']);
            $attribute->setType($result['type']);
            $attribute->setDescription($result['description']);
            $attribute->setUnit($result['unit']);
            $data[]=$attribute;
        }
        return $data;
    }
//    public function findByIds($ids){
//        $db=new Database();
//        $db->query("SELECT * FROM attributes WHERE id IN(:ids)");
//        $db->bind(':id',$ids);
//        $results=$db->fetchAssocArray();
//        var_dump($results);die;
//    }
}