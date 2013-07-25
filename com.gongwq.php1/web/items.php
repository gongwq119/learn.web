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

//配置smarty,并输出
$smarty->assign('item', $item);
$smarty->assign('item_images', $item_images);


$smarty->display(ROOT_PATH . '/smarty/templates/items.tpl');

?>



