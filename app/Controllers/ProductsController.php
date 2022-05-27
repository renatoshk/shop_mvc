<?php
namespace App\Controllers;

use App\Controllers\Interfaces\Controller;
use App\Helpers\Helper;
use App\Libraries\BaseController;

use App\Models\ProductCreationModel;
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
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //init
                $helper=new Helper();
                $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $productService=new ProductService();
                if($productService->save($data)){
                    $helper->redirect('products');
                }else{
                    return false;
                }
            }
        }catch (\Exception $e){
            return $e->getCode();
        }
    }
}