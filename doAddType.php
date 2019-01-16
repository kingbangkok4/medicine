<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/type.php";

// insert Type
$obj = new Type();

 $data = array(
    "type_name" => $_REQUEST["type_name"],
	"low_quantity" => $_REQUEST["low_quantity"]
  );
	
$type_id = $obj->insert($data);

redirect("index.php?viewName=typeList");

