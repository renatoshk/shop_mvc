<?php
namespace App\Services;

use App\Entities\Product;
use App\Entities\ProductAttributesValues;
use App\Models\ProductCreationModel;
use App\Models\ProductModel;
use App\Repositories\AttributesRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductTypeRepository;

class ProductService
{
    public $response;
    public function getProducts(){
        $productRepository=new ProductRepository();
        $products=$productRepository->all();
        $data=[];
        foreach ($products as $product){
            $productModel=new ProductModel($product,$product->getCurrency(),$product->getProductType());
            $data[$product->getId()]=$productModel;
        }
        return $data;
    }
    public function save($data)
    {
        //inits
        $productRepository=new ProductRepository();
        $productTypeRepository = new ProductTypeRepository();
        $currencyRepository = new CurrencyRepository();
        $attributesRepository = new AttributesRepository();
        //get product type
        if(!$productType = $productTypeRepository->find($data['product_type_id'])) {
            $this->response="Product Type don't exists!";
            return false;
        }
        //get currency
        if (!$currency = $currencyRepository->find(1)) {
            $this->response="Currency don't exists!";
            return false;
        }
        //get attributes by product type id
        $attributes = $attributesRepository->getByProductTypeId($productType->getId());
        foreach ($attributes as $attribute) {
            $productAttributesValues = new ProductAttributesValues();
            $productAttributesValues->setAttributeId($attribute->getId());
            $productAttributesValues->setValue($data['attribute_id_' . $attribute->getId()]);
            $attribute->setProductAttributeValue($productAttributesValues);
        }
        $productType->setAttributes($attributes);
        $productCreationModel = new ProductCreationModel($data, $productType, $currency);
        //pass data from model to entity
        $product = new Product();
        $product->setProductTypeId($productType->getId());
        $product->setCurrencyId($productCreationModel->getProductCurrencyId());
        $product->setName($productCreationModel->getProductName());
        $product->setSku($productCreationModel->getProductSku());
        $product->setPrice($productCreationModel->getProductPrice());
        $product->setCurrency($currency);
        $product->setProductType($productType);
        if(!$productRepository->store($product)){
            return false;
        }
        return true;
    }
    //mass delete function
    public function bulkDestroy($ids){
        $productRepository=new ProductRepository();
        $productIds=[];
        //find ids which exists on database
        if($products=$productRepository->findByIds($ids,'id')){
           foreach ($products as $product){
               $productIds[]=$product->getId();
           }
           if($productRepository->bulkDestroy($productIds)){
               //if mass delete is successfully, return product ids to remove from front end
               return $productIds;
           }
            return false;
        }
        return false;
    }

}