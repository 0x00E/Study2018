<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<style>
form{ display:inline;}
</style>
<?php

/*$one=false;
$two=$one?1:3;
echo $two;
*/

	include "com.inc.php";
	
	
function show($stu_name){

	$nowpage=isset($_GET["page"])?$_GET["page"]:1;
	$nowpage=$nowpage>0?$nowpage:1;
	$num=3;
	
	$rowsNum="select * from {$stu_name}";
	
	$rowsNumResult=mysql_query($rowsNum);
	if(is_bool($rowsNumResult)){
		die($stu_name."找不到数据");
	}
	$bigest=ceil($rowsNumResult/$num);
	$fields=mysql_num_fields($rowsNumResult);
	$nowpage=$nowpage<=$bigest?$nowpage:$bigest;
$offset=($nowpage-1)*$num;
	$sql="select * from {$stu_name} order by id desc limit {$offset},3";
	
	$result=mysql_query($sql);
	
	
	if(is_bool($result)){
		die($stu_name."找不到数据");
	}
	$total=mysql_num_rows($rowsNumResult);
	echo "<table width=500 border=1 align=center>";
	echo "<caption><h1>{$stu_name}</h1></caption>";
	echo "<tr>";
	for($i=0;$i<mysql_num_fields($result);$i++){
		echo "<th>".mysql_field_name($result,$i)."</th>";
	}
	echo "</tr>";
	
	while($rows=mysql_fetch_assoc($result)){
		
		echo "<tr align=center>";
		
		foreach($rows as $value){
			echo "<td>{$value}</td>";
		}
	
		echo "</tr>";
		
	}
	echo "<tr><td colspan={$fields}>总计：{$total} 条；";
	
	if($nowpage!=1){
	print "<a href='index.php?page=".($nowpage-1)."'>上一页</a> ";
	}else{
	print "上一页";	
	}
	
	if($nowpage!=$bigest){
	print "<a href='index.php?page=".($nowpage+1)."'>下一页</a>";
	}else{
	print "下一页";	
	}
	
	if($nowpage!=1){
	print " <a href='index.php?page=1'>首页</a>";
	}else{
	print " 首页";	
	}
	print " / ";
	
	if($nowpage!=$bigest){
	print "<a href='index.php?page={$bigest}'>尾页</a>";
	
	}else{
	print "尾页";	
	}
	echo " 当前页·：";
			echo "<form>";
		echo "<input type='text' name='page' size=5 value='{$nowpage}'>";
		
		echo "<input type='submit' value='跳转'>";
			echo "</form>";
	print "</td></tr>";
	print "<tr><td colspan={$fields}>";
	
	for($i=0;$i<$bigest;$i++){
		
		if(($i+1)!=$nowpage)
		echo "<a href='index.php?page=".($i+1)."'>".($i+1)."</a> ";
		else
		echo ($i+1)." ";
		
	}


	print "</td></tr>";
	echo "</table>";
	
	
	
		
}
	
show('student');
show('teacher');

	

?>


</body>
</html>