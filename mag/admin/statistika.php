<?php 
    require_once("../database.php");
    $link = db_connect();
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
		.st { height:1em; display:inline-block; vertical-align:middle;}
		span { display:inline-block; width:250px; }
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
                        <a id="blog" class="navbar-brand" href="../admin/index.php">Панель администрирования</a>
                    </div>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Товары</a></li>
                        <li><a href="orders_admin.php">Заказы</a></li>
						<li class="selected"><a href="statistika.php?reg=<?=$reg?>&noreg=<?=$noreg?>">Статистика</a></li>
						<li><a href="../index.php">РыбинГуд</a></li>
                    </ul>
                </div>
            </nav>
            <!-- END Header (navbar) -->
            <h3>Топ-10 самых продаваемых товаров:</h3>
			<?php 
						 $query = "select товары.Id_товар, Вид, sum(заказ_товар.Количество) as amount from заказ_товар inner join товары
on заказ_товар.Id_товар = товары.Id_товар 
group by товары.Id_товар
order by amount desc
limit 10";       
        $rezult = mysqli_query($link, $query);
         if (!$rezult) {
            die(mysqli_error($link));
		}
        while($fish = mysqli_fetch_array($rezult)) { ?>
		<span><?=$fish['Вид']?>: </span><div class="st" style="width: <?=$fish['amount']?>%; background: rgb(<? echo rand(0, 255);?>, <?echo rand(0, 255);?>, <?echo rand(0, 255);?>);"></div> <?=$fish['amount']?> шт<br>
		<?php } ?>	
<h3 style="margin-top: 50px;">Структура заказов:</h3>
<div id="diagram" style="width: 730px; height: 300px;"></div>
        </div>
    </body>
</html>

