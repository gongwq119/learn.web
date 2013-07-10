<?php
for ($i = 0; $i < 3; $i++) {
	if ($_FILES['upload_file']['error'][$i] > 0) {
		echo "error";
	}
	move_uploaded_file($_FILES['upload_file']['tmp_name'][$i], "../upload/" . $_FILES['upload_file']['name'][$i]);
	echo "成功上传 " . $_FILES['upload_file']['name'][$i];
}