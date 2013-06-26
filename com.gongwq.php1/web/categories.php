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
else
{
    ecs_header("Location: ./\n");

    exit;
}
//默认参数
$page = 0;
$amount = 10;

//初始化分页参数
$page = isset($_REQUEST['page'])   && intval($_REQUEST['page'])  > 0 ? intval($_REQUEST['page'])  : 0;
// $size = isset($_CFG['page_size'])  && intval($_CFG['page_size']) > 0 ? intval($_CFG['page_size']) : 10;
$brand = isset($_REQUEST['brand']) && intval($_REQUEST['brand']) > 0 ? intval($_REQUEST['brand']) : 0;
$price_max = isset($_REQUEST['price_max']) && intval($_REQUEST['price_max']) > 0 ? intval($_REQUEST['price_max']) : 0;
$price_min = isset($_REQUEST['price_min']) && intval($_REQUEST['price_min']) > 0 ? intval($_REQUEST['price_min']) : 0;
// $filter_attr_str = isset($_REQUEST['filter_attr']) ? trim($_REQUEST['filter_attr']) : '0';
// $filter_attr = empty($filter_attr_str) ? '' : explode('.', trim($filter_attr_str));

//处理流程
$sql = 'SELECT i.id, i.name, i.price, i.description FROM mydb.items AS i ';
$result = $db->selectLimit($sql, $amount, $page);
// $result->num_rows;
for ($i = 0; $i < $result->num_rows; $i++) {
	$tem = $result->fetch_assoc();
	$name[$i] = $tem['name'];
}

$smarty->assign('items',$name);
$smarty->display(ROOT_PATH . '/smarty/templates/categories.tpl');


?>