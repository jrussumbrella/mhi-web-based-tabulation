<?php
	if (isset($_SESSION['id'])) {
  	 	 $judgeId = $_SESSION['id'];
  	}else{
  	 	 header("location: index.php");
  	}
	

?>