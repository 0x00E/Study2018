<?
include "config/config.php";
if(isset($_POST["sub"])){
	
	

	$sql="insert into user(name,password,email,time) values('{$_POST['username']}','{$_POST['password']}','{$_POST['email']}',".time().")";
	$result=mysql_query($sql);
	if(mysql_affected_rows()>0){
		
	print "<script>alert('注册成功');</script>";
	print "<script>
		
		location='login.php';
		
	
	
	</script>";
	
	}else{
	
	print "<script>alert('注册失败，请询问网站管理员');</script>";
	print "<script>
		
		location='register.php';
		
	
	
	</script>";
		
	}
	
}


?>
<link rel="stylesheet" type="text/css" href="css/register.css">
<h1 class="big">新郎注册</h1>
<div id="main">
<form action="register.php" method="post">
账号：<input type="text" name="username" class="text"/><br>
密码：<input type="password" name="password" class="text"/><br>
邮箱：<input type="email" name="email" class="text"/><br>
<input type="submit" name="sub" value="注册" class="sub"/>
</form>
<a href="login.php" class="text">我已有新郎账号，立即登录</a>
</div>
<div id="down">
     <span><?php  print $down; ?></span>
</div>
