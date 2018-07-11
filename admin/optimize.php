<?php 
	session_start();

	if(!isset($_SESSION['username'])) {
		header("location: login.php");
	} else {
		include('includes/connect.php');

		$query = "select id from contents";
		$arr_query = mysqli_query($connect, $query);
		for($i = 1; i < ($arr_row = mysqli_fetch_array($arr_query, MYSQLI_ASSOC)); $I++) {
			$query = "UPDATE contents SET id = '$i' WHERE id = " . $arr_row['id'];
			mysqli_query($connect, $query);
		}

		$query = "SELECT COUNT(*) from contents";
		$result = mysqli_query($connect, $query);
		$row = mysqli_fetch_array($connect, MYSQLI_NUM);
		$num_recs = $row[0];
		$num_recs++;
		$query = "ALTER TABLE contents AUTO_INCREMENT = " . $num_recs;
		mysqli_query($connect, $query);

		header("location: album_index.php");
	}
?>