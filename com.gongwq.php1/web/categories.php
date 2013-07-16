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

//没有id的时候，默认为cat_id=1


//默认参数
$page = 0;
$amount = 12;

//读取items
$sql_items = 'SELECT i.it_id, i.it_name, i.it_sn, i.it_price, i.it_quant FROM mydb.items AS i ';
$result_items = $db->selectLimit($sql_items, $amount, $page);
$items = array();
for ($i = 0; $i < $result_items->num_rows; $i++) {
	$tem = $result_items->fetch_assoc();
	$items[$i] = $tem;
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