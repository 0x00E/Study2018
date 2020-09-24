<body>
<link href="css/forget.css" rel="stylesheet" type="text/css">
<form>
<h1 class="big">找回密码</h1>
您的账号:
<input type="text" class="text" name="username" >
<input type="submit" name="go" value="提交" class="sub"></input>
</form>

<?php
include "config/config.php";
if(isset($_GET["username"])){
	$u=$_GET["username"];
	print "<form>";
	print "您的账号:".$_GET["username"].",请输入要修改的密码<br>";
	print "<input type='hidden' name='username' value='{$u}'></input>";
	print "<input type='password' name='password' class='text'></input>";
	print "<input type='submit' name='godo' value='确定' class='sub'></input>";
	print "<form>";
}
if(isset($_GET["password"])){
	
	$p=$_GET["password"];
	$u=$_GET["username"];
	$sql="update user set password='{$p}' where name='{$u}'";
	$result=mysql_query($sql);
	if(mysql_affected_rows()>0){
		
		print "<script>alert('修改成功')</script>";
		print "<script>location='login.php'</script>";
		
	}else{
		
		print "<script>alert('修改失败')</script>";
		print "<script>location='forget.php'</script>";
		
	}
	
	
}



?>
</body>