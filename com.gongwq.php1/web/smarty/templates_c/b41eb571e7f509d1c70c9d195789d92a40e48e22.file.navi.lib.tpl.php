<?php /* Smarty version Smarty-3.1.13, created on 2013-10-14 15:36:24
         compiled from "/home/gongwq/site/php1/com.gongwq.php1/web/smarty/templates/navi.lib.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24510632051b29b8af02cd6-40556677%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b41eb571e7f509d1c70c9d195789d92a40e48e22' => 
    array (
      0 => '/home/gongwq/site/php1/com.gongwq.php1/web/smarty/templates/navi.lib.tpl',
      1 => 1381757782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24510632051b29b8af02cd6-40556677',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b29b8af05349_34388548',
  'variables' => 
  array (
    'navis' => 0,
    'navi' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b29b8af05349_34388548')) {function content_51b29b8af05349_34388548($_smarty_tpl) {?><!-- Begin of the navigation -->
		<div class="navigation">
			<ul class="menu">
				<li>
					<a href="index.php" class="menu" style="width : 84px"><h3>首页</h3></a>
				</li>
				<?php  $_smarty_tpl->tpl_vars['navi'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['navi']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['navis']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['navi']->key => $_smarty_tpl->tpl_vars['navi']->value){
$_smarty_tpl->tpl_vars['navi']->_loop = true;
?>
				<li>
					<a href="<?php echo $_smarty_tpl->tpl_vars['navi']->value['link'];?>
" class="menu" style="width : 84px"><h3><?php echo $_smarty_tpl->tpl_vars['navi']->value['name'];?>
</h3></a>
				</li>				
				<?php } ?>
				<li>
					<a class="menu" style="width : 84px"><h3>更多</h3></a>
				</li>
			</ul>
		</div>
		<!-- End of the navigation --><?php }} ?>