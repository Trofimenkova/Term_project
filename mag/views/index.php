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
	<link rel="stylesheet" media="all" href="css/style.css">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="images/fish.png" type="image/png">
	<script src="js/index.js"></script>
<script>window.onload = function() {
	var username = '<?php echo $_SESSION["session_username"];?>';
	if (username!=0) {
		document.getElementById("avt").innerHTML = "Личный кабинет";
		document.getElementById("reg").innerHTML = "Выйти";
		document.getElementById('reg').onclick = function() { "<?php 
			session_start();
			unset($_SESSION['session_username']);
			session_destroy();
			header("location:index.php");
		?>"; 
		}
	}
}
</script>
</head>
<body>
	<header id="header">
		<div class="container">
			<a href="index.php" id="logo" title="Рыбин Гуд">Рыбин Гуд</a>
			<div class="right-links">
				<ul>
					<li><a href="cart.html"><span class="ico-products"></span>3 товара, 100 BYN</a></li>
					<li><a href="login.php" id="avt" target="_blank" onclick="return openWindow(this.href);"><span class="ico-account"></span>Авторизация</a></li>
					<li><a href="register.php" id="reg" target="_blank" onclick="return openWindow(this.href);"><span class="ico-signout"></span>Регистрация</a></li>
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

	<div id="slider">
		<ul>
			<li class="yellow" style="background-image: url(images/0.jpg)">
				<h3>А вы знаете, что</h3>
				<h2>существует около 40 видов летучих рыб</h2>
				<a href="products.php" class="btn-more">Купить</a>
			</li>
			<li class="yellow" style="background-image: url(images/01.jpg)">
				<h3>А вы знаете, что</h3>
				<h2>некоторые рыбы плавают задом наперед</h2>
				<a href="products.php" class="btn-more">Купить</a>
			</li>
			<li class="yellow" style="background-image: url(images/02.jpg)">
				<h3>А вы знаете, что</h3>
				<h2>некоторые рыбы способны менять пол</h2>
				<a href="products.php" class="btn-more">Купить</a>
			</li>
			<li class="yellow" style="background-image: url(images/03.jpg)">
				<h3>А вы знаете, что</h3>
				<h2>рыбы способны чувствовать боль</h2>
				<a href="products.php" class="btn-more">Купить</a>
			</li>
			<li class="yellow" style="background-image: url(images/04.jpg)">
				<h3>А вы знаете, что</h3>
				<h2>существуют подводные "кукушки"</h2>
				<a href="products.php" class="btn-more">Купить</a>
			</li>
		</ul>
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div class="last-products">
				<h2>Новинки</h2>
				<section class="products">
				<?php foreach($products as $p): ?>
					<article>
						<img src="<?=$p['Изображение']?>" alt="<?=$p['Вид']?>" width="auto" height="45%" height="43%" style="margin-top: -20px">
						<h3><?=$p['Вид']?></h3>
						<h4><?=$p['Цена']?> BYN</h4>
						<a href="cart.html" class="btn-add">Добавить в корзину</a>
					</article>
				<?php endforeach; ?>
					
				</section>
			</div>
			<section class="quick-links">
				<article style="background-image: url(images/2.jpg)">
					<a href="#" class="table">
						<div class="cell">
							<div class="text">
								<h4>Lorem ipsum</h4>
								<hr>
								<h3>Dolor sit amet</h3>
							</div>
						</div>
					</a>
				</article>
				<article class="red" style="background-image: url(images/3.jpg)">
					<a href="#" class="table">
						<div class="cell">
							<div class="text">
								<h4>consequatur</h4>
								<hr>
								<h3>voluptatem</h3>
								<hr>
								<p>Accusantium</p>
							</div>
						</div>
					</a>
				</article>
				<article style="background-image: url(images/4.jpg)">
					<a href="#" class="table">
						<div class="cell">
							<div class="text">
								<h4>culpa qui officia</h4>
								<hr>
								<h3>magnam aliquam</h3>
							</div>
						</div>
					</a>
				</article>
			</section>
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
