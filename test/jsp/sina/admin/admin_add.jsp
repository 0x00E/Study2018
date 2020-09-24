<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ include file="../include/include.jsp" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加管理员</title>
</head>
<body>
<h1>添加管理员</h1>
<form action="do_add.jsp" method="get">
用户名:<input type="text" name="username"><br>
密码:<input type="password" name="password"><br>
确认密码:<input type="password" name="repassword"><br>
<input type="submit" name="go">

</form>
</body>
</html>