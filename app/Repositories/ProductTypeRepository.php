<?php
namespace App\Repositories;

use App\Entities\ProductType;
use App\Libraries\Database;
use App\Entities\Product;
use App\Helpers\Helper;
use App\Repositories\Interfaces\RepositoryInterface;

class ProductTypeRepository implements RepositoryInterface
{
    public function all(){
        $db=new Database();
        $db->query("SELECT * FROM product_types");
        $results=$db->fetchAssocArray();
        $data=[];
        foreach ($results as $result){
            $productType=new ProductType();
            $productType->setId($result['id']);
            $productType->setName($result['name']);
            $data[]=$productType;
        }
       return $data;
    }
    public function find($id){
        $db=new Database();
        $db->query("SELECT * FROM product_types WHERE id=:id");
        $db->bind(':id',$id);
        return $db->getSingleObjectResult(new ProductType());
    }
}