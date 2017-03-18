<?php
    require_once("database.php");
    require_once("models/products.php");

    $link = db_connect();
	$products = products_view($link);
    include("views/products.php");
?>