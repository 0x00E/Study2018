<?php
include "../include/func.php";
is_cookie();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>

<?php
	
	//echo $_GET['id']
	include "../config/config.php";
	$sql="delete from  cate where id={$_GET['id']}";
	$result=mysql_query($sql);
	if($result > 0){
		echo "删除成功";
	}else{
		echo "删除失败";	
	}
	
	
?>



</body>
</html>