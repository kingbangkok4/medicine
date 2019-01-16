<?php

include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/type.php";
// insert employee
$obj = new Type();
$data = array(
	"type_name" => $_REQUEST["type_name"],
	"low_quantity" => $_REQUEST["low_quantity"]
);
$obj->update($data, " id={$_REQUEST["id"]} ");
var_dump($data);
//echo mysql_info();
redirect("index.php?viewName=typeList");
