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
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <title>Личные данные</title>
	   <link rel="stylesheet" href="css/style.css">
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	   <style>
	   html { overflow:  hidden;  }
	   body {
		   background: url("images/04.jpg") 26%;
		   text-align: center;
	   }
	   label {
		   color: white;
		   text-align: left;
	   }
	   input {
		   opacity: 0.7;
	   }
	   .btn-grey {
		   margin-bottom: 15px;
		   margin-top: 10px;
		   right: 15px;
	   }
	   </style>
</head> 
<body>
    <div id="body">
	<form name="change"  action="" method="POST" class="form-horizontal">
    <div class="form-group">
					<label>
                        ФИО: <br>
                        <input type="text" name="full_name" value="<?=$_GET['full_name']?>" class="form-control" required size="29">
                    </label>
					</div>
					<div class="form-group">
					<label>
                        Email: <br>
                        <input type="email" name="email" value="<?=$_GET['email']?>" class="form-control" required size="29">
                    </label>
					</div>
					<div class="form-group">
                    <label>
                        Телефон: <br>
                        <input type="telephone" name="telephone" value="<?=$_GET['telephone']?>" class="form-control" required size="29">
                    </label>
					</div>
					<input type="text" style="visibility: hidden;" name="id" value="<?=$_GET['id']?>" class="form-control" required size="29">
        <p class="submit">
        <input type="submit" name="change" class="btn-grey" value="Сохранить изменения" />
    </p>     
</form>
    </div>
	</body>
	</html>
	
	
	