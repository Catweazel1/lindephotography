<?php 
	include('includes/connect.php');

	$query = 'SELECT id, contents from contents';
	$result = mysqli_query($connect, $query);
	$i = 0;
	echo "<div class='row'>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		if(($i > 0) && ($i % 3 === 0)) {
			echo "</div>
			<div class='row'>";
		};
		$i++;
		$content_id = $row['id'];
		$contents = $row['contents'];
		echo "<a class='col-sm' href='cat_idx.php?id=$content_id;'>$contents</a>";
	}
	echo "</div>";
?>