<?php

include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/supplier.php";
// insert employee
$obj = new Supplier();
$data = array(
	"supplier_id" => $_REQUEST["supplier_id"],
	"supplier_name" => $_REQUEST["supplier_name"],
	"supplier_address" => $_REQUEST["supplier_address"],
	"supplier_phone" => $_REQUEST["supplier_phone"],
	"fax" => $_REQUEST["fax"]
);
$obj->update($data, " id = {$_REQUEST["id"]} ");

var_dump($data);
//echo mysql_info();
redirect("index.php?viewName=supplierList");
