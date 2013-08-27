<?php
/**
 * 物品页面 入口
 */
// if (!defined('FROM_INDEX', TRUE)) {
// 	die('Hacking attemp');
// }

require './includes/init.php';

//URL参数id

if (isset($_REQUEST['id']))
{
	$item_id = intval($_REQUEST['id']);
}
elseif (isset($_REQUEST['item']))
{
	$item_id = intval($_REQUEST['item']);
}
elseif (isset($_REQUEST['it_id']))
{
	$item_id = intval($_REQUEST['it_id']);
}
//$item_id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;

if (!isset($item_id)) {
	@header("http/1.1 404 not found");
	@header("status: 404 not found");
	echo '当前页面不存在，请返回...';//直接输出页面错误信息
	exit();
}

//read from db
$result = $db->getItem($item_id);
$item = $result->fetch_assoc();
//read all images by it_id
$result_image = $db->getItemImages($item_id);
$item_images = array();
for ($i = 0; $i < $result_image->num_rows; $i++) {
	$tem = $result_image->fetch_assoc();
	$item_images[$i] = $tem;
}
if ($result_image->num_rows == 0) 
{
	$item_images[0]['img_id'] = 0;
	$item_images[0]['it_id'] = $item_id;
	$item_images[0]['stand_url'] = '/image/default_stand_item.png';
	$item_images[0]['large_url'] = '/image/default_large_item.png';
	$item_images[0]['thumb_url'] = '/image/default_thumb_item.png';
	$item['img_id'] = 0;
}

// set breadcurmb
$breadcrumb = array();
$result_cat = $db->getCategory($item['cat_id']);
$cat = $result_cat->fetch_assoc();
$cat_id = $cat['cat_id'];
$cat_name = $cat['cat_name'];
if ($cat['parent_id'] != 0) {
	$breadcrumb[0] = array('name'=>$cat_name, 'url'=>"categories.php?id=$cat_id");
	$result_cat = $db->getCategory($cat['parent_id']);
	$cat = $result_cat->fetch_assoc();
	$cat_id = $cat['cat_id'];
	$cat_name = $cat['cat_name'];
}
$breadcrumb_top = array('name'=>$cat_name, 'url'=>"categories.php?id=$cat_id");
$breadcrumb[1] = array('name'=>$item['it_name'], 'url'=>'');;

//配置smarty,并输出
$smarty->assign('breadcrumb_top', $breadcrumb_top);
$smarty->assign('breadcrumb', $breadcrumb);
$smarty->assign('item', $item);
$smarty->assign('item_images', $item_images);

$smarty->display(ROOT_PATH . '/smarty/templates/items.tpl');
