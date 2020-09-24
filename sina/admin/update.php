<?php
include "../include/func.php";
is_cookie();
include "../config/config.php";
$id=$_GET['id'];
$sql="SELECT * FROM cate where id={$id}";
$result=mysql_query($sql);
$rows=mysql_fetch_assoc($result);
$name=$rows['name'];
$status=$rows['status'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>


<form action="doUpdate.php" method="post">

	新栏目名称： <input type="text" name="name" value="<?php print $name; ?>"/><br /><br />
    
    是否显示:
    <input type="radio" name="radio" value="1" <?php if($status==1){echo "checked='checked'";}?>/>是
    <input type="hidden" name="hidden" value="<?php echo $_GET['id'] ?>" />
    <input type="radio" name="radio" value="0" <?php if($status==0){echo "checked='checked'";}?>/>否<br /><br />
    <input type="submit" name="sub" value="修改" />
    

</form>


</body>
</html>