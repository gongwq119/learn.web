<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>嘉海后台</title>
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
 
#msg_frame {
 	border: solid 1px #BBDDE5;
	background: #F4FAFB;
	padding: 10px;
	height: 250px;
	
 }
 #name {
 	margin: 20px;
 	font: normal 18px arial,sans-serif;
 }
 #msg {
 	margin: 20px;
 	font: normal 10px arial,sans-serif;
 }
 #s {
  	color: red;
 }
 #jump:hover{
 	cursor:pointer;
 	color: blue;
 }
</style>
<script language="JavaScript" src="/js/jquery-1.9.1.js"></script>
<script type="text/javascript">
var c=5;
var t;
$(document).ready(function() {
	downCount = function() {
		if (c == 0) {
			window.location.href='http://www.baidu.com/';
		}
		$("#s").text(c);
		c-=1;
		t=setTimeout("downCount()",1000);
	};
	downCount();
	$("#jump").click(function() {
		window.location.href='http://www.baidu.com/';
	});
});

</script>

</head>
<body>
	<div id="w1">
		<div id="msg_frame">
			<div id="name">嘉海电梯配件</div>
			<div id="msg"><span><{$message}></span>，该页面将在<span id="s">5</span>自动<span id="jump">跳转</span>。</div>
		</div>

	</div>
</body>
</html>