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
<h2>添加管理员</h2>
<form action="doAdmin.php" method="post">

	管理员账号： <input type="text" name="name" /><br /><br />
    管理员密码： <input type="password" name="password" /><br /><br />
    <input type="submit" name="sub" value="确定" />
    

</form>


</body>
</html>