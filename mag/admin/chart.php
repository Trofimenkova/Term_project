<?php
    require_once("../database.php");
    $link = db_connect();
?>

<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf-8">
	<!--	<script type="text/javascript" src="fusioncharts.js"></script>
		<script type="text/javascript" src="fusioncharts.theme.fint.js"></script>
				<script type="text/javascript" src="fusioncharts.charts.js"></script>
        -->
		<title>Панель администрирования</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
		<style>
			.selected {
				text-transform: uppercase;
			}
			#admin_table {
				font-size: 12px;
			}
					.st { height:1em; display:inline-block; vertical-align:middle;}
		span { display:inline-block; width:350px; line-height:2;}
		</style>
				<script src="https://www.google.com/jsapi"></script>
  <script>
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(drawChart);
   function drawChart() {
	var data = google.visualization.arrayToDataTable(
	[['Пользователи', 'Количество заказов'],
	['Зарегистрированными пользователями', parseInt("<? echo $_GET['reg']?>")], 
	['Незарегистрированными пользователями', parseInt("<? echo $_GET['noreg']?>")]]);
    var options = {
     title: 'Заказы, совершенные пользователями магазина',
     is3D: true,
     pieResidueSliceLabel: 'Остальное'
    };
    var chart = new google.visualization.PieChart(document.getElementById('diagram'));
     chart.draw(data, options);
   }
  </script>
	</head>
    <body>
        <div class="container">
            <!-- Header (navbar) -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a id="blog" class="navbar-brand" href="index.php">Панель администрирования</a>
                    </div>
					<ul class="nav navbar-nav navbar-right">
						<li class="selected"><a href="index.php">Товары</a></li>
                        <li><a href="orders_admin.php">Заказы</a></li>
						<li><a href="../chart.php">Статистика</a></li>
						<li><a href="../index.php">Make-up.buy</a></li>		
                    </ul>
				 </div>
            </nav> 
			            <h1>Топ 10 самых продаваемых товаров:</h1>
			<?php 
						 $query = "select товары.Id_товар, Название_товара, sum(заказ_товар.Количество) as amount from заказ_товар inner join товары
on заказ_товар.Id_товар = товары.Id_товар 
group by товары.Id_товар
order by amount desc
limit 10";       
        $rezult = mysqli_query($link, $query);
         if (!$rezult) {
            die(mysqli_error($link));
		}
        while($cosmetics = mysqli_fetch_array($rezult)) { ?>
		<span><?=$cosmetics['Название_товара']?>: </span><div class="st" style="width: <?=$cosmetics['amount']?>%; background: rgb(<? echo rand(0, 255);?>, <?echo rand(0, 255);?>, <?echo rand(0, 255);?>);"></div> <?=$cosmetics['amount']?> шт<br>
		<?php } ?>
		<h1 style="margin-top: 50px;">Структура заказов:</h1>
<div id="diagram" style="width: 730px; height: 300px;"></div>
    </body>
</html>

