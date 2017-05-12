<?php
    require_once("../database.php");
    require_once("../models/products.php");
        
    $link = db_connect();
    
    $product['Название_товара']='';
    $product['Id_категория']=1;
    $product['Цвет']='';
	$product['Объем_товара']='';
    $product['Описание']='';
	$product['Id_производителя']='';
	$product['Применение']='';
    $product['Цена']=0;
    $product['Количество']=0;
    $product['Изображение']='';

    if(isset($_GET['action'])) $action = $_GET['action'];
    else $action = "";
    
    if($action == "add"){
        if(!empty($_POST)){
            products_new($link, $_POST['Название_товара'], $_POST['Id_категория'], $_POST['Цвет'], $_POST['Объем_товара'], $_POST['Применение'], $_POST['Описание'], $_POST['Id_производителя'], $_POST['Цена'], $_POST['Количество'], "images/".$_POST['Изображение']);
			header("Location: index.php");	
        }
        include("product_admin.php");	
    }
	
	else if($action == "add_from_file"){
        if(!empty($_POST)){
			import_csv($link, $_POST['CSV']);
			header("Location: index.php");	
        }
        include("product_admin.php");	
    }
	
	else if($action == 'edit'){
        if(!isset($_GET['id']))
			header('Location: index.php');
        $id = (int)$_GET['id'];
        
        if(!empty($_POST) && $id > 0) {
            products_edit($link, $id, $_POST['Название_товара'], $_POST['Id_категория'], $_POST['Цвет'], $_POST['Объем_товара'], $_POST['Применение'], $_POST['Описание'], $_POST['Id_производителя'], $_POST['Цена'], $_POST['Количество'], $_POST['Изображение']);
            header("Location: index.php");
        }
        
        $product = product_get($link, $id);
        include("product_admin.php");  
    }
	
	else if($action == 'delete'){
        $id = $_GET['id'];
        $product = products_delete($link, $id);
        header('Location: index.php');
    }
	
    else if($action == 'search'){
        $products = products_search($link, $_POST['search']);
        include("products_admin.php");        
    }
	
	else {
        $products = products_all($link);
        include("products_admin.php");        
    }
?>