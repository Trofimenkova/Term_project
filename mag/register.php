<?php
session_start();
require_once("database.php");
$link = db_connect();
?>
<?php
if(isset($_POST["register"])){
	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['username']) && !empty($_POST['password'])) {
		$full_name=trim($_POST['full_name']);
		$email=trim($_POST['email']);
		$telephone=trim($_POST['telephone']);
		$username=trim($_POST['username']);
		//$password=password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
		$password=crypt(trim($_POST['password']));
				
		$query=mysqli_query($link, "SELECT * FROM users WHERE username='".$username."'") or die(mysql_error());
		$numrows=mysqli_num_rows($query);
		
		if($numrows==0)
		{
			$sql="INSERT INTO users(full_name, email, telephone, username,password) VALUES('$full_name','$email', '$telephone', '$username', '$password')";

			$result=mysqli_query($link, $sql);

			if($result){ $success = "Account successfully created! Please sign the authorization form."; } 
			else { $message = "Failed to insert data information!"; }
		} 
		else { $message = "That username already exists! Please try another one!"; }
	} 
	else { $message = "All fields are required!"; }
}
?>
<?php include("includes/header_reg.php"); ?>
<?php if (!empty($success)) {echo "<p style=\"background: green;\" class=\"error\">" . "MESSAGE: ". $success . "</p>";} ?>	
<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	<div class="container mregister">
		<div id="login">
			<h1>РЕГИСТРАЦИЯ</h1>
			<form name="registerform" id="registerform" action="register.php" method="post">
				<p>
					<label for="user_login">ФИО<br />
					<input type="text" name="full_name" id="full_name" class="input" size="32" value=""  /></label>
				</p>
				<p>
					<label for="user_pass">Email<br />
					<input type="email" name="email" id="email" class="input" value="" size="32" /></label>
				</p>
				<p>
					<label for="user_pass">Телефон<br />
					<input type="text" name="telephone" id="telephone" class="input" value="" size="32" /></label>
				</p>
				<p>
					<label for="user_pass">Логин<br />
					<input type="text" name="username" id="username" class="input" value="" size="32" /></label>
				</p>
				<p>
					<label for="user_pass">Пароль<br />
					<input type="password" name="password" id="password" class="input" value="" size="32" /></label>
				</p>	
				<p class="submit">
					<input type="submit" name="register" id="register" class="button" value="Register" />
				</p>
				<p class="regtext">Уже зарегистрированы? <a href="login.php" target="_self" onclick="window.open(this.href,this.target); return false;">Войти!</a></p>
			</form>
		</div>
	</div>
	<body>
</html>
	
	