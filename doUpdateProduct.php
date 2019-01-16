<?php

include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/product.php";
// insert employee
$obj = new Product();
$data = array(
	"product_id" =>		$_REQUEST["product_id"],		
	"product_name" =>   $_REQUEST["product_name"],
	"product_type_id" => $_REQUEST["product_type_id"],
	"product_unit" =>   $_REQUEST["product_unit"],
                      
	"product_expire" => $_REQUEST["product_expire"],
	"quantity" =>       $_REQUEST["quantity"],
	"price" =>          $_REQUEST["price"]
);
$obj->update($data, " id={$_REQUEST["id"]} ", " product_ref_id={$_REQUEST["id"]} ");
var_dump($data);
//echo mysql_info();
redirect("index.php?viewName=productList");
