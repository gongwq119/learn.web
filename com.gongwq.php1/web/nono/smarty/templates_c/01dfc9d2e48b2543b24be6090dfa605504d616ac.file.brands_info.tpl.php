<?php /* Smarty version Smarty-3.1.13, created on 2013-08-23 05:53:08
         compiled from "./smarty/templates/brands_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18967558905216d29039bb78-86418256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01dfc9d2e48b2543b24be6090dfa605504d616ac' => 
    array (
      0 => './smarty/templates/brands_info.tpl',
      1 => 1377229508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18967558905216d29039bb78-86418256',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5216d2903ed3a7_99157918',
  'variables' => 
  array (
    'brand' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5216d2903ed3a7_99157918')) {function content_5216d2903ed3a7_99157918($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
  <?php if ($_GET['do']=='edit'){?>
  <input type="hidden" name="do" value="update">
  <?php }?>
   <?php if ($_GET['do']=='add'){?>
  <input type="hidden" name="do" value="insert">
  <?php }?>
  <div id="tabs-1">
  	<table>
  		<tr>
  			<td>品牌名称:&nbsp;&nbsp;&nbsp;</td>
  			<td><input type="text" name="brand_name" value="<?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
"  /></td>
  		</tr>
  	</table>
  </div>
  <div id="tabs-2">
	<textarea name="brand_desc" id="myEditor"><?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_desc'];?>
</textarea>
	<script type="text/javascript">
    	var editor = CKEDITOR.replace( 'brand_desc' );
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