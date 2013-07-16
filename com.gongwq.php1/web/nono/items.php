<?php

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . '/includes/cls_image.php');

$imageUtil = new cls_image('#FFFFFF');
$it_db_name = 'items';
$cat_db_name = 'categories';
$brand_db_name = 'brands';


/*------------------------------------------------------ */
//-- 商品列表，商品回收站
/*------------------------------------------------------ */

if ($_REQUEST['do'] == 'list' || $_REQUEST['do'] == 'trash')
{
	//解析参数，page等，默认值是第一页
	$page = !empty($_GET['page']) ? intval($_GET['page']) : 0;
	$amount = 15;
	
	//读取数据库
	$sql = 'SELECT i.it_id, i.it_name, i.it_sn, i.it_price, i.it_quant FROM mydb.items AS i ';
	$page_count = floor($db->getRowNumber($sql)/$amount) + 1;
	$page_sta = ($page + 1) . '/' . $page_count;
	$result = $db->selectLimit($sql, $amount, $page * $amount);
	$page_count = $result->num_rows;
	$items = array();
	// $result->num_rows;
	for ($i = 0; $i < $result->num_rows; $i++) {
		$tem = $result->fetch_assoc();
		$items[$i] = $tem;
	}
	$smarty->assign('title', 'admin page');
	$smarty->assign('items', $items);
	$smarty->assign('page_sta', $page_sta);
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
	
	//读取商品类别，商品品牌列表
	$cat_array = array();
	$result = $db->selectAll($cat_db_name, 'cat_id', 'cat_name');
	for ($i = 0; $i < $result->num_rows; $i++) {
		$tem = $result->fetch_assoc();
		$cat_array[$i] = $tem;
	}
	array_push($cat_array, array('cat_id'=>'0', 'cat_name'=>'未选择'));
	
	$brand_array = array();
	$result = $db->selectAll($brand_db_name, 'brand_id', 'brand_name');
	for ($i = 0; $i < $result->num_rows; $i++) {
		$tem = $result->fetch_assoc();
		$brand_array[$i] = $tem;
	}
	array_push($brand_array, array('brand_id'=>'0', 'brand_name'=>'未选择'));
	
	//新建空商品信息，或者读取商品信息
	if ($is_add)
	{
		$item = array(
				'it_sn' => '',
				'it_name' => '',
				'it_price' => 0,
				'it_desc' => '请编辑商品描述',
				'cat_id' => 0,
				'brand_id' => 0,
				'it_quant' => 0
		);
	}
	else
	{
		$item = array();
		$result = $db->getItem($_GET['item_id']);
		$tem = $result->fetch_assoc();
		$item = array(
				'it_sn' => $tem['it_sn'],
				'it_name' => $tem['it_name'],
				'it_price' => $tem['it_price'],
				'it_desc' => $tem['it_desc'],
				'cat_id' => $tem['cat_id'],
				'brand_id' => $tem['brand_id'],
				'it_quant' => $tem['it_quant']
		);
	}
	
	//模版赋值
	$smarty->assign('cats',$cat_array);
	$smarty->assign('brands',$brand_array);
	$smarty->assign('item', $item);
	$smarty->display("items_info.tpl");
}

//处理插入或者更新动作
elseif ($_REQUEST['do'] == 'insert' || $_REQUEST['do'] == 'update')
{
	//验证字段
	
	//准备数据
	$it_sn = !empty($_POST['it_sn']) ? $_POST['it_sn'] : '0';
	$it_name = !empty($_POST['it_name']) ? $_POST['it_name'] : '0';
	$it_price = !empty($_POST['it_price']) ? $_POST['it_price'] : '0';
	$it_desc = !empty($_POST['it_desc']) ? $_POST['it_desc'] : '0';
	$cat_id = !empty($_POST['cat_id']) ? $_POST['cat_id'] : 0;
	$brand_id = !empty($_POST['$brand_id']) ? $_POST['$brand_id'] : 0;
	$click_count = 0;
	$it_quant = !empty($_POST['$it_quant']) ? $_POST['$it_quant'] : 0;
	
	
	//处理图片
	$num_image = sizeof($_FILES['uploadImages']['name']);
	if (empty($_FILES['uploadImages']['name'][0]))
	{
		$num_image = 0;
	}
	$img_stand_path =array();
	$img_thumb_path =array();
	$img_large_path =array();
	if (isset($_FILES['uploadImages'])) {
		for ($i = 0; $i < $num_image; $i++) {
			if ($_FILES['uploadImages']['error'][$i] > 0) {
				die("上传图片错误");
			}
			//修改标准尺寸，并上传，
			if (($img_res = $imageUtil->make_image($_FILES['uploadImages']['tmp_name'][$i], 
					$imageUtil::$stand_size, $imageUtil::$stand_size)) != false) {
				;
			}
			$img_stand_path[$i] = $imageUtil->upload_image_source($img_res, 'stand');
			//修改小尺寸尺寸，并上传，总共三总尺寸
			if (($img_res = $imageUtil->make_image($_FILES['uploadImages']['tmp_name'][$i],
					$imageUtil::$thumb_size, $imageUtil::$thumb_size)) != false) {
				;
			}
			$img_thumb_path[$i] = $imageUtil->upload_image_source($img_res, 'thumb');
			//修改大尺寸，并上传，总共三总尺寸
			if (($img_res = $imageUtil->make_image($_FILES['uploadImages']['tmp_name'][$i],
					$imageUtil::$large_size, $imageUtil::$large_size)) != false) {
				;
			}
			$img_large_path[$i] = $imageUtil->upload_image_source($img_res, 'large');
		}
	}
	
	//插入数据库
	$items = array();
	$items['it_sn'] = $it_sn;
	$items['it_name'] = $it_name;
	$items['it_price'] = $it_price;
	$items['it_desc'] = $it_desc;
	$items['cat_id'] = $cat_id;
	$items['brand_id'] = $brand_id;
	$items['click_count'] = $click_count;
	$items['it_quant'] = $it_quant;
	$item_id = $db->insertRow("items", $items);
	
	for ($i = 0; $i < $num_image; $i++) {
		$items_images = array();
		$items_images['it_id'] = $item_id;
		$items_images['stand_url'] = $img_stand_path[$i];
		$items_images['thumb_url'] = $img_thumb_path[$i];
		$items_images['large_url'] = $img_large_path[$i];
		$db->insertRow("items_images", $items_images);
	}
	
	
	$smarty -> display("ok.tpl");
}
