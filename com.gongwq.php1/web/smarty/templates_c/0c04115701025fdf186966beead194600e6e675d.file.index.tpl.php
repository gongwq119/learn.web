<?php /* Smarty version Smarty-3.1.13, created on 2013-06-21 08:47:01
         compiled from "../smarty/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154267837651c3cbde087ef3-68510751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c04115701025fdf186966beead194600e6e675d' => 
    array (
      0 => '../smarty/templates/index.tpl',
      1 => 1371797219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154267837651c3cbde087ef3-68510751',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c3cbde11dfd6_73401287',
  'variables' => 
  array (
    'name' => 0,
    'no' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c3cbde11dfd6_73401287')) {function content_51c3cbde11dfd6_73401287($_smarty_tpl) {?><html>
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Smarty</title>
  </head>
  <body>
  	<!-- html 注释 -->
    <p>Hello, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 !<p>
    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['no']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
    	<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
        <?php if ($_smarty_tpl->tpl_vars['key']->value){?>
    	<p>you you you </P>
   		<?php }?>
    <?php } ?>

	<?php if (1){?>
		<p>wo kao</p>
	<?php }?>
  </body>
</html><?php }} ?>