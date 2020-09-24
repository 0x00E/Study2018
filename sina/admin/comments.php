<?
include "../include/func.php";
is_cookie();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>评论</title>
</head>

<body>

<hr />

<h1>评论列表</h1>

<?php

include "../config/config.php";

$sql="select * from comment";

$result=mysql_query($sql);

echo "<table border=1 width=750>";
print "<tr><td>选择</td><td>评论ID</td><td>评论内容</td><td>评论用户</td><td>评论时间</td><td colspan='2'>操作</td></tr>";
while($rows=mysql_fetch_assoc($result)){
	
	echo "<tr>";
	echo "<td><input type='checkbox' value='{$rows['id']}' name='arts'/></td>";
	echo "<td>".$rows['id']."</td>";
	if(strlen($rows['content'])>20){
		
		$rows['content']=substr($rows['content'],0,20)."<br>......";
		
	}
	echo "<td>".$rows['content']."</td>";
	
	if($rows['uid']!=0){
	$selectName="select name from user where id={$rows['uid']}";
	$resultName=mysql_query($selectName);
	$rowsName=mysql_fetch_assoc($resultName);
	echo "<td>".$rowsName['name']."</td>";
	}else{
		
	echo "<td>无</td>";
		
	}
	
	echo "<td width=200>".date("Y-m-d/H:i:s",$rows['time'])."</td>";
	echo "<td width='50px'><a href='delComment.php?id={$rows['id']}'>删除</a></td>";
	//echo "<td width='50px'><a href='updateArt.php?id={$rows['id']}'>更改</a></td>";
	
	
	
	
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
<a href="javascript:void(0)" onclick="delComment()">删除</a>

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

function delComment(){
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
		delArts+=arts[i].value+",";
		}else{
		delArts+=arts[i].value;
		}
	}
	}
	location="delComment.php?ids="+delArts;
}




</script>