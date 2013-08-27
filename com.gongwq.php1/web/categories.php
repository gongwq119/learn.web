<?php
/**
 * 分类页面 入口
 */
// if (!defined('FROM_INDEX', TRUE)) {
// 	die('Hacking attemp');
// }
//

require './includes/init.php';

//URL参数id
if (isset($_REQUEST['id']))
{
    $cat_id = intval($_REQUEST['id']);
}
elseif (isset($_REQUEST['category']))
{
    $cat_id = intval($_REQUEST['category']);
}
elseif (isset($_REQUEST['cat_id']))
{
	$cat_id = intval($_REQUEST['cat_id']);
}

if (!isset($cat_id)) {
	@header("http/1.1 404 not found");
	@header("status: 404 not found");
	echo '当前页面不存在，请返回...';//直接输出页面错误信息
	exit();
}


//默认参数
$page = 0;
$amount = 12;

//读取items
$sql_items = 'SELECT i.it_id, i.it_name, i.it_sn, i.it_price, i.it_quant, i.img_id FROM mydb.items AS i WHERE cat_id=' . $cat_id . ' ';
$result_items = $db->selectLimit($sql_items, $amount, $page);
$items = array();
for ($i = 0; $i < $result_items->num_rows; $i++) {
	$tem = $result_items->fetch_assoc();
	$items[$i] = $tem;
	if (isset($tem['img_id'])) {
		$result_images = $db->getAllItemImages($tem['img_id']);
		$tem_image = $result_images->fetch_assoc();
		//如果图片，就默认图片
		if (empty($tem_image)) {
			$items[$i]['img_stand_url'] = './image/default_stand_item.png';
		}
		else 
		{
			$items[$i]['img_stand_url'] = $tem_image['stand_url'];
		}
		
	}
}

//读取categories
$result_cats = $db->selectAll("categories",'cat_id', 'cat_name');
$cats = array();
for ($i = 0; $i < $result_cats->num_rows; $i++) {
	$tem = $result_cats->fetch_assoc();
	$cats[$i] = $tem;
}

// $smarty->assign('cats',$cats);
$smarty->assign('items',$items);
$smarty->display(ROOT_PATH . '/smarty/templates/categories.tpl');


?>