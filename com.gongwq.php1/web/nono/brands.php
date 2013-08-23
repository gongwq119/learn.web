<?php

require(dirname(__FILE__) . '/includes/init.php');

/*------------------------------------------------------ */
//-- 品牌列表
/*------------------------------------------------------ */
if ($_REQUEST['do'] == 'list')
{
	//解析参数，page等，默认值是第一页
	$page = !empty($_GET['page']) ? intval($_GET['page']) : 0;
	$amount = 15;

	//读取数据库
	$sql = 'SELECT * FROM mydb.brands ';
	$page_count = floor($db->getRowNumber($sql)/$amount) + 1;
	$result = $db->selectLimit($sql, $amount, $page);
	$brands = array();
	// $result->num_rows;
	for ($i = 0; $i < $result->num_rows; $i++) {
		$tem = $result->fetch_assoc();
		$brands[$i] = $tem;
	}
	$smarty->assign('title', 'admin page');
	$smarty->assign('brands', $brands);
	$smarty->assign('page', $page);
	$smarty->assign('page_count', $page_count);
	$smarty->display('brands_list.tpl');
}
/*------------------------------------------------------ */
//-- 添加品牌，编辑品牌
/*------------------------------------------------------ */
elseif ($_REQUEST['do'] == 'add' || $_REQUEST['do'] == 'edit')
{
	//初始化变量
	$is_add = $_REQUEST['do'] == 'add';
	if (!$is_add) {
		$brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : '0';
		if ($brand_id == '0') {
			die("没有brand_id");
		}
	}
	
	//检查权限
	
	//新建空品牌信息，或者读取品牌信息
	if ($is_add) {
		$brand = array(
			'brand_name' => '',
			'brand_logo_url' => '',
			'brand_desc' => '',
		);
	}
	else
	{
		$brand = array();
		$result = $db->getBrand($brand_id);
		$tem = $result->fetch_assoc();
		$brand = array(
				'brand_name' => $tem['brand_name'],
				'brand_logo_url' => $tem['brand_logo_url'],
				'brand_desc' => $tem['brand_desc'],
		);
		
	}
	
	//模版赋值
	$smarty->assign('brand', $brand);
	$smarty->display("brands_info.tpl");
} 
/*------------------------------------------------------ */
//-- 插入或更新
/*------------------------------------------------------ */
elseif ($_REQUEST['do'] == 'insert' || $_REQUEST['do'] == 'update')
{
	//初始化
	$is_insert = $_REQUEST['do'] == 'insert';
	
	//准备数据
	$db_brand = array();
	$brand_update_array = array();
	
	$brand_name = !empty($_POST['brand_name']) ? $_POST['brand_name'] : '';
	$brand_desc = !empty($_POST['brand_desc']) ? $_POST['brand_desc'] : '';
	
	//验证字段
	
	if (!$is_insert) {
		if (!isset($_REQUEST['brand_id']))
		{
			die("没有指定brand id");

		}
		$db_brand_result = $db->getBrand($_REQUEST['brand_id']);
		$db_brand = $db_brand_result->fetch_assoc();
		if ($db_brand['brand_name'] != $brand_name)
		{
			$brand_update_array['brand_name'] = $brand_name;
		}
		if ($db_brand['brand_desc'] != $brand_desc)
		{
			$brand_update_array['brand_desc'] = $brand_desc;
		}
	}
	
	//数据入库
	if ($is_insert)
	{
		$brand= array();
		$brand['brand_name'] = $brand_name;
		$brand['brand_desc'] = $brand_desc;
		$db->insertRow('brands', $brand);
	}
	else
	{
		$sql_update = '';
		foreach ($brand_update_array as $key => $value) {
			$sql_update = $sql_update . $key . '=' . "'" . $value . "'" . ', ';
		}
		$sql_update = substr($sql_update, 0, strlen($sql_update)-2);
		$db->updateRow('brands', 'brand_id', $_REQUEST['brand_id'], $sql_update);
	}
	
	//
	$smarty ->assign('message', '您操作成功');
	$smarty -> display("message.tpl");
}
