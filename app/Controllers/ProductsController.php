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
       $this->view('products/index', $products);
	}
}