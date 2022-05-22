<?php
namespace App\Controllers;

use App\Controllers\Interfaces\Controller;
use App\Libraries\BaseController;

use App\Services\ProductService;

/**
 * 
 */
class ProductsController extends BaseController implements Controller
{
	public function index()
	{
       $productService= new ProductService();
       $products=$productService->getProducts();
        $data = [
            'products'=>$products
        ];
       $this->view('products/index', $data);
	}
	public function create(){
	    $data=[];
        $this->view('products/add', $data);
    }
}