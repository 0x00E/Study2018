<%@ include file="../include/include.jsp" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>

<% 

String username=request.getParameter("username");
String password=request.getParameter("password");
String repassword=request.getParameter("repassword");
String id=request.getParameter("id");
if(!password.equals(repassword)){
	out.print(js("alert('确认密码和密码不相同');location.href = 'admin_add.jsp'"));
	return;
}
%>
<sql:update dataSource="${snapshot}" var="count">
  UPDATE admin SET name = '<%=username %>',password='<%=password %>' WHERE id = <%=id %>
</sql:update>
<%out.print(js("alert('更改成功');location.href = 'admin_user.jsp'")); %>
</body>
</html>