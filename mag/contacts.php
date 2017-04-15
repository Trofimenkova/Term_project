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
				<li>Контакты</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content">
				<form id="form" method="post" action="post.php"> 
					<input type= "text" name="name" placeholder="Укажите Ваше имя" required class="textbox"></label> 
					<input type= "text" name= "email" placeholder="Укажите Ваш email" required class="textbox"></label> 
					<select name="subject" id="subject" required>
<option value="" selected>- Выбрать тему -</option>
<option value="Здравствуйте!">Здравствуйте!</option>
<option value="Помогите!">Помогите!</option>
<option value="Предлагаю...">Предлагаю...</option>
<option value="Нашел ошибку!">Нашел ошибку!</option>
<option value="Ожидается ли поставка...">Ожидается ли поставка...</option>
</select>  
<textarea rows= "10" cols= "45" name= "message" required class="message"></textarea> 
<input type= "submit" value= "Отправить" class="button" style="float: right; margin-top:-10px;"> 
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
