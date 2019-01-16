<?php
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/supplier.php";

$obj = new Supplier();
$obj->delete(" id = {$_REQUEST["id"]} ");
redirect("index.php?viewName=supplierList");
