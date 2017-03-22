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
				<li>Контакты</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<form id="form" class="form-horizontal" method="post" action="post.php"> 
<div class="form-group">
<label>Имя: <input type= "text" name= "name" required class="form-control"></label> 
</div>
<div class="form-group">
<label>E-mail: <input type= "text" name= "email" required class="form-control"></label> 
</div>
<div class="form-group">
<label>Тема: <select name="subject" id="subject" required class="form-control">
<option value="" selected>-Выбрать тему-</option>
<option value="Помогите!">Помогите!</option>
<option value="Предлагаю...">Предлагаю...</option>
<option value="Нашел ошибку!">Нашел ошибку!</option>
<option value="Ожидается ли поставка...">Ожидается ли поставка...</option>
<option value="Здравствуйте!">Здравствуйте!</option>
</select>  
</label> 
</div>
<div class="form-group">
<label class="col-sm-2 control-label">
Сообщение: 
<div class="col-sm-10"><textarea rows= "10" cols= "45" name= "message" required class="form-control"></textarea></div></label> 
</div>
<div class="form-group">
<input type= "submit" value= "Отправить" class="form-control"> 
</div>
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
