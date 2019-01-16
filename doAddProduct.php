<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/product.php";

// insert product
$obj = new Product();

 $data = array(
    "product_id" => $_REQUEST["product_id"],
	"product_type_id" => "1",
    "product_name" => $_REQUEST["product_name"],
    "type_name" => $_REQUEST["type_name"],
    "product_unit" => $_REQUEST["product_unit"],
    "product_expire" => $_REQUEST["product_expire"],
    "quantity" => $_REQUEST["quantity"],
    "price" => $_REQUEST["price"]
	);
	
$product_refID = $obj->insert_product($data);
if ($product_refID == false) {
    redirect("errorAddProduct.php");
} else {                          
    $obj->insert_product_detail($data, $product_refID);
    redirect("index.php?viewName=productList");
}
