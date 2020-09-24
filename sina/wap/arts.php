<html>
<link rel="stylesheet" type="text/css" href="css/main.css">
<script src="js/main.js"></script>
<head>
<title>新狼首页——无产阶级的崛起</title>

</head>
<body>
	<h1 class="big" onclick="location='index.php'" style='cursor:pointer'>新郎首页</h1>

<div id="owner">
	<div id="user">
	
	 <?php
	if(!isset($_COOKIE["qianniancc_login"])){
    print '<a href="login.php">登陆</a>|<a href="register.php">注册</a>';
	}else{
	print "<b>你好，{$_COOKIE['qianniancc_login']}   </b><a href='outuser.php'>注销</a>";	
		
	}
	?>
	</div>
    <div id="top">
    	<?php
    include "config/config.php";
	$sql="SELECT * FROM cate";
	$result=mysql_query($sql);
	while($rows=mysql_fetch_assoc($result)){
		if($rows["status"]==1){
	
		print "<a href='list.php?cate={$rows['name']}'>".$rows["name"]."</a>";
		$sonsql="select id,name from cate where pid={$rows['id']}";
		$sonresult=mysql_query($sonsql);
		/*
		while($sonrows=mysql_fetch_assoc($sonresult)){
			print ">><a href='list.php?cate={$sonrows['id']}'>{$sonrows['name']}</a>";
			
		}
		*/
		
		}
	}
	
	
	
	?>
    </div>
	<div class="clear"></div>
     <div id="banner">
     <b>欢迎来到新郎博客</b>
    </div>
     <div id="main">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php print $_GET["id"]; ?></title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<body>
<?php 

include "config/config.php";

if(!isset($_GET["id"])){
	
	die("参数错误");
	
}
include_once "config/config.php";
$sql="SELECT * FROM art where id='{$_GET['id']}' and not num=0";
$result=mysql_query($sql);
if(!(mysql_num_rows($result)>0)){
	exit("参数错误");	
}

?>
<div class="art">
<?php



while($rows=mysql_fetch_assoc($result)){
	$title=$rows['title'];
	print "<script> document.title='{$title}'; </script>";
	print "<b>".$rows['title']."</b><hr>";
	echo date("Y-m-d/H:i:s",$rows['time'])."<hr>";
	print $rows['content']."<hr>";
	
}
$time=time();
if(isset($_COOKIE["qianniancc_login"])){
	print "你好，{$_COOKIE['qianniancc_login']}<hr>";	
}
if(isset($_POST['pl'])){
	$chat=true;
	if(!isset($_COOKIE["qianniancc_login"])){
    print '<script>alert("你必须登录才能评论")</script>';
	die('<script>location="login.php"</script>');
	}else{
	$sql="select id,name from user where name='{$_COOKIE['qianniancc_login']}'";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	}
	if($chat=true){
	$sql="insert into comment(uid,aid,time,content) values('{$row['id']}',{$_GET['id']},{$time},'{$_POST['pl']}')";
	$result=mysql_query($sql);
	if(mysql_affected_rows()>0){
		
		print "<script>alert('评论成功');</script>";
		
	}else{
		
		print "<script>alert('评论失败');</script>";	
		
	}
	}
	
}
?>
</div>
<?php

$sql="select * from comment where aid={$_GET['id']}";
$result=mysql_query($sql);

while($rows=mysql_fetch_assoc($result)){
	$time=date("Y-m-d  h:i:s",$rows['time']);
	$username="select id,name from user where id='{$rows['uid']}'";
	$result1=mysql_query($username);
	$row=mysql_fetch_assoc($result1);
	print "时间:".$time;
	print "<br>";
	if($row['name']!=""){
	print "作者:".$row['name'];
	}else{
	print "作者:匿名";	
	}
	print "<br>";
	print "内容:".$rows['content'];
	print "<hr>";
	
}


?>

<form action="" method="post" onsubmit="return isDo()">
<textarea id="pl" cols="50" rows="10" name="pl"></textarea><br />
<input type="submit" value="评论"/>
</form>
</body>
</html>
<script>

function isDo(){
var pl=document.getElementById("pl");
if(pl.value=="" || pl.value==null){
	
alert("评论不能为空");
return false;	
	
}
}



</script>
    </div>
    <div id="link">
	<?php
		foreach($blogroll as $key => $value){
			
			
			echo "<a target='new' href='{$value}'>{$key}</a>   ";
			
		}
		?>
    </div>
    <div id="down">
     <span><?php print $down; ?></span>
    </div>
</div>

</body>
</html>
<?php

include_once "top.extra.php";

?>
<script src="js/main.js"></script>



















