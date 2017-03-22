<?php include("header.php"); ?>

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
						<form>
							<label>Количество:</label>
							<input type="number" id="amount" min="0" max="<?=$product['Количество']?>" step="1" value="0">
							<input type="submit" id="add_button" class="btn-grey" value="Добавить в корзину">
						</form>
						</div>
					</div>
					
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
