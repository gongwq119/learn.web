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
	$result = $db->selectLimit($sql, $amount, $page * $amount);
	$items = array();
	// $result->num_rows;
	for ($i = 0; $i < $result->num_rows; $i++) {
		$tem = $result->fetch_assoc();
		$items[$i] = $tem;
	}
	$smarty->assign('title', 'admin page');
	$smarty->assign('items', $items);
	$smarty->assign('page', $page);
	$smarty->assign('page_count', $page_count);
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
				'it_quant' => 0,
				'img_id' => 0
		);
		$images = array();
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
				'it_quant' => $tem['it_quant'],
				'img_id' => $tem['img_id']
		);
		$images = array();
		$result_image = $db->getItemImages($tem['it_id']);
		for ($i = 0; $i < $result_image->num_rows; $i++) {
			$tem = $result_image->fetch_assoc();
			$images[$i] = $tem;
		}
	}
	
	//模版赋值
	$smarty->assign('cats',$cat_array);
	$smarty->assign('brands',$brand_array);
	$smarty->assign('item', $item);
	$smarty->assign('images', $images);
	$smarty->display("items_info.tpl");
}

//处理插入或者更新动作(不管是insert还是update,都先处理图片)
elseif ($_REQUEST['do'] == 'insert' || $_REQUEST['do'] == 'update')
{
	//初始化
	$is_insert = $_REQUEST['do'] == 'insert';
	//验证字段
	
	//准备数据
	$db_item = array();
	$item_update_array = array();
	
	$it_sn = !empty($_POST['it_sn']) ? $_POST['it_sn'] : '0';
	$it_name = !empty($_POST['it_name']) ? $_POST['it_name'] : '0';
	$it_price = !empty($_POST['it_price']) ? $_POST['it_price'] : '0';
	$it_desc = !empty($_POST['it_desc']) ? $_POST['it_desc'] : '0';
	$cat_id = !empty($_POST['cat_id']) ? $_POST['cat_id'] : 0;
	$brand_id = !empty($_POST['brand_id']) ? $_POST['brand_id'] : 0;
	$click_count = 0;
	$it_quant = !empty($_POST['it_quant']) ? $_POST['it_quant'] : 0;
	$default_img = !empty($_POST['default_image']) ? $_POST['default_image'] : 0;
	
	if (!$is_insert)
	{
		if (isset($_REQUEST['item_id']))
		{
			$db_item_result = $db->getItem($_REQUEST['item_id']);
			$db_item = $db_item_result->fetch_assoc();
		} 
		else
		{
			die("没有指定item id");
		}
		$default_img = !empty($_POST['default_img']) ? $_POST['default_img'] : 0;
		if ($db_item['it_sn'] != $it_sn)
		{
			$item_update_array['it_sn'] = $it_sn;
		}
		if ($db_item['it_name'] != $it_name)
		{
			$item_update_array['it_name'] = $it_name;
		}
		if ($db_item['it_price'] != $it_price)
		{
			$item_update_array['it_price'] = $it_price;
		}
		if ($db_item['it_desc'] != $it_desc)
		{
			$item_update_array['it_desc'] = $it_desc;
		}
		if ($db_item['cat_id'] != $cat_id)
		{
			$item_update_array['cat_id'] = $cat_id;
		}
		if ($db_item['brand_id'] != $brand_id)
		{
			$item_update_array['brand_id'] = $brand_id;
		}
		if ($db_item['it_quant'] != $it_quant)
		{
			$item_update_array['it_quant'] = $it_quant;
		}
		if ($db_item['default_img'] != $default_img)
		{
			$item_update_array['default_img'] = $it_quant;
		}
		
	}
	
	
	//删除图片
	if (!empty($_POST['deleted_image']))
	{
		//找出图片的路径，删除本地图片
		//删除数据库记录
	}
	
	//判断是否指定了默认图片
	$find_default_img_in_unuploaded = false;
	$sql_find_img = "SELECT * FROM items_images WHERE img_id='" . $_POST['default_image'] . "'";
	if ($db->getRowNumber($sql_find_img) == 0)
	{
		$find_default_img_in_unuploaded = true;
	}
	
	//处理图片，并上传
	$num_image = 0;
	if (isset($_FILES['uploadImages'])) 
	{
		$num_image = sizeof($_FILES['uploadImages']['name']);
	}
	$acc_num_image = $num_image;
	if (isset($_FILES['uploadImages'])) {
		$img_stand_path = array();
		$img_thumb_path = array();
		$img_large_path = array();
		
		for ($i = 0; $i < $num_image; $i++) {
			if ($_FILES['uploadImages']['error'][$i] = 4 ) {
				$acc_num_image --;
				continue;
			}			
			if ($_FILES['uploadImages']['error'][$i] > 0 ) {
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
			if ($find_default_img_in_unuploaded && $_FILES['uploadImages']['name'][$i] == $_POST['default_image'])
			{
				$default_img_stand_url = $img_stand_path[$i];
			}
		}

	}

	//数据入库
	if ($is_insert)
	{
		$items = array();
		$items['it_sn'] = $it_sn;
		$items['it_name'] = $it_name;
		$items['it_price'] = $it_price;
		$items['it_desc'] = $it_desc;
		$items['cat_id'] = $cat_id;
		$items['brand_id'] = $brand_id;
		$items['click_count'] = $click_count;
		$items['it_quant'] = $it_quant;
		$items['img_id'] = $default_img;
		$item_id = $db->insertRow("items", $items);
	}
	else
	{
		$sql_update = '';
		foreach ($item_update_array as $key => $value) {
			$sql_update = $sql_update . $key . '=' . $value . ', ';
		}
		$sql_update = substr($sql_update, 0, strlen($sql_update)-2);
		$db->updateRow('items', 'it_name', $_REQUEST['item_id'], $sql_update);
	}

	
	//图片入库
	if ($is_insert)
	{
		for ($i = 0; $i < $acc_num_image; $i++) {
			$items_images = array();
			$items_images['it_id'] = $item_id;
			$items_images['stand_url'] = $img_stand_path[$i];
			$items_images['thumb_url'] = $img_thumb_path[$i];
			$items_images['large_url'] = $img_large_path[$i];
			$insert_id = $db->insertRow("items_images", $items_images);
			if ($default_img_stand_url == $img_stand_path[$i])
			{
				$default_img = $insert_id;
			}
		}
	}
	else 
	{
		
	}


	//更新默认image
	if ($default_img != 0) 
	{
		$sql_img = 'img_id=' . $default_img;
		$db->updateRow('items', 'it_id', $item_id, $sql_img);
	}

	$smarty -> display("ok.tpl");
}
