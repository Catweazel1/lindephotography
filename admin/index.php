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
	<title>Admin Page</title>
</head>
<body>
	<div class="container">
		<?php
			include('header.php');
			include('sidebar.php');
		 ?>
		 <div>
		 	<h1>Welcom to the Administration Page.</h1>
		 	<p>Here you can administer changes to your site.</p>
		 </div>
	</div>
	<?php 
		if(isset($_GET['album'])) {
			include('album_index.php');
		}
	 ?>
</body>
</html>