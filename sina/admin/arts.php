<?
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

<a href="addArt.php">添加文章</a>
<hr />

<h1>文章列表</h1>

<?php

include "../config/config.php";

$sql="select * from art";

$result=mysql_query($sql);

echo "<table border=1 width=1000>";
print "<tr><td>选择</td><td>文章ID</td><td>标题</td><td>分类</td><td>添加时间</td><td colspan='2'>操作</td></tr>";
while($rows=mysql_fetch_assoc($result)){
	
	echo "<tr>";
	echo "<td><input type='checkbox' value='{$rows['id']}' name='arts'/></td>";
	echo "<td>".$rows['id']."</td>";
	echo "<td><a href='updateArt.php?id={$rows['id']}'>".$rows['title']."</a></td>";
	
	if($rows['cid']!=0){
	$selectName="select name from cate where id={$rows['cid']}";
	$resultName=mysql_query($selectName);
	$rowsName=mysql_fetch_assoc($resultName);
	echo "<td>".$rowsName['name']."</td>";
	}else{
		
	echo "<td>无</td>";
		
	}
	
	echo "<td>".date("Y-m-d/H:i:s",$rows['time'])."</td>";
	echo "<td><a href='delArt.php?id={$rows['id']}'>删除</a></td>";
	echo "<td><a href='updateArt.php?id={$rows['id']}'>更改</a></td>";
	
	
	
	
	echo "</tr>";
	
	
}
echo "</table>";



?>
<p>
<h3>选择</h3>
<a href="javascript:void(0)" onclick="allSelect()">全选</a>
<a href="javascript:void(0)" onclick="notSelect()">全不选</a>
<a href="javascript:void(0)" onclick="checkSelect()">反选</a>
</p>
<p>
<h3>操作</h3>
<a href="javascript:void(0)" onclick="delArt()">删除</a>

</p>





</body>
</html>
<script>

var arts=document.getElementsByName("arts");
function allSelect(){
	for(var i=0;i<arts.length;i++){
	arts[i].checked=true;
	}
	
	
}
function notSelect(){
	for(var i=0;i<arts.length;i++){
	arts[i].checked=false;
	}
	
	
}
function checkSelect(){
	for(var i=0;i<arts.length;i++){
	if(arts[i].checked==false){
	arts[i].checked=true;
	}else if(arts[i].checked==true){
		arts[i].checked=false;
		
	}
	}
	
	
}

function delArt(){
	var delArts="";
	var artsTrue=0;
	for(var i=0;i<arts.length;i++){
		if(arts[i].checked==true){
			
			artsTrue++;
		}
		
		
	}
	for(var i=0;i<arts.length;i++){
	if(arts[i].checked==true){
		
		if(i+1!=artsTrue){
			alert(atsTrue);
		delArts+=arts[i].value+",";
		}else{
		delArts+=arts[i].value;
		}
	}
	}
	location="delArt.php?ids="+delArts;
}




</script>