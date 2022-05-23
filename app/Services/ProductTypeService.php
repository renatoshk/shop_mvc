<?php
namespace App\Services;

use App\Models\ProductTypeModel;
use App\Repositories\ProductTypeRepository;

class ProductTypeService
{
    public function getProductTypes(){
        $productTypeRepository=new ProductTypeRepository();
        $productTypes=$productTypeRepository->all();
        $data=[];
        foreach ($productTypes as $productType){
            $productTypeModel=new ProductTypeModel($productType);
            $data[]=$productTypeModel;
        }
        return $data;
    }

}