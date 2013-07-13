<?php /* Smarty version Smarty-3.1.13, created on 2013-07-13 05:22:08
         compiled from "./smarty/templates/items_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115664904251de5e486621b8-41486655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd90e54c348891315fed37d4dbe2e0a6a2faf55f4' => 
    array (
      0 => './smarty/templates/items_info.tpl',
      1 => 1373685713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115664904251de5e486621b8-41486655',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51de5e4869c645_98658726',
  'variables' => 
  array (
    'item' => 0,
    'cats' => 0,
    'cat' => 0,
    'brands' => 0,
    'brand' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51de5e4869c645_98658726')) {function content_51de5e4869c645_98658726($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
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
.title {
	border: solid 1px #BBDDE5;
	background: #F4FAFB;
	padding: 10px;
	height: 28px;
	font: normal 18px arial,sans-serif;
}
</style>
<link href="../css/jquery-ui.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="/js/jquery-1.9.1.js"></script>
<script language="JavaScript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="../ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../ueditor/ueditor.all.js"></script>
<script type="text/javascript">
$(function() {
    $( "#tabs" ).tabs();
  });
$(document).ready(function() {
	var maxImageQuant = 3;
	var imageQuant = 1;
	$("button[name='addImage']").click(function() {
		if (imageQuant < maxImageQuant) {
			$(".firstImage").after('<input type="file" name="uploadImages[]" /><br/>');
			imageQuant ++;
		}
		else {
			alert("最多一次上传三张图片");
		}
	});
	//初始化cat,brand值
	$("select[name='cat_id']").val(<?php echo $_smarty_tpl->tpl_vars['item']->value['cat_id'];?>
);
	$("select[name='brand_id']").val(<?php echo $_smarty_tpl->tpl_vars['item']->value['brand_id'];?>
);
	
	
});
</script>
<script type="text/javascript">

function validate() {
	var validator = new Validator('theForm');
	return validator.passed();
}
</script>
</head>
<body>
<div id="w1">
<div class="title">
嘉海配件管理中心->物品信息
</div>
</div>
<div id="w2">
<div id="tabs">
  <ul class="ui-tab-nav">
    <li><a href="#tabs-1">基本信息</a></li>
    <li><a href="#tabs-2">详细描述</a></li>
    <li><a href="#tabs-3">物品相册</a></li>
  </ul>
  <form enctype="multipart/form-data" action="" method="post" name="theForm" >
  <input type="hidden" name="do" value="insert">
  <div id="tabs-1">
  	<table>
  		<tr>
  			<td>商品名称:&nbsp;&nbsp;&nbsp;</td>
  			<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['it_name'];?>
"  /></td>
  		</tr>
  		<tr>
  			<td>商品序列号:&nbsp;&nbsp;&nbsp;</td>
  			<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['it_sn'];?>
"  /></td>
  		</tr>
  		<tr>
  			<td>商品分类:&nbsp;&nbsp;&nbsp;</td>
  			<td>
	  		<select name="cat_id">
	  			<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_name'];?>
</option>
				<?php } ?>
			</select>
  			</td>
  		</tr>
  		<tr>
  			<td>商品品牌:&nbsp;&nbsp;&nbsp;</td>
  			<td>
  			<select name="brand_id">
				<?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value){
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
</option>
				<?php } ?>
			</select>
  			</td>
  		</tr>
  		<tr>
  			<td>商品价格:&nbsp;&nbsp;&nbsp;</td>
  			<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['it_price'];?>
" /></td>
  		</tr>
  		<tr>
  			<td>商品数量:&nbsp;&nbsp;&nbsp;</td>
  			<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['it_quant'];?>
" /></td>
  		</tr>
  		
  	</table>
  </div>
  <div id="tabs-2">
	<textarea name="后台取值的key" id="myEditor"><?php echo $_smarty_tpl->tpl_vars['item']->value['it_desc'];?>
</textarea>
	<script type="text/javascript">
	    var editor = new UE.ui.Editor();
	    editor.render("myEditor");
	</script>
  </div>
  <div id="tabs-3">
  	<button type="button" name="addImage">添加图片</button><h1>总共最多上传3张图片</h1><br/>
  	<input type="file" name="uploadImages[]" /><br class="firstImage"/>
  </div>
  <div>
  	<input type="submit" value="确认"/><input type="button" value="重置"/>
  </div>
  </form>
</div>
</div>
</body>
</html><?php }} ?>