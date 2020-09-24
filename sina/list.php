<html>
<link rel="stylesheet" type="text/css" href="css/main.css">

<head>
<title>新狼首页</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
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
	 <?php
	 if(!isset($_GET["cate"])){
	
	die("参数错误");
	
}
include_once "config/config.php";
$sql="SELECT id FROM cate where name='{$_GET['cate']}'";
$result=mysql_query($sql);
$rows=mysql_fetch_assoc($result);
$cid=$rows['id'];

	$sql="SELECT title,id FROM art where cid='{$cid}' and not num = 0";
$result=mysql_query($sql);
if(!(mysql_num_rows($result)>0)){
	exit("该分类暂不存在文章");	
}
while($rows=mysql_fetch_assoc($result)){
	
	print "<a href='arts.php?id={$rows['id']}'>".$rows['title']."</a><hr>";
}
?>
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