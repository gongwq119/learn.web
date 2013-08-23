<?php /* Smarty version Smarty-3.1.13, created on 2013-08-22 11:10:17
         compiled from "./smarty/templates/message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12403596795215cb87adde02-16276862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3212d23e812149d5da6a3fdb43043347e6a1465b' => 
    array (
      0 => './smarty/templates/message.tpl',
      1 => 1377162502,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12403596795215cb87adde02-16276862',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5215cb87b2b726_62695635',
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5215cb87b2b726_62695635')) {function content_5215cb87b2b726_62695635($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>嘉海后台</title>
<style type="text/css">
body {
	background:#DDEEF2;
	padding: 10px;
	font: 12px "sans-serif", "Arial", "Verdana";
	margin: 0px;
}
#w1 {
	margin: 10px;
	border: dotted 0px;
}
#w2 {
	margin: 10px;
	border: dotted 0px;
}
#w3 {
	margin: 10px;
	border: dotted 0px;
}
 
#msg_frame {
 	border: solid 1px #BBDDE5;
	background: #F4FAFB;
	padding: 10px;
	height: 250px;
	
 }
 #name {
 	margin: 20px;
 	font: normal 18px arial,sans-serif;
 }
 #msg {
 	margin: 20px;
 	font: normal 10px arial,sans-serif;
 }
 #s {
  	color: red;
 }
 #jump:hover{
 	cursor:pointer;
 	color: blue;
 }
</style>
<script language="JavaScript" src="/js/jquery-1.9.1.js"></script>
<script type="text/javascript">
var c=5;
var t;
$(document).ready(function() {
	downCount = function() {
		if (c == 0) {
			window.location.href='http://www.baidu.com/';
		}
		$("#s").text(c);
		c-=1;
		t=setTimeout("downCount()",1000);
	};
	downCount();
	$("#jump").click(function() {
		window.location.href='http://www.baidu.com/';
	});
});

</script>

</head>
<body>
	<div id="w1">
		<div id="msg_frame">
			<div id="name">嘉海电梯配件</div>
			<div id="msg"><span><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</span>，该页面将在<span id="s">5</span>自动<span id="jump">跳转</span>。</div>
		</div>

	</div>
</body>
</html><?php }} ?>