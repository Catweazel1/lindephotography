<?php 
	session_start();

	if(!isset($_SESSION['username'])) {
		header("location: login.php");
	} else {
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('includes/html_header.php'); ?>
	<title>Admin Page</title>
</head>
<body>
	<div class="container">
		<?php
			include('header.php');
		?>
		<div class="row">
			<?php
				include('sidebar.php');
			?>
			<div class="col-sm-8">
				<h1>Welcome to the Administration Page.</h1>
				<p>Here you can administer changes to your site.</p>
			</div>
		</div>
	</div>
	<?php 
		if(isset($_GET['album'])) {
			include('album_index.php');
		}
	 ?>
</body>
</html>
<?php } ?>