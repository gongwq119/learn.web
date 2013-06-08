<?php /* Smarty version Smarty-3.1.13, created on 2013-06-08 08:53:41
         compiled from "/home/gongwq/site/php1/com.gongwq.php1/web/smarty/templates/items.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99237961751adb9ef2fc6a2-15959580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab6eb6e5e6f0d5d2441ddb27dc0be438755b5910' => 
    array (
      0 => '/home/gongwq/site/php1/com.gongwq.php1/web/smarty/templates/items.tpl',
      1 => 1370674419,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99237961751adb9ef2fc6a2-15959580',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51adb9ef33aed3_32214295',
  'variables' => 
  array (
    'item_name' => 0,
    'item_sn' => 0,
    'item_price' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51adb9ef33aed3_32214295')) {function content_51adb9ef33aed3_32214295($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HHH</title>
<link href="css/mainpage.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="/js/jquery-1.9.1.js"></script>
</head>
<body>
	<div class="homepage">
		<?php echo $_smarty_tpl->getSubTemplate ("./header.lib.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ("./navi.lib.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
					<div class="item_name"><h1><?php echo $_smarty_tpl->tpl_vars['item_name']->value;?>
</h1></div>
					<div class="item_summary">
					<ul>
						<li><div>商品编号: </div><div><?php echo $_smarty_tpl->tpl_vars['item_sn']->value;?>
</div></li>
						<li><p>商品价格: ￥</p><p><?php echo $_smarty_tpl->tpl_vars['item_price']->value;?>
</p></li>
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
<?php }} ?>