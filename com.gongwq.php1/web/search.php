<?php

/**
 * 搜索商品程序
 * 
 * 简单利用数据库的查询
 * 
 */
require './includes/init.php';

$_REQUEST['do'] = !empty($_REQUEST['do']) ? trim($_REQUEST['do']) : '';

if ($_REQUEST['do'] == 'advanced_search')
{
	
}
else
{
	
	$_REQUEST['keywords'] = !empty($_REQUEST['keywords']) ? trim($_REQUEST['keywords']) : '';
	
    //初始化搜索条件
	$page = isset($_REQUEST['page']) && intval($_REQUEST['page']) > 0 ? intval($_REQUEST['page']) : 0;
	
	//确定查询条件
	$keywords = 'AND (';;
	if (!empty($_REQUEST['keywords']))
	{
		$arr = array();
		if (stristr($_REQUEST['keywords'], ' AND ') !== false)
		{
			/* 检查关键字中是否有AND，如果存在就是并 */
			$keyword_arr = explode('AND', $_REQUEST['keywords']);
			$operator = " AND ";
		}
		elseif (stristr($_REQUEST['keywords'], ' OR ') !== false)
		{
			/* 检查关键字中是否有OR，如果存在就是或 */
			$keyword_arr = explode('OR', $_REQUEST['keywords']);
			$operator = " OR ";
		}
		elseif (stristr($_REQUEST['keywords'], ' + ') !== false)
		{
			/* 检查关键字中是否有加号，如果存在就是或 */
			$keyword_arr = explode('+', $_REQUEST['keywords']);
			$operator = " OR ";
		}
		else
		{
			/* 检查关键字中是否有空格，如果存在就是并 */
			$keyword_arr = explode(' ', $_REQUEST['keywords']);
			$operator = " AND ";
		}
		foreach ($keyword_arr AS $key => $value)
		{
			if ($key > 0 && $key < count($keyword_arr) && count($keyword_arr) > 1)
			{
				$keywords .= $operator;
			}
			$keywords .= "(it_name LIKE '%$value%' OR keywords LIKE '%$value%')";
				
		}
		$keywords .= ')';
	}
		
	//分页查询
	/* 获得符合条件的商品总数 */
	$amount = 12;
	$sql   = 'SELECT COUNT(*) FROM mydb.items AS i ' .
			'WHERE i.is_delete=0 AND i.is_on_sale=1 ' .
			$keywords;
	$count = $db->getRowNumber($sql);
	
	$max_page = ($count> 0) ? ceil($count / $amount) : 1;
	if ($page > $max_page)
	{
		$page = $max_page;
	}
	/* 查询商品 */
	$sql   = 'SELECT i.it_id, i.it_name, i.it_sn, i.it_price, i.it_quant, i.img_id FROM mydb.items AS i '.
			"WHERE i.is_delete=0 AND i.is_on_sale=1 " .
			$keywords;
	$result_items = $db->selectLimit($sql, $amount, $page);
	/* 处理对应图片*/
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
}

$smarty->assign('count', $count);
$smarty->assign('items',$items);
$smarty->display(ROOT_PATH . '/smarty/templates/search.tpl');
