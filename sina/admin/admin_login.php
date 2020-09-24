<h1>新郎后台登陆</h1>
<!-- <a href="register.php">注册</a> -->
</form>
<link href="../css/denglu.css" rel="stylesheet" type="text/css">
<div class="aaa">
         <h4>用户登录</h4>
          <form action="admin_login.php" method="post"  autocomplete="off">
              <label>用户名</label>
              <input type="text" class="sss"  name="username"  autocomplete="off"/>
              <label>密码</label>
              <input type="password" class="ddd"  name="password" autocomplete="off"/>
			<label>验证码</label>
			<input type="text"  autocomplete="off" onkeyup="if(this.value!=this.value.toUpperCase()) this.value=this.value.toUpperCase()" name="code" class="code0"><br>
				<img src="../code.php" onclick="this.src='../code.php?'+Math.random()" style="margin-left:20px; margin-top:10px;"/> 
				<br>
				看不清?点击图片刷新
              <P>
              	 <input type="submit" class="qqq" value="" name="sub"/>
              </p>          
    	 </form>
              
</div>
<?php
session_start();
if(isset($_POST["sub"])){
	
	 
	 if(!(strtoupper($_SESSION['code']) == strtoupper($_POST['code']))){
		die("<script>alert('验证码错误');location='admin_login.php';</script>");
	 }

	
	include "../config/config.php";
	$sql="select * from admin where name='{$_POST['username']}' && password='{$_POST['password']}'";
	$result=mysql_query($sql);
	if(mysql_affected_rows()>0){
		
	print "登陆成功";
	$cookie_time=time()+3600;
	setcookie("qianniancc_admin",$_POST["username"],$cookie_time,"/");
	print "<script>
	setInterval(function(){
		
		location='index.php';
		
	},2000)
	
	
	</script>";
	
	}else{
	
	print "登陆失败，账号或密码错误";
	print "<script>
	setInterval(function(){
		
		location='admin_login.php';
		
	},1000)
	
	
	</script>";
	
		
	}
	
}


?>