<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><{$none}></title>
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
	<{foreach $items as $item}>
	<tr>
		<td><input type="checkbox" name="select"></td>
		<td class="<{$item.it_id}>"><{$item.it_name}></td>
		<td><{$item.it_sn}></td>
		<td><{$item.it_price}></td>
		<td><{$item.it_quant}></td>
	</tr>
	<{/foreach}>
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
</html>