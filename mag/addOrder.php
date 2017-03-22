<?php require_once("includes/connection.php"); ?>

<?php

if(isset($_POST["order"])){


if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['telephone'])) {
	$full_name=trim($_POST['full_name']);
	$email=trim($_POST['email']);
	$telephone=trim($_POST['telephone']);
			
	$sql="INSERT INTO users
			(full_name, email, telephone) 
			VALUES('$full_name','$email', '$telephone')";

	$result=mysql_query($sql);
	}
}
?>