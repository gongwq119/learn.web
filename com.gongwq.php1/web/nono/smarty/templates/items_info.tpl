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
嘉海配件管理中心->编辑物品
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
  			<td><input type="text" value=""/></td>
  		</tr>
  		<tr>
  			<td>商品价格:&nbsp;&nbsp;&nbsp;</td>
  			<td><input type="text" value="<{$item.price}>" /></td>
  		</tr>
  		<tr>
  			<td>商品序列号:&nbsp;&nbsp;&nbsp;</td>
  			<td><input type="text" /></td>
  		</tr>
  		<tr>
  			<td>商品分类:&nbsp;&nbsp;&nbsp;</td>
  			<td><input type="text" /></td>
  		</tr>
  		<tr>
  			<td>商品品牌:&nbsp;&nbsp;&nbsp;</td>
  			<td><input type="text" /></td>
  		</tr>
  		
  	</table>
  </div>
  <div id="tabs-2">
	<textarea name="后台取值的key" id="myEditor">请添加商品描述</textarea>
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
</html>