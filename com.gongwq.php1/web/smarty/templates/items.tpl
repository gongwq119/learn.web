<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>陕西嘉海电梯配件销售有限公司</title>
<link href="css/mainpage.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="/js/jquery-1.9.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	/*设置相册*/
	//1,布局li
	//2,设置事件,设置默认图片
	<{foreach $item_images as $image}>
	$("#<{$image.img_id}>").mouseover(function() {
		$("#current_img").attr("src", ".<{$image.stand_url}>");
	});
	if (<{$item.img_id}> == <{$image.img_id}>) {
		$("#current_img").attr("src", ".<{$image.stand_url}>");
	}
	<{/foreach}>
	//3,初始化,设置ul长度和位置
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
			<!-- Begin of the item introduction -->
			<div id="item_intro">
				<div id="item_info">
					<div id="item_name"><h1><{$item.it_name}></h1><strong>促销信息</strong></div>
					<div id="item_summary">
					<ul>
						<li><div>商品编号&nbsp&nbsp:&nbsp&nbsp</div><div><{$item.it_sn}></div></li>
						<li><div>商品价格&nbsp&nbsp:&nbsp&nbsp￥</div><div><{$item.it_price}></div></li>
						<li><div>商品库存&nbsp&nbsp:&nbsp&nbsp</div><div><{$item.it_quant}></div></li>
					</ul>
					</div>
				</div>
			
				<div id="item_preview">
					<div id='item_image'>
						<img id="current_img" width="350" height="350"alt="" src="" />
					</div>
					<div id="item_image_select">
						<a id="move_left"></a>
						<div id="item_image_select_list">
							<ul>
								<{foreach $item_images as $image}>
								<li>
									<img id="<{$image.img_id}>" width="50" height="50" alt="" src=".<{$image.thumb_url}>" />
								</li>
								<{/foreach}>
							</ul>
						</div>
						<a id="move_right"></a>
					</div>
				</div>
			</div>
			<!-- End of the item introduction -->
			<div id="main_part">
				<div id="item_main_right">
					<div class="sf_t">详细描述</div>
					<div class="sf_c"><{$item.it_desc}></div>
				</div>
				<div id="item_main_left">
					<div id="related_sort">
						<div class="sf_t">相关分类</div>
						<div class="sf_c">
							<ul>
								<li>电梯主板</li>
								<li>按钮系列</li>
								<li>电器系列</li>
								<li>轮系列</li>
								<li>导靴靴衬</li>
							</ul>
						</div>
					</div>
					<div class="other_brand">
						<div class="sf_t">其他品牌</div>
						<div class="sf_c">
							<ul>
								<li>三菱</li>
								<li>OTIS</li>
								<li>通力</li>
								<li>讯达</li>
								<li>富士达</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
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
