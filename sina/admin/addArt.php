<?php
include "../include/func.php";
is_cookie();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>

<form action="doArt.php" method="post">

	文章标题： <input type="text" name="title" /><br /><br />
    
    是否显示:
    <input type="radio" name="radio" value="1" checked="checked"/>是
    <input type="radio" name="radio" value="0"/>否<br /><br />
    
    文章分类:
    <select name="cid">
      
      <?php
	  
      include "../config/config.php";
	  $sql="select name,id from cate";
	  $result=mysql_query($sql);
	  while($rows=mysql_fetch_assoc($result)){
		  
		  print "<option value='{$rows['id']}'>{$rows['name']}</option>";
	  }
	  
	  ?>
      
    </select><br /><br />
    文章内容：
            <!-- 加载编辑器的容器 -->
        <script id="container" name="content" type="text/plain">
            
        </script>
    <input type="submit" name="sub" value="确定" />
    

</form>
    <!-- 配置文件 -->
    <script type="text/javascript" src="ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var editor = UE.getEditor('container');
    </script>
</body>
</html>