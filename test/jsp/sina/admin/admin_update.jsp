<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ include file="../include/include.jsp" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>更改管理员</title>
</head>
<body>
<h1>更改管理员</h1>

<% 

String id=request.getParameter("id");


%>
<sql:query dataSource="${snapshot}" var="result">
SELECT * from admin where id=<%=id %>;
</sql:query>
<form action="do_update.jsp" method="get">
<c:forEach var="row" items="${result.rows}">
   用户名:<input type="text" name="username" value="${row.name}"><br>
密码:<input type="password" name="password"><br>
确认密码:<input type="password" name="repassword"><br>
</c:forEach>
<input type="submit" name="go">
<input type="hidden" name="id" value=<%=id %>>

</form>
</body>
</html>