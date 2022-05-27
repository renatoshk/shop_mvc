<?php
namespace App\Libraries; 

use App\Entities\Product;
use \PDO;
use PDOException;

/**
*connect to database
*pdo prepared statment
*bind values
*return results
*/
class Database {
		private $host = DB_HOST;
		private $user = DB_USER;
		private $password = DB_PASS;
		private $dbName = DB_NAME;
	    //property to handle database
		private $dbh;
		//property queries statements
		private $stmt;
		//property to handle errors
		private $error;

	public function __construct(){
		//set dsn
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
		$options = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];
		//create pdo instance
       try {
       		$this->dbh = new PDO($dsn, $this->user, $this->password, $options);
       }
       catch(PDOexception $e){
       	$this->error = $e->getMessage();
       	echo $this->error;
       }
	}
	//prepare query function
	public function query($sql){
       $this->stmt = $this->dbh->prepare($sql);
	}
	//bind values
	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT ;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL ;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL ;
					break;
				default:
					$type = PDO::PARAM_STR;
			}

		}
		$this->stmt->bindValue($param,$value,$type);
	}
	//execute prepared stmt
	public function execute(){
		return $this->stmt->execute();
	}
	//get results set as array of objects
	public function fetchObjects(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}
    public function fetchAssocArray(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getResultsByClass($class){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_CLASS,get_class($class));
    }
    //get single result 
	public function singleRow(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	//get single object result
    public function getSingleObjectResult($class){
        $this->execute();
        return $this->stmt->fetchObject(get_class($class));
    }
	//get row Count
	public function rowCount(){
		return $this->stmt->rowCount();
	}
	//function to get last id of inserted
    public function getLastInsertedId(){
        $this->execute();
        return $this->dbh->lastInsertId();
    }
}

 ?>