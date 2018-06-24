<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/popper.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
</head>
<body>
	<div class="container">
		<form method="post" action="login.php">
			<h1>Administration Login Form</h1>
			<div>User Name: </div><div><input type="text" name="user_name"></div>
			<div>Password: </div><div><input type="password" name="user_pass"></div>
			<div><input type="submit" value="Login" name="login"></div>
		</form>
	</div>
</body>
</html>

<?php 
	include('includes/connect.php');
	if(isset($_GET['login'])) {
		$user_name = mysqli_escape_string($connect, $_POST['user_name']);
		$user_pass = mysqli_escape_string($connect, $_POST['user_pass']);
		$salt = '$5$rounds=5050$ihaventmadeupmymindyet$';

		$encrypt = crypt($user_pass, $salt);

		$admin_query = "SELECT * FROM users WHERE username = '$user_name' and password = '$encrypt'";

		$result = mysqli_query($connect, $admin_query);
		$count = mysqli_num_rows($result);
		if($count == 1) {
			$_SESSION['username'] = $user_name;
			header("location: index.php");
		} else {
			echo "<script>alert('Username or password is incorrect')</script>";
		}
	}
?>