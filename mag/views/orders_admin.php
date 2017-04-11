<?php
    require_once("../database.php");
    $link = db_connect();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Панель администрирования</title>
        <link rel="stylesheet" href="../style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
    <body>
        <div class="container">
            <!-- Header (navbar) -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a id="blog" class="navbar-brand" href="../index.php">Панель администрирования</a>
                    </div>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="../admin/index.php">Товары</a></li>
                        <li><a href="orders_admin.php">Заказы</a></li>
                    </ul>
                </div>
            </nav>
            <!-- END Header (navbar) -->
            <table id="admin_table" class="table" style="font-size: 12px">
                <tr>
					<th>Id_заказ</th>
                    <th>Товары</th>
                    <th>Дата_оформления</th>
					<th>Адрес_доставки</th>
                    <th>Дата_доставки</th>
					<th>Способ_оплаты</th>
					<th>Статус_заказа</th>
					<th>Кем оформлен</th>
                    <th>Контактные данные</th>
					<th>Сумма</th>
                </tr>
				<?php 
						 $query = "select *, truncate(заказ_товар.Количество*товары.Цена, 2) as Сумма from заказ_товар inner join заказы
on заказ_товар.Id_заказ = заказы.Id_заказ
inner join товары on
заказ_товар.Id_товар = товары.Id_товар
inner join статусы_заказов
on заказы.Id_статус = статусы_заказов.Id_статус
inner join способы_оплаты
on заказы.Id_статус = способы_оплаты.Id_способ_оплаты
inner join users on
заказы.Id_покупатель = users.Id_user
group by заказы.Id_заказ";       
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
						<td style="width: 300px;">
						<?php 
						 $query2 = "select Id_заказ, заказ_товар.Id_товар as id, Вид, заказ_товар.Количество as Заказанное_количество, Цена from заказ_товар inner join товары
on заказ_товар.Id_товар = товары.Id_товар where Id_заказ='".$order['Id_заказ']."'";       
        $rezult2 = mysqli_query($link, $query2);
         if (!$rezult2) {
            die(mysqli_error($link));
		}
        while($tovar = mysqli_fetch_array($rezult2)) { ?>
		<ul style="list-style-type: none;">
								<li><?=$tovar['Вид']?> - <?=$tovar['Заказанное_количество']?> шт X <?=$tovar['Цена']?> BYN</li>
								
								</ul>
								<?php } ?>
								</td>
						<td><?=$order['Дата_оформления']?></td>
						<td><?=$order['Адрес_доставки']?></td>
						<td><?=$order['Дата_доставки']?></td>
						<td><?=$order['Способ_оплаты']?></td>
						<td><?=$order['Статус']?></td>
						<td><?=$order['full_name']?></td>
						<td style="width: 280px;">Email: <?=$order['email']?><br>
						Телефон: <?=$order['telephone']?></td>
						<td style="width: 80px;"><?=$order['Сумма']?>, BYN</td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </body>
</html>

