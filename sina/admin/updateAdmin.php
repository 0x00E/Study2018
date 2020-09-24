<?php
include "../include/func.php";
is_cookie();
include "../config/config.php";
$id=$_GET['id'];
$sql="SELECT * FROM admin where id={$id}";
$result=mysql_query($sql);
$rows=mysql_fetch_assoc($result);
$name=$rows['name'];
$password=$rows['password'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>


<form action="doUpdateAdmin.php" method="post">

	管理员名称： <input type="text" name="name" value="<?php print $name; ?>"/><br /><br />
    
管理员密码： <input type="password" name="password" value="<?php print $password; ?>"/><br /><br />
    <input type="hidden" name="hidden" value="<?php echo $_GET['id'] ?>" />

    <input type="submit" name="sub" value="修改" />
    

</form>


</body>
</html>