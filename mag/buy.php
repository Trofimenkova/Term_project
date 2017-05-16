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
	<title>Make-up.buy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<style>
	.form-group { margin-left:0px!important; }
	fieldset legend { text-align: center; text-transform: uppercase; }
	input[type="text"], input[type="email"], input[type="telephone"], input[type="date"], textarea { width: 300px!important; }
	#dost { margin-top: 30px; margin-bottom: 30px;}
	input[type=range] {
-webkit-appearance: none;
background: brown;
background: linear-gradient(to right, brown, black);
cursor: pointer;
border-radius: 20px;
height:15px;
}
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
	form.action = "actions/addOrder.php?"+window.location.toString().substring(window.location.toString().indexOf("id"));
}
</script>
</head>
<body>
	<header id="header">
		<div class="container">
			<a href="index.php" id="logo" title="Make-up.buy">Make-up.buy</a>
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
				<li><a href="map.php">Контакты</a></li>
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
                    <fieldset><legend>Личные данные</legend><div class="form-group">
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
					
					<fieldset id="dost"><legend>Доставка и оплата</legend><div class="form-group">
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
				<p>Вы можете купить товары в рассрочку. Чтобы рассчитать месячный платеж, задайте количество месяцев.</p>
				<script>
				var payment=0;
function computeLoan(){
	var amount = document.getElementById('amount').value;
	var interest_rate = 10;
	var months = document.getElementById('months').value;
	var interest = (amount * (interest_rate * .01)) / months;
	payment = ((amount / months) + interest).toFixed(2);
	payment = payment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	document.getElementById('kol').innerHTML = months;
	document.getElementById('payment').innerHTML = "Месячный платеж = "+payment + " BYN";
}


function use(){
					  document.getElementById('itogo').innerHTML = "Первый взнос: " + payment + " BYN";
					}

</script>
<form>
<p>Сумма заказа: <input id="amount" type="number" min="<?=$_GET['total']?>" max="<?=$_GET['total']?>" value="<?=$_GET['total']?>"> BYN</p>
<p>Процент: 10 %</p>
<p>Количество месяцев: <span id="kol">1</span> <input id="months" type="range" min="1" max="6" value="1" step="1" style="width: 50%;" onchange="computeLoan()"></p>
<h2 id="payment"></h2>
<input type="button" class="button" value="Купить в рассрочку" onclick="use();"><br>
					</form><br>		
					<label>
                        Комментарий к заказу:
                        <textarea class="form-control" name="comment"></textarea>
                    </label>
					</div>
					<div class="total-count">
					<h3 style="margin-top:-20px;"><span id="itogo">Итого к оплате: <?=$_GET['total']?> BYN</span></h3>
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

	<?php include("includes/footer.php"); ?>


	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
