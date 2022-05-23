<?php
namespace App\Libraries;

use App\Controllers\Api\AttributesController;

/**
 * App Core Class
 *Create Url and loads core controllers
 *URL FORMAT - /api/controllers/methods/params
 */
class CoreApi
{
	//properties
	protected $currentController; //default controller
	protected $currentMethod; //default method
	protected $params = [];
	
	public function __construct($url)
	{
		if($url == null){
           return false;
        }
        //look in controllers for first value
        if(file_exists('../app/Controllers/Api/' . ucwords($url[1]) .'Controller'.'.php')){
            //if yes set as controller
            $this->currentController = ucwords($url[1]);
            //unset 0 index
            unset($url[0]);
            unset($url[1]);
        }
        //require the controller
        // require_once '../app/controllers/' . $this->currentController .'Controller'.'.php';
        //instantiate controller class

        $this->currentController = $this->currentController.'Controller';
        $path =  'App"Controllers"Api"'.$this->currentController;
        $path = addslashes($path);
        $path = str_replace('"', '', $path);
        $this->currentController = new $path();

        //check for second part of url
        if(isset($url[2])){
            //check if method exists
            if(method_exists($this->currentController, $url[2])){
                $this->currentMethod = $url[2];
                unset($url[2]);
            }
        }
        //check params
        $this->params = $url ? array_values($url) : [];
        //call a call back with array of params
        return call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

	}

}