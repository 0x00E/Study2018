<h1>新郎登陆</h1>
<!--
<a href="register.php">注册</a>
<form action="login.php" method="post">
用户名<input type="text" name="username"/>
密码<input type="password" name="password"/>
<input type="submit" name="sub" value="登陆"/>
</form> 
-->
<link href="css/denglu.css" rel="stylesheet" type="text/css">
<div class="aaa">
         <h4>用户登录</h4>
          <form action="login.php" method="post" autocomplete="off">
              <label>用户名</label>
              <input type="text" class="sss"  name="username" autocomplete="off"/>
              <label>密码</label>
              <input type="password" class="ddd"  name="password" autocomplete="off"/>
			
			<label>验证码</label>
			<input type="text"  autocomplete="off" onkeyup="if(this.value!=this.value.toUpperCase()) this.value=this.value.toUpperCase()" name="code" class="code0"><br>
				<img src="code.php" onclick="this.src='code.php?'+Math.random()" style="margin-left:20px; margin-top:10px;"/> 
				<br>
				看不清?点击图片刷新
              <p><a href="forget.php">忘记密码</a></p>
              <P>
			  <input type="button" class="www" value=""  name="zhuce" onclick="location='register.php'"/>
              	 <input type="submit" class="qqq" value="" name="sub"/>
              </p>          
    	 </form>
              
</div>
<?php
session_start();
if(isset($_POST["sub"])){
	
	 
	 if(!(strtoupper($_SESSION['code']) == strtoupper($_POST['code']))){
		die("<script>alert('验证码错误');location='login.php';</script>");
	 }

	include "config/config.php";
	$sql="select * from user where name='{$_POST['username']}' && password='{$_POST['password']}'";
	$result=mysql_query($sql);
	if(mysql_affected_rows()>0){
		
	print "<script>alert('登录成功');</script>";
	$cookie_time=time()+3600;
	setcookie("qianniancc_login",$_POST["username"],$cookie_time,"/");
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