<?php /* Smarty version Smarty-3.1.13, created on 2013-06-26 11:09:40
         compiled from "/home/gongwq/site/php1/com.gongwq.php1/web/smarty/templates/categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17505272151adb5f0062c55-14954276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac10833537ced480b2d299969938f412e9969be5' => 
    array (
      0 => '/home/gongwq/site/php1/com.gongwq.php1/web/smarty/templates/categories.tpl',
      1 => 1370394133,
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
<?php if ($_valid && !is_callable('content_51adb5f00be614_80945455')) {function content_51adb5f00be614_80945455($_smarty_tpl) {?><html>
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Smarty</title>
  </head>
  <body>
  	
  	<!-- html 注释 -->
  	<h1>Hello, World!</h1>
  	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
  	<ul>
  		<li><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</li>
  	</ul>
  	<?php } ?>
  </body>
</html><?php }} ?>