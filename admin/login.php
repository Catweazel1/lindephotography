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
		<form method="post" action="login.php" class="form">
			<h1>Administration Login Form</h1>
			<div>User Name: </div><div><input type="text" name="username" class="form-control"></div>
			<div>Password: </div><div><input type="password" name="password" class="form-control"></div>
			<div><input type="submit" value="Login" name="login" class="btn btn-info"></div>
		</form>
	</div>
</body>
</html>

<?php 
	include('includes/connect.php');
	if(isset($_GET['login'])) {
		$username = mysqli_real_escape_string($connect, $_POST['username']);
		$password = mysqli_real_escape_string($connect, $_POST['password']);
		

		$admin_query = "SELECT * FROM users WHERE username = '$username'";

		$result = mysqli_query($connect, $admin_query);
		
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_array($result)) {
				if(password_varify($password, $row['password'])) {
					// return true;
					$_SESSION['username'] = $username;
					header("location: index.php");
				} else {
					// return false;
					echo "<script>alert('Password is incorrect.')</script>"
				}
			}
		} else {
			echo "<script>alert('Username and / or Password are incorrect.')</script>";
		}
	}
?>