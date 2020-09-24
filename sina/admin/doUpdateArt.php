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
	/*
	echo $_POST['name'];
	
	echo $_POST['radio'];
	
	echo $_POST['hidden'];
	*/
	include "../config/config.php";
	
	$sql="update  art set title='{$_POST['title']}',num={$_POST['radio']},content='{$_POST['content']}',time='".time()."',cid='{$_POST['cid']}' where id={$_POST['hidden']}";
	$result=mysql_query($sql);
	if(mysql_affected_rows() > 0){
		
		
		echo "修改成功";
	}else{
		echo "修改失败";	
	}
	
	
	
	

?>

</body>
</html>