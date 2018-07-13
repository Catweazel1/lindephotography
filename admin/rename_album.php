<!DOCTYPE html>
<html>
<head>
	<title>Rename Album</title>
	<?php 
		include('includes/html_header.php');
	?>
</head>
<body>
	<?php 
		if(isset($_GET['id'])) {
			global $id;
			$id = $_GET['id'];
			include('includes/connect.php');
			$query = "SELECT contents FROM contents WHERE id = '$id'";
			$result = mysqli_query($connect, $query);
			while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
				if(empty($row)) {
					$album = 'empty';
				} else {
					$album = $row[0];
				}
			}
		}

		if(isset($_POST['submit'])) {
			$album = $_POST['album'];
			$album = mysqli_real_escape_string($connect, $album);
			$contents_query = "SELECT contents FROM contents WHERE id = '$id'";
			$contents = mysqli_query($connect, $contents_query);
			$content_result = mysqli_fetch_row($contents);
			$query = "UPDATE contents SET contents='$album' WHERE id = '$id'";
			mysqli_query($connect, $query) or die(myqli_error($connect));
			rename("../images/" . htmlspecialchars($content_result[0]), "../images/" . htmlspecialchars_decode($album));
			header("location: album_index.php");
		}
	?>

	<form class="form" action="rename_album.php?id=<?php echo $id; ?>" method="post" >
		Rename Album: <input class="form-control" type="text" name="album" value="<?php echo $album; ?>" >
		<input class="btn btn-info" type="submit" name="submit" value="Submit">
	</form>
</body>
</html>