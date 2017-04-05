<?php require_once("includes/connection.php"); ?>
<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
$_SESSION["session_username"] = ""; }
?>
<?php

if(isset($_POST["order"])){


if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['telephone'])) {
	$full_name = trim($_POST['full_name']);
	$email = trim($_POST['email']);
	$telephone = trim($_POST['telephone']);
	$address = trim($_POST['address']);
	$date = trim($_POST['date']);
		
    if ($_SESSION["session_username"] == "") {
	$sql = "INSERT INTO users
			(full_name, email, telephone) 
			VALUES('$full_name','$email', '$telephone')";
	$result = mysql_query($sql);
	}
	
	$sql2 = "SELECT Id_способ_оплаты FROM Способы_оплаты where Способ_оплаты='".$_POST['method_pay']."'";
    $rezult2 = mysql_query($sql2);
    $row = mysql_fetch_array($rezult2);
	
	$sql3 = "INSERT INTO заказы (Дата_оформления, Адрес_доставки, Дата_доставки, Id_способ_оплаты) VALUES (NOW(), '$address', '$date', '$row[0]')";
	$result3 = mysql_query($sql3);
	}	
}
	if ($_SESSION["session_username"] == "") header("location:index.php");
	else header("location:kabinet.php");
?>