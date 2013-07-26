<?php /* Smarty version Smarty-3.1.13, created on 2013-07-26 11:18:29
         compiled from "./smarty/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92382280951de5cf862cdd6-61963619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cecd537087c6eb53b51506344ea5c5f8f5085ce' => 
    array (
      0 => './smarty/templates/login.tpl',
      1 => 1374830308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92382280951de5cf862cdd6-61963619',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51de5cf8660147_32654151',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51de5cf8660147_32654151')) {function content_51de5cf8660147_32654151($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<?php }} ?>