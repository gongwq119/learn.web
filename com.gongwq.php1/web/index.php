<?php
require '../controller/demoContr.php';
echo 'hello world';
echo '<br/>';
$demoController = new demoContr();
$demoController->index();
