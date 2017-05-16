<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
$_SESSION["session_username"] = ""; }
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Make-up.buy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/style.css">
	<style>
	/* скрываем чекбоксы и блоки с содержанием */
.hide {
    display: none; 
}
.hide + label ~ div{
    display: none;
}
/* оформляем текст label */
.hide + label {
    border-bottom: 1px dotted #003366;
    padding: 0;
    color: #003366;
    cursor: pointer;
    display: inline-block; 
}
/* вид текста label при активном переключателе */
.hide:checked + label {
    color: green;
    border-bottom: 0;
}
/* когда чекбокс активен показываем блоки с содержанием  */
.hide:checked + label + div {
    display: block; 
    background: #f2f2f2;
    -moz-box-shadow: inset 3px 3px 10px #656567;
    -webkit-box-shadow: inset 3px 3px 10px #656567;
    box-shadow: inset 3px 3px 10px #656567;
    padding: 10px; 
	width:61%;
}

/* demo контейнер */
.otzov {
	margin: 5% 0%;
	width: 80%;
	position: relative;
}

.otzov textarea {
	width: 100%;
}
</style>
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
	if (button != null) button.onclick = addItem;
}

function addItem() {
	var vid = '<?php echo $product['Название_товара'];?>';
	var data = {
	id: '<?php echo $product['Id_товар'];?>', 
	amount: document.getElementById("amount").value,
	price: '<?php echo $product['Цена'];?>', 
	total_amount: '<?php echo $product['Количество'];?>',
	picture: '<?php echo $product['Изображение'];?>'
	}
	if (parseInt(data.total_amount) == 0) alert("К сожалению, данного товара нет в наличии");
    else if (parseInt(data.amount) < 0) alert("Указано отрицательное количество товара!");
	else if (parseInt(data.amount) == 0) alert("Укажите количество товара!");
	else if (parseInt(data.amount) > parseInt(data.total_amount)) alert("В наличии имеется только "+data.total_amount+" шт!");
    else { localStorage.setItem(vid, JSON.stringify(data)); alert('<?php echo $product['Название_товара'];?> '+"добавлен в корзину в количестве "+data.amount+" шт"); }
	return false;
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
	</header>