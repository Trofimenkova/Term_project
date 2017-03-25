<?php include("header.php"); ?>
	<nav id="menu">
		<div class="container">
			<div class="trigger"></div>
			<ul>
				<li><a href="index.php">Главная</a></li>
				<li><a href="products.php?page=1">Каталог</a></li>
				<li><a href="about.php">О магазине</a></li>
				<li><a href="dostavka.php">Оплата и доставка</a></li>
				<li><a href="excel.php">Прайс-лист</a></li>
				<li><a href="contacts.php">Контакты</a></li>
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
				<a href="products.php?page=1" class="btn-more">Купить</a>
			</li>
			<li class="yellow" style="background-image: url(images/01.jpg)">
				<h3>А вы знаете, что</h3>
				<h2>некоторые рыбы плавают задом наперед</h2>
				<a href="products.php?page=1" class="btn-more">Купить</a>
			</li>
			<li class="yellow" style="background-image: url(images/02.jpg)">
				<h3>А вы знаете, что</h3>
				<h2>некоторые рыбы способны менять пол</h2>
				<a href="products.php?page=1" class="btn-more">Купить</a>
			</li>
			<li class="yellow" style="background-image: url(images/03.jpg)">
				<h3>А вы знаете, что</h3>
				<h2>рыбы способны чувствовать боль</h2>
				<a href="products.php?page=1" class="btn-more">Купить</a>
			</li>
			<li class="yellow" style="background-image: url(images/04.jpg)">
				<h3>А вы знаете, что</h3>
				<h2>существуют подводные "кукушки"</h2>
				<a href="products.php?page=1" class="btn-more">Купить</a>
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
						<a href="product.php?id=<?=$p['Id_товар']?>"><img src="<?=$p['Изображение']?>" alt="<?=$p['Вид']?>" width="auto" height="45%" height="43%" style="margin-top: -20px"></a>
						<h3><?=$p['Вид']?></h3>
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

	<?php include("footer.php"); ?>


	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
