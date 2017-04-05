<?php require_once("includes/connection.php"); ?>

<?php

if(isset($_POST["order"])){


if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['telephone']) && $_SESSION["session_username"]=="") {
	$full_name = trim($_POST['full_name']);
	$email = trim($_POST['email']);
	$telephone = trim($_POST['telephone']);
	$address = trim($_POST['address']);
	$date = trim($_POST['date']);
			
	$sql = "INSERT INTO users
			(full_name, email, telephone) 
			VALUES('$full_name','$email', '$telephone')";

	$result = mysql_query($sql);
	
	$sql2 = "INSERT INTO заказы (Дата_оформления, Адрес_доставки, Дата_доставки) VALUES (NOW(), '$address', '$date')";
	echo "INSERT INTO заказы (Дата_оформления, Адрес_доставки, Дата_доставки) VALUES (NOW(), '$address', '$date')";

	$result2 = mysql_query($sql2);
	}	
}
	//header("location:kabinet.php");
?>