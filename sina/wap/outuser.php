<?
		
	//2016年12月15日13:29:57
	$cookie_time=time()-3600;
	setcookie("qianniancc_login","",$cookie_time);
	print "<script>alert('注销成功')</script>";
	print "<script>location = 'index.php';</script>";
	