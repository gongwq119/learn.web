<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<script type="text/javascript" src="../ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../ueditor/ueditor.all.js"></script>
<script language="JavaScript" src="../js/formValidator-4.0.1.min.js"></script>
<script language="JavaScript" src="../js/formValidatorRegex.js"></script>
<script type="text/javascript">
var maxImageQuant = 3;
var imageQuant = 0;
imageQuant = <{$images|count}>;
var item_id = '0';
<{if $smarty.get.do == edit }>
item_id = '<{$smarty.get.item_id}>'
<{/if}>

$(function() {
    $( "#tabs" ).tabs();
  });

$(document).ready(function() {
	//初始化cat,brand值
	$("select[name='cat_id']").val(<{$item.cat_id}>);
	$("select[name='brand_id']").val(<{$item.brand_id}>);
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
	$("img#<{$item.img_id}>").addClass("defaultImg");
	$("input[name='default_image']").val(<{$item.img_id}>);
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
  <{if $smarty.get.do == edit }>
  <input type="hidden" name="do" value="update">
  <{/if}>
   <{if $smarty.get.do == add }>
  <input type="hidden" name="do" value="insert">
  <{/if}>
  <input type="hidden" name="default_image" value="0">
  <div id="tabs-1">
  	<table>
  		<tr>
  			<td>商品名称:&nbsp;&nbsp;&nbsp;</td>
  			<td><input id="item_name" name="it_name" type="text" value="<{$item.it_name}>"  /><span id="item_nameTip"></span></td>
  		</tr>
  		<tr>
  			<td>商品序列号:&nbsp;&nbsp;&nbsp;</td>
  			<td><input id="item_sn" name="it_sn" type="text" value="<{$item.it_sn}>"  /><span id="item_snTip"></span></td>
  		</tr>
  		<tr>
  			<td>商品分类:&nbsp;&nbsp;&nbsp;</td>
  			<td>
	  		<select name="cat_id">
	  			<{foreach $cats as $cat}>
				<option value="<{$cat.cat_id}>"><{$cat.cat_name}></option>
				<{/foreach}>
			</select>
  			</td>
  		</tr>
  		<tr>
  			<td>商品品牌:&nbsp;&nbsp;&nbsp;</td>
  			<td>
  			<select name="brand_id">
				<{foreach $brands as $brand}>
				<option value="<{$brand.brand_id}>"><{$brand.brand_name}></option>
				<{/foreach}>
			</select>
  			</td>
  		</tr>
  		<tr>
  			<td>商品价格:&nbsp;&nbsp;&nbsp;</td>
  			<td><input id="item_price" name="it_price" type="text" value="<{$item.it_price}>" /><span id="item_priceTip"></span></td>
  		</tr>
  		<tr>
  			<td>商品数量:&nbsp;&nbsp;&nbsp;</td>
  			<td><input id="item_quant" name="it_quant" type="text" value="<{$item.it_quant}>" /><span id="item_quantTip"></span></td>
  		</tr>
  		
  	</table>
  </div>
  <div id="tabs-2">
	<textarea name="it_desc" id="myEditor"><{$item.it_desc}></textarea>
	<script type="text/javascript">
	    var editor = new UE.ui.Editor();
	    editor.render("myEditor");
	</script>
  </div>
  <div id="tabs-3">
  	<{foreach $images as $image}>
  	<div class="image_frame">
  		<img  id="<{$image.img_id}>" width="200" height="200" src="<{$image.stand_url}>" >
  		<input type="file" class="saved_img" name="uploadImages[]" accept="image/gif, image/jpeg, image/png" />
  		<button type="button" name="setDefault" >设为默认</button>
   		<button type="button" name="delImage" >删除图片</button>
  	</div>
  	<{/foreach}>
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
</html>