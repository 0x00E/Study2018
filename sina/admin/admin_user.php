<?php
include "../include/func.php";
is_cookie();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无限分类</title>
</head>

<body>

<a href="addAdmin.php">添加管理员</a>
<hr />

<h1>管理员列表</h1>

<?php

include "../config/config.php";

$sql="select * from admin";

$result=mysql_query($sql);

echo "<table border=1 width=1000>";
print "<tr><td>用户名</td><td>密码</td><td colspan=2>操作</td></tr>";
while($rows=mysql_fetch_assoc($result)){
	
	echo "<tr>";
	echo "<td><a href='updateAdmin.php?id={$rows['id']}'>".$rows['name']."</a>[id:{$rows['id']}] </td>";
echo "<td>".$rows['password']."</td>";
	echo "<td><a href='delAdmin.php?id={$rows['id']}'>删除</a></td>";
	echo "<td><a href='updateAdmin.php?id={$rows['id']}'>更改</a></td>";
	
	
	
	
	echo "</tr>";
	
	
}
echo "</table>";



?>






</body>
</html>