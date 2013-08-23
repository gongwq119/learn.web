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
  <{if $smarty.get.do == edit }>
  <input type="hidden" name="do" value="update">
  <{/if}>
   <{if $smarty.get.do == add }>
  <input type="hidden" name="do" value="insert">
  <{/if}>
  <div id="tabs-1">
  	<table>
  		<tr>
  			<td>品牌名称:&nbsp;&nbsp;&nbsp;</td>
  			<td><input type="text" name="brand_name" value="<{$brand.brand_name}>"  /></td>
  		</tr>
  	</table>
  </div>
  <div id="tabs-2">
	<textarea name="brand_desc" id="myEditor"><{$brand.brand_desc}></textarea>
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
</html>