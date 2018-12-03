<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location: index.php');
}
if(isset($_POST['logout'])){
session_destroy();
header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
<?php echo $_SESSION['username'] ?>
<form method="POST">
	<input type="submit" value="logout" name="logout">
</form>
</body>
</html>