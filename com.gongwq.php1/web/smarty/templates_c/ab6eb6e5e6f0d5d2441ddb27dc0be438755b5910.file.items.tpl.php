<?php /* Smarty version Smarty-3.1.13, created on 2013-07-31 08:46:02
         compiled from "/home/gongwq/site/php1/com.gongwq.php1/web/smarty/templates/items.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99237961751adb9ef2fc6a2-15959580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab6eb6e5e6f0d5d2441ddb27dc0be438755b5910' => 
    array (
      0 => '/home/gongwq/site/php1/com.gongwq.php1/web/smarty/templates/items.tpl',
      1 => 1375253126,
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
    'item_images' => 0,
    'image' => 0,
    'item' => 0,
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
<script type="text/javascript">
$(document).ready(function() {
	/*设置相册*/
	//1,布局li
	//2,设置事件
	<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
	$("#<?php echo $_smarty_tpl->tpl_vars['image']->value['img_id'];?>
").mouseover(function() {
		$("#current_img").attr("src", ".<?php echo $_smarty_tpl->tpl_vars['image']->value['stand_url'];?>
");
	});
	<?php } ?>
	//3,初始化,设置ul长度和位置，设置默认图片
	
});

</script>
</head>
<body>
	<div id="w_all">
	<div id="w1">
		<?php echo $_smarty_tpl->getSubTemplate ("./header.lib.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<div id="w2">
		<?php echo $_smarty_tpl->getSubTemplate ("./navi.lib.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
			<!-- Begin of the item introduction -->
			<div id="item_intro">
				<div id="item_info">
					<div id="item_name"><h1><?php echo $_smarty_tpl->tpl_vars['item']->value['it_name'];?>
</h1><strong>促销信息</strong></div>
					<div id="item_summary">
					<ul>
						<li><div>商品编号&nbsp&nbsp:&nbsp&nbsp</div><div><?php echo $_smarty_tpl->tpl_vars['item']->value['it_sn'];?>
</div></li>
						<li><div>商品价格&nbsp&nbsp:&nbsp&nbsp￥</div><div><?php echo $_smarty_tpl->tpl_vars['item']->value['it_price'];?>
</div></li>
						<li><div>商品库存&nbsp&nbsp:&nbsp&nbsp</div><div><?php echo $_smarty_tpl->tpl_vars['item']->value['it_quant'];?>
</div></li>
					</ul>
					</div>
				</div>
			
				<div id="item_preview">
					<div id='item_image'>
						<img id="current_img" width="350" height="350"alt="" src="./upload/201307/stand/1374467683800549716.jpg" />
					</div>
					<div id="item_image_select">
						<a id="move_left"></a>
						<div id="item_image_select_list">
							<ul>
								<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
								<li>
									<img id="<?php echo $_smarty_tpl->tpl_vars['image']->value['img_id'];?>
" width="50" height="50" alt="" src=".<?php echo $_smarty_tpl->tpl_vars['image']->value['thumb_url'];?>
" />
								</li>
								<?php } ?>
							</ul>
						</div>
						<a id="move_right"></a>
					</div>
				</div>
			</div>
			<!-- End of the item introduction -->
			<div id="main_part">
				<div id="item_main_right">
					<div class="sf_t"><h2>详细描述</h2></div>
					<div class="sf_c"><?php echo $_smarty_tpl->tpl_vars['item']->value['it_desc'];?>
</div>
				</div>
				<div id="item_main_left">
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
				<div class="clear"></div>
			</div>
		</div>
		<!-- End of the container -->
	</div>
	</div>
</body>
</html>
<?php }} ?>