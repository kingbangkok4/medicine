<?php
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/type.php";

$pro = new Type();
$pro->delete(" id = {$_REQUEST["id"]} ");
redirect("index.php?viewName=typeList");
