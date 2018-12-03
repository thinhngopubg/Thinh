<?php include "../controllers/functions.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>view</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
	<label>Login</label>
	<input type="text" name="username">
	<input type="password" name="password">
	<input type="submit" value="login" name="login">
	<?php login() ?>
</form><br>
<form method="POST" enctype="multipart/form-data">
	<label>add</label>
	<input type="text" name="username">
	<input type="password" name="password">
	<input type="file" name="image">
	<input type="submit" value="add" name="add">
	<?php add() ?>
</form><br>
<form method="POST" enctype="multipart/form-data">
	<label>edit</label>
	<select name="id">
		<?php all(); ?>
	</select>
	<input type="text" name="username">
	<input type="password" name="password">
	<input type="file" name="image">
	<input type="submit" value="edit" name="edit">
	<?php edit() ?>
</form><br>
<form method="POST" enctype="multipart/form-data">
	<label>del</label>
	<select name="id">
		<?php all(); ?>
	</select>
	<input type="submit" value="del" name="del">
	<?php del() ?>
</form><br>

<table cellpadding="15"><tr><td>ID</td><td>username</td><td>password</td><td>image</td><td>edit/delete</td></tr>
	<?php
	$query = "SELECT * FROM listusers";
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_array($result)){
		$id = $row['id'];
		$username = $row['username'];
		$password = $row['password'];
		$image = $row['image'];
	?>
	<tr>
		<td><?php echo $id ?></td>
		<td><?php echo $username ?></td>
		<td><?php echo $password ?></td>
		<td><img width="100" src="<?php echo $image ?>"></td>
		<td>
			<form method="POST">
				<input type="checkbox" checked="" hidden="" name="id" value="<?php echo $id ?>">
				<input type="submit" value="del" name="del">
				<?php del() ?>
			</form>
		</td>
	</tr>
<?php } ?>
</table>
</body>
</html>