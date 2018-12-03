<?php include "../model/config.php" ?>
<?php
function login() {
	session_start();
	global $connection;
	error_reporting(0);
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];


		$query = "SELECT * FROM listuser WHERE username = '$username' and password = '$password'";

		$result = mysqli_query($connection, $query);
		if(!$result){
			die('QUERY FAILED !'. mysqli_error($connection));
		}
		while($row = mysqli_fetch_array($result)){
			$db_username = $row['username'];
			$db_password = $row['password'];
		}
		if($username !== $db_username || $password !== $db_password){
			echo "Login Failed !";
		}else if($username == $db_username & $password == $db_password){
			$_SESSION['username'] = $db_username;
			header('Location: Dashboard.php');
		}
		else{
			die('QUERY FAILED !'. mysqli_error($connection));
		}
	}
}
function add() {
	global $connection;
	if(isset($_POST['add'])){
		$username = $_POST['username'];
		if($_POST['username'] == ""){
			echo "Username cannot blank !";
		}
		$password = $_POST['password'];
		$target = "../images/".basename($_FILES['image']['name']);
		$image = $_FILES['name']['image'];

		$query = "SELECT * FROM listuser WHERE username = '$username'";
		$result = mysqli_query($connection, $query);
		if(mysqli_num_rows($result) > 0){
			echo "Username already please enter another Username !";
		}else{
		$query = "INSERT INTO listuser(username, password, image)values('$username','$password','$target')";
		$result = mysqli_query($connection, $query);
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		echo "Image uploaded !";
	}else{
		echo "Upload image has failed !";
	}
	}
}
}
function edit() {
	global $connection;
	if(isset($_POST['edit'])){
		$username = $_POST['username'];
		if($_POST['username'] == ""){
			echo "Username cannot blank !";
		}
		$password = $_POST['password'];
		$target = "../images/".basename($_FILES['image']['name']);
		$image = $_FILES['name']['image'];
		$id = $_POST['id'];

		$query = "SELECT * FROM listuser WHERE username = '$username'";
		$result = mysqli_query($connection, $query);
		if(mysqli_num_rows($result) > 0){
			echo "Username already please enter another Username !";
		}else{
			$query = "UPDATE listuser SET username ='$username', password = '$password', image = '$target'";
			$query .= "WHERE id = '$id'";
			$result = mysqli_query($connection, $query);
			if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		echo "Uploaded !";
	}else{
		echo "Upload has failed !";
	}
	}
	}
}
function del() {
	global $connection;
	if(isset($_POST['del'])){
		$id = $_POST['id'];

		$query = "DELETE FROM users WHERE id = '$id'";
		$result = mysqli_query($connection, $query);
		echo "Deleted !";
		}
	}
function all() {
	global $connection;

	$query = "SELECT * FROM listuser";
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($result)){
		$id = $row['id'];
		$username = $row['username'];
		echo "<option value='$id'>$username - $id</option>";
	}
}
?>