<?php 
	session_start();

	if(!isset($_SESSION['username'])){
		header('location: login.php');
	} else {
?>

<!DOCTYPE html>
<html>
<head>
	<?php include('includes/html_header.php'); ?>
	<title>Foto Album</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<?php 
				include('header.php');
				include('sidebar.php');
				include('includes/connect.php');
			?>
			<div class="col-sm-8">
				<div>
					<h1>Albums</h1>
				</div>
				<div>
					<nav>
						<ul>
							<a href="optitmize.php">Defragment Site Database</a>
						</ul>
					</nav>
				</div>
				<div>
					<?php include('make_content_table.php'); ?>
				</div>
				<?php 
					if(!isset($_GET['id'])) {
						include('new_album.php');
					} else {
						include('rename_album.php');
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>

<?php 
	}
?>