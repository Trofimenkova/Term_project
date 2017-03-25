<?php
    function products_view($link, $position, $sort, $min, $max) {
		$sort = trim($sort);
        if ($sort == 'Вид' or $sort =='') $query = sprintf("SELECT * FROM товары inner join семейства on товары.Id_семейство=семейства.Id_семейство where Цена between %d and %d order by Вид asc limit 12 offset %d", (float)$min, (float)$max, (int)$position);
        else if ($sort == 'Семейство') $query = sprintf("SELECT * FROM товары inner join семейства on товары.Id_семейство=семейства.Id_семейство where Цена between %d and %d order by Семейство asc limit 12 offset %d", (float)$min, (float)$max, (int)$position);
		else if ($sort =='Цена') $query = sprintf("SELECT * FROM товары inner join семейства on товары.Id_семейство=семейства.Id_семейство where Цена between %d and %d order by Цена asc limit 12 offset %d", (float)$min, (float)$max, (int)$position);
		else $query = sprintf("SELECT * FROM товары inner join семейства on товары.Id_семейство=семейства.Id_семейство where Цена between %d and %d order by Размер asc limit 12 offset %d", (float)$min, (float)$max, (int)$position);
        
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
        $query = sprintf("SELECT * FROM товары where Цена between %d and %d", (float)$min, (float)$max);
        $rezult = mysqli_query($link, $query);
        
        if (!$rezult) {
            die(mysqli_error($link));
		}
        
        return mysqli_num_rows($rezult);

    }
	
	  function max_price($link) {
        $query = "SELECT Max(Цена) FROM товары";
        $rezult = mysqli_query($link, $query);
        
        if (!$rezult) {
            die(mysqli_error($link));
		}
        
        $row = mysqli_fetch_array($rezult);
		return $row[0];

    }
	
	

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
	
	function product_get($link, $id_product){
        $query = sprintf("SELECT * FROM товары inner join семейства on товары.Id_семейство=семейства.Id_семейство WHERE Id_товар=%d", (int)$id_product);
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
        
        $product = mysqli_fetch_assoc($result);
        
        return $product;
    }

    function products_new($link, $vid, $id_semeistvo, $size, $full_size, $years, $place, $description, $price, $amount, $image){
        // Подготовка
        $vid = trim($vid);
        $id_semeistvo = (int)($id_semeistvo);
		$size= trim($size);
		$full_size = trim($full_size);
		$years= trim($years);
		$place = trim($place);
		$description = trim($description);
		$price= (float)($price);
		$amount = (int)($amount);
		$image = trim($image);

            
        // Проверка
        if ($vid == '')
            return false;
        
        // Запрос
        $template_add = "INSERT INTO товары (Вид, Id_семейство, Размер, Размер_взрослой_особи, Продолжительность_жизни, Место_обитания, Уход, Цена, Количество, Изображение) VALUES ('%s', '%d', '%s', '%s', '%s', '%s', '%s', '%f', '%d', '%s')";
        
        $query = sprintf($template_add,
                         mysqli_real_escape_string($link, $vid), $id_semeistvo,
                         mysqli_real_escape_string($link, $size),
                         mysqli_real_escape_string($link, $full_size),
						 mysqli_real_escape_string($link, $years), 
						 mysqli_real_escape_string($link, $place),
						 mysqli_real_escape_string($link, $description), $price, $amount, 
						 mysqli_real_escape_string($link, $image));
        
        echo $query;
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
        return true;
    }

    function products_edit($link, $id, $vid, $id_semeistvo, $size, $full_size, $years, $place, $description, $price, $amount, $image){
        // Подготовка
		$id = (int)$id;
        $vid = trim($vid);
        $id_semeistvo = (int)($id_semeistvo);
		$size= trim($size);
		$full_size = trim($full_size);
		$years= trim($years);
		$place = trim($place);
		$description = trim($description);
		$price= (float)($price);
		$amount = (int)($amount);
		$image = trim($image);
            
        // Проверка
        if ($vid == '')
            return false;
        
        // Запрос
        $template_update = "UPDATE товары SET Вид='%s', Id_семейство='%d', Размер='%s', Размер_взрослой_особи='%s', Продолжительность_жизни='%s', Уход='%s', Цена='%f', Количество='%d', Изображение='%s' WHERE id='%d'"; 

		$query = sprintf($template_update, 
		mysqli_real_escape_string($link, $vid), $id_semeistvo, 
		mysqli_real_escape_string($link, $size), 
		mysqli_real_escape_string($link, $full_size), 
		mysqli_real_escape_string($link, $years), 
		mysqli_real_escape_string($link, $description), $price, $amount, 
		mysqli_real_escape_string($link, $image), $id);
		
        $result = mysqli_query($link, $query);
        
        if (!result)
            die(mysqli_error($link));
        
        return mysqli_affected_rows($link);
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


    function products_delete($link, $id){
        $id = (int)$id;
        // Проверка
        if ($id == 0)
            return false;
        
        // Запрос
        $query = sprintf("DELETE FROM товары WHERE Id_товар='%d'", $id);
        $result = mysqli_query($link, $query);
        
        if (!result)
            die(mysqli_error($link));
        
        return mysqli_affected_rows($link);
    }
    
	function products_intro($text, $len = 100)
    {
        return mb_substr($text, 0, $len);        
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
	
	function user_get($link, $login){
        $query = "SELECT * FROM users WHERE username='".$login."'";
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
        
        $user = mysqli_fetch_assoc($result);
        
        return $user;
    }
	
	
?>