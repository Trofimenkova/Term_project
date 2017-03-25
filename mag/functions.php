<?php

function get_price() {
	$sql = "SELECT Id_товар, Вид, Цена, Количество FROM товары";
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





