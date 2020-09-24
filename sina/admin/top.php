<?php
include "../include/func.php";
is_cookie();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TOP</title>
</head>

<body>

欢迎来到后台,<?php print $_COOKIE['qianniancc_admin']?><hr /><a href="outadmin.php" target="_top">注销</a>

</body>
</html>