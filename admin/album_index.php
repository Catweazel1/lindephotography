<?php 
	session_start();

	if(!isset($_SESSION['username'])){
		header('location: login.php');
	} else {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/popper.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
	<title>Foto Album</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
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