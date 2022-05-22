<?php 
namespace App\Libraries;

/**
 *base controller
 *loads models and views 
 */
class BaseController
{
	//load view
	public function view($view, $data){
		//check for the view file
		if(file_exists('../app/views/' . $view . '.php')){
			require_once '../app/views/' . $view . '.php';
		}
		else {
			die('View dont exists'); 
		}
	}
}

 ?>