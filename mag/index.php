<?php
    require_once("database.php");
    require_once("models/products.php");

    $link = db_connect();
	$products = products_last($link);
    include("views/index.php");
?>