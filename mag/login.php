<?php
session_start();
require_once("database.php");
$link = db_connect();
?>

<?php include("includes/header_reg.php"); ?>

<?php
if(isset($_POST["login"])){
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
		$username=trim($_POST['username']);
		$password=trim($_POST['password']);

		$query = mysqli_query($link, "SELECT username, password FROM users WHERE username='".$username."'");
		
		$numrows=mysqli_num_rows($query);
		if($numrows!=0)
		{
			while($row=mysqli_fetch_assoc($query))
			{
				$dbpassword=$row['password'];
			}

			//if(password_verify($password, $dbpassword))
			if (crypt($password, $dbpassword) === $dbpassword)
			{
				$_SESSION['session_username'] = $username;
				header("location:index.php");	
			}
		} 
		else { $message =  "Invalid username and / or password"; }
	} 
	else { $message = "All fields are required!"; }
}
?>

<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
    <div class="container mlogin">
		<div id="login">
			<h1>АВТОРИЗАЦИЯ</h1>
			<form name="loginform" id="loginform" action="" method="POST">
				<p>
					<label for="user_login">Логин<br />
					<input type="text" name="username" id="username" class="input" value="" size="20" /></label>
				</p>
				<p>
					<label for="user_pass">Пароль<br />
					<input type="password" name="password" id="password" class="input" value="" size="20" /></label>
				</p>
					<p class="submit">
					<input type="submit" name="login" class="button" value="Log In" />
				</p>
				<p class="regtext">Нет акаунта? <a href="register.php" target="_self" onclick="window.open(this.href,this.target);return false;">Зарегистрироваться!</a></p>
			</form>
		</div>
    </div>
<body>
</html>
	