<div class="row">
		<div class="col-sm">Title</div><div class="col-sm">Photo</div><div class="col-sm">Date Added</div><div class="col-sm">Delete?</div>
</div>

<?php 
	$id = $_GET['id'];
	$query = "SELECT contents FROM contents WHERE id = '$id';";
	$result = mysqli_query($connect, $query);
	$contents = mysqli_fetch_row($result);

	$query = "SELECT id, title, picture, post_date FROM pictures WHERE content_id = '$id'";
	$result = mysqli_query($connect, $query);
	
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$photo_id = $row['id'];
		$title = $row['title'];
		$photo = $row['picture'];
		$photo = $contents[0] . "/" . $photo;
		$date = $row['post_date'];

		echo "<div class='row'>
			<div class='col-sm'>" . $title . "</div>
			<a class='col-sm m-2' href='edit_photo.php?id=" . $photo_id . "'><img src='../images/" . $photo . "' width='150px'></a>
			<div class='col-sm'>" . $date . "</div>
			<a class='col-sm' href='delete_photo.php?id=" . $photo_id . "'>Yes</a>
		</div>";
	}
?>