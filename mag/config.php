<?php

define("HOST","localhost");
define("USER","root");
define("PASSWORD","");
define("DB","shop");



$db = mysql_connect(HOST,USER,PASSWORD);
if (!$db) {
	exit('WRONG CONNECTION');
}
if(!mysql_select_db('shop',$db)) {
	exit(DB);
}
mysql_query('SET NAMES utf8');


?>