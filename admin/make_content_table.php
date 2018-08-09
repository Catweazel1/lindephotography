<?php 
	$query = "select id, contents from contents";
	$result = mysqli_query($connect, $query);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$content_id = $row['id'];
		$contents = $row['contents'];
		echo "<div class='row'>";
		echo "<div class='col-sm'>$contents</div><div class='col-sm'><a href='edit_album.php?id=$content_id'>Edit</a></div><div class='col-sm'><a href='delete_album.php?id=$content_id'>Delete</a></div>";
		echo "</div>";
	}
	
?>