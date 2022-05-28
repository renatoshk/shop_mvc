<?php
namespace App\Controllers\Api;

use App\Libraries\BaseController;
use App\Services\ProductService;

/**
 * 
 */
class ProductsController extends BaseController
{
    //mass delete
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
}