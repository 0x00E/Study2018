<?php


	$link=mysql_connect("localhost","root","root");
	if(!$link){
		die("Connect is error !!!!".mysql_error);
	}
	mysql_select_db("sina");
	mysql_set_charset("utf8");
	
	$down="©CopyRight 2014-2017 TBALL.ORG.CN Inc All Rights Reserved. 浅念 版权所有";
	$blogroll=array("百度"=>"http://www.baidu.com/","搜狐"=>"http://www.sohu.com/","淘宝"=>"http://www.taobao.com/","腾讯网"=>"http://www.qq.com","360官网"=>"http://www.360.cn","京东"=>"http://www.jd.com/");