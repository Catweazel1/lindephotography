<!DOCTYPE html>
<html>
<head>
	<title>New Album</title>
	<?php 
		include('includes/html_header.php');
	?>
</head>
<body>
	<form class="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		New Album: <input type="text" name="album" class="form-control">
		<input type="submit" name="submit" value="Submit" class="btn btn-info">
	</form>
</body>
</html>
<?php 
	if((isset($_POST['submit'])) && (!empty($_POST['album']))) {
		include('includes/connect.php');
		$album = $_POST['album'];
		$query = "insert into contents (contents) values ('$album')";
		mysqli_query($connect, $query);
		if(!file_exists('../images/'.$album)) {
			mkdir('../images/' . $album, 0777, true);
			header("location: album_index.php");
		}
	} else if((isset($_POST['submit'])) && (empty($_POST['album']))) {
		echo "<script>alert('Please fill in album name!');</script>";
	}
?>