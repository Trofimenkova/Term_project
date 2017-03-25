<?php
    require_once("database.php");
	
    require_once("models/products.php");

    $link = db_connect();
	if(isset($_POST["change"])){
	user_edit($link, $_POST['full_name'], $_POST['email'], $_POST['telephone'], $_POST['id']);
	echo "<script>window.close();</script>";
	}
?>

<!DOCTYPE html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <title>Личные данные</title>
<link rel="shortcut icon" href="images/fish.png" type="image/png">
</head> 
<body>
	
    <div>
    <div>
    <h1>ЛИЧНЫЕ ДАННЫЕ</h1>
	<form name="change"  action="" method="POST">
    <div class="form-group">
					<label>
                        ФИО <br>
                        <input type="text" name="full_name" value="<?=$_GET['full_name']?>" class="form-control" required size="30">
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Email <br>
                        <input type="email" name="email" value="<?=$_GET['email']?>" class="form-control" required size="30">
                    </label>
					</div>
					<div class="form-group">
                    <label>
                        Телефон <br>
                        <input type="telephone" name="telephone" value="<?=$_GET['telephone']?>" class="form-control" required size="30">
                    </label>
					</div>
					<!--<div class="form-group">
					<label>
                        id <br>-->
                        <input type="text" style="visibility: hidden" name="id" value="<?=$_GET['id']?>" class="form-control" required size="30">
                    <!--</label>
					</div>-->
        <p class="submit">
        <input type="submit" name="change" class="button" value="Сохранить изменения" />
    </p>
       
</form>
    </div>

    </div>
	</body>
	</html>
	
	
	