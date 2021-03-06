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
	if ($_REQUEST['do'] == 'list') {
		$sql .= 'WHERE i.is_delete=0 AND i.is_on_sale=1 ';
	} elseif ($_REQUEST['do'] == 'trash') {
		$sql .= 'WHERE i.is_delete=1 ';
	}
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
	if ($_REQUEST['do'] == 'list') {
		$smarty->display('items_list.tpl');
	} elseif ($_REQUEST['do'] == 'trash') {
		$smarty->display('items_trash_list.tpl');
	}
}

/*------------------------------------------------------ */
//-- 添加新商品 编辑商品
/*------------------------------------------------------ */

//添加或者编辑页面
elseif ($_REQUEST['do'] == 'add' || $_REQUEST['do'] == 'edit' || $_REQUEST['do'] == 'copy')
{
	//初始化变量
	$is_add = $_REQUEST['do'] == 'add';
	if (!$is_add) {
		$item_id = isset($_GET['item_id']) ? $_GET['item_id'] : '0';
		if ($item_id == '0') {
			die("没有item_id");
		}
	}

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
				'img_id' => 0,
				'is_delete' => 0,
				'is_on_sale' => 1
		);
		$images = array();
	}
	else
	{
		$item = array();
		$result = $db->getItem($item_id);
		$tem = $result->fetch_assoc();
		$item = array(
				'it_sn' => $tem['it_sn'],
				'it_name' => $tem['it_name'],
				'it_price' => $tem['it_price'],
				'it_desc' => $tem['it_desc'],
				'cat_id' => $tem['cat_id'],
				'brand_id' => $tem['brand_id'],
				'it_quant' => $tem['it_quant'],
				'img_id' => $tem['img_id'],
				'is_delete' => $tem['is_delete'],
				'is_on_sale' => $tem['is_on_sale']
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
		$default_img = !empty($_POST['default_image']) ? $_POST['default_image'] : 0;
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
		if ($db_item['img_id'] != $default_img)
		{
			$item_update_array['img_id'] = $default_img;
		}
		
	}
	
	//删除图片,遍历所有删除图片，如果数据库内的存在就删除掉
	if (isset($_POST['deleted_image']))
	{
		$del_size = sizeof($_POST['deleted_image']);
		//找出图片的路径，删除本地图片
		for ($i = 0; $i < $del_size; $i++) {
			$result_it_img = $db->getAllItemImages($_POST['deleted_image'][$i]);
			if (0 != $result_it_img->num_rows) 
			{
				$it_img = $result_it_img->fetch_assoc();
				//删除本地图片
				delLocalImage($it_img['stand_url']);
				delLocalImage($it_img['thumb_url']);
				delLocalImage($it_img['large_url']);
				//删除数据库记录
				$db->delRow('items_images', 'img_id', $_POST['deleted_image'][$i]);
			}
		}
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
			if ($_FILES['uploadImages']['error'][$i] == 4 ) {
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
			array_push($img_stand_path, $imageUtil->upload_image_source($img_res, 'stand'));
			//修改小尺寸尺寸，并上传
			if (($img_res = $imageUtil->make_image($_FILES['uploadImages']['tmp_name'][$i],
					$imageUtil::$thumb_size, $imageUtil::$thumb_size)) != false) {
				;
			}
			array_push($img_thumb_path, $imageUtil->upload_image_source($img_res, 'thumb'));
			//修改大尺寸，并上传
			if (($img_res = $imageUtil->make_image($_FILES['uploadImages']['tmp_name'][$i],
					$imageUtil::$large_size, $imageUtil::$large_size)) != false) {
				;
			}
			array_push($img_large_path, $imageUtil->upload_image_source($img_res, 'large'));
			if ($find_default_img_in_unuploaded && $_FILES['uploadImages']['name'][$i] == $_POST['default_image'])
			{
				$default_img_stand_url = end($img_stand_path);
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
			$sql_update = $sql_update . $key . '=' . "'" . $value . "'" . ', ';
		}
		$sql_update = substr($sql_update, 0, strlen($sql_update)-2);
		$db->updateRow('items', 'it_id', $_REQUEST['item_id'], $sql_update);
	}

	
	//图片入库
	for ($i = 0; $i < $acc_num_image; $i++) {
		$items_images = array();
		$items_images['it_id'] = $is_insert ? $item_id : $_REQUEST['item_id'];
		$items_images['stand_url'] = $img_stand_path[$i];
		$items_images['thumb_url'] = $img_thumb_path[$i];
		$items_images['large_url'] = $img_large_path[$i];
		$insert_id = $db->insertRow("items_images", $items_images);
		if (isset($default_img_stand_url) && $default_img_stand_url == $img_stand_path[$i])
		{
			$default_img = $insert_id;
		}
	}

	//更新默认image
	if ($default_img != 0)
	{
		$sql_img = 'img_id=' . $default_img;
		$it_id = $is_insert ? $item_id : $_REQUEST['item_id'];
		$db->updateRow('items', 'it_id', $it_id, $sql_img);
	}

	$smarty ->assign('message', '您操作成功');
	$smarty -> display("message.tpl");
}
elseif ($_REQUEST['do'] == 'remove')
{
	//获得参数
	$del_item_id = isset($_GET['item_id']) ? $_GET['item_id'] : '0';
	if ($del_item_id == '0') {
		die("删除参数错误");
	}
	$del_items = explode(",",$del_item_id);
	$db->removeItem($del_items);
	
	$smarty ->assign('message', '您已经将商品移到回收站');
	$smarty -> display("message.tpl");
}
elseif ($_REQUEST['do'] == 'delete')
{
	echo "目前彻底删除在没完成";
}
elseif ($_REQUEST['do'] == 'restore')
{
	//获得参数
	$ret_item_id = isset($_GET['item_id']) ? $_GET['item_id'] : '0';
	if ($ret_item_id == '0') {
		die("删除参数错误");
	}
	$ret_items = explode(",",$ret_item_id);
	$db->restoreItem($ret_items);

	$smarty ->assign('message', '您已经将商品还原');
	$smarty -> display("message.tpl");
}


function delLocalImage($file) {
	$filepath = ROOT_PATH . $file;
	if (file_exists($filepath))
	{
		return @unlink($filepath);
	}
}
