<?php
namespace App\Services;

use App\Models\AttributeModel;
use App\Models\ProductTypeModel;
use App\Repositories\AttributesRepository;
use App\Repositories\ProductTypeRepository;

class AttributesService
{
    public function getAttributesByProductTypeId($productTypeId){
        $attributesRepository=new AttributesRepository();
        $attributes=$attributesRepository->getByProductTypeId($productTypeId);
        $data=[];
        foreach ($attributes as $attribute){
            $attributeModel=new AttributeModel($attribute);
            $data[]=$attributeModel;
        }
        return $data;
    }

}