<?php
namespace App\Controllers\Api;

use App\Libraries\BaseController;
use App\Services\AttributesService;

/**
 * 
 */
class AttributesController extends BaseController
{
    public function getByProductTypeId($productTypeId){
        try {
            $attributesService=new AttributesService();
            $data=$attributesService->getAttributesByProductTypeId($productTypeId);
            var_dump($data);die;
            return json_encode($data);
        }catch (\Exception $e){
            return json_encode(array(
                'error' => array(
                    'message' => "Error",
                    'code' => $e->getCode(),
                ),
            ));
        }
    }

}