<?php

require 'connect.php';



$name = "Tung";

$age = "2000";

$email = "tung@gmail.com";





$sql = "INSERT INTO `student` ( `name`, `age` , `email`) VALUES ( '$name', '$age', '$email')";



if(!mysqli_query($conn, $sql)){

		die('Lỗi sql:'. mysqli_error($conn));

}
echo 'Thêm thành công';

header("Location:select.php");

?>

