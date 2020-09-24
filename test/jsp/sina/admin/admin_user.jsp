<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ include file="../include/include.jsp" %>
<html>
<head>
<title>管理员管理</title>
</head>
<body>
<sql:query dataSource="${snapshot}" var="result">
SELECT * from admin;
</sql:query>
<a href="admin_add.jsp">添加管理员</a>
<h1>管理员管理</h1>
<table border="1" style="width: 600px;">
<tr>
   <th>ID</th>
   <th>用户名</th>
   <th>密码</th>
   <th colspan=2>操作</th>
</tr>
<c:forEach var="row" items="${result.rows}">
<tr>
   <td><c:out value="${row.id}"/></td>
   <td><c:out value="${row.name}"/></td>
   <c:set value="${row.password}" var="p"/>
   <% String p=(String)pageContext.getAttribute("p"); 
		int pl=p.length();
		p="";
		for(int i=0;i<pl;i++){
			p+="#";
		}
   
   %>
   <td><%=p %></td>
   <td><a href="do_del.jsp?id=${row.id}">删除</a></td>
   <td><a href="admin_update.jsp?id=${row.id}">更改</a></td>
</tr>
</c:forEach>
</table>
 
</body>
</html>