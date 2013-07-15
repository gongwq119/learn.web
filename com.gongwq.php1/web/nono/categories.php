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
		$result = $db->getCategory($_GET['cat_id']);
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
//处理插入或者更新动作
elseif ($_REQUEST['do'] == 'insert' || $_REQUEST['do'] == 'update')
{
	//验证字段
	
	//准备数据
	$cat_name = !empty($_POST['cat_name']) ? $_POST['cat_name'] : '';
	$keywords = !empty($_POST['keywords']) ? $_POST['keywords'] : '';
	$cat_desc = !empty($_POST['cat_desc']) ? $_POST['cat_desc'] : '';
	$parent_id = !empty($_POST['parent_id']) ? $_POST['parent_id'] : '0';
	$show_in_nav = !empty($_POST['show_in_nav']) ? $_POST['show_in_nav'] : 0;
	$is_show = !empty($_POST['$is_show']) ? $_POST['$is_show'] : 1;
	
	//插入数据库
	$category = array();
	$category['cat_name'] = $cat_name;
	$category['keywords'] = $keywords;
	$category['cat_desc'] = $cat_desc;
	$category['parent_id'] = $parent_id;
	$category['show_in_nav'] = $show_in_nav;
	$category['is_show'] = $is_show;
	$db->insertRow('categories', $category);
	
	//
	$smarty -> display("ok.tpl");
}
