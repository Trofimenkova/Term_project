<?php
require_once("../database.php");
$link = db_connect();

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
	$comment = trim($_POST['comment']);
		
    if ($_SESSION["session_username"] == "") {
	$sql = "INSERT INTO users
			(full_name, email, telephone) 
			VALUES('$full_name','$email', '$telephone')";
	$result = mysqli_query($link, $sql);
	}
	
	$sql2 = "SELECT Id_способ_оплаты FROM Способы_оплаты where Способ_оплаты='".$_POST['method_pay']."'";
    $rezult2 = mysqli_query($link, $sql2);
    $row = mysqli_fetch_array($rezult2);
	
	$sql3 = "SELECT id_user from users where full_name='".$full_name."'";
    $rezult3 = mysqli_query($link, $sql3);
    $id= mysqli_fetch_array($rezult3);
	
	$sql4 = "INSERT INTO заказы (Дата_оформления, Адрес_доставки, Дата_доставки, Id_способ_оплаты, Id_покупатель, Комментарий) VALUES (NOW(), '$address', '$date', '$row[0]', '$id[0]', '$comment')";
	$result4 = mysqli_query($link, $sql4);
	
	$nomer_zakaza = (int)mysqli_insert_id($link);
	$id = $_GET['id'];
	$kol = $_GET['kol'];
	for ($i = 0; $i < count($id); $i++) {
		$sql5 = "INSERT INTO заказ_товар VALUES ($nomer_zakaza, $id[$i], $kol[$i])";
		$result5 = mysqli_query($link, $sql5);
		
		$query = "UPDATE товары SET Количество=Количество-$kol[$i] WHERE id_товар=".$id[$i];
		$result6 = mysqli_query($link, $query);
	}
	}	
}
	if ($_SESSION["session_username"] == "") echo "Ваш заказ оформлен. Наш менеджер свяжется с Вами в ближайшее время";
	else header("location:../kabinet.php");
?>