<?php
namespace App\Repositories;

use App\Entities\Attribute;
use App\Libraries\Database;

use App\Repositories\Interfaces\RepositoryInterface;

class AttributesRepository implements RepositoryInterface
{
    //all
    public function all(){
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
            $attribute->setDescription($result['description']);
            $attribute->setUnit($result['unit']);
            $data[]=$attribute;
        }
        return $data;
    }
}