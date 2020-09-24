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
	
	include "../config/config.php";
	
	$sql="insert into admin(name,password) values('{$_POST['name']}','{$_POST['password']}')";
	$result=mysql_query($sql);
	if(mysql_affected_rows() > 0){
		echo "添加成功";
	}else{
		echo "添加失败";	
	}
	
	
	
	

?>

</body>
</html>