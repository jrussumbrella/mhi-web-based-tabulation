<?php

include('includes/connections.php');


if (isset($_POST['view'])) {
	$candidateID = $_POST['candidateID'];
	$selectImage = mysqli_query($con, "SELECT * FROM candidates WHERE id = '$candidateID'");
	if (mysqli_num_rows($selectImage) > 0) {
		$row = mysqli_fetch_assoc($selectImage);
		$image = $row['image'];
		echo $image;
	}
}

?>