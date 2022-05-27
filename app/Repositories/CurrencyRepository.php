<?php
namespace App\Repositories;

use App\Entities\Currency;
use App\Libraries\Database;

use App\Repositories\Interfaces\RepositoryInterface;

class CurrencyRepository implements RepositoryInterface
{
    //all
    public function all(){
    }
    public function find($id){
        $db=new Database();
        $db->query("SELECT * FROM currencies WHERE id=:id");
        $db->bind(':id',$id);
        return $db->getSingleObjectResult(new Currency());
    }

}