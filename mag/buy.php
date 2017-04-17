<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
$_SESSION["session_username"] = ""; }
?>
<?php
    require_once("database.php");
    require_once("models/products.php");

    $link = db_connect();
	$methods = methods_payment($link);
	$user = user_get($link, $_SESSION["session_username"]);

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Рыбин Гуд</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="shortcut icon" href="images/fish.png" type="image/png">
	<style>
	.form-group { margin-left:0px!important; }
	fieldset legend { text-align: center; text-transform: uppercase; }
	input[type="text"], input[type="email"], input[type="telephone"], input[type="date"], textarea { width: 300px!important; }
	#dost { margin-top: 30px; margin-bottom: 30px;}
	</style>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">	
	<script src="js/index.js"></script>
<script>
window.onload = function() {
	var username = '<?php echo $_SESSION["session_username"];?>';
	if (username!="") {
		document.getElementById("avt").innerHTML = "Личный кабинет";
		document.getElementById("avt").href = "kabinet.php";
		document.getElementById("avt").setAttribute("target","_self");
		document.getElementById("avt").onclick = function() { };
		document.getElementById("reg").innerHTML = "Выйти";
		document.getElementById("reg").href = "logout.php";
		document.getElementById("reg").setAttribute("target","_self");
		document.getElementById("reg").onclick = function() { location.reload(); };
	}
}

function get_action(form) {
	form.action = "addOrder.php?"+window.location.toString().substring(window.location.toString().indexOf("id"));
}
</script>
</head>
<body>
	<header id="header">
		<div class="container">
			<a href="index.php" id="logo" title="Рыбин Гуд">Рыбин Гуд</a>
			<div class="right-links">
				<ul>
					<li><span class="ico-products"></span><a href="cart.php">Корзина</a></li>
					<li><span class="ico-account"></span><a href="login.php" id="avt">Авторизация</a></li>
					<li><span class="ico-signout"></span><a href="register.php" id="reg">Регистрация</a></li>
				</ul>
			</div>
		</div>
		<!-- / container -->
	</header>
	<!-- / header -->

	<nav id="menu">
		<div class="container">
			<div class="trigger"></div>
			<ul>
				<li><a href="index.php">Главная</a></li>
				<li><a href="products.php?page=1">Каталог</a></li>
				<li><a href="about.php">О магазине</a></li>
				<li><a href="dostavka.php">Оплата и доставка</a></li>
				<li><a href="excel.php">Прайс-лист</a></li>
				<li><a href="contacts.php">Обратная связь</a></li>
			</ul>
		</div>
		<!-- / container -->
	</nav>
	<!-- / navigation -->

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="#">Главная</a></li>
				<li>Контакты</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<form method="post" role="form" action="" onsubmit="get_action(this);" class="form-horizontal">
                    <fieldset><legend>Личные данные*</legend><div class="form-group">
					<label>
                        ФИО:
                        <input type="text" name="full_name" value="<?=$user['full_name']?>" class="form-control">
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Email:
                        <input type="email" name="email" value="<?=$user['email']?>" class="form-control" required>
                    </label>
					</div>
					<div class="form-group">
                    <label>
                        Телефон:
                        <input type="telephone" name="telephone" value="<?=$user['telephone']?>" class="form-control">
                    </label>
					</div>
					</fieldset>
					
					<fieldset id="dost"><legend>Доставка и оплата*</legend><div class="form-group">
					<label>
                        Адрес доставки:
                        <input type="text" name="address" value="" class="form-control" required>
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Дата доставки:
                        <input type="date" name="date" class="form-control" value="<?=date('Y-m-d', strtotime("+1 day"));?>" min="<?=date('Y-m-d', strtotime("+1 day"));?>" required>
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Способ оплаты:
						<select name="method_pay">
						<?php foreach($methods as $m): ?>
							<option><?=$m['Способ_оплаты']?></option>
						<?php endforeach; ?>
						</select>
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Комментарий к заказу:
                        <textarea class="form-control" name="comment"></textarea>
                    </label>
					</div>
					<div class="total-count">
					<h3 style="margin-top:-20px;">Итого к оплате: <strong><?=$_GET['total']?> BYN</strong></h3>
                    <input type="submit" name="order" value="Подтвердить" class="button" onclick="localStorage.clear();" style="margin-top:-20px;">
					</div>
					</fieldset>
                </form>
			</div>
			<!-- / content -->
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<?php include("footer.php"); ?>


	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
