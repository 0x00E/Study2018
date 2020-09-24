<h1>新郎注册</h1>
<a href="login.php">登陆</a>
<form action="register.php" method="post">
用户名<input type="text" name="username"/>
密码<input type="password" name="password"/>
邮箱<input type="email" name="email"/>
<input type="submit" name="sub" value="注册"/>
</form>
<?php

if(isset($_POST["sub"])){
	
	include "config/config.php";

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