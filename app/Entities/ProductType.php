<?php 
namespace App\Entities;

/**
 * 
 */
class ProductType
{
	private $id;
	private $name;
	//id property
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
	//name property
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
}