<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Панель администрирования</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<style>
		#addart {
			margin-left: 15px;
		}
		input[type="text"] {
			width: 300px;
		}
		.tarea {
			width: 300px;
			min-height: 150px;
		}
		</style>
   </head>
    <body>
        <div class="container">
            <!-- Header (navbar) -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a id="blog" class="navbar-brand" href="index.php">Панель администрирования</a>
                    </div>
                </div>
            </nav> 
            <!-- END Header (navbar) -->
            <div id="addart">
                <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" role="form" class="form-horizontal">
					<div class="form-group">
					<label>
                        Название товара
                        <input type="text" name="Название_товара" value="<?=$product['Название_товара']?>" class="form-control">
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Id_категория
                        <input type="text" name="Id_категория" value="<?=$product['Id_категория']?>" class="form-control" required>
                    </label>
					</div>
					<div class="form-group">
                    <label>
                        Цвет
                        <input type="text" name="Цвет" value="<?=$product['Цвет']?>" class="form-control">
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Объем товара
                        <input type="text" name="Объем_товара" value="<?=$product['Объем_товара']?>" class="form-control">
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Описание
                        <input type="text" name="Описание" value="<?=$product['Описание']?>" class="form-control">
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Id производителя
                        <textarea class="form-control tarea" name="Id_производителя"><?=$product['Id_производителя']?></textarea>
                    </label>
					</div>
					<div class="form-group">
					<label>
					 Применение
                        <textarea class="form-control tarea" name="Применение"><?=$product['Применение']?></textarea>
                    </label>
					</div>
					<div class="form-group">
					<label>Цена <input type="text" name="Цена" value="<?=$product['Цена']?>" class="form-control" required>
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Количество 
                        <input type="text" name="Количество" value="<?=$product['Количество']?>" class="form-control" required>
                    </label>
					</div>
					<div class="form-group">
					<label>
						Изображение
						<input type="file" name="Изображение" value="<?=$product['Изображение']?>" class="form-control">
                    </label></div>
					<div class="form-group">
                    <input type="submit" value="Сохранить" class="btn" class="form-control">
					</div>
                </form>
            </div>
        </div>
    </body>
</html>