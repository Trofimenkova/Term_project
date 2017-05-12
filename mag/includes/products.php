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
			<div class="pagination">
				<ul>
				<li><a href="products.php?page=<?=($_GET['page']-1)?>&sort=<?=$_POST['sort']?>&min_price=<?=$_POST['min_price']?>&max_price=<?=$_POST['max_price']?>" onclick="return stopPrev(<?=($_GET['page']-1)?>)"><span class="ico-prev"></span></a></li>
				<?php
				$str = 1;
				while ($str <= ceil($amount/12)): 
				?>
				<li><a href="products.php?page=<?=$str?>&sort=<?=$_POST['sort']?>&min_price=<?=$_POST['min_price']?>&max_price=<?=$_POST['max_price']?>"><?=$str?></a></li>
				<?php
				$str++;
				endwhile;
				?>
				<li><a href="products.php?page=<?=($_GET['page']+1)?>&sort=<?=$_POST['sort']?>&min_price=<?=$_POST['min_price']?>&max_price=<?=$_POST['max_price']?>" onclick="return stopNext(<?=($_GET['page']+1)?>, <?=ceil($amount/12)?>)"><span class="ico-next"></span></a></li>
				</ul>
			</div>
			<div class="products-wrap">
				<aside id="sidebar">
                    <form action="" method="post">
					<div class="widget">
				
						<h3>Сортировать по:</h3>
						
						<fieldset>
							<input type="radio" name="sort" value="Название_товара" <?if($_POST['sort'] == 'Название_товара' or $_GET['sort'] == 'Название_товара'){echo 'checked';}?>><span></span> Название товара <br>
							<input type="radio" name="sort" value="Категория" <?if($_POST['sort'] == 'Категория' or $_GET['sort'] == 'Категория'){echo 'checked';}?>><span></span> Категория <br>
							<input type="radio" name="sort" value="Цена" <?if($_POST['sort'] == 'Цена' or $_GET['sort'] == 'Цена'){echo 'checked';}?>><span></span> Цена <br>
							<input type="radio" name="sort" value="Бренд" <?if($_POST['sort'] == 'Бренд' or $_GET['sort'] == 'Бренд'){echo 'checked';}?>><span></span> Производитель
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
				<a href="product.php?id=<?=$p['Id_товар']?>"><img src=<?=$p['Изображение']?> alt=<?=$p['Название_товара']?> width="auto" height="43%" style="margin-top: 20px"></a>
							<h3><?=$p['Название_товара']?><br>Категория: <?=$p['Категория']?></h3>
							<h4><?=$p['Цена']?> BYN</h4>
							
							<a href="product.php?id=<?=$p['Id_товар']?>" class="btn-add">Подробное описание</a>
							
		
				
				
            </article>
            <?php endforeach; ?>
							
						
					</section>
				</div>
				<!-- / content -->
			</div>
			<div class="pagination">
				<ul>
				<li><a href="products.php?page=<?=($_GET['page']-1)?>&sort=<?=$_POST['sort']?>&min_price=<?=$_POST['min_price']?>&max_price=<?=$_POST['max_price']?>" onclick="return stopPrev(<?=($_GET['page']-1)?>)"><span class="ico-prev"></span></a></li>
				<?php
				$str = 1;
				while ($str <= ceil($amount/12)): 
				?>
				<li><a href="products.php?page=<?=$str?>&sort=<?=$_POST['sort']?>&min_price=<?=$_POST['min_price']?>&max_price=<?=$_POST['max_price']?>"><?=$str?></a></li>
				<?php
				$str++;
				endwhile;
				?>
				<li><a href="products.php?page=<?=($_GET['page']+1)?>&sort=<?=$_POST['sort']?>&min_price=<?=$_POST['min_price']?>&max_price=<?=$_POST['max_price']?>" onclick="return stopNext(<?=($_GET['page']+1)?>, <?=ceil($amount/12)?>)"><span class="ico-next"></span></a></li>
				</ul>
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