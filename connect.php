<?php


$db = array(
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname' => 'array'
);


//Tạo kết nối
$conn = mysqli_connect($db['server'], $db['username'], $db['password'], $db['dbname']);


//Kiểm tra kết nối

if (!$conn) {
	die("Kết nối thất bại" . mysqli_connect_error());
}
echo 'CSDL: - Kết nối thành công<br/>';


?>