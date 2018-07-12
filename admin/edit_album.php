<?php 
	session_start();

	if(!isset($_SESSION['username'])) {
		header("location: login.php");
	} else {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Album</title>
	<?php 
		include('includes/html_header.php');
	?>
</head>
<body>
	<div class="container">
		<?php 
			include('header.php');
			include('sidebar.php');
			include('includes/connect.php');
			echo "<div class='row'>"
			if(isset($_GET['id'])) {
				$query = "SELECT contents from contents where id = '$id' Limit 1";
				$result = mysqli_query($connect, $query);
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				echo "<div class='col-sm'><h1>Album " . $row['contents'] . " Edit</h1></div>";
			} else {
				exit();
			}
		?>
		<nav class="navbar ">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="album_index.php?id=<?php echo $id; ?>">Edit Album Name</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="new_photo.php?id=<?php echo $id; ?>">New Picture</a>
				</li>
			</ul>
		</nav>
		<div>
			<?php include('make_album_table.php'); ?>
		</div>
	</div>
</body>
</html>

<?php 

?>