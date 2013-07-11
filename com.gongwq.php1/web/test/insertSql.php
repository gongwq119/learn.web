<?php
		$item = array(
				'it_sn' => 'a',
				'it_name' => 'b',
				'price' => 0,
				'it_desc' => 'c',
				'cat_id' => 1,
				'brand_id' => 2,
				'it_quant' => 3
		);
$table = 'items';
$sql = "INSERT INTO " . "mydb." . $table . " ";
$key_string = '(';
$value_string = 'VALUES (';
foreach ($item as $k=>$v) {
	$key_string = $key_string . $k . ", ";
	$value_string = $value_string . $v . ", ";
}
$key_string = substr($key_string, 0, strlen($key_string)-2) . ') ';
$value_string = substr($value_string, 0, strlen($value_string)-2) . ')';
$sql = $sql . $key_string . $value_string;
echo $sql;