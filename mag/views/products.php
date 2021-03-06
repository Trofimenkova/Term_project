﻿<?php include("header.php"); ?>

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
			<div class="pagination">
				<ul>
				<li><a href="products.php?page=<?=($_GET['page']-1)?>" onclick="return stopPrev(<?=($_GET['page']-1)?>)"><span class="ico-prev"></span></a></li>
				<?php
				$str = 1;
				while ($str <= ceil($amount/12)): 
				?>
				<li><a href="products.php?page=<?=$str?>"><?=$str?></a></li>
				<?php
				$str++;
				endwhile;
				?>
				<li><a href="products.php?page=<?=($_GET['page']+1)?>" onclick="return stopNext(<?=($_GET['page']+1)?>, <?=ceil($amount/12)?>)"><span class="ico-next"></span></a></li>
				</ul>
			</div>
			<div class="products-wrap">
				<aside id="sidebar">
					<div class="widget">
						<h3>Сортировать по:</h3>
						<fieldset>
							<input checked type="checkbox">
							<label>Вид</label>
							<input type="checkbox">
							<label>Семейство</label>
							<input type="checkbox">
							<label>Размер</label>
							<input type="checkbox">
							<label>Цена</label>
						</fieldset>
					</div>
					
					<div class="widget">
						<h3>Цена:</h3>
						<fieldset>
							<div id="price-range"></div>
						</fieldset>
					</div>
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
			<div class="pagination">
				<ul>
				<li><a href="products.php?page=<?=($_GET['page']-1)?>" onclick="return stopPrev(<?=($_GET['page']-1)?>)"><span class="ico-prev"></span></a></li>
				<?php
				$str = 1;
				while ($str <= ceil($amount/12)): 
				?>
				<li><a href="products.php?page=<?=$str?>"><?=$str?></a></li>
				<?php
				$str++;
				endwhile;
				?>
				<li><a href="products.php?page=<?=($_GET['page']+1)?>" onclick="return stopNext(<?=($_GET['page']+1)?>, <?=ceil($amount/12)?>)"><span class="ico-next"></span></a></li>
				</ul>
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