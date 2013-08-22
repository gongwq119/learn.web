<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HHH</title>
<link href="css/mainpage.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="/js/jquery-1.9.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".image").mouseover(function() {
		$(this).css("border", "solid 1px #ddd");
	});
	$(".image").mouseleave(function() {
		$(this).css("border", "solid 1px #fff");
	});
	$(".explode").click(function() {
		$(this).parent().find(".son").toggle();
	});
});
</script>
<style type="text/css">
#w_serh_rest_left{
	float: left;
}
#w_serh_rest_right{
	float:right;
}
.filter_left{
	float: left;
	width: 199px;
	height:40px;
	line-height:40px;
}
.filter_right{
	float: right;
	width: 539px;
	line-height:40px;
}
#farther_ul{
	margin:0px;
	padding:0px;
}
#farther_ul li{
	text-align: left;
}
#farther_ul li:hover{
	cursor: pointer;
}
.farther_li {
	background-color: #f7f7f7;
	border: 1px solid #ddd;
	line-height: 30px;
	font-size: 15px;
}
.farther_li ul{
	background-color: #fff;
	border: 0px;
}
.clear{
	clear:both;
}
.filter_ops{
	width: 80px;
	height:40px;
	float:left;
}
.filter_ops a:hover{
	cursor: pointer;
}

.cat_tree {
	margin: 10px 0px 0px 0px;
	height: 500px;
	width: 200px;
	float:left;
}
#search_reminder {
	margin: 10px 0px 0px 0px;
	width: 740px;
}
#rest_menu {
	margin: 10px 0px 0px 0px;
	width: 740px;
	background-color: #f7f7f7;
	border: 1px solid #ddd;
}
#item_list {
	margin: 10px 0px 0px 0px;
	width: 740px;
}
#item{
	float: left;
	margin: 10px;
}
#item_list ul{
	padding: 0px;
}
.image {
	border: solid 1px #ffffff;
}
</style>
</head>
<body>
	<div id="w_all">
	<div id="w1">
		<{include file="./header.lib.tpl"}>
	</div>
	<div id="w2">
		<{include file="./navi.lib.tpl"}>
	</div>
	<div id="w3">
		<!-- Begin of the container -->
		<div class="container">
			<!-- Begin of the breadcurmb -->
			<div class="breadcurmb">
				<div class="bd_content">
					<strong>主板系列</strong>
					<span>&nbsp;&gt;&nbsp;<a href="http://localhost" >控制主板</a>
						  &nbsp;&gt;&nbsp;<a href="http://localhost" >蓝光Bl2000</a>
					</span>
				</div>
			</div>
			<!-- End of the breadcurmb-->
			<div id="w_serh_rest_left">
			<!-- Begin of the category tree -->
				<div class="cat_tree">
					<ul id="farther_ul">
						<li class="farther_li">
						<span class="explode">父级菜单一</span>
						<ul>
							<li class="son"><a href="http://localhost/items.php">子菜单一</a></li>
							<li class="son"><a href="">子菜单一</a></li>
						</ul>
						</li>
						<li class="farther_li">
						<span class="explode">父级菜单一</span>
						<ul>
							<li class="son"><a href="http://localhost/items.php">子菜单一</a></li>
							<li class="son"><a href="">子菜单一</a></li>
						</ul>
						</li>
					</ul>
				</div>
			<!-- End of the category tree -->
			</div>
			
			<div id="w_serh_rest_right">
				<!-- Begin of the search reminder -->
				<div id="search_reminder">
					<div class="sf_t"><h2>搜索结果</h2></div>
					<div class="sf_c">
						关键字搜索，结果<{$count}>项
					</div>
				</div>
				<!-- End of the search reminder -->
				<!-- Begin of the menu for result -->
				<div id="rest_menu">
					list menu
				</div>
				<!-- End of the menu for result -->
				<!-- Begin of the result list -->
				<div id="item_list">
					<ul>
						<{foreach $items as $item}>
						<li id="item">
							<div class="image"><a href="items.php?id=<{$item.it_id}>"><img width="220" height="220" src="<{$item.img_stand_url}>"></a></div>
							<div class="name"><{$item.it_name}></div>
							<div class="price">嘉海价格&nbsp;&nbsp:&nbsp;&nbsp￥<{$item.it_price}></div>
							<div class="storage">当前库存&nbsp;&nbsp:&nbsp;&nbsp<{$item.it_quant}></div>
							<div class="buttons"><a href="items.php?id=<{$item.it_id}>"><button>物品详情</button></a><a><button>立刻购买</button></a></div>
						</li>
						<{/foreach}>
					</ul>
				</div>
				<!-- End of the result list -->
			</div>
			<div class="clear"></div>
		</div>	
		<!-- End of the container -->
	</div>
	<div id="w4">
		<{include file="./links.lib.tpl"}>
	</div>
	<div id="w5">
		<{include file="./footer.lib.tpl"}>
	</div>
	</div>
</body>
</html>
