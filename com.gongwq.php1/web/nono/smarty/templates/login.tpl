<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登录</title>
<script language="JavaScript" src="/js/jquery-1.9.1.js"></script>
<style type="text/css">
.login{
	margin: 100px auto; 
	padding: 0px;
	width: 500px;
	height: 357px;
	background: url(../image/dianti.jpg);
}
.logo {
	position: relative;
	width: 120px;
	top:35px;
	margin: 0px 0px 0px 35px;
	padding: 0px;
	font-size: 20px;
}
.content {
	position: relative;
	margin: 0px 0px 0px 300px;
	width: 200px;
}
.form div {
	margin: 0px;
	padding: 0px;
}
</style>
</head>
<body>
		<div class="login">
			<div class="logo">嘉海电梯配件</div>
			<div class="content">
			<form name="login" method="post" action="privilege.php?do=validate" class="form">
				<div><p>用户名</p></div>
			 	<div><input type="text" name="username"></div>
			 	<div><p>密码</p></div>
			 	<div><input type="password" name="password"></div>
			 	<div class="buttons"><input type="submit" value="确认" /></div>
			</form>
			</div>
		</div>
</body>
</html>
