<?php
    require_once("../database.php");
    $link = db_connect();
	require_once("../models/products.php");
	$reg = user_reg($link);
	$noreg = user_noreg($link);

	if(!empty($_GET['id']) && !empty($_GET['id_status'])) {
		$sql = "UPDATE заказы SET Id_статус='".$_GET['id_status']."' where Id_заказ='".$_GET['id']."'";
		$rez = mysqli_query($link, $sql);
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Панель администрирования</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<style>
		.selected {
			text-transform: uppercase;
		}
		</style>
		<script type="text/javascript">
		function changeStatus(e, id) {
		var sel = document.getElementById(id).selectedIndex;
		var hr = "orders_admin.php?id="+id+"&id_status="+(sel+1);
		e.href = hr;
		return true;
		}
		</script>
	</head>
    <body>
        <div class="container">
            <!-- Header (navbar) -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a id="blog" class="navbar-brand" href="../admin/index.php">Панель администрирования</a>
                    </div>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Товары</a></li>
                        <li class="selected"><a href="orders_admin.php">Заказы</a></li>
						<li><a href="statistika.php?reg=<?=$reg?>&noreg=<?=$noreg?>">Статистика</a></li>
						<li><a href="../index.php">РыбинГуд</a></li>
                    </ul>
					<form method="get" action="orders_admin.php" role="form" class="form-inline text-right"  style="margin-top: 5px;">
					<div class="form-group">
						<input type="text" name="search" size="35" class="form-control" placeholder="Поиск заказов" style="border: 0px;">
                    </div>
					<div class="form-group" style="position: relative; right:50px;">
                    <input type="image" src="../images/search.png" class="form-control" style="border: 0px;">
					</div>
                </form>
                </div>
            </nav>
            <!-- END Header (navbar) -->
            <table id="admin_table" class="table" style="font-size: 12px">
                <tr>
					<th>Id</th>
                    <th>Товары</th>
                    <th>Дата оформления</th>
					<th>Адрес доставки</th>
                    <th>Дата доставки</th>
					<th>Способ оплаты</th>
					<th>Статус</th>
					<th>Кем оформлен</th>
                    <th>Контактные данные</th>
					<th>Сумма</th>
					<th>Комментарий</th>
					<th></th>
                </tr>
				<?php 
				if (empty($_GET['search'])) 
$query = "select * from заказ_товар inner join заказы
on заказ_товар.Id_заказ = заказы.Id_заказ
inner join товары on
заказ_товар.Id_товар = товары.Id_товар
inner join статусы_заказов
on заказы.Id_статус = статусы_заказов.Id_статус
inner join способы_оплаты
on заказы.Id_способ_оплаты = способы_оплаты.Id_способ_оплаты
inner join users on
заказы.Id_покупатель = users.Id_user
group by заказы.Id_заказ";       
				else 
					$query = "select * from заказ_товар inner join заказы
on заказ_товар.Id_заказ = заказы.Id_заказ
inner join товары on
заказ_товар.Id_товар = товары.Id_товар
inner join статусы_заказов
on заказы.Id_статус = статусы_заказов.Id_статус
inner join способы_оплаты
on заказы.Id_способ_оплаты = способы_оплаты.Id_способ_оплаты
inner join users on
заказы.Id_покупатель = users.Id_user
group by заказы.Id_заказ having заказы.Id_заказ='".$_GET['search']."' or full_name like '%".$_GET['search']."%' or статус='".$_GET['search']."'";   
$rezult = mysqli_query($link, $query);
					
					$n = mysqli_num_rows($rezult);
        $orders = array();
        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($rezult);
            $orders[] = $row;
		}			
					foreach($orders as $order): ?>
                    <tr>
						<td><?=$order['Id_заказ']?></td>
						<td style="width: 270px;">
						<?php 
						 $query2 = "select Id_заказ, заказ_товар.Id_товар as id, Вид, заказ_товар.Количество as Заказанное_количество, Цена from заказ_товар inner join товары
on заказ_товар.Id_товар = товары.Id_товар where Id_заказ='".$order['Id_заказ']."'";       
        $rezult2 = mysqli_query($link, $query2);
         if (!$rezult2) {
            die(mysqli_error($link));
		}
		$sum = 0;
        while($tovar = mysqli_fetch_array($rezult2)) {  $sum+=$tovar['Заказанное_количество']*$tovar['Цена']; ?>
		<ul style="list-style: none; padding: 0; margin: 0;">
								<li><?=$tovar['Вид']?> - <?=$tovar['Заказанное_количество']?> шт X <?=$tovar['Цена']?> BYN</li>
								
								</ul>
								<?php } ?>
								</td>
						<td><?=$order['Дата_оформления']?></td>
						<td style="width: 120px;"><?=$order['Адрес_доставки']?></td>
						<td style="width: 120px;"><?=$order['Дата_доставки']?></td>
						<td><?=$order['Способ_оплаты']?></td>
						<td>
						<select id="<?=$order['Id_заказ']?>">
						<?php
						$query3 = "SELECT * FROM статусы_заказов";
        $rezult3 = mysqli_query($link, $query3);
		while($st = mysqli_fetch_array($rezult3)) { if (strcmp($st['Статус'],$order['Статус'])!= 0) { ?>
						<option value="<?=$st['Статус']?>"><?=$st['Статус']?></option>
		<?php } else { ?>
		<option value="<?=$st['Статус']?>" selected="selected"><?=$st['Статус']?></option>
		
		<?php }} ?>
						</select>
						</td>
						<td><?=$order['full_name']?></td>
						<td style="width: 180px;">Email: <?=$order['email']?><br>
						Телефон: <?=$order['telephone']?></td>
						<td style="width: 80px;"><?=$sum?> BYN</td>
						<td><?=$order['Комментарий']?></td>
						<td>
                            <a href="#" onclick="return changeStatus(this, <?=$order['Id_заказ']?>);">Изменить</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </body>
</html>

