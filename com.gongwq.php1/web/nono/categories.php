<?php

require(dirname(__FILE__) . '/includes/init.php');

/*------------------------------------------------------ */
//-- 分类列表
/*------------------------------------------------------ */
if ($_REQUEST['do'] == 'list' || $_REQUEST['do'] == 'trash')
{
	//解析参数，page等，默认值是第一页
	$page = 0;
	$amount = 10;

	//读取数据库
	// 	$count = $db->getRowNumber($sql_sta);
	$sql = 'SELECT c.cat_id, c.cat_name, c.parent_id FROM mydb.categories AS c ';
	$result = $db->selectLimit($sql, $amount, $page);
	$cats = array();
	// $result->num_rows;
	for ($i = 0; $i < $result->num_rows; $i++) {
		$tem = $result->fetch_assoc();
		$cats[$i] = $tem;
	}
	$smarty->assign('title', 'admin page');
	$smarty->assign('cats', $cats);
	$smarty->display('categories_list.tpl');
}
/*------------------------------------------------------ */
//-- 添加分类，编辑分类
/*------------------------------------------------------ */
elseif ($_REQUEST['do'] == 'add' || $_REQUEST['do'] == 'edit')
{
	//初始化变量
	$is_add = $_REQUEST['do'] == 'add';
	
	//检查权限
	
	//读取所有非子分类
	
	//新建空分类商品信息，或者读取分类信息
	if ($is_add) {
		$cat = array(
			'cat_name' => '',
			'keywords' => '',
			'cat_desc' => '',
			'parent_id'=> 0,
			'show_in_nav' => 0,
			'is_show' => 0,
		);
	}
	else
	{
		$cat = array();
// 		$db->selectAll($table)
	}
	
	//模版赋值
	$smarty->assign('item', $item);
	$smarty->display("items_info.tpl");
	
} 
