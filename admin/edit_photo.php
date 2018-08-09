<?php 
	session_start();

	if(!isset($_SESSION['username'])) {
		header("location: login.php");
	} else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Photo</title>
	<?php 
		include('includes/html_header.php');
	?>
</head>
<body>
	<?php 
		include('header.php');
		include('sidebar.php');
		include('includes/connect.php');
		$id = $_GET['id'];
		$query = "SELECT id, title, picture, description, content_id FROM pictures WHERE id = '$id'";
		$row = mysqli_query($connect, $query);
		$pic_info = mysqli_fetch_array($row, MYSQLI_ASSOC);

		$title = $pic_info['title'];
		$old_picture = $pic_info['picture'];
		//$_FILES['image']['name'] = $picture;
		$description = $pic_info['description'];
		$content_id = $pic_info['content_id'];

		$query = "SELECT Contents FROM contents WHERE id = '$content_id'";
		$row = mysqli_query($connect, $query);
		$contents = mysqli_fetch_row($row);
	?>
	<div class="container">
		<form class="form" action="edit_photo.php?id=<?php echo $id; ?>" method="post">
			<div class="row">
				Title: <input class="form-control" type="text" name="title" value="<?php echo $title; ?>">
			</div>
			<div class="row">
				Picture: <input class="form-control" type="file" name="image"> <?php echo "Picture is: " . $old_picture; ?>
			</div>
			<div class="row">
				Description: <textarea class="form-control" cols="50" rows="5" name="description"><?php echo $description; ?></textarea>
			</div>
			<div class="row">
				<input class="btn btn-info" type="submit" name="submit" value="Submit">
			</div>
		</form>	
	</div>
	<?php 
		if (isset($_POST['submit'])){
			$target = "../images/" . $contents[0] . "/";
			$target = $target . basename($_FILES['image']['name']);
			$title = $_POST['title'];
			$description = $_POST['description'];
			$date = date('Y-m-d');
			$pic = ($_FILES['image']['name']);
			$tmp_pic = $_FILES['image']['tmp_name'];
			if (!null == basename($pic)) {
				if(move_uploaded_file($tmp_pic, $target)) {
					chmod("../images/" . $contents[0] . "/" . $old_picture, 0777);
					unlink("../images/" . $contents[0] . "/" . $old_picture);
					$query = "UPDATE pictures SET title = '$title', picture = '$pic', 
						description = '$description', post_date = '$date' WHERE id = '$id'";
					mysqli_query($connect, $query);
					header("location: edit_album.php?id=". $content_id);
				} else {
					echo "Not Posted!";
				}
			} else {
				$query = "UPDATE pictures SET title = '$title', description = '$description', post_date = '$date' WHERE id = '$id'";
				mysqli_query($connect, $query);
				header("location: edit_album.php?id=" . $content_id);
			}
		}
	?>
</body>
</html>
<?php 
	}
?>