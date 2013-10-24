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

//分页参数
$page = 0;
$amount = 12;

//读取brand参数
$brand_id = isset($_REQUEST['bd']) ? intval($_REQUEST['bd']) : '0';

//读取items
$sql_items = 'SELECT i.it_id, i.it_name, i.it_sn, i.it_price, i.it_quant, i.img_id FROM mydb.items AS i 
			  WHERE cat_id=' . $cat_id . ' ' .
			  'AND brand_id=' . $brand_id . ' ';
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

// set breadcurmb
$breadcrumb = array();
$result_cat = $db->getCategory($cat_id);
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

// set cat tree
$cat_tree = array();// key(number)=> val(f:xxx,s:xxx); xxx is array(name:'',url:'')
$idx_cat = 0;
$result_cats = $db->getAllParentCategory();
$cats = array();
for ($i = 0; $i < $result_cats->num_rows; $i++) {
	$cats[$i] = $result_cats->fetch_assoc();
	$tem_cat = array();
	$tem_cat['name'] = $cats[$i]['cat_name'];
	$tem_cat['url'] = 'categories.php?id=' . $cats[$i]['cat_id'];
	$father_cat = $tem_cat;
	// get son cat
	$result_son_cats = $db->getAllSonCategory($cats[$i]['cat_id']);
	$son_cat = array();
	if (isset($result_son_cats)) {
		for ($j = 0; $j < $result_son_cats->num_rows; $j++) {
			$son_cat[$j] = $result_son_cats->fetch_assoc();
			$tem_son_cat = array();
			$tem_son_cat['name'] = $son_cat[$j]['cat_name'];
			$tem_son_cat['url'] = 'categories.php?id=' . $son_cat[$j]['cat_id'];
			$son_cat[$j] = $tem_son_cat;
		}
	}
	$cat_tree[$idx_cat] = array("f"=>$father_cat, "s"=>$son_cat);
	$idx_cat ++;
}

//读取菜单项目
$result = $db->selectAll('navis');
$navis = array();
for ($i = 0; $i < $result->num_rows; $i++) {
	$tem = $result->fetch_assoc();
	$cat_res = 	$db->getCategory($tem['cat_id']);
	$cat_res_tem = $cat_res->fetch_assoc();
	$navis[$i]['name'] = $cat_res_tem['cat_name'];
	$navis[$i]['link'] = 'categories.php?id=' . $cat_res_tem['cat_id'];
}

$smarty->assign('navis', $navis);
$smarty->assign('breadcrumb_top', $breadcrumb_top);
$smarty->assign('breadcrumb', $breadcrumb);
$smarty->assign('cat_tree', $cat_tree);
$smarty->assign('current_cat', $cat_name);
$smarty->assign('items',$items);
$smarty->display(ROOT_PATH . '/smarty/templates/categories.tpl');


