<?php include("header.php"); ?>

<?php
    require_once("database.php");
    require_once("models/products.php");

    $link = db_connect();
	$methods = methods_payment($link);
	$user = user_get($link, $_SESSION["session_username"]);

?>
<script>
function get_action(form) {
	form.action = "addOrder.php?"+window.location.toString().substring(window.location.toString().indexOf("id"));
}
</script>
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
                    <fieldset><legend>Личные данные</legend><div class="form-group">
					<label>
                        ФИО
                        <input type="text" name="full_name" value="<?=$user['full_name']?>" class="form-control">
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Email
                        <input type="email" name="email" value="<?=$user['email']?>" class="form-control" required>
                    </label>
					</div>
					<div class="form-group">
                    <label>
                        Телефон
                        <input type="telephone" name="telephone" value="<?=$user['telephone']?>" class="form-control">
                    </label>
					</div>
					</fieldset>
					
					<fieldset><legend>Доставка и оплата</legend><div class="form-group">
					<label>
                        Адрес доставки
                        <input type="text" name="address" value="" class="form-control" required>
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Дата доставки
                        <input type="date" name="date" value="" class="form-control" required>
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Способ оплаты
						<select name="method_pay">
						<?php foreach($methods as $m): ?>
							<option><?=$m['Способ_оплаты']?></option>
						<?php endforeach; ?>
						</select>
                    </label>
					</div>
					<p>Итого к оплате: <?=$_GET['total']?> BYN </p>
					<div class="form-group">
                    <input type="submit" name="order" value="Подтвердить" class="btn" onclick="localStorage.clear();" class="form-control">
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
