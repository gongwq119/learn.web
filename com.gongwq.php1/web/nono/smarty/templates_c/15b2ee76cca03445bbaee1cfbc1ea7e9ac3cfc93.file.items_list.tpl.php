<?php /* Smarty version Smarty-3.1.13, created on 2013-08-27 06:11:02
         compiled from "./smarty/templates/items_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45590340251de5c0d1d3346-12537241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15b2ee76cca03445bbaee1cfbc1ea7e9ac3cfc93' => 
    array (
      0 => './smarty/templates/items_list.tpl',
      1 => 1377440208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45590340251de5c0d1d3346-12537241',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51de5c0d25be03_95812331',
  'variables' => 
  array (
    'title' => 0,
    'page' => 0,
    'page_count' => 0,
    'items' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51de5c0d25be03_95812331')) {function content_51de5c0d25be03_95812331($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
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
.operations span {
	display:block;
	margin: auto 5px;
	float:left;
	width: 52px;
	height: 24px;
	text-align: center;
	line-height:24px;
}
#new_item {
	background: url(../image/cred.png) no-repeat 0px -25px;
}
#new_item:hover {
	color:#fff;
	cursor:pointer;
	background: url(../image/cred.png) no-repeat -54px -25px;
}
#del_item {
	background: url(../image/cred.png) no-repeat 0px 0px;
}
#del_item:hover {
	color:#fff;
	cursor:pointer;
	background: url(../image/cred.png) no-repeat -54px 0px;
}
#edit_item {
	background: url(../image/cred.png) no-repeat 0px 0px;
}
#edit_item:hover {
	color:#fff;
	cursor:pointer;
	background: url(../image/cred.png) no-repeat -54px 0px;
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
	
	//all check function
	$("input[name='select_all']").click(function() {
		if ($(this).prop("checked") == true) {
			$("input[name='select']").each(function() {
				if($(this).prop("checked") == false) {
					$(this).click();
				}
			});
		}
		else 
		{
			$("input[name='select']").each(function() {
				if ($(this).prop("checked") == true) {
					$(this).click();
				}
			});
		}
	});
	$("#edit_item").hide();
	$("#del_item").hide();
	$(":checkbox").click(function() {
		switch ($(":checked[name='select']").length) {
		case 0:
			$("#edit_item").hide();
			$("#del_item").hide();
			break;
		case 1:
			$("#edit_item").show();
			$("#del_item").show();
			break;
		default:
			$("#edit_item").hide();
			$("#del_item").show();
			break;
		}
	});
	//opration btns 
	$("#new_item").click(function() {
		window.location.href = "items.php?do=add";
	});
	$("#edit_item").click(function() {
		if (1 == $(":checked[name='select']").length)
		{
			var edit_link = 'items.php?do=edit&item_id=' + $(":checked[name='select']").val();
			window.location.href = edit_link;
		}
	});
	$("#del_item").click(function() {
		var del_id = '';
		$(":checked[name='select']").each(function() {
			del_id = del_id + ',' + $(this).val();
		});
		del_id = del_id.substring(1, del_id.length);
		window.location.href = 'items.php?do=remove&item_id=' + del_id;
	});	
	//inital page paramter
	var page = parseInt(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
);
	var max_page = parseInt(<?php echo $_smarty_tpl->tpl_vars['page_count']->value;?>
);
	var page_sta = (page+1) + '/' + max_page;
	$("#next_page").attr('href','items.php?do=list&page=' + (page+1));
	$("#previous_page").attr('href','items.php?do=list&page=' + (page-1));

	if (page <= 0) 
	{
		$("#previous_page").hide();
		$("#next_page").attr('href','items.php?do=list&page=' + (page+1));
	}
	if (page >= max_page-1) 
	{
		$("#next_page").hide();
		$("#previous_page").attr('href','items.php?do=list&page=' + (page-1));
	} 
	$("#page_sta").text(page_sta);
	
	//
	$(".goto_page").change(function() {
		$(".goto_page_a").attr('href', 'items.php?do=list&page=' + $(this).val());
	});
});
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
	<span id="new_item">新建</span>
	<span id="edit_item">编辑</span>
	<span id="del_item">删除</span>
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
		<td><input type="checkbox" name="select" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['it_id'];?>
" ></td>
		<td class="<?php echo $_smarty_tpl->tpl_vars['item']->value['it_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['it_name'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['it_sn'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['it_price'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['it_quant'];?>
</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="5">
		<div class="page_navi">	
			<div>第<input type="text" class="goto_page" maxlength="3">页 <a class="goto_page_a">跳转</a></div>
			<div><a id="next_page">下一页</a></div>
			<div><a id="previous_page">上一页</a></div>
			<div id="page_sta"></div>
		</div>
		</td>
	</tr>
	</table>
	</form>
</div>

</body>
</html><?php }} ?>