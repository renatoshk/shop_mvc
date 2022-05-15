<?php
namespace App\Controllers;

use App\Libraries\BaseController;

use App\Services\ProductService;

/**
 * 
 */
class ProductsController extends BaseController
{
	public function index()
	{
       $productService= new ProductService();
       $data=$productService->getProducts();
       foreach ($data as $product){
           var_dump($product);die;
       }
        $this->view('posts/index', $data);
	}
}