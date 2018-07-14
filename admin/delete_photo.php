<?php 
	include('includes/connect.php');
	$id = $_GET['id'];
	$query = "SELECT picture, content_id from pictures where id = '$id'";
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$picture = $row['picture'];
	$content_id = $row['content_id'];
	$query = "select contents from contents where id = '$content_id'";
	if ($result = mysqli_query($connect, $query)) {
		$row = mysqli_fetch_array($result, MYSQLI_NUM);
		$contents = $row[0];
		$file = "../images/" . $contents . "/" . $picture;

		chmod($file, 0777);
		unlink($file);
		$query = "DELETE from pictures where id = '$id'";
		mysqli_query($connect, $query);
		header("location: edit_album.php?id=" . $content_id);
	} else {
		echo "<script>alert('Could not get Contents');</script>";
	}
?>