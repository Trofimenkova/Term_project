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
				<li>Оплата и доставка</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<h1 id="dostavka">Доставка</h1>
				<div class="entry">
					<p>Интернет-магазин <q>Рыбин Гуд</q> осуществляет доставку заказов по Минску и Беларуси</p>
					<h1 style="font-size: 130%">Условия доставки:</h1>
					<p style="margin-top: -15px;">
					<ul style="margin-left: 70px;">
						<li style="list-style-image: url(images/sum.png);">Минимальная сумма заказа - 10 BYN</li>
						<li style="list-style-image: url(images/one.png);">Достака товаров курьером по Минску и Беларуси осуществляется бесплатно</li>
						<li style="list-style-image: url(images/free.png);">Время работы курьерской службы: пн-пт - с 9.00 до 20.00, сб - с 10.00 до 17.00, вск - выходной</li>
						<li style="list-style-image: url(images/free.png);">При заказе до 13:00 доставка по Минску производится в этот же день, после 13:00 – на следующий день</li>
						<li style="list-style-image: url(images/free.png);">Срок доставки по Беларуси составляет от 2-х дня до 5-ти дней со дня принятия заказа, в некоторых случаях срок доставки может быть увеличен по согласованию с покупателем</li>
					</ul>
					</p>
					<h1 id="payment">Оплата</h1>
					<p>Возможные способы оплаты покупки в интернет-магазине <q>Рыбин Гуд</q>:</p>
					<ol>
						<li>Наличными деньгами</li>
						<li>Пластиковой банковской картой (к оплате принимаются пластиковые карты всех банков мира, включая белорусские банки)</li>
						<li>WebMoney</li>
						<li>EasyPay</li>
					</ol>
					<p>Оплата принимается исключительно в белорусских рублях. При покупки выдается чек, подтверждающий факт покупки</p>
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
