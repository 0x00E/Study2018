<?php
include "../include/func.php";
is_cookie();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php
include "../config/config.php";
$id=$_GET['id'];
$sql="SELECT * FROM art where id={$id}";
$result=mysql_query($sql);
$rows=mysql_fetch_assoc($result);
$title=$rows['title'];
$num=$rows['num'];
$cid=$rows['cid'];
$content=$rows['content'];

?>
<form action="doUpdateArt.php" method="post">

	文章标题： <input type="text" name="title" value="<?php echo $title?>"/><br /><br />
    
    是否显示:
    <input type="radio" name="radio" value="1"  <?php if($num==1){echo "checked='checked'";}?>/>是
    <input type="radio" name="radio" value="0" <?php if($num==0){echo "checked='checked'";}?>/>否<br /><br />
    
    文章分类:
    <select name="cid">
      
      <?php
	  
      include "../config/config.php";
	  $sql="select name,id from cate";
	  $result=mysql_query($sql);
	  while($rows=mysql_fetch_assoc($result)){
		  if($rows['id']!=$cid){
		  print "<option value='{$rows['id']}' >{$rows['name']}</option>";
		  }else{
			print "<option value='{$rows['id']}' selected='selected'>{$rows['name']}</option>";  
		  }
	  
	  
	  }
	  
	  
	  ?>
      
    </select><br /><br />
    文章内容：
            <!-- 加载编辑器的容器 -->
        <script id="container" name="content" type="text/plain">
            
        </script>
    <input type="submit" name="sub" value="确定" />
    <input type="hidden" name="hidden" value="<?php echo $_GET['id'] ?>" />
    

</form>
    <!-- 配置文件 -->
    <script type="text/javascript" src="ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
		console.log("你好，世界！");
        var editor = UE.getEditor('container');
		editor.addListener("ready", function () {
        // editor准备好之后才可以使用
        editor.setContent('<pre><?php print $content; ?></pre>');

        });
		
    </script>
</body>
</html>