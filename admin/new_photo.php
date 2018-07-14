<?php 
	session_start();

	if(!isset($_SESSION['username'])) {
		header("location: login.php");
	} else {
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>New Picture</title>
	<?php 
		include('includes/html_header.php');
	 ?>
</head>
<body>
	<div class="container">
	<?php 
		include('header.php');
		include('sidebar.php');
		$id = $_GET['id'];
	?>
		<form class="form" action="new_photo.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" >
			<div class="row" >
				Title: <input class="form-control" type="text" name="title">
				Picture: <input class="form-control" type="file" name="image">
				Description: <textarea class="form-control" cols="50" rows="5" name="description"></textarea>
				<input class="btn btn-info" type="submit" name="submit" value="Submit">
			</div>
		</form>
	</div>
	<?php 
		if(isset($_POST['submit'])){
			include('includes/connect.php');
			$query = "Select Contents from contents where id = '$id'";
			$result = mysqli_query($connect, $query);
			$row = mysqli_fetch_row($result);
			$target = "../images/" . $row[0] . "/";
			$target = $target . basename($_FILES['image']['name']);
			$title = $_POST['title'];
			$description = $_POST['description'];
			$date = date('Y-m-d');
			$pic = ($_FILES['image']['name']);
			$tmp_pic = $_FILES['image']['tmp_name'];

			$query = "INSERT into pictures (title, picture, description, post_date, content_id)
				values ('$title', '$pic', '$description', '$date', '$id')";
			mysqli_query($connect, $query);

			if(move_uploaded_file($tmp_pic, $target)) {

				//Tells you if its all ok
				echo "<script>alert('De bestand is geupload, en je gegevens zijn toegevoegd aan de directory.')</script>";
				header("location:edit_album.php?id=$id");
			} else {
				// Gives an error if its not
				echo "<script>alert('Sorry, er was een probleem met het uploaded van het bestand.')</script>";
			}
		}
	?>
</body>
</html>

 <?php 
 	}
  ?>