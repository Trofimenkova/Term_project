<?php
    require_once("database.php");
    require_once("models/products.php");

	$id = $_GET['id'];
    $link = db_connect();
	$product = product_get($link, $id);
    include("views/product.php");
?>