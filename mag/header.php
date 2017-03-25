<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
$_SESSION["session_username"] = ""; }
?>

<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Рыбин Гуд</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="images/fish.png" type="image/png">
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
	
	var button = document.getElementById("add_button");
	button.onclick = addItem;
}

function addItem() {
	//var id = '<?php echo $product['Id_товар'];?>';
    //var amount = document.getElementById("amount").value;
    //localStorage.setItem(id, amount);
	
	var vid = '<?php echo $product['Вид'];?>';
	var data = {
	id: '<?php echo $product['Id_товар'];?>', 
	amount: document.getElementById("amount").value,
	price: '<?php echo $product['Цена'];?>', 
	total_amount: '<?php echo $product['Количество'];?>',
	picture: '<?php echo $product['Изображение'];?>'
	}
	if (data.total_amount == 0) alert("К сожалению, данного товара нет в наличии");
    else if (parseInt(data.amount) < 0) alert("Указано отрицательное количество товара!");
	else if (data.amount == 0) alert("Укажите количество товара!");
	//else if (data.amount > data.total_amount) alert("В наличии имеется только "+data.total_amount+" шт!");
    else { localStorage.setItem(vid, JSON.stringify(data)); alert('<?php echo $product['Вид'];?> '+"добавлен в корзину в количестве "+data.amount+" шт"); }
	return false;
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
				    <!--<li><span class="ico-products"></span><a href="cart.php">Корзина</a></li>
					<li><span class="ico-account"></span><a href="login.php" id="avt" target="_blank" onclick="return openWindow(this.href);">Авторизация</a></li>
					<li><span class="ico-signout"></span><a href="register.php" id="reg" target="_blank" onclick="return openWindow(this.href);">Регистрация</a></li>-->
				</ul>
			</div>
		</div>
		<!-- / container -->
	</header>
	<!-- / header -->