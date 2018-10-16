<?php

require 'connect.php';


$sql = "SELECT * FROM `student` ";

$result = mysqli_query($conn, $sql);

if(!$result){

	die('Lỗi'. mysqli_error($conn));
}





?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>

<a href="addstudent.php">Thêm</a>
<table border="1" cellspacing="1">
	
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Age</td>
				<td>Email</td>
				<td>Call To Action</td>
			</tr>
		</thead>


		<tbody>
			<?php 
			if (mysqli_num_rows($result) > 0) {

				while ($row = mysqli_fetch_assoc($result)) {

				?>
			
		

			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['age'];?></td>
				<td><?php echo $row['email']; ?></td>
				<td><a href="del.php?id=<?php echo$row['id']; ?>">Xóa</a> | <a href="update.php?id=<?php echo$row['id']; ?>">Sửa thông tin</a></td>
			
			</tr>

				<?php
				}
			}
 		?>
		</tbody>
		
	
</table>
</body>
</html>