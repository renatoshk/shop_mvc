<?php
namespace App\Controllers\Api;

use App\Helpers\Helper;
use App\Libraries\BaseController;
use App\Repositories\ProductRepository;
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
//                header('Content-Type: application/json');
                //inits
                $productIds=$_POST['product_ids'];
                $productIds=array_values(json_decode($productIds, true));
                $productService=new ProductService();
                if($productService->bulkDestroy($productIds)){

                }

            }
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