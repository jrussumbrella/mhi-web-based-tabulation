<?php 

include('includes/connections.php');

		//get id of candidates
if (isset($_POST['get'])) {
	$id = $_POST['id'];
	$select_id = mysqli_query($con, "SELECT * FROM candidates WHERE id = '$id'");
	$row = mysqli_fetch_assoc($select_id);
	$candidate_id = $row['id'];
	echo $candidate_id;
}


		//if successfully scored all the candidates
if (isset($_POST['clickHome'])) {
	$judge_id = $_POST['judge_id'];
	$if_complete = mysqli_query($con, "SELECT * FROM tblSwimsuit WHERE judge_id='$judge_id' AND status = 1");
	if (mysqli_num_rows($if_complete) > 0) {
		echo "exit";
	}else{
		echo "You still have a candidate/s to score.";
	}
}

		//fetch all save score
if (isset($_POST['allSaveScore'])) {
	$judge_id = $_POST['judge_id'];
	$select_all_save_score = mysqli_query($con, "SELECT  * FROM tblSwimsuit WHERE judge_id = '$judge_id' AND status = 0");
	if (mysqli_num_rows($select_all_save_score) > 0) {
		while ($row = mysqli_fetch_assoc($select_all_save_score)) {
			$candidate_id = $row['candidate_id'];
			echo "<li>Candidate ".$candidate_id."</li>";
		}
	}else{
		echo "<h4 class='text-center'>Nothing to show </h4>";
	}
	
}

		//fetch all success score
if (isset($_POST['allSuccessScore'])) {
	$judge_id = $_POST['judge_id'];
	$select_all_success_score = mysqli_query($con, "SELECT  * FROM tblSwimsuit WHERE judge_id = '$judge_id' AND status = 1");
	if (mysqli_num_rows($select_all_success_score) > 0) {
		while ($row = mysqli_fetch_assoc($select_all_success_score)) {
			$candidate_id = $row['candidate_id'];
			echo "<li>Candidate ".$candidate_id."</li>";
		}
	}else{
		echo "<h4 class='text-center'>Nothing to show </h4>";
	}
}


		// final save 
if (isset($_POST['submit'])) {
	$beauty = $_POST['beauty'];
	$poise = $_POST['poise'];
	$overall = $_POST['overall'];
	$judge_id = $_POST['judge_id'];
	$candidate_id = $_POST['candidate_id'];
	$score = (int)$poise + (int)$overall + (int)$beauty;

	$checkIfVoted1= mysqli_query($con, "SELECT * FROM tblSwimsuit WHERE candidate_id ='$candidate_id' && judge_id = '$judge_id' && status = 1");
	if (mysqli_num_rows($checkIfVoted1) > 0) {
		echo "Voted";
	}else{
		$checkIfVoted0= mysqli_query($con, "SELECT * FROM tblSwimsuit WHERE candidate_id ='$candidate_id' && judge_id = '$judge_id' && status = 0");

		if (mysqli_num_rows($checkIfVoted0) > 0) {
			$updateSave = mysqli_query($con, "UPDATE tblSwimsuit SET beauty = '$beauty', poise = '$poise', overall = '$overall', score = '$score', status = 1 WHERE judge_id = '$judge_id' AND candidate_id = '$candidate_id' AND status = 0");
			if ($updateSave) {
				echo "Success";
			}else{
				echo "Something went wrong in updating score";
			}
		}else{
			$insert = mysqli_query($con, "INSERT INTO tblSwimsuit (beauty, poise, overall, score, judge_id, candidate_id, status) VALUES ('$beauty','$poise','$overall','$score', '$judge_id', '$candidate_id', 1)");
			if ($insert) {
				echo "Success";
			}else{
				echo "Something went wrong";
			}
		}
		
	}
}
		//end of final save

		//save only
if (isset($_POST['save'])) {		
	$beauty = $_POST['beauty'];
	$poise = $_POST['poise'];
	$overall = $_POST['overall'];
	$judge_id = $_POST['judge_id'];
	$candidate_id = $_POST['candidate_id'];
	$score = (int)$poise + (int)$overall + (int)$beauty;

	$checkIfVoted1= mysqli_query($con, "SELECT * FROM tblSwimsuit WHERE candidate_id ='$candidate_id' && judge_id = '$judge_id' && status = 1");
	if (mysqli_num_rows($checkIfVoted1) > 0) {
		echo "Save 1";
	}else{
		$checkIfVoted0= mysqli_query($con, "SELECT * FROM tblSwimsuit WHERE candidate_id ='$candidate_id' && judge_id = '$judge_id' && status = 0");
		if (mysqli_num_rows($checkIfVoted0) > 0) {
			$updateSave = mysqli_query($con, "UPDATE tblSwimsuit SET beauty = '$beauty', poise = '$poise', overall = '$overall', score = '$score' WHERE judge_id = '$judge_id' AND candidate_id = '$candidate_id' AND status = 0");
			echo "Save";
		}else{
			$save = mysqli_query($con, "INSERT INTO tblSwimsuit (beauty, poise, overall, score, judge_id, candidate_id, status) VALUES ('$beauty','$poise','$overall','$score', '$judge_id', '$candidate_id', 0)");
			if ($save) {
				echo "Save";
			}else{
				echo "Something went wronga";
			}
		}
	}			
}
	//end of save


	//view save score
if (isset($_POST['saveScore'])) {
	$candidate_id = $_POST['candidate_id'];
	$judge_id = $_POST['judge_id'];
	$show_save_score = mysqli_query($con, "SELECT * FROM tblSwimsuit WHERE candidate_id = '$candidate_id' && judge_id='$judge_id' && status = 0");
	$row = mysqli_fetch_assoc($show_save_score);
	echo json_encode($row);
}




?>