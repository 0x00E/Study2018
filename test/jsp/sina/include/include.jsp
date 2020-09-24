<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<%!
public static String js(String arg0){
	
	return "<script>"+arg0+"</script>";
}
%>
<%
Cookie[] cookies = request.getCookies();
Cookie cookie;

int success=0;
for(int i=0;i<cookies.length;i++){
cookie=cookies[i]; 
if(cookies!=null){
      if(("qianniancc_admin").equals(cookie.getName())){      
			success=1;
      }
   
}
}
if(success==0){
	out.print("<script>alert('请先登录');location='"+URL+"/admin/admin_login.php'</script>");
	return;
}
%>
<%@ include file="../config/config.jsp" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.io.*,java.util.*,java.sql.*"%>
<%@ page import="javax.servlet.http.*,javax.servlet.*" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/sql" prefix="sql"%>
<sql:setDataSource var="snapshot" driver="com.mysql.jdbc.Driver"
     url='<%="jdbc:mysql://"+mysql_addr+":"+mysql_port+"/"+mysql_database+"?useUnicode=true&characterEncoding=utf-8" %>'
     user="<%=mysql_user %>"  password="<%=mysql_password %>"/>