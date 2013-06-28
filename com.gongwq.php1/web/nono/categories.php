<?php

require(dirname(__FILE__) . '/includes/init.php');

/*------------------------------------------------------ */
//-- 商品列表，商品回收站
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
