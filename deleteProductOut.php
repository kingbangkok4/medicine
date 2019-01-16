<?php
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/product.php";

$pro = new Product();
$pro->delete_out(" id = {$_REQUEST["id"]}", " product_ref_id = {$_REQUEST["id"]}", $_REQUEST["quantity"]);
redirect("index.php?viewName=product_outList");
