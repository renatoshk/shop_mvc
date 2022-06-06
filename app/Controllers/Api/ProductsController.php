<?php
namespace App\Controllers\Api;

use App\Libraries\BaseController;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use App\Validation\ProductValidation;

/**
 * 
 */
class ProductsController extends BaseController
{
    //mass delete
    public $response;
    public function bulkDestroy(){
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //inits
                $productIds=$_POST['product_ids'];
                $productIds=array_values(json_decode($productIds, true));
                $productService=new ProductService();
                if($productIds=$productService->bulkDestroy($productIds)){
                    echo json_encode($productIds);
                }
                return json_encode(array(
                    'error' => array(
                        'message' => "Data not deleted successfully",
                        'code' =>400,
                    ),
                ));
            }
            return json_encode(array(
                'error' => array(
                    'message' => "Bad Request",
                    'code' =>400,
                ),
            ));
        }
        catch (\Exception $e){
            return json_encode(array(
                'error' => array(
                    'message' => "Error",
                    'code' => $e->getCode(),
                ),
            ));
        }
    }
    //check if sku is unique
    public function checkSku(){
        $sku=$_POST['sku'];
        $productRepository=new ProductRepository();
        if($productRepository->findBySku($sku)){
            $this->response="Sku already exists! Please try another!";
            echo json_encode($this->response);
        }
        return false;
    }
}