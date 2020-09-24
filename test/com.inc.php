<?php

	$link=mysql_connect("localhost","root","root");
	if(!$link){
		die("connect is error");
	}
	mysql_select_db("test");
	mysql_set_charset("utf8");
	
?>