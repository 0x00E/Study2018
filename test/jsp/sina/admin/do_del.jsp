<%@ include file="../include/include.jsp" %>
<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>

<% 

String id=request.getParameter("id");


%>

<!--
删除 ID 为 11 的数据
 -->
<sql:update dataSource="${snapshot}" var="count">
  DELETE FROM admin WHERE id = <%=id %>
</sql:update>
<%out.print(js("alert('删除成功');location.href = 'admin_user.jsp'")); %>
</body>
</html>