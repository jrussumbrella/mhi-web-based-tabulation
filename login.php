<?php

require('includes/connections.php');

$id = $_POST['judge_id'];
$code = $_POST['judge_code'];

$login = mysqli_query($con, "SELECT * FROM judge WHERE id = '$id' AND code = '$code'");

if (mysqli_num_rows($login) > 0) {
	$row = mysqli_fetch_assoc($login);
	$db_id = $row['id'];
	session_start();
	$_SESSION['id'] = $db_id; 
	echo 1;
}else{
	echo "Judge ID or Judge Code is wrong";
}

?>