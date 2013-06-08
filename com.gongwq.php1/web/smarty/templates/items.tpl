<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HHH</title>
<link href="css/mainpage.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="/js/jquery-1.9.1.js"></script>
</head>
<body>
	<div class="homepage">
		<{include file="./header.lib.tpl"}>
		<{include file="./navi.lib.tpl"}>
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
			<!-- Begin of the item introduction -->
			<div class="item_intro">
				<div class="item_info">
					<div class="item_name"><h1><{$item_name}></h1></div>
					<div class="item_summary">
					<ul>
						<li><div>商品编号: </div><div><{$item_sn}></div></li>
						<li><p>商品价格: ￥</p><p><{$item_price}></p></li>
					</ul>
					</div>
				</div>
				<div class="item_preview">
				</div>
			</div>
			<!-- End of the item introduction -->
			<div class="main_part">
				<div class="main_right">
					<div class="sf_t"><h2>详细描述</h2></div>
					<div class="sf_c">...</div>
				</div>
				<div class="main_left">
					<div class="related_sort">
						<div class="sf_t"><h2>相关分类</h2></div>
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
						<div class="sf_t"><h2>其他品牌</h2></div>
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
			</div>
		</div>
		<!-- End of the container -->

		<!-- Begin of the links -->
		<div class="links">
		</div>
		<!-- End of the links -->
		
		<!-- Begin of the footer -->
		<div class="footer">
		</div>
		<!-- End of the footer -->
	</div>
</body>
</html>
