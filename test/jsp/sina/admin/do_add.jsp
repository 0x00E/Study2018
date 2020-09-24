<%@ include file="../include/include.jsp" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">%>

<% 

String username=request.getParameter("username");
String password=request.getParameter("password");
String repassword=request.getParameter("repassword");
if(!password.equals(repassword)){
	out.print(js("alert('确认密码和密码不相同');location.href = 'admin_add.jsp'"));
	return;
}
%>
<sql:update dataSource="${snapshot}" var="result">
INSERT INTO admin (name,password) VALUES ("<%=username %>","<%=password %>");
</sql:update>
<%out.print(js("alert('添加成功');location.href = 'admin_user.jsp'")); %>