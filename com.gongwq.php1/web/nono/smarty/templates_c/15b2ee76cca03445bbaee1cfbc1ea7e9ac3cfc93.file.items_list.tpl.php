<?php /* Smarty version Smarty-3.1.13, created on 2013-06-26 11:35:52
         compiled from "./smarty/templates/items_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199860974051caa6f3e73214-76270737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15b2ee76cca03445bbaee1cfbc1ea7e9ac3cfc93' => 
    array (
      0 => './smarty/templates/items_list.tpl',
      1 => 1372236518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199860974051caa6f3e73214-76270737',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51caa6f3ec97f8_38359868',
  'variables' => 
  array (
    'none' => 0,
    'items' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51caa6f3ec97f8_38359868')) {function content_51caa6f3ec97f8_38359868($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['none']->value;?>
</title>
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
.title {
	border: solid 1px #BBDDE5;
	background: #F4FAFB;
	padding: 10px;
	height: 28px;
	font: normal 18px arial,sans-serif;
}
.operations {
	border: solid 1px #BBDDE5;
	background: #F4FAFB;
	padding: 10px;
	height: 28px;
}
operations button {
	float: right;
}
#item_list
  {
  font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
  width:100%;
  border-collapse:collapse;
  background: #F4FAFB;
  
  }

#item_list td, #item_list th 
  {
  font-size:1em;
  border:1px solid #BBDDE5;
  padding:3px 7px 2px 7px;
  }

#item_list th 
  {
  font-size:1.1em;
  text-align:left;
  padding-top:5px;
  padding-bottom:4px;
  background-color:#BBDDE5;
  color:#ffffff;
  }
 .page_navi div{
 	float: right;
 	margin:0px 0px 0px 5px;
 }
 .goto_page {
 	width: 20px;
 }
</style>
<script language="JavaScript" src="/js/jquery-1.9.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	$("input[name='select_all']").click(function() {
		alert($("input[name='select_all']").attr("checked"));
	});
});
function delSelected() {
	var sel = $("input:checked").parent().parent().attr("id");
	alert(sel);
}
function hideSelected() {
	$("input:checked").hide();
}
</script>
</head>
<body>
<div id="w1">
<div class="title">
	嘉海配件管理中心
</div>
</div>
<div id="w2">
<div class="operations">
	<button type="button" id="new_item" onclick="hideSelected()">NEW</button>
	<button type="button" id="del_item" onclick="delSelected()">DEL</button>
	<button type="button" id="edit_item" onclick="">EDIT</button>
</div>
</div>

<div id="w3">
	<form action="" >
	<table id="item_list">
	<tr id="tou">
		<th><input type="checkbox" name="select_all">全选</th>
		<th class="c1">商品名称</th>
		<th>商品序号</th>
		<th>商品价格</th>
		<th>商品库存</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr>
		<td><input type="checkbox" name="select"></td>
		<td class="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['sn'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['quantity'];?>
</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="5">
		<div class="page_navi">	
			<div>第<input type="text" class="goto_page" maxlength="3">页 <a>跳转</a></div>
			<div><a href="http://localhost">下一页</a></div>
			<div><a href="http://localhost">上一页</a></div>
			<div>1/3页</div>
		</div>
		</td>
	</tr>
	</table>
	</form>
</div>

</body>
</html><?php }} ?>