<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/supplier.php";

// insert supplier
$obj = new Supplier();

$data = array(
	"supplier_id" => $_REQUEST["supplier_id"],
	"supplier_name" => $_REQUEST["supplier_name"],
	"supplier_address" => $_REQUEST["supplier_address"],
	"supplier_phone" => $_REQUEST["supplier_phone"],
	"fax" => $_REQUEST["fax"]
);
$obj->insert($data);

redirect("index.php?viewName=supplierList");

