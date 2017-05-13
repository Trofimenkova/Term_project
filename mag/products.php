<?php
    require_once("database.php");
    require_once("models/products.php");

	$page = $_GET['page'];
    $link = db_connect();
	
	$max_pr = max_price($link);
 
	if (empty($_POST['min_price'])) $_POST['min_price']=$_GET['min_price']; if (empty($_POST['min_price'])) $_POST['min_price']=0;
	if (empty($_POST['max_price'])) $_POST['max_price']=$_GET['max_price']; if (empty($_POST['max_price'])) $_POST['max_price']= $max_pr;
	if (empty($_POST['sort']) and !empty($_GET['sort'])) $_POST['sort'] = $_GET['sort'];
	$products = products_view($link, ($page-1)*12, $_POST['sort'], $_POST['min_price'], $_POST['max_price']);
	$amount = products_count($link, $_POST['min_price'], $_POST['max_price']);
?>
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
			<?php include("includes/navigation.php"); ?>
			<div class="products-wrap">
				<aside id="sidebar">
                    <form action="" method="post">
					<div class="widget">
				
						<h3>Сортировать по:</h3>
						
						<fieldset>
							<input type="radio" name="sort" value="Вид" <?if($_POST['sort'] == 'Вид' or $_GET['sort']=='Вид'){echo 'checked';}?>><span></span> Вид <br>
							<input type="radio" name="sort" value="Семейство" <?if($_POST['sort'] == 'Семейство' or $_GET['sort'] == 'Семейство'){echo 'checked';}?>><span></span> Семейство <br>
							<input type="radio" name="sort" value="Цена" <?if($_POST['sort'] == 'Цена' or $_GET['sort'] == 'Цена'){echo 'checked';}?>><span></span> Цена <br>
							<input type="radio" name="sort" value="Размер" <?if($_POST['sort'] == 'Размер' or $_GET['sort'] == 'Размер'){echo 'checked';}?>><span></span> Размер
						</fieldset>
					</div>
					<div class="widget">
						<h3>Цена:</h3>
						<fieldset>
							<input type="text" size="3" name="min_price" value="<?=$_POST['min_price']?>" placeholder="0"> - <input type="text" size="3" name="max_price" value="<?=$_POST['max_price']?>" placeholder="<? echo $max_pr; ?>"> BYN
						</fieldset>
					</div>
					<br>
					<input type="submit" name="apply" class="button" value="Применить" />
				</form>
				</aside>
				<div id="content">
					<section class="products">
					
						
						<?php foreach($products as $p): ?>
            <article>
				<a href="product.php?id=<?=$p['Id_товар']?>"><img src=<?=$p['Изображение']?> alt=<?=$p['Вид']?> width="auto" height="43%" style="margin-top: -20px"></a>
							<h3><?=$p['Вид']?><br>Семейство <?=$p['Семейство']?></h3>
							<h4><?=$p['Цена']?> BYN</h4>
							
							<a href="product.php?id=<?=$p['Id_товар']?>" class="btn-add">Подробное описание</a>
							
		
				
				
            </article>
            <?php endforeach; ?>
							
						
					</section>
				</div>
				<!-- / content -->
			</div>
			<?php include("includes/navigation.php"); ?>
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