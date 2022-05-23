<?php
namespace App\Controllers;

use App\Controllers\Interfaces\Controller;
use App\Libraries\BaseController;

use App\Services\ProductService;
use App\Services\ProductTypeService;

/**
 * 
 */
class ProductsController extends BaseController implements Controller
{
	public function index()
	{
        $productService= new ProductService();
        $data = [
            'products'=>$productService->getProducts()
        ];
       $this->view('products/index', $data);
	}
	public function create(){
	    //get all product types
        $productTypeService=new ProductTypeService();
        $data['product_types']=$productTypeService->getProductTypes();
        $this->view('products/add', $data);
    }
    public function store(){
	    var_dump('store');die;
    }
}