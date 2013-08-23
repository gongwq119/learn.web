<?php /* Smarty version Smarty-3.1.13, created on 2013-08-22 10:11:04
         compiled from "./smarty/templates/categories_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202853125051e3f0f2541677-70147779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fcd73d001d49897db586c5b848e0e08e28b72de' => 
    array (
      0 => './smarty/templates/categories_info.tpl',
      1 => 1377159049,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202853125051e3f0f2541677-70147779',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e3f0f260eb85_01339066',
  'variables' => 
  array (
    'cat' => 0,
    'parent_cats' => 0,
    'parent_cat' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e3f0f260eb85_01339066')) {function content_51e3f0f260eb85_01339066($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<script language="JavaScript" src="../ckeditor/ckeditor.js"></script>
<script language="JavaScript" src="../ckfinder/ckfinder.js"></script>
<script type="text/javascript">
$(function() {
    $( "#tabs" ).tabs();
  });
$(document).ready(function() {
	var maxImageQuant = 3;
	var imageQuant = 1;
	//初始化cat,brand值
	$("select[name='parent_id']").val(<?php echo $_smarty_tpl->tpl_vars['cat']->value['parent_id'];?>
);
	$("select[name='is_show']").val(<?php echo $_smarty_tpl->tpl_vars['cat']->value['is_show'];?>
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
嘉海配件管理中心->分类信息
</div>
</div>
<div id="w2">
<div id="tabs">
  <ul class="ui-tab-nav">
    <li><a href="#tabs-1">基本信息</a></li>
    <li><a href="#tabs-2">详细描述</a></li>
  </ul>
  <form enctype="multipart/form-data" action="" method="post" name="theForm" >
  <input type="hidden" name="do" value="insert">
  <div id="tabs-1">
  	<table>
  		<tr>
  			<td>分类名称:&nbsp;&nbsp;&nbsp;</td>
  			<td><input type="text" name="cat_name" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_name'];?>
"  /></td>
  		</tr>
  		<tr>
  			<td>关键词:&nbsp;&nbsp;&nbsp;</td>
  			<td><input type="text" name="keywords" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['keywords'];?>
"  /></td>
  		</tr>
  		<tr>
  			<td>上级分类:&nbsp;&nbsp;&nbsp;</td>
  			<td>
	  		<select name="parent_id">
	  			<?php  $_smarty_tpl->tpl_vars['parent_cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['parent_cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['parent_cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['parent_cat']->key => $_smarty_tpl->tpl_vars['parent_cat']->value){
$_smarty_tpl->tpl_vars['parent_cat']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['parent_cat']->value['cat_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['parent_cat']->value['cat_name'];?>
</option>
				<?php } ?>
			</select>
  			</td>
  		</tr>
  		<tr>
  			<td>是否显示:&nbsp;&nbsp;&nbsp;</td>
  			<td>
  			<select name="is_show">
				<option value="0">不显示</option>
				<option value="1">显示</option>
			</select>
  			</td>
  		</tr>
  		
  	</table>
  </div>
  <div id="tabs-2">
	<textarea name="cat_desc" id="myEditor"><?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_desc'];?>
</textarea>
	<script type="text/javascript">
    	var editor = CKEDITOR.replace( 'cat_desc' );
    	CKFinder.setupCKEditor( editor, '../ckfinder/' );
	</script>
  </div>
  <div>
  	<input type="submit" value="确认"/><input type="button" value="重置"/>
  </div>
  </form>
</div>
</div>
</body>
</html><?php }} ?>