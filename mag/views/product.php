<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Рыбин Гуд</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" media="all" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="shortcut icon" href="images/fish.png" type="image/png">
	<script src="js/index.js"></script>
</head>
<body>

	<header id="header">
		<div class="container">
			<a href="index.php" id="logo" title="Рыбин Гуд">Рыбин Гуд</a>
			<div class="right-links">
				<ul>
					<li><a href="cart.html"><span class="ico-products"></span>3 товара, 100 BYN</a></li>
					<li><a href="login.php" target="_blank" onclick="return openWindow(this.href);"><span class="ico-account"></span>Авторизация</a></li>
					<li><a href="register.php" target="_blank" onclick="return openWindow(this.href);"><span class="ico-signout"></span>Регистрация</a></li>
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
				<li><a href="products.php">Каталог</a></li>
				<li><a href="about.html">О магазине</a></li>
				<li><a href="dostavka.html">Оплата и доставка</a></li>
				<li><a href="contacts.html">Контакты</a></li>
			</ul>
		</div>
		<!-- / container -->
	</nav>
	<!-- / navigation -->

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="#">Главная</a></li>
				<li>Каталог</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<div class="product">
				<div class="image"><img src="<?=$product['Изображение']?>" alt="<?=$product['Вид']?>" class="img-thumbnail"></div>
					
					<div class="details">
						<h1></h1>
						<h4><?=$product['Вид']?></h4>
						<div class="entry">
							<h2 style="margin-top: -30px"><?=$product['Цена']?> BYN</h2>
							<div class="tabs">
								<div class="nav">
									<ul>
										<li class="active"><a href="#desc">О товаре</a></li>
										<li><a href="#spec">Описание</a></li>
										<li><a href="#ret">Уход</a></li>
									</ul>
								</div>
								<div class="tab-content active" id="desc">
									<p><b>Семейство:</b> <?=$product['Семейство']?><br>
									<b>Размер*:</b> до <?=$product['Размер']?> см<br>
									<b>В наличии</b> <?=$product['Количество']?> шт<br>
									* длина тела продаваемых рыб
									</p>
								</div>
								<div class="tab-content" id="spec">
								    <p><b>Размер взрослой особи:</b> до <?=$product['Размер_взрослой_особи']?> см<br>
									<b>Продолжительность жизни:</b> до <?=$product['Продолжительность_жизни']?> лет<br>
									<b>Место обитания:</b> <?=$product['Место_обитания']?>
									</p>
								</div>
								<div class="tab-content" id="ret">
									<p><?=$product['Уход']?></p>
								</div>
							</div>
						</div>
						<div class="actions">
							<label>Количество:</label>
							<input type="number" min="0" max="<?=$product['Количество']?>" step="1" value="0">
							<a href="#" class="btn-grey">Добавить в корзину</a>
						</div>
					</div>
					
				</div>
			</div>
			<!-- / content -->
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<footer id="footer">
		<div class="container">
			<div class="cols">
				<div class="col">
					<h3>Frequently Asked Questions</h3>
					<ul>
						<li><a href="#">Fusce eget dolor adipiscing </a></li>
						<li><a href="#">Posuere nisl eu venenatis gravida</a></li>
						<li><a href="#">Morbi dictum ligula mattis</a></li>
						<li><a href="#">Etiam diam vel dolor luctus dapibus</a></li>
						<li><a href="#">Vestibulum ultrices magna </a></li>
					</ul>
				</div>
				<div class="col media">
					<h3>Social media</h3>
					<ul class="social">
						<li><a href="#"><span class="ico ico-fb"></span>Facebook</a></li>
						<li><a href="#"><span class="ico ico-tw"></span>Twitter</a></li>
						<li><a href="#"><span class="ico ico-gp"></span>Google+</a></li>
						<li><a href="#"><span class="ico ico-pi"></span>Pinterest</a></li>
					</ul>
				</div>
				<div class="col contact">
					<h3>Contact us</h3>
					<p>Diana’s Jewelry INC.<br>54233 Avenue Street<br>New York</p>
					<p><span class="ico ico-em"></span><a href="#">contact@dianasjewelry.com</a></p>
					<p><span class="ico ico-ph"></span>(590) 423 446 924</p>
				</div>
				<div class="col newsletter">
					<h3>Join our newsletter</h3>
					<p>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium.</p>
					<form action="#">
						<input type="text" placeholder="Your email address...">
						<button type="submit"></button>
					</form>
				</div>
			</div>
			<p class="copy">Copyright 2013 Jewelry. All rights reserved.</p>
		</div>
		<!-- / container -->
	</footer>
	<!-- / footer -->


	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
