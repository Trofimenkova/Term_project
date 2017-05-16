<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
$_SESSION["session_username"] = ""; }
?>
<?php
    require_once("database.php");
    require_once("models/products.php");

	$page = $_GET['page'];
    $link = db_connect();
	
	$max_pr = max_price($link);
 
	if (empty($_POST['min_price'])) $_POST['min_price']=$_GET['min_price']; if (empty($_POST['min_price'])) $_POST['min_price']=0;
	if (empty($_POST['max_price'])) $_POST['max_price']=$_GET['max_price']; if (empty($_POST['max_price'])) $_POST['max_price']= $max_pr;
	if (empty($_POST['sort']) and !empty($_GET['sort'])) $_POST['sort'] = $_GET['sort'];
	$products = products_view($link, ($page-1)*12, $_POST['sort'], $_POST['min_price'], $_POST['max_price']);
	$amount = products_count($link, $_POST['min_price'], $_POST['max_price']);
	
	include("includes/products.php");
?>