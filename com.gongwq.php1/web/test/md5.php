<?php
$result = "no input";
if (isset($_POST['input_string'])) {
	$result = md5($_POST['input_string']);
}
echo $result;
