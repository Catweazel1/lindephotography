<?php 
	include('includes/html_header.php');
	include('includes/connect.php');
	include('includes/functions.php');

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "DELETE FROM pictures WHERE content_id = '$id'";
		mysqli_query($connect, $query);

		$query = "SELECT contents from contents WHERE id = '$id'";
		$result = mysqli_query($connect, $query);
		$row = mysqli_fetch_array($result, MYSQLI_NUM);
		$contents = $row[0];

		$query = "DELETE FROM contents WHERE id = '$id'";
		mysqli_query($connect, $query);
		deleteAll('../images/' . $contents);
		header("location: album_index.php");
	}
?>