<?php /* Smarty version Smarty-3.1.13, created on 2013-08-28 04:56:20
         compiled from "/home/gongwq/site/php1/com.gongwq.php1/web/smarty/templates/categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17505272151adb5f0062c55-14954276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac10833537ced480b2d299969938f412e9969be5' => 
    array (
      0 => '/home/gongwq/site/php1/com.gongwq.php1/web/smarty/templates/categories.tpl',
      1 => 1377658562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17505272151adb5f0062c55-14954276',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51adb5f00be614_80945455',
  'variables' => 
  array (
    'items' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51adb5f00be614_80945455')) {function content_51adb5f00be614_80945455($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
	$(".explode").click(function() {
		$(this).parent().find(".son").toggle();
	});
});
</script>
<style type="text/css">
#w_cat_left{
	float: left;
}
#w_cat_right{
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
#cat_filter {
	margin: 10px 0px 0px 0px;
	width: 740px;
}
#cat_list_menu {
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
		<?php echo $_smarty_tpl->getSubTemplate ("./header.lib.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<div id="w2">
		<?php echo $_smarty_tpl->getSubTemplate ("./navi.lib.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<div id="w3">
		<!-- Begin of the container -->
		<div class="container">
			<?php echo $_smarty_tpl->getSubTemplate ("./breadcrumb.lib.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="w_cat_left">
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
			
			<div id="w_cat_right">
				<!-- Begin of the category filter -->
				<div id="cat_filter">
					<div class="sf_t">分类筛选</div>
					<div class="sf_c">
						<div class="filter_left" align="right">品牌:  </div>
						<div class="filter_right">
							<div class="filter_ops"><a>abc</a></div>
							<div class="filter_ops"><a>abc</a></div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- End of the category filter -->
				<!-- Begin of the category list menu -->
				<div id="cat_list_menu">
					list menu
				</div>
				<!-- End of the category list menu -->
				<!-- Begin of the categories list -->
				<div id="item_list">
					<ul>
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
						<li id="item">
							<div class="image"><a href="items.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['it_id'];?>
"><img width="220" height="220" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['img_stand_url'];?>
"></a></div>
							<div class="name"><?php echo $_smarty_tpl->tpl_vars['item']->value['it_name'];?>
</div>
							<div class="price">嘉海价格&nbsp;&nbsp:&nbsp;&nbsp￥<?php echo $_smarty_tpl->tpl_vars['item']->value['it_price'];?>
</div>
							<div class="storage">当前库存&nbsp;&nbsp:&nbsp;&nbsp<?php echo $_smarty_tpl->tpl_vars['item']->value['it_quant'];?>
</div>
							<div class="buttons"><a href="items.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['it_id'];?>
"><button>物品详情</button></a><a><button>立刻购买</button></a></div>
						</li>
						<?php } ?>
					</ul>
				</div>
				<!-- End of the categories list -->
			</div>
			<div class="clear"></div>
		</div>	
		<!-- End of the container -->
	</div>
	<div id="w4">
		<?php echo $_smarty_tpl->getSubTemplate ("./links.lib.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<div id="w5">
		<?php echo $_smarty_tpl->getSubTemplate ("./footer.lib.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	</div>
</body>
</html>
<?php }} ?>