<?php /* Smarty version Smarty-3.1.13, created on 2013-08-27 16:43:19
         compiled from "/home/gongwq/site/php1/com.gongwq.php1/web/smarty/templates/breadcrumb.lib.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2404379521cbb07cdd755-57070730%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ff07aea8f91feef501b47ec590803cb509af482' => 
    array (
      0 => '/home/gongwq/site/php1/com.gongwq.php1/web/smarty/templates/breadcrumb.lib.tpl',
      1 => 1377614587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2404379521cbb07cdd755-57070730',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'breadcrumb_top' => 0,
    'breadcrumb' => 0,
    'bd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_521cbb07d16fd3_65606700',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521cbb07d16fd3_65606700')) {function content_521cbb07d16fd3_65606700($_smarty_tpl) {?>			<!-- Begin of the breadcrumb -->
			<div id="breadcrumb">
				<strong><a href="<?php echo $_smarty_tpl->tpl_vars['breadcrumb_top']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['breadcrumb_top']->value['name'];?>
</a></strong>
				<span>
					<?php  $_smarty_tpl->tpl_vars['bd'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bd']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bd']->key => $_smarty_tpl->tpl_vars['bd']->value){
$_smarty_tpl->tpl_vars['bd']->_loop = true;
?>
						 &nbsp;&gt;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['bd']->value['url'];?>
" ><?php echo $_smarty_tpl->tpl_vars['bd']->value['name'];?>
</a>
					<?php } ?>
				</span>
			</div>
			<!-- End of the breadcrumb--><?php }} ?>