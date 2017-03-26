<?php include("header.php"); ?>
<?php
    require_once("database.php");
    require_once("models/products.php");

    $link = db_connect();
	$user = user_get($link, $_SESSION["session_username"]);
?>
<script>
function openWindow(url) {
    var features, w = 350, h = 450;
	//var top = (document.documentElement.clientHeight - h)/4;
	var	left = (document.documentElement.clientWidth - w)/2; 
    //if(top < 0) top = 0;
	if(left < 0) left = 0;
	features = 'top=' + 100 + ',left=' +left;
	features += ',height=' + h + ',width=' + w + ', scrollbars=no, menubar=no,toolbar=no, location=no,status=no,resizable=no';
	window.open(url,this.target,features);
	return false;
}
</script>
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

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="#">Главная</a></li>
				<li>Корзина</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<span>Личные данные </span><a href="change.php?full_name=<?=$user['full_name']?>&email=<?=$user['email']?>&telephone=<?=$user['telephone']?>&id=<?=$user['id_user']?>" target="_blank" onclick="return openWindow(this.href);">изменить</a>
				<p>
				ФИО: <?=$user['full_name']?><br>
				Email: <?=$user['email']?><br>
				Телефон: <?=$user['telephone']?>
				</p><br>
				<span>Мои заказы</span>
				<div class="cart-table">
					<table>
						<tr>
							<th class="t">№ заказа</th>
							<th class="iitems">Товар</th>
							<th class="t">Дата оформления</th>
							<th class="iitems">Адрес доставки</th>
							<th class="t">Дата доставки</th>
							<th class="t">Способ оплаты</th>
							<th class="t">Статус заказа</th>
							<th class="qnt">Сумма</th>
						</tr>
						<?php 
						 $query = "select * from заказы inner join users
on users.id_user = заказы.Id_покупатель
inner join способы_оплаты on заказы.Id_способ_оплаты = способы_оплаты.Id_способ_оплаты
inner join статусы_заказов on заказы.Id_статус = статусы_заказов.Id_статус where username='".$_SESSION["session_username"]."' order by Id_заказ desc";       
        $rezult = mysqli_query($link, $query);
         if (!$rezult) {
            die(mysqli_error($link));
		}
        while($order = mysqli_fetch_array($rezult)) { ?>
						<tr>
							<td class="t">
								<?=$order['Id_заказ']?>
							</td>
							<td class="iitems">
							<?php 
						 $query2 = "select Id_заказ, заказ_товар.Id_товар as id, Вид, заказ_товар.Количество as Заказанное_количество, Цена from заказ_товар inner join товары
on заказ_товар.Id_товар = товары.Id_товар where Id_заказ='".$order['Id_заказ']."'";       
        $rezult2 = mysqli_query($link, $query2);
         if (!$rezult2) {
            die(mysqli_error($link));
		}
        while($tovar = mysqli_fetch_array($rezult2)) { ?>
		<ul>
								<li><a href="product.php?id=<?=$tovar['id']?>"><?=$tovar['Вид']?></a> - <?=$tovar['Заказанное_количество']?> шт X <?=$tovar['Цена']?> BYN</li>
								
								</ul>
								<?php } ?>
							</td>
							<td class="t">
								<?=$order['Дата_оформления']?>
							</td>
							<td class="iitems">
								<?=$order['Адрес_доставки']?>
							</td>
							<td class="t">
								<?=$order['Дата_доставки']?>
							</td>
							<td class="t">
								<?=$order['Способ_оплаты']?>
							</td>
							<td class="t">
								<?=$order['Статус']?>
							</td>
							<?php 
						 $query3 = "select truncate(SUM(заказ_товар.Количество*Цена),2) as sum from заказ_товар inner join товары
on заказ_товар.Id_товар = товары.Id_товар where Id_заказ='".$order['Id_заказ']."'";       
        $rezult3 = mysqli_query($link, $query3);
         if (!$rezult3) {
            die(mysqli_error($link));
		}
		$sum = mysqli_fetch_assoc($rezult3);
		?>
                            <td class="qnt">
							<?=$sum['sum']?> BYN
							</td>
						</tr>
		<?php } ?>
					</table>
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
