<?php /* Smarty version Smarty-3.1.13, created on 2013-08-22 09:14:10
         compiled from "./smarty/templates/items_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115664904251de5e486621b8-41486655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd90e54c348891315fed37d4dbe2e0a6a2faf55f4' => 
    array (
      0 => './smarty/templates/items_info.tpl',
      1 => 1377155645,
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
    'images' => 0,
    'item' => 0,
    'cats' => 0,
    'cat' => 0,
    'brands' => 0,
    'brand' => 0,
    'image' => 0,
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
div.image_frame {
 	float:left;
 	border: solid 0px #ddd;
 	width: 200px;
 	margin: 10px;
}
.image_frame input{
	width: 198px;
	display: block;
}
.defaultImg {
	border: solid 3px blue;
}
.clear{
	clear:both;
}
</style>
<link href="../css/validatorStyle.css" type="text/css" rel="stylesheet">
<link href="../css/jquery-ui.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="../js/jquery-1.9.1.js"></script>
<script language="JavaScript" src="../js/jquery-ui.js"></script>
<script language="JavaScript" src="../ckeditor/ckeditor.js"></script>
<script language="JavaScript" src="../ckfinder/ckfinder.js"></script>
<script language="JavaScript" src="../js/formValidator-4.0.1.min.js"></script>
<script language="JavaScript" src="../js/formValidatorRegex.js"></script>
<script type="text/javascript">
var maxImageQuant = 3;
var imageQuant = 0;
imageQuant = <?php echo count($_smarty_tpl->tpl_vars['images']->value);?>
;
var item_id = '0';
<?php if ($_GET['do']=='edit'){?>
item_id = '<?php echo $_GET['item_id'];?>
'
<?php }?>

$(function() {
    $( "#tabs" ).tabs();
  });

$(document).ready(function() {
	//初始化cat,brand值
	$("select[name='cat_id']").val(<?php echo $_smarty_tpl->tpl_vars['item']->value['cat_id'];?>
);
	$("select[name='brand_id']").val(<?php echo $_smarty_tpl->tpl_vars['item']->value['brand_id'];?>
);
	//初始化formValidator
	$.formValidator.initConfig({formID:"form1",autoTip:true,onError:function(msg){alert(msg)},inIframe:true});
	$("#item_name").formValidator({onShow:"请输入商品名称",}).inputValidator({min:1,onError:"错误，名称最少一个字符"});
	$("#item_sn").formValidator({onShow:"请输入商品序列号",}).inputValidator({min:1,onError:"错误，名称最少一个字符"});
	$("#item_price").formValidator({onShow:"请输入商品价格",}).inputValidator({min:1,onError:"错误，名称最少一个字符"});
	$("#item_quant").formValidator({onShow:"请输入商品数量",}).inputValidator({min:1,onError:"错误，名称最少一个字符"});
	//初始化图片上传功能
	$("button[name='addImage']").click(function() {
		if (imageQuant < maxImageQuant) {
			$("div#addImage").before('<div class="image_frame"><img  width="200" height="200" src="" ><input type="file" name="uploadImages[]" accept="image/gif, image/jpeg, image/png"/><button type="button" name="setDefault">设为默认</button><button type="button" name="delImage">删除图片</button></div>');
			imageQuant ++;
			assginButtonFunc();
		}
		else {
			alert("最多一次上传三张图片");
		}
	});
	assginButtonFunc();
	//如果有已上传的图片设置默认图片
	$("img#<?php echo $_smarty_tpl->tpl_vars['item']->value['img_id'];?>
").addClass("defaultImg");
	$("input[name='default_image']").val(<?php echo $_smarty_tpl->tpl_vars['item']->value['img_id'];?>
);
	//隐藏saved image input字段
	$("input.saved_img").hide();
	//设置隐藏字段item_id
	var item_id_string = '<input type="hidden" name="item_id" value="'
						+ item_id
						+ '">';
	$("input[name='default_image']").after(item_id_string);
	
});

function assginButtonFunc() {
	$("button[name='setDefault']").click(function() {
		$("div.image_frame").each(function() {
			$(this).children("img").removeClass("defaultImg");
		});
		$(this).parent().children("img").addClass("defaultImg");
		$("input[name='default_image']").val($(this).parent().children("img").prop('id'));
	});
	$("button[name='delImage']").click(function() {
		$(this).parent().remove();
		imageQuant--;
		var delString = '<input type="hidden" name="deleted_image[]" value="'
						+ $(this).parent().children("img").prop('id')
						+ '">';
		$("input[name='default_image']").after(delString);
	});
}

function processUploadImages() {
	//如果没有default_image, 自动第一个img添加class
	if ($("img.defaultImg").size() == 0 && $("div.image_frame").children("img").size() > 0)
	{
		$("div.image_frame").children("img").first().addClass("defaultImg");
	}
	//修改default_image的值，
	var value = $("img.defaultImg").parent().children("input").val();
	var sa = value.split("\\");
	if (value.indexOf("fakepath") >= 0)
	{
		$("input[name='default_image']").val(sa[2]);
	}
	else
	{
		$("input[name='default_image']").val($("img.defaultImg").prop('id'));
	}

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
  <form enctype="multipart/form-data" action="" method="post" name="theForm" id="form1" onsubmit="processUploadImages()">
  <?php if ($_GET['do']=='edit'){?>
  <input type="hidden" name="do" value="update">
  <?php }?>
   <?php if ($_GET['do']=='add'){?>
  <input type="hidden" name="do" value="insert">
  <?php }?>
  <input type="hidden" name="default_image" value="0">
  <div id="tabs-1">
  	<table>
  		<tr>
  			<td>商品名称:&nbsp;&nbsp;&nbsp;</td>
  			<td><input id="item_name" name="it_name" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['it_name'];?>
"  /><span id="item_nameTip"></span></td>
  		</tr>
  		<tr>
  			<td>商品序列号:&nbsp;&nbsp;&nbsp;</td>
  			<td><input id="item_sn" name="it_sn" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['it_sn'];?>
"  /><span id="item_snTip"></span></td>
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
  			<td><input id="item_price" name="it_price" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['it_price'];?>
" /><span id="item_priceTip"></span></td>
  		</tr>
  		<tr>
  			<td>商品数量:&nbsp;&nbsp;&nbsp;</td>
  			<td><input id="item_quant" name="it_quant" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['it_quant'];?>
" /><span id="item_quantTip"></span></td>
  		</tr>
  		
  	</table>
  </div>
  <div id="tabs-2">
	<textarea name="it_desc" id="myEditor"><?php echo $_smarty_tpl->tpl_vars['item']->value['it_desc'];?>
</textarea>
	<script type="text/javascript">
    	var editor = CKEDITOR.replace( 'it_desc' );
    	CKFinder.setupCKEditor( editor, '../ckfinder/' );
	</script>
  </div>
  <div id="tabs-3">
  	<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
  	<div class="image_frame">
  		<img  id="<?php echo $_smarty_tpl->tpl_vars['image']->value['img_id'];?>
" width="200" height="200" src="<?php echo $_smarty_tpl->tpl_vars['image']->value['stand_url'];?>
" >
  		<input type="file" class="saved_img" name="uploadImages[]" accept="image/gif, image/jpeg, image/png" />
  		<button type="button" name="setDefault" >设为默认</button>
   		<button type="button" name="delImage" >删除图片</button>
  	</div>
  	<?php } ?>
  	<div class="image_frame" id="addImage">
   		<button type="button" name="addImage">添加图片</button>
  	</div>
  	<div class="clear"></div>
  </div>
  <div>
  	<input type="submit" value="确认"/><input type="button" value="重置"/>
  </div>
  </form>
</div>
</div>
</body>
</html><?php }} ?>