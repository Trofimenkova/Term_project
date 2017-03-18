<!DOCTYPE html>
<hmtl>
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
                </div>
            </nav> 
            <!-- END Header (navbar) -->
            <div id="addart">
                <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" role="form" class="form-horizontal">
                    <div class="form-group">
					<label>
                        Вид
                        <input type="text" name="Вид" value="<?=$product['Вид']?>" class="form-control" autofocus required>
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Id_семейство
                        <input type="text" name="Id_семейство" value="<?=$product['Id_семейство']?>" class="form-control" required>
                    </label>
					</div>
					<div class="form-group">
                    <label>
                        Размер
                        <input type="text" name="Размер" value="<?=$product['Размер']?>" class="form-control">
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Размер взрослой особи
                        <input type="text" name="Размер_взрослой_особи" value="<?=$product['Размер_взрослой_особи']?>" class="form-control">
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Продолжительность жизни
                        <input type="text" name="Продолжительность_жизни" value="<?=$product['Продолжительность_жизни']?>" class="form-control">
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Место обитания
                        <textarea class="form-control" name="Место_обитания"><?=$product['Место_обитания']?></textarea>
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Описание
                        <textarea class="form-control" name="Описание"><?=$product['Уход']?></textarea>
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
                    <input type="file" name="Изображение" value="<?=$product['Изображение']?>" class="form-control">
                    </label></div>
					<div class="form-group">
                    <input type="submit" value="Сохранить" class="btn" class="form-control">
					</div>
                </form>
            </div>
        </div>
    </body>
</hmtl>