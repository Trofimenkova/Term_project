﻿<?php
    require_once("database.php");
    require_once("models/products.php");

	$page = $_GET['page'];
    $link = db_connect();
	$products = products_view($link, ($page-1)*12);
	$amount = products_count($link);
    include("views/products.php");
?>