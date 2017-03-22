<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
$_SESSION["session_username"] = 0; }
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
	if (username!=0) {
		document.getElementById("avt").innerHTML = "Личный кабинет";
		document.getElementById("avt").href = "#";
		document.getElementById("avt").setAttribute("target","_self");
		document.getElementById("avt").onclick = function() { };
		document.getElementById("reg").innerHTML = "Выйти";
		document.getElementById("reg").href = "logout.php";
		document.getElementById("reg").setAttribute("target","_self");
		document.getElementById("reg").onclick = function() { location.reload(); };
	}
	basket();
}

function basket() {
	if (localStorage.length == 0) {
		document.getElementsByClassName("cart-table")[0].innerHTML = "Ваша корзина сейчас пуста. Воспользуйтесь нашим каталогом, чтобы ее заполнить.";
	}
	
	else {
	var total = 0;
	for (var i = 0; i<localStorage.length; i++) {
	var key = localStorage.key(i);
	var value = JSON.parse(localStorage[key]);
	
	var korzina = document.getElementsByTagName("table")[0];
	var tr = document.createElement("tr");
	korzina.appendChild(tr);
	
	var td1 = document.createElement("td");
	td1.setAttribute("class", "items");
	tr.appendChild(td1);
	var hr = document.createElement("a");
	hr.setAttribute("href", "product.php?id="+value.id);
	td1.appendChild(hr);
	hr.innerHTML = key;
	
	var td2 = document.createElement("td");
	td2.setAttribute("class", "price");
	td2.innerHTML = parseFloat(value.price);
	tr.appendChild(td2);
	
	var td3 = document.createElement("td");
	td3.setAttribute("class", "qnt");
	tr.appendChild(td3);
	var input = document.createElement("input");
	input.setAttribute("type", "number");
	input.setAttribute("min", "0");
	input.setAttribute("max", parseInt(value.total_amount));
	input.setAttribute("step", "1");
	input.setAttribute("value", parseInt(value.amount));
	//td3.innerHTML = value.amount;
	td3.appendChild(input);
	
	var td4 = document.createElement("td");
	td4.setAttribute("class", "total");
	td4.innerHTML = parseFloat((parseFloat(value.price) * parseInt(value.amount)).toFixed(2));
	tr.appendChild(td4);
	total+= parseFloat((parseFloat(value.price) * parseInt(value.amount)).toFixed(2));
	
	var td5 = document.createElement("td");
	td5.setAttribute("class", "delete");
	tr.appendChild(td5);
	var a = document.createElement("a");
	a.setAttribute("class", "ico-del");
	a.setAttribute("id", key);
	a.setAttribute("href", "#");
	td5.appendChild(a);
	a.onclick = delete_item;
	}
	
	var reset = document.createElement("tr");
	reset.setAttribute("colspan", "5");
	korzina.appendChild(reset);
	
	var button = document.createElement("button");
	button.innerHTML = "Очистить корзину";
	reset.appendChild(button);
	button.onclick = delete_localStorage;
	
	document.getElementsByTagName("strong")[0].innerHTML = total + " BYN";
	}
}

function delete_item(e) {
	localStorage.removeItem(e.target.id);
	location.reload();
}

function delete_localStorage() {
	localStorage.clear();
	location.reload();
}

function setHref(e) {
	if (localStorage.length == 0) { alert("Ваша корзина пустая!"); return false; }
	else {e.href = "buy.php?user=" + '<?php echo $_SESSION["session_username"];?>'; return true;}
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

	<nav id="menu">
		<div class="container">
			<div class="trigger"></div>
			<ul>
				<li><a href="index.php">Главная</a></li>
				<li><a href="products.php?page=1">Каталог</a></li>
				<li><a href="about.php">О магазине</a></li>
				<li><a href="dostavka.php">Оплата и доставка</a></li>
				<li><a href="contacts.php">Контакты</a></li>
			</ul>
		</div>
		<!-- / container -->
	</nav>
	<!-- / navigation -->

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="#">Главная</a></li>
				<li>Корзина</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<div class="cart-table">
					<table>
						<tr>
							<th class="items">Товар</th>
							<th class="price">Цена, BYN</th>
							<th class="qnt">Количество, шт</th>
							<th class="total">Сумма, BYN</th>
							<th class="delete"></th>
						</tr>
						<!--<tr>
							<td class="items">
								<div class="image">
									<img src="images/6.jpg" alt="">
								</div>
								<h3><a href="#">Lorem ipsum dolor</a></h3>
								<p>Dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
							</td>
							<td class="price">$1 350.00</td>
							<td class="qnt"><select><option>1</option><option>1</option></select></td>
							<td class="total">$1 350.00</td>
							<td class="delete"><a href="#" class="ico-del"></a></td>
						</tr>-->
					</table>
				</div>

				<div class="total-count">
					<h3>Итоговая сумма: <strong>0 BYN</strong></h3>
					<a href="#" onclick="return setHref(this)" class="btn-grey">Оформить заказ</a>
				</div>
		
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
