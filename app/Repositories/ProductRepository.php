<?php
namespace App\Repositories;

use App\Libraries\Database;
use App\Entities\Product;

class ProductRepository
{
    public function getProducts(){
        $db=new Database();
        $db->query('SELECT products.id as product_id,
		products.name as product_name,
		products.sku as product_sku,
		products.price as product_price,
		product_types.id as product_type_id,
		product_types.name as product_type_name,
		attributes.name as attribute_name,
		attributes.unit as attribute_unit,
		attributes.description as attribute_description,
		product_attributes_values.value as product_attribute_value,
		currencies.id as currency_id,
		currencies.name as currency_name,
		currencies.symbol as currency_symbol
		FROM products
		INNER JOIN currencies ON currencies.id=products.currency_id
		INNER JOIN product_types ON product_types.id=products.product_type_id
		INNER JOIN attributes ON attributes.product_type_id=product_types.id
		INNER JOIN product_attributes_values ON product_attributes_values.product_id=products.id
		'
        );
        $results = $db->resultSet();
        echo '<pre>';
        var_dump($results);
        echo '</pre>';
        die;
        $product=new Product();
        foreach ($results as $result){
            $product->setId($result->product_id);
        }
        return $results;
    }
}