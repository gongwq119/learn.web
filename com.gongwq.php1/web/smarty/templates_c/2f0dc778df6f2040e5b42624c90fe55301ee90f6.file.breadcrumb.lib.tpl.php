<?php /* Smarty version Smarty-3.1.13, created on 2013-08-27 10:04:12
         compiled from "/Users/wenqianggong/git/learn.web/com.gongwq.php1/web/smarty/templates/breadcrumb.lib.tpl" */ ?>
<?php /*%%SmartyHeaderCode:361786766521c799c6d5a44-07443499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f0dc778df6f2040e5b42624c90fe55301ee90f6' => 
    array (
      0 => '/Users/wenqianggong/git/learn.web/com.gongwq.php1/web/smarty/templates/breadcrumb.lib.tpl',
      1 => 1377597815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '361786766521c799c6d5a44-07443499',
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
  'unifunc' => 'content_521c799c712502_90845561',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521c799c712502_90845561')) {function content_521c799c712502_90845561($_smarty_tpl) {?>			<!-- Begin of the breadcrumb -->
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