<?php
	function products_all($link) {
        $query = "SELECT * FROM товары";
        $rezult = mysqli_query($link, $query);
        
        if (!$rezult) {
            die(mysqli_error($link));
		}
        
        $n = mysqli_num_rows($rezult);
        $products = array();
        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($rezult);
            $products[] = $row;
        }
               
        return $products;
    }
	
	function products_last($link) {
        $query = "SELECT * FROM товары ORDER BY Id_товар Desc limit 0,10";
        $rezult = mysqli_query($link, $query);
        
        if (!$rezult) {
            die(mysqli_error($link));
		}
        
        $n = mysqli_num_rows($rezult);
        $products = array();
        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($rezult);
            $products[] = $row;
        }
               
        return $products;
    }
	
    function products_view($link, $position, $sort, $min, $max) {
		$sort = trim($sort);
		if ($sort == '') $sort = 'Название_товара';
        $query = sprintf("SELECT * FROM товары inner join категории on товары.Id_категория=категории.Id_категория inner join производители on товары.Id_производителя=производители.Id_производителя where Цена between %f and %f order by $sort asc limit 12 offset %d", (float)$min, (float)$max + 0.01, (int)$position);
        
		$rezult = mysqli_query($link, $query);
        
        if (!$rezult) {
            die(mysqli_error($link));
		}
        
        $n = mysqli_num_rows($rezult);
        $products1 = array();
        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($rezult);
            $products1[] = $row;
        }
               
        return $products1;
    }
	
	function products_count($link, $min, $max) {
        $query = sprintf("SELECT * FROM товары where Цена between %f and %f", (float)$min, (float)$max + 0.01);
        $rezult = mysqli_query($link, $query);
        
        if (!$rezult) {
            die(mysqli_error($link));
		}
        
        return mysqli_num_rows($rezult);
    }
	
	function max_price($link) {
        $query = "SELECT Max(truncate(Цена,2)) FROM товары";
        $rezult = mysqli_query($link, $query);
        
        if (!$rezult) {
            die(mysqli_error($link));
		}
        
        $row = mysqli_fetch_array($rezult);
		return $row[0];
    }
	
	function products_search($link, $stroka) {
        $query = "SELECT * FROM товары where Id_товар='$stroka' or Название_товара like '%$stroka%'";
        $rezult = mysqli_query($link, $query);
        
        if (!$rezult) {
            die(mysqli_error($link));
		}
        
        $n = mysqli_num_rows($rezult);
        $products = array();
        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($rezult);
            $products[] = $row;
        }
               
        return $products;
    }
	  

	
	function product_get($link, $id_product){
        $query = sprintf("SELECT * FROM товары inner join категории on категории.Id_категория=категории.Id_категория inner join производители on товары.Id_производителя=производители.Id_производителя WHERE Id_товар=%d", (int)$id_product);
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
        
        $product = mysqli_fetch_assoc($result);
        
        return $product;
    }
	
    function products_new($link, $nazvanie, $id_categoria, $color, $size, $usage, $description, $id_producer, $price, $amount, $image){
        $nazvanie = trim($nazvanie);
        $id_categoria = (int)($id_categoria);
		$color= trim($color);
		$size = trim($size);
		$description= trim($description);
		$id_producer = (int)$id_producer;
		$usage = trim($usage);
		$price= (float)($price);
		$amount = (int)($amount);
		$image = trim($image);

        if ($nazvanie == '') return false;
        
        $template_add = "INSERT INTO товары (Название_товара, Id_категория, Цвет, Объем_товара, 
		Применение, Описание, Id_производителя, Цена, Количество, Изображение) 
		VALUES ('%s', '%d', '%s', '%s', '%s', '%s', '%d', '%f', '%d', '%s')";
        
        $query = sprintf($template_add,
                         mysqli_real_escape_string($link, $nazvanie), $id_categoria,
                         mysqli_real_escape_string($link, $color),
                         mysqli_real_escape_string($link, $size),  
						  mysqli_real_escape_string($link, $usage),
						 mysqli_real_escape_string($link, $description), $id_producer, $price, $amount, 
						 mysqli_real_escape_string($link, $image));

        $result = mysqli_query($link, $query);
        
        if (!$result) die(mysqli_error($link));
        return true;
    }

    function products_edit($link, $id, $nazvanie, $id_categoria, $color, $size, $usage, $description, $id_producer, $price, $amount, $image){
		$id = (int)$id;
        $nazvanie = trim($nazvanie);
        $id_categoria = (int)($id_categoria);
		$color= trim($color);
		$size = trim(size);
		$description = trim($description);
		$id_producer= (int)$id_producer;
		$usage= trim($usage);
		$price= (float)($price);
		$amount = (int)($amount);
		$image = trim($image);
            
		$query = "UPDATE товары SET Название_товара='$nazvanie', Id_категория=$id_categoria, Цвет='$color', Объем_товара='$size', Применение='$usage', Описание='$description', Id_производителя=$id_producer, Цена=$price, Количество=$amount WHERE id_товар=".$id;
        
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
		if (!empty($image)) {
		$query2 = "UPDATE товары SET Изображение='images/$image' WHERE id_товар=".$id;
		$result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link));
		}
        
		return mysqli_affected_rows($link);
    }
	
    function products_delete($link, $id){
        $id = (int)$id;
        if ($id == 0) return false;
        
        $query = sprintf("DELETE FROM товары WHERE Id_товар='%d'", $id);
        $result = mysqli_query($link, $query);
        
        if (!result) die(mysqli_error($link));
        
        return mysqli_affected_rows($link);
    }
    
	function import_csv($link, $file){
		$file = 'c:\\\\users\\\\user\\\\documents\\\\'.$file;
        $sql = "LOAD DATA INFILE '$file' INTO TABLE товары CHARACTER SET 'cp1251'
FIELDS TERMINATED BY ';' OPTIONALLY ENCLOSED BY '' LINES TERMINATED BY '\\r\\n' IGNORE 1 LINES (Название_товара, Id_категория, Цвет, Объем_товара, Применение, Описание, Id_производителя, Цена, Количество, Изображение)";
        $result = mysqli_query($link, $sql);
		
		if (!result) die(mysqli_error($link));
        
        return mysqli_affected_rows($link);
    }
	
	function products_intro($text, $len = 150)
    {
        return mb_substr($text, 0, strripos(mb_substr($text, 0,$len), " "));
    }
	
	function methods_payment($link) {
		$query = "SELECT * FROM способы_оплаты";
        $rezult = mysqli_query($link, $query);
        
        if (!$rezult) {
            die(mysqli_error($link));
		}
        
        $n = mysqli_num_rows($rezult);
        $methods = array();
        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($rezult);
            $methods[] = $row;
        }
               
        return $methods;
	}
	
	function user_edit($link, $full_name,$email, $telephone, $id) {
		$id = (int) $id;
		$full_name=trim($full_name);
		$email = trim($email);
		$telephone = trim($telephone);
		
		
		$query ="UPDATE users SET full_name='$full_name', email='$email', telephone='$telephone' WHERE Id_user=".$id;
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		return mysqli_affected_rows($link);	
	}
	
	function user_get($link, $login){
        $query = "SELECT * FROM users WHERE username='".$login."'";
        $result = mysqli_query($link, $query);
        
        if (!$result) die(mysqli_error($link));
        
        $user = mysqli_fetch_assoc($result);
        
        return $user;
    }	

function user_reg($link) {
        $query = "select count(*) from заказы
inner join users on
заказы.Id_покупатель = users.Id_user
where username is not null";
        $rezult = mysqli_query($link, $query);
        
        if (!$rezult) {
            die(mysqli_error($link));
		}
        
        $row = mysqli_fetch_array($rezult);
		return $row[0];
    }
	
	function user_noreg($link) {
        $query = "select count(*) from заказы
inner join users on
заказы.Id_покупатель = users.Id_user
where username is null";
        $rezult = mysqli_query($link, $query);
        
        if (!$rezult) {
            die(mysqli_error($link));
		}
        
        $row = mysqli_fetch_array($rezult);
		return $row[0];
    }
	
	function get_price() {
	$sql = "SELECT Id_товар, Название_товара, Цена, Количество FROM товары";
	$result = mysql_query($sql);
	
	if(!$result) {
		exit(mysql_error());
	}
	
	$row = array();
	
	for($i = 0;$i < mysql_num_rows($result);$i++) {
		$row[] = mysql_fetch_assoc($result);
	}
	
	return $row;		
}

?>