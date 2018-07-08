<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
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
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form">
			<label class="form-label">User Name:</label> <input type="text" name="username" class="form-control"><br>
			<label>Password:</label> <input type="password" name="pass1" class="form-control"><br>
			<label>Repeat Password:</label> <input type="password" name="pass2" class="form-control"><br>
			<input type="submit" name="submit" class="btn btn-info">
		</form>

	</div>
</body>
</html>

<?php 
	if(isset($_POST['username'])) {
		require_once 'includes/connect.php';

	$username = mysqli_real_escape_string($connect, $_POST['username']);
		$pass1 = mysqli_real_escape_string($connect, $_POST['pass1']);
		$pass2 = $_POST['pass2'];

		function validPW($pass1) {
			if(strlen($pass1 >= 8)) {
				if(!ctype_upper($pass1) && !ctype_lower($pass1)) {
					return TRUE;
				}
			}
		} // Validate password

		$flag = FALSE;

		if($pass1 == $pass2) {
			$flag = TRUE;
		} // IF passwords match

		if($flag) {
			$sql = "CREATE TABLE IF NOT EXISTS users (id integer not null primary key auto_increment,
				username varchar(40),
				password varchar(40)
			)";

			$result = mysqli_query($connect, $sql) or die("Bad query: $sql");

			$hashed = password_hash($pass1, PASSWORD_BCRYPT);

			$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed')";
			$result = mysqli_query($connect, $sql) or die("Bad query: $sql");
		} // IF insert
	} 
?>