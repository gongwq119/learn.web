<?php

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . '/includes/cls_image.php');

$imageUtil = new cls_image('#FFFFFF');

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
	$sql = 'SELECT i.id, i.name, i.sn, i.price, i.quantity FROM mydb.items AS i ';
	$result = $db->selectLimit($sql, $amount, $page);
	$items = array();
	// $result->num_rows;
	for ($i = 0; $i < $result->num_rows; $i++) {
		$tem = $result->fetch_assoc();
		$items[$i] = $tem;
	}
	$smarty->assign('title', 'admin page');
	$smarty->assign('items', $items);
	$smarty->display('items_list.tpl');
}

/*------------------------------------------------------ */
//-- 添加新商品 编辑商品
/*------------------------------------------------------ */

//添加或者编辑页面
elseif ($_REQUEST['do'] == 'add' || $_REQUEST['do'] == 'edit' || $_REQUEST['do'] == 'copy')
{
	//初始化变量
	$is_add = $_REQUEST['do'] == 'add';
	
	//检查权限
	
	//读取商品信息
	if ($is_add)
	{
		$item = array(
				'sn' => '',
				'name' => '',
				'price' => 0,
				'description' => '',
				'cat_id' => 0,
				'brand_id' => 0,
				'quantity' => 0
		);
	}
	
	//模版赋值
	$smarty -> assign('item', $item);
	$smarty -> display("items_info.tpl");
	
}

//处理插入或者更新动作
elseif ($_REQUEST['do'] == 'insert' || $_REQUEST['do'] == 'update')
{
	//验证字段
	
	//处理图片
	$max_images = 3;
	//处理标准图片，略缩图片
	//上传图片
	if (isset($_FILES['uploadImages'])) {
		for ($i = 0; $i < $max_images; $i++) {
			if ($_FILES['uploadImages']['error'][$i] > 0) {
				die("上传图片错误");
			}
		}
	}
	$imageUtil->upload_image($_FILES['uploadImages']);
	//插入数据库
	
	$smarty -> display("ok.tpl");
	

}
