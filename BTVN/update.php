
<?php

require 'connect.php';

$sql = "UPDATE  `student` SET `email` = 'test@gmail.com'  WHERE `age`= '1997'";

if (!mysqli_query($conn, $sql)) {
	die('Lỗi Sql: '.mysqli_error($conn));
}else{
	echo "File: - Chỉnh sửa thành công";
}
header("Location:select.php");
?>