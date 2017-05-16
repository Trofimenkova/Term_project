<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
$_SESSION["session_username"] = ""; }
?>
<?php
    require_once("database.php");
    require_once("models/products.php");

	$id = $_GET['id'];
    $link = db_connect();
	$product = product_get($link, $id);
	
	if(isset($_POST["add_otzov"])){
		$otzov = trim($_POST['otzov']);	
		if ($_SESSION["session_username"] == "") $sql = "INSERT INTO отзывы (Отзыв, Дата_написания, Id_товар) VALUES ('$otzov', NOW(), $id)";
		else {
			$user = user_get($link, $_SESSION["session_username"]);
			$user_id = $user['id_user'];
			$sql = "INSERT INTO отзывы (Отзыв, Дата_написания, Id_товар, Id_пользователь) VALUES ('$otzov', NOW(), $id, $user_id)";
		}
		$result = mysqli_query($link, $sql);
	}
    include("includes/product.php");
?>