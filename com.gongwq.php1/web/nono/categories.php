<?php

require(dirname(__FILE__) . '/includes/init.php');

/*------------------------------------------------------ */
//-- 分类列表
/*------------------------------------------------------ */
if ($_REQUEST['do'] == 'list')
{
	//解析参数，page等，默认值是第一页
	$page = !empty($_GET['page']) ? intval($_GET['page']) : 0;
	$amount = 15;

	//读取数据库
	$sql = 'SELECT c.cat_id, c.cat_name, c.parent_id FROM mydb.categories AS c';
	$page_count = floor($db->getRowNumber($sql)/$amount) + 1;
	$result = $db->selectLimit($sql, $amount, $page);
	$cats = array();
	// $result->num_rows;
	for ($i = 0; $i < $result->num_rows; $i++) {
		$tem = $result->fetch_assoc();
		$cats[$i] = $tem;
	}
	$smarty->assign('title', 'admin page');
	$smarty->assign('cats', $cats);
	$smarty->assign('page', $page);
	$smarty->assign('page_count', $page_count);
	$smarty->display('categories_list.tpl');
}
/*------------------------------------------------------ */
//-- 添加分类，编辑分类
/*------------------------------------------------------ */
elseif ($_REQUEST['do'] == 'add' || $_REQUEST['do'] == 'edit')
{
	//初始化变量
	$is_add = $_REQUEST['do'] == 'add';
	if (!$is_add) {
		$cat_id = isset($_GET['cat_id']) ? $_GET['cat_id'] : '0';
		if ($cat_id == '0') {
			die("没有cat_id");
		}
	}

	//检查权限
	
	//读取所有非子分类
	$parent_cats = array();
	$result = $db->getAllParentCategory();
	for ($i = 0; $i < $result->num_rows; $i++) {
		$tem = $result->fetch_assoc();
		$parent_cats[$i] = $tem;
	}
	array_push($parent_cats, array('cat_id'=>'0', 'cat_name'=>'顶级分类'));

	
	//新建空分类商品信息，或者读取分类信息
	if ($is_add) {
		$cat = array(
			'cat_name' => '',
			'keywords' => '',
			'cat_desc' => '',
			'parent_id'=> 0,
			'show_in_nav' => 0,
			'is_show' => 1,
		);
	}
	else
	{
		$cat = array();
		$result = $db->getCategory($cat_id);
		$tem = $result->fetch_assoc();
		$cat = array(
				'cat_name' => $tem['cat_name'],
				'keywords' => $tem['keywords'],
				'cat_desc' => $tem['cat_desc'],
				'parent_id'=> $tem['parent_id'],
				'show_in_nav' => $tem['show_in_nav'],
				'is_show' => $tem['is_show'],
		);
		
	}
	
	//模版赋值
	$smarty->assign('parent_cats', $parent_cats);
	$smarty->assign('cat', $cat);
	$smarty->display("categories_info.tpl");
} 
/*------------------------------------------------------ */
//-- 插入或更新
/*------------------------------------------------------ */
elseif ($_REQUEST['do'] == 'insert' || $_REQUEST['do'] == 'update')
{
	//初始化
	$is_insert = $_REQUEST['do'] == 'insert';
	
	//准备数据
	$db_cat = array();
	$cat_update_array = array();
	
	$cat_name = !empty($_POST['cat_name']) ? $_POST['cat_name'] : '';
	$keywords = !empty($_POST['keywords']) ? $_POST['keywords'] : '';
	$cat_desc = !empty($_POST['cat_desc']) ? $_POST['cat_desc'] : '';
	$parent_id = !empty($_POST['parent_id']) ? $_POST['parent_id'] : '0';
	$show_in_nav = !empty($_POST['show_in_nav']) ? $_POST['show_in_nav'] : 0;
	$is_show = !empty($_POST['$is_show']) ? $_POST['$is_show'] : 1;
	
	//验证字段
	
	if (!$is_insert) {
		if (!isset($_REQUEST['cat_id']))
		{
			die("没有指定cat id");

		}
		$db_cat_result = $db->getCategory($_REQUEST['cat_id']);
		$db_cat = $db_cat_result->fetch_assoc();
		if ($db_cat['cat_name'] != $cat_name)
		{
			$cat_update_array['cat_name'] = $cat_name;
		}
		if ($db_cat['keywords'] != $keywords)
		{
			$cat_update_array['keywords'] = $keywords;
		}
		if ($db_cat['cat_desc'] != $cat_desc)
		{
			$cat_update_array['cat_desc'] = $cat_desc;
		}
		if ($db_cat['parent_id'] != $parent_id)
		{
			$cat_update_array['parent_id'] = $parent_id;
		}
		if ($db_cat['show_in_nav'] != $show_in_nav)
		{
			$cat_update_array['show_in_nav'] = $show_in_nav;
		}
		if ($db_cat['is_show'] != $is_show)
		{
			$cat_update_array['is_show'] = $is_show;
		}
	}
	
	//数据入库
	if ($is_insert)
	{
		$category = array();
		$category['cat_name'] = $cat_name;
		$category['keywords'] = $keywords;
		$category['cat_desc'] = $cat_desc;
		$category['parent_id'] = $parent_id;
		$category['show_in_nav'] = $show_in_nav;
		$category['is_show'] = $is_show;
		$db->insertRow('categories', $category);
	}
	else
	{
		$sql_update = '';
		foreach ($cat_update_array as $key => $value) {
			$sql_update = $sql_update . $key . '=' . "'" . $value . "'" . ', ';
		}
		$sql_update = substr($sql_update, 0, strlen($sql_update)-2);
		$db->updateRow('categories', 'cat_id', $_REQUEST['cat_id'], $sql_update);
	}
	
	//
	$smarty ->assign('message', '您操作成功');
	$smarty -> display("message.tpl");
}
