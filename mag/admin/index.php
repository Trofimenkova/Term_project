<?php
    require_once("../database.php");
    require_once("../models/products.php");
        
    $link = db_connect();
    
    $product['Вид']='';
    $product['Id_семейство']=1;
    $product['Размер']='';
	$product['Размер_взрослой_особи']='';
    $product['Продолжительность_жизни']='';
	$product['Место_обитания']='';
    $product['Описание']='';
	$product['Цена']=0;
    $product['Количество']=0;
    $product['Изображение']='';

    if(isset($_GET['action'])) $action = $_GET['action'];
    else $action = "";
    
    if($action == "add"){
        if(!empty($_POST)){
            products_new($link, $_POST['Вид'], $_POST['Id_семейство'], $_POST['Размер'], $_POST['Размер_взрослой_особи'], $_POST['Продолжительность_жизни'], $_POST['Место_обитания'], $_POST['Описание'], $_POST['Цена'], $_POST['Количество'], "images/".$_POST['Изображение']);
			header("Location: index.php");	
        }
        include("../views/product_admin.php");	
    }
	
	if($action == "add_from_file"){
        if(!empty($_POST)){
			import_csv($link, $_POST['CSV']);
			header("Location: index.php");	
        }
        include("../views/product_admin.php");	
    }
	
	else if($action == 'edit'){
        if(!isset($_GET['id']))
			header('Location: index.php');
        $id = (int)$_GET['id'];
        
        if(!empty($_POST) && $id > 0) {
            products_edit($link, $id, $_POST['Вид'], $_POST['Id_семейство'], $_POST['Размер'], $_POST['Размер_взрослой_особи'], $_POST['Продолжительность_жизни'], $_POST['Место_обитания'], $_POST['Описание'], $_POST['Цена'], $_POST['Количество'], $_POST['Изображение']);
            header("Location: index.php");
        }
        
        $product = product_get($link, $id);
        include("../views/product_admin.php");  
    }
	
	else if($action == 'delete'){
        $id = $_GET['id'];
        $product = products_delete($link, $id);
        header('Location: index.php');
    }
	
    else if($action == 'search'){
        $products = products_search($link, $_POST['search']);
        include("../views/products_admin.php");        
    }
	
	else {
        $products = products_all($link);
        include("../views/products_admin.php");        
    }
?>