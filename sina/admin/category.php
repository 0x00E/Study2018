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

<a href="addCategory.php">添加顶级栏目</a>
<hr />

<h1>栏目列表</h1>

<?php

include "../config/config.php";

$sql="select * from cate";

$result=mysql_query($sql);

echo "<table border=1 width=1000>";
print "<tr><td>栏目名称</td><td>父类</td><td>是否显示</td><td colspan='3'>操作</td></tr>";
while($rows=mysql_fetch_assoc($result)){
	
	echo "<tr>";
	echo "<td><a href='update.php?id={$rows['id']}'>".$rows['name']."</a>[id:{$rows['id']}] </td>";
	if($rows['pid']==0){
	echo "<td>无</td>";
	}else{
	$catesql="select name from cate where id={$rows['pid']}";
	$cateresult=mysql_query($catesql);
	$cateName=mysql_fetch_assoc($cateresult);
	echo "<td>{$cateName['name']}</td>";
	}
	if($rows['status']==1){
	echo "<td>是</td>";
	}else{
	echo "<td>否</td>";
	}
	echo "<td><a href='addSon.php?pid={$rows['id']}'>添加子类</a></td>";
	echo "<td><a href='delCat.php?id={$rows['id']}'>删除</a></td>";
	echo "<td><a href='update.php?id={$rows['id']}'>更改</a></td>";
	
	
	
	
	echo "</tr>";
	
	
}
echo "</table>";



?>






</body>
</html>