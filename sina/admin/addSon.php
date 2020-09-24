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
<h2>添加子级栏目</h2>
<form action="doSon.php" method="post">

	栏目名称： <input type="text" name="name" /><br /><br />
    
    是否显示:
    <input type="radio" name="radio" value="1" checked="checked"/>是
    <input type="radio" name="radio" value="0"/>否<br /><br />
    <input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>"/>
    <input type="submit" name="sub" value="确定" />
    

</form>


</body>
</html>