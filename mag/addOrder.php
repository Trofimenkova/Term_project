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
	
	$sql3 = "SELECT id_user from users where full_name='".$full_name."'";
    $rezult3 = mysql_query($sql3);
    $id= mysql_fetch_array($rezult3);
	
	$sql4 = "INSERT INTO заказы (Дата_оформления, Адрес_доставки, Дата_доставки, Id_способ_оплаты, Id_покупатель) VALUES (NOW(), '$address', '$date', '$row[0]', '$id[0]')";
	$result4 = mysql_query($sql4);
	
	$nomer_zakaza = (int)mysql_insert_id();
	$id = $_GET['id'];
	$kol = $_GET['kol'];
	for ($i = 0; $i < count($id); $i++) {
		$sql5 = "INSERT INTO заказ_товар VALUES ($nomer_zakaza, $id[$i], $kol[$i])";
		$result5 = mysql_query($sql5);
		
		$query = "UPDATE товары SET Количество=Количество-$kol[$i] WHERE id_товар=".$id[$i];
		$result6 = mysql_query($query);
	}
	}	
}
	if ($_SESSION["session_username"] == "") echo "Ваш заказ оформлен. Наш менеджер свяжется с Вами в ближайшее время";
	else header("location:kabinet.php");
?>