<?php

	$connect = mysql_connect('localhost','root','87654321') or die (mysql_error());
	$selectdb = mysql_select_db('cus_db',$connect) or die (mysql_error()); 
	
	//if (!$connect) {
	//	die('Could not connect to MySQL: ' . mysql_error());
	//}
	//else{
	//	$selectdb = mysql_select_db('fttx_db',$connect);
	//}
	
	//mysql_select_db('fttx_db',$connect);
	//mysql_query("UPDATE fttx_import SET date = DATE_FORMAT('date', %d-%m-%Y)");
    mysql_query("SET NAMES UTF8");

?>