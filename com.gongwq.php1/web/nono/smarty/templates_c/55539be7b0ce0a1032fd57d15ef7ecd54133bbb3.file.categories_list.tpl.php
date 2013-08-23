<?php /* Smarty version Smarty-3.1.13, created on 2013-08-23 04:37:15
         compiled from "./smarty/templates/categories_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77211945551de711680f560-24562166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55539be7b0ce0a1032fd57d15ef7ecd54133bbb3' => 
    array (
      0 => './smarty/templates/categories_list.tpl',
      1 => 1377225429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77211945551de711680f560-24562166',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51de7116892ee6_49469694',
  'variables' => 
  array (
    'title' => 0,
    'page' => 0,
    'page_count' => 0,
    'cats' => 0,
    'cat' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51de7116892ee6_49469694')) {function content_51de7116892ee6_49469694($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
	//opration btns 
	$("#edit_item").hide();
	$(":checkbox").click(function() {
		switch ($(":checked[name='select']").length) {
		case 0:
			$("#edit_item").hide();
			break;
		case 1:
			$("#edit_item").show();
			break;
		default:
			$("#edit_item").hide();
			break;
		}
	});
	$("#new_item").click(function() {
		window.location.href = "categories.php?do=add";
	});
	$("#edit_item").click(function() {
		if (1 == $(":checked[name='select']").length)
		{
			var edit_link = 'categories.php?do=edit&cat_id=' + $(":checked[name='select']").val();
			window.location.href = edit_link;
		}
	});
	//inital page paramter
	var page = parseInt(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
);
	var max_page = parseInt(<?php echo $_smarty_tpl->tpl_vars['page_count']->value;?>
);
	var page_sta = (page+1) + '/' + max_page;
	$("#next_page").attr('href','categories.php?do=list&page=' + (page+1));
	$("#previous_page").attr('href','categories.php?do=list&page=' + (page-1));

	if (page <= 0) 
	{
		$("#previous_page").hide();
		$("#next_page").attr('href','categories.php?do=list&page=' + (page+1));
	}
	if (page >= max_page-1) 
	{
		$("#next_page").hide();
		$("#previous_page").attr('href','categories.php?do=list&page=' + (page-1));
	} 
	$("#page_sta").text(page_sta);
	
	//
	$(".goto_page").change(function() {
		$(".goto_page_a").attr('href', 'categories.php?do=list&page=' + $(this).val());
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
</div>
</div>
<div id="w3">
	<form action="" >
	<table id="item_list">
	<tr id="tou">
		<th><input type="checkbox" name="select_all">全选</th>
		<th class="c1">分类名称</th>
		<th>商品数量</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
	<tr>
		<td><input type="checkbox" name="select" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_id'];?>
"></td>
		<td class="<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_name'];?>
</td>
		<td>未知</td>
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