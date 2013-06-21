<?php /* Smarty version Smarty-3.1.13, created on 2013-06-21 05:53:19
         compiled from "../smarty/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154267837651c3cbde087ef3-68510751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c04115701025fdf186966beead194600e6e675d' => 
    array (
      0 => '../smarty/templates/index.tpl',
      1 => 1371786779,
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
    <?php if ($_smarty_tpl->tpl_vars['no']->value){?>
    	<p>you you you </P>
    <?php }?>
  </body>
</html><?php }} ?>