<?php

require(dirname(__FILE__) . '/includes/init.php');

/*------------------------------------------------------ */
//-- 主页 菜单项目列表
/*------------------------------------------------------ */

if ($_REQUEST['do'] == 'list')
{
	//读取数据库
	$result = $db->selectAll('navis');
	$navis = array();
	// $result->num_rows;
	for ($i = 0; $i < $result->num_rows; $i++) {
		$tem = $result->fetch_assoc();
		$cat_res = 	$db->getCategory($tem['cat_id']);
		$cat_res_tem = $cat_res->fetch_assoc();
		$navis[$i]['navi_id'] = $tem['navi_id'];
		$navis[$i]['cat_id'] = $cat_res_tem['cat_id'];
		$navis[$i]['cat_name'] = $cat_res_tem['cat_name'];
	}

	//显示
	$smarty->assign('title', 'admin page');
	$smarty->assign('navis', $navis);
	$smarty->display('menu_navis_list.tpl');
	
}
/*------------------------------------------------------ */
//-- 主页 新建或编辑菜单项目
/*------------------------------------------------------ */
elseif ($_REQUEST['do'] == 'add' || $_REQUEST['do'] == 'edit')
{
	//参数
	
}
