<?php
function is_cookie(){
	
	if(!isset($_COOKIE["qianniancc_admin"])){
	
	die("<script>alert('清先登录后台');location='admin_login.php'</script>");
	
	}
	include "../config/config.php";
	$sql="select * from admin where name='{$_COOKIE['qianniancc_admin']}'";
	$result=mysql_query($sql);
	if($result==false){
		
		die("<script>alert('清先登录后台');location='admin_login.php'</script>");
	}
	
	
}