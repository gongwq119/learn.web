<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>陕西嘉海电梯配件销售有限公司</title>
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
	$(".exp_btn").click(function() {
		var son = $(this).parent().parent().find(".son");
		if (son.is(":visible")) {
			son.hide();
			$(this).css("background", "url(/image/s_btn.png) no-repeat -21px 0");
		} else {
			son.show();
			$(this).css("background", "url(/image/s_btn.png) no-repeat -37px 0");
		}
	});
	// hide all and show current cat 
	$(".exp_btn").click();
	$("a[name='<{$current_cat}>']").parent().find(".exp_btn").click();
});
</script>
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
			<{include file="./breadcrumb.lib.tpl"}>
			<div id="w_cat_left">
			<!-- Begin of the category tree -->
				<div id="cat_tree">
					<{foreach $cat_tree as $cat_single}>
					<div class="cat_tree_item">
						<div class="father"><div class="exp_btn"></div><a name="<{$cat_single.f.name}>" href="<{$cat_single.f.url}>"><{$cat_single.f.name}></a></div>
						<{foreach $cat_single.s as $s}>
						<div class="son"><a href="<{$s.url}>"><{$s.name}></a></div>
						<{/foreach}>
					</div>
					<{/foreach}>
				</div>
			<!-- End of the category tree -->
			</div>
			
			<div id="w_cat_right">
				<!-- Begin of the category filter -->
				<div id="cat_filter">
					<div class="sf_t">分类筛选</div>
					<div class="sf_c">
						<div id="filter_left" align="right">品牌:&nbsp&nbsp&nbsp&nbsp</div>
						<div id="filter_right">
							<div id="filter_ops"><a>abc</a></div>
							<div id="filter_ops"><a>abc</a></div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- End of the category filter -->
				<!-- Begin of the category list menu -->
				<div id="cat_list_menu">
					<div id="sort_opt">排序：
						<span id="cl_qt">点击量</span>
						<span id="pc">价格</span>
					</div>
					<div id="sk_pg">库存：
						<span id="all_sk">显示全部</span>
						<span id="only_in_sk">仅显示有现货</span>
					</div>
				</div>
				<!-- End of the category list menu -->
				<!-- Begin of the categories list -->
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
				<!-- End of the categories list -->
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
