<?php 
	include('includes/connect.php');

	$query = 'SELECT id, contents from contents';
	$result = mysqli_query($connect, $query);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$content_id = $row['id'];
		$contents = $row['contents'];
		echo "<a href='cat_idx.php?id=$content_id;'>$contents</a>";
	}
?>