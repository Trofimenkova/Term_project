<?php include("includes/header.php"); ?>
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
	<div id="slider">
		<ul>
			<li class="yellow" style="background-image: url(images/0.jpg)">
			<h2 style="margin-top:100px; margin-left:400px">Уход за лицом</h2>
				<a href="products.php?page=1" class="btn-more" id="one">Смотреть каталог</a>
			</li>
			<li class="yellow" style="background-image: url(images/01.jpg)">
			<h2 style="margin-top:100px; margin-left:700px">Уход за телом</h2>
				<a href="products.php?page=1" class="btn-more" id="two">Смотреть каталог</a>
			</li>
			<li class="yellow" style="background-image: url(images/02.jpg)">
			<h2 style="margin-top:100px; margin-right:550px">Косметика для лица</h2>
				<a href="products.php?page=1" class="btn-more" id="three">Смотреть каталог</a>
			</li>
			<li class="yellow" style="background-image: url(images/03.jpg)">
			<h2 style="margin-top:100px; margin-right:800px">Косметика для глаз</h2>
				<a href="products.php?page=1" class="btn-more" id="four">Смотреть каталог</a>
			</li>
			<li class="yellow" style="background-image: url(images/04.jpg)">
			<h2 style="margin-top:100px;">Косметика для губ</h2>
				<a href="products.php?page=1" class="btn-more" id="five">Смотреть каталог</a>
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
						<a href="product.php?id=<?=$p['Id_товар']?>"><img src="<?=$p['Изображение']?>" alt="<?=$p['Название_товара']?>" width="auto" height="35%" height="33%" style="margin-top: 20px"></a>
						<h3><?=$p['Название_товара']?></h3>
						<h4><?=$p['Цена']?> BYN</h4>
						<a href="product.php?id=<?=$p['Id_товар']?>" class="btn-add">Подробное описание</a>
					</article>
				<?php endforeach; ?>
					
				</section>
			</div>
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
