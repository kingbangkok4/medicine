<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/product_out.php";

// insert product
$obj = new product_out();

 $data = array(
    "id" => $_REQUEST["id"],
    "emp_id" => $_REQUEST["emp_id"],
    "recive_date" => $_REQUEST["recive_date"],
    "product_id" => $_REQUEST["product_id"],
    "quantity" => $_REQUEST["quantity"],
	);
	
$obj->insert($data);

redirect("index.php?viewName=product_outList");