<?php /* Smarty version Smarty-3.1.13, created on 2013-08-12 15:27:32
         compiled from "./smarty/templates/top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191161266151de5c0cd95324-19175983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ab9fdad7394bfb98eefba16c4e97bf6e41db87d' => 
    array (
      0 => './smarty/templates/top.tpl',
      1 => 1376320995,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191161266151de5c0cd95324-19175983',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51de5c0cf33ff3_28546479',
  'variables' => 
  array (
    'nav_list' => 0,
    'key' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51de5c0cf33ff3_28546479')) {function content_51de5c0cf33ff3_28546479($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$app_name}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body {
	margin: 0px;
	padding: 0px;
}
.clear {
	clear: both;
}
#header-div {
  background: #278296;
  border-bottom: 1px solid #FFF;
}

#logo-div {
  height: 50px;
  float: left;
  font-size: 12px;
  color: #ddd;
  line-height: 50px;
  margin: 0px 0px 0px 40px;
}
#logo-div strong {
	color: #fff;
	font: 28px bold ;
}

#headmenu-div {
  height: 50px;
}

#headmenu-div ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
  height: 50%;
}

#headmenu-div li {
  float: right;
  padding: 0 10px;
  margin: 3px 0;
  border-left: 1px solid #FFF;
  font: 14px bold;
}

#headmenu-div a:visited, #headmenu-div a:link {
  color: #FFF;
  text-decoration: none;
}

#headmenu-div a:hover {
  color: #F5C29A;

}
#admin_control {
	margin-right:10px;
	text-align: right;
	height:50%;
	font: 14px normal;
}
#admin_control span {
    margin-left:5px;
	border: solid 1px #000;
	background-color: #fff;
	
}
#admin_control a:hover {
	background:#ddd;
	cursor:pointer;
}
#admin_control a:hover {
	color:#fff;
	cursor:pointer;
}

#menu-div {
  background: #80BDCB;
  font:12px bold;
  height: 24px;
  line-height:24px;
}

#menu-div ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

#menu-div li {
  float: left;
  border-right: 1px solid #192E32;
  border-left:1px solid #BBDDE5;
}

#menu-div a:visited, #menu-div a:link {
  display:block;
  padding: 0 20px;
  text-decoration: none;
  color: #335B64;
  background:#9CCBD6;
}

#menu-div a:hover {
  color: #000;
  background:#80BDCB;
}
#headmenu-div a.fix-submenu{ clear:both; margin-left:5px; padding:1px 5px; *padding:3px 5px 5px; background:#DDEEF2; color:#278296; }
#headmenu-div a.fix-submenu:hover{ padding:1px 5px; *padding:3px 5px 5px; background:#FFF; color:#278296; }
#menu-div li.fix-spacel{ width:30px; border-left:none; }
#menu-div li.fix-spacer{ border-right:none; }
</style>
</head>
<body>
<div id="header-div">
  <div id="logo-div"><strong>嘉海</strong>后台管理系统</div>
  <div id="headmenu-div">
    <ul>
      <li><a href="bg.php?do=about_us" target="main-frame">关于我们</a></li>
      <li><a href="#"  onclick="ShowToDoList()">要做的事情</a></li>
      <div class="clear"></div>
    </ul>
    <div id="admin_control">你好！admin<span><a style="color:#000; font-size:14px" href="privilege.php?do=logout" target="_top">退出</a></span></div>
  	<script language="JavaScript">
  		
	</script>
  </div>
  
</div>
<div id="menu-div">
  <ul>
    <li class="fix-spacel">&nbsp;</li>
    <li><a href="index.php?act=main" target="main-frame">起始页</a></li>
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['nav_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" target="main-frame"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</a></li>
    <?php } ?>
    <li class="fix-spacer">&nbsp;</li>
  </ul>
  <br class="clear" />
</div>
</body>
</html><?php }} ?>