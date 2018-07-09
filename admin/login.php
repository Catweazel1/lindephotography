<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<?php include('includes/html_header.php'); ?>
</head>
<body>
	<div class="container">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="form">
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

	if(isset($_POST['login'])) {
		$username = mysqli_real_escape_string($connect, $_POST['username']);
		$password = mysqli_real_escape_string($connect, $_POST['password']);
		

		$admin_query = "SELECT * FROM users WHERE username = '$username'";

		$result = mysqli_query($connect, $admin_query);
		
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_array($result)) {
				if(password_verify($password, $row['password'])) {
					// return true;
					$_SESSION['username'] = $username;
					header("location: index.php");
				} else {
					// return false;
					echo "<script>alert('Password is incorrect.')</script>";
				}
			}
		} else {
			echo "<script>alert('Username and / or Password are incorrect.')</script>";
		}
	}
?>