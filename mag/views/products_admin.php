<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Панель администрирования</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script type="text/javascript"> 
	function confirmDelete() {
		if (confirm("Вы уверены, что хотите удалить данную запись?")) return true; else return false;
	}
	</script> 
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
						<li><a href="index.php">Товары</a></li>
                        <li><a href="../views/orders_admin.php">Заказы</a></li>
                    </ul>
					<form method="post" action="index.php?action=search" role="form" class="form-inline text-right"  style="margin-top: 5px;">
					<div class="form-group">
						<input type="text" name="search" size="30" class="form-control" placeholder="Поиск товаров" style="border: 0px;">
                    </div>
					<div class="form-group" style="position: relative; right:50px;">
                    <input type="image" src="../images/search.png" class="form-control" style="border: 0px;">
					</div>
                </form>
                </div>
            </nav> 
			<form method="post" action="index.php?action=add_from_file" role="form" class="form-inline">
					<div class="form-group">
						<input type="file" name="CSV" class="form-control">
                    </div>
					<div class="form-group">
                    <input type="submit" value="Добавить товары из файла" class="btn" class="form-control">
					</div>
                </form>
            <!-- END Header (navbar) -->
            <table id="admin_table" class="table" style="font-size: 12px">
                <tr>
					<th>Id</th>
                    <th>Вид</th>
                    <th>Id_семейство</th>
					<th>Размер, см</th>
                    <th>Размер взрослой особи, см</th>
					<th>Продолжительность жизни, лет</th>
					<th>Место обитания</th>
                    <th>Уход</th>
					<th>Цена</th>
                    <th>Количество</th>
					<th>Изображение</th>
                    <td colspan="2" class="text-right"><a href="index.php?action=add" >Добавить товар</a></td>
                </tr>
                <?php foreach($products as $product): ?>
                    <tr>
						<td><?=$product['Id_товар']?></td>
                        <td><?=$product['Вид']?></td>
						<td><?=$product['Id_семейство']?></td>
						<td><?=$product['Размер']?></td>
						<td><?=$product['Размер_взрослой_особи']?></td>
						<td><?=$product['Продолжительность_жизни']?></td>
						<td><?=$product['Место_обитания']?></td>
						<td><?=products_intro($product['Уход'])?></td>
						<td><?=$product['Цена']?></td>
						<td><?=$product['Количество']?></td>
						<td><img src="../<?=$product['Изображение']?>" width="100%" height="auto" class="img-rounded"></td>
                        <td>
                            <a href="index.php?action=edit&id=<?=$product['Id_товар']?>">Изменить</a>
                        </td>
                        <td>
                            <a onclick="return confirmDelete()" href="index.php?action=delete&id=<?=$product['Id_товар']?>">Удалить</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </body>
</html>

