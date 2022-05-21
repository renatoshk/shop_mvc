<?php 
namespace App\Entities;

/**
 * 
 */
class Currency
{
	private $currency_id;
	private $name;
	private $symbol;
	//id property
    public function getId()
    {
        return $this->currency_id;
    }
    public function setId($id)
    {
        $this->currency_id = $id;
    }
	//name property
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    //symbol property
    public function getSymbol(){
        return $this->symbol;
    }
    public function setSymbol($symbol){
        $this->symbol = $symbol;
    }

}