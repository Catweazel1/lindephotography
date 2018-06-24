<!DOCTYPE html>
<html>
<head>
	<title>Foto Album</title>
</head>
<body>
	<?php 
		include('header.php');
		include('sidebar.php');
		include('includes/connect.php');
	?>
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
</body>
</html>