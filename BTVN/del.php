
<?php

require 'connect.php';

$id = $_GET['id'];


$sql = "DELETE FROM student WHERE id = $id";

if (!mysqli_query($conn, $sql)) {
	die('Lỗi Sql: '.mysqli_error($conn));
}

header("Location:select.php")


?>