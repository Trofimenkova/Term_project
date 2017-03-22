<?php require_once("includes/connection.php"); ?>
<?php
    require_once("database.php");
    require_once("models/products.php");

    $link = db_connect();
	$user = user_get($link, $_SESSION["session_username"]);

?>
<?php
if(isset($_POST["register"])){


if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['telephone'])) {
	$full_name=trim($_POST['full_name']);
	$email=trim($_POST['email']);
	$telephone=trim($_POST['telephone']);

	$sql="INSERT INTO users
			(full_name, email, telephone, username,password) 
			VALUES('$full_name','$email', '$telephone', '$username', '$password')";

	$result=mysql_query($sql);

	}
}
?>


<!DOCTYPE html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <title>Личные данные</title>
<link rel="shortcut icon" href="images/fish.png" type="image/png">
</head> 
<body>
	
    <div>
    <div>
    <h1>ЛИЧНЫЕ ДАННЫЕ</h1>
	<form name="change"  action="" method="POST">
    
	<p>
		<label for="user_login">ФИО<br />
		<input type="text" name="full_name" id="full_name" class="input" size="32" value="<?=$user['full_name']?>"  /></label>
	</p>
	
	
	<p>
		<label for="user_pass">Email<br />
		<input type="email" name="email" id="email" class="input" value="<?=$user['email']?>" size="32" /></label>
	</p>
	<p>
		<label for="user_pass">Телефон<br />
		<input type="text" name="telephone" id="telephone" class="input" value="<?=$user['telephone']?>" size="32" /></label>
	</p>
        <p class="submit">
        <input type="submit" name="login" class="button" value="Сохранить" />
    </p>
       
</form>
    </div>

    </div>
	
	
	