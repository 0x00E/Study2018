<h1 class="big">新郎登陆</h1>
<!--
<a href="register.php">注册</a>
<form action="login.php" method="post">
用户名<input type="text" name="username"/>
密码<input type="password" name="password"/>
<input type="submit" name="sub" value="登陆"/>
</form> 
-->
<link href="css/login.css" rel="stylesheet" type="text/css">
<div class="aaa">
          <form action="login.php" method="post">
              <label>用户名</label>
              <input type="text"  name="username" class="text"/>
              <label>密码</label>
              <input type="password" name="password" class="text"/>
			  
			  
			  
			  <div id="main">
			  <p><a href="register.php">我还没有帐号，点击注册</a></p>
              <p><a href="forget.php">忘记密码</a></p>
              </div>
              	 <input type="submit" class="sub" value="登录" name="sub"/>        
    	 </form>
              
</div>
<?php

if(isset($_POST["sub"])){
	
	include "config/config.php";
	$sql="select * from user where name='{$_POST['username']}' && password='{$_POST['password']}'";
	$result=mysql_query($sql);
	if(mysql_affected_rows()>0){
		
	print "<script>alert('登录成功');</script>";
	$cookie_time=time()+3600;
	setcookie("qianniancc_login",$_POST["username"],$cookie_time);
	print "<script>
		
		location='index.php';
		
	
	
	</script>";
	
	}else{
	print "<script>alert('登陆失败，账号或密码错误');</script>";
	print "<script>
		
		location='login.php';
		

	
	
	</script>";
	
		
	}
	
}


?>