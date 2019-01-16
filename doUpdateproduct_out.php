<?php

include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/product_out.php";
// insert product_out
$obj = new product_out();
$data = array(
	"product_id" =>		$_REQUEST["product_id"],		
	"emp_id" =>   $_REQUEST["emp_id"],
	"recive_date" => $_REQUEST["recive_date"],
	"product_id" =>   $_REQUEST["product_id"],
);
$emp->update($data, " id={$_REQUEST["id"]}");
var_dump($data);
//echo mysql_info();
redirect("index.php?viewName=product_outList");
