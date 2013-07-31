<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$app_name}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body {
	margin: 0px;
	padding: 0px;
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

#loading-div {
  clear: right;
  text-align: right;
  display: block;
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
    </ul>
  </div>
</div>
<div id="menu-div">
  <ul>
    <li class="fix-spacel">&nbsp;</li>
    <li><a href="index.php?act=main" target="main-frame">起始页</a></li>
    <{foreach $nav_list as $key=>$value}>
    <li><a href="<{$key}>" target="main-frame"><{$value}></a></li>
    <{/foreach}>
    <li class="fix-spacer">&nbsp;</li>
  </ul>
  <br class="clear" />
</div>
</body>
</html>