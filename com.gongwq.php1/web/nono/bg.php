<?php

/**
 * 后台管理起点
 * 
 */

require(dirname(__FILE__) . '/includes/init.php');


/*------------------------------------------------------ */
//-- 框架
/*------------------------------------------------------ */
if ($_REQUEST['do'] == '')
{
	$smarty->assign('hello','hello world');
    $smarty->display('index.tpl');
}

/*------------------------------------------------------ */
//-- 顶部框架的内容
/*------------------------------------------------------ */
elseif ($_REQUEST['do'] == 'top')
{
	$nav_list = array();
	$nav_list['/items.php?do=list'] = '商品列表';
	$smarty->assign('nav_list', $nav_list);
	$smarty->display('top.tpl');
}


/*------------------------------------------------------ */
//-- 左边的框架
/*------------------------------------------------------ */
elseif ($_REQUEST['do'] == 'menu')
{
	//载入tree菜单，并整理格式
	include_once('includes/inc_menu.php');
	foreach ($modules AS $key => $value)
	{
		ksort($modules[$key]);
	}
	ksort($modules);
	
	foreach ($modules AS $key => $val)
	{
		$menus[$key]['label'] = $_LANG[$key];
		if (!is_array($val)) {
			$menus[$key]['action'] = $val;
		}
		else {
			foreach ($val AS $k => $v)
			{
				$menus[$key]['children'][$k]['label']  = $_LANG[$k];
				$menus[$key]['children'][$k]['action'] = $v;
			}
		}
		
		// 如果children的子元素长度为0则删除该组
		if(empty($menus[$key]['children']))
		{
			unset($menus[$key]);
		}
		
	}
	
    $smarty->assign('menus',     $menus);
    $smarty->assign('no_help',   '暂时还没有该部分内容');
    $smarty->assign('help_lang', 'zh_cn');
    $smarty->assign('charset', 'utf8');
    $smarty->assign('admin_id', $_SESSION['admin_id']);
    $smarty->display('menu.tpl');}


/*------------------------------------------------------ */
//-- 主窗口，起始页
/*------------------------------------------------------ */
elseif ($_REQUEST['do'] == 'main')
{
	header("Location: http://{$host_name}/nono/items.php?do=list");
}

/*------------------------------------------------------ */
//-- 拖动的帧
/*------------------------------------------------------ */

elseif ($_REQUEST['do'] == 'drag')
{
    $smarty->display('drag.tpl');;
}

?>
