$(document).ready(function(){

	
	viewAllSaveScore();
	viewAllSuccessScore();

	//current id of candidates 
	var candidateid = $('#can_id').val(1);


	$('.btnHome').click(function(e){
		e.preventDefault();
		var judge_id = $('#judge_id').val();
		var clickHome = 1;
		$.ajax({
			type: 'POST',
			url: "functions.php",
			data:{clickHome: clickHome, judge_id:judge_id},
			success:function(response){
				if (response == "exit") {
					window.location.href='index.php';
				}else{
					swal('', response, 'info');
				}
			}
		});
	});
	

	//fetch all save score
	function viewAllSaveScore(){
		var allSaveScore = 1;
		var judge_id = $('#judge_id').val();
		$.ajax({
			type: 'POST',
			url:"functions.php",
			data:{allSaveScore:allSaveScore, judge_id:judge_id},
			success:function(response){
				$('#saveScore').html(response);
			}
		});
	}

	//fetch all success score
	function viewAllSuccessScore(){
		var allSuccessScore = 1;
		var judge_id = $('#judge_id').val();
		$.ajax({
			type: 'POST',
			url:"functions.php",
			data:{allSuccessScore:allSuccessScore, judge_id:judge_id},
			success:function(response){
				$('#successScore').html(response);
			}
		});
	}


	//get save score of candidates and retrieve it in the textbox
	viewSaveScore();
	function viewSaveScore(){
			$('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
			var id = $(e.target).text();
			getSaveScore(id);
		});
	}

	function getSaveScore(id){
		var judge_id = $('#judge_id').val();
		var saveScore = 1;
	
		$.ajax({
			type: 'POST',
			data: {candidate_id:id, saveScore:saveScore, judge_id:judge_id},
			url:"functions.php",
			dataType:'json',
			success: function(response){
				if (response == null) {
					$('#swimsuitForm')[0].reset();
				}else{
					$('#beauty').val(response.beauty);
             		$('#overall').val(response.overall);
             		$('#poise').val(response.poise);

				}	
			}
		});
		
	}

	if ($('#can_id').val() == 1) {
		$('.btnPrev').hide();
	}

	$('.btnNext').click(function(){
  		$('.nav-tabs > .active').next('li').find('a').trigger('click');
	});

  	$('.btnPrev').click(function(){
  		$('.nav-tabs > .active').prev('li').find('a').trigger('click');
	});


	$('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
		var id = $(e.target).text();
		getCandidateId(id);
		
		if (id != 1) {
			$('.btnPrev').show();
		}else {
			$('.btnPrev').hide();
		}

		if (id == 14) {
			$('.btnNext').hide();
		}else{
			$('.btnNext').show();
		}
	});

	//get candidates id from the database 
	function getCandidateId(id){
		var get = 1;
		$.ajax({
			type: 'POST',
			data: {id:id, get:get},
			url:"functions.php",
			success: function(response){
				$('#can_id').val(response);
				console.log(response);
			}
		});
	}




	$('#swimsuitForm').submit(function(e){
		e.preventDefault();
		var judge_id = $('#judge_id').val();
		var submit = 1;
		var candidate_id = $('#can_id').val();
		var beauty = $('#beauty').val();
		var poise = $('#poise').val();
		var overall = $('#overall').val();

		

		if (beauty != '' && poise != '' && overall != '') {
				$.ajax({
				type: 'POST',
				url: "functions.php",
				data:{beauty:beauty, poise: poise, overall: overall, 
					judge_id:judge_id, candidate_id:candidate_id, submit:submit},
				success: function(response){
					if (response == "Success") {
						swal('', 'Successfully scored', 'success');
						viewAllSaveScore();
						viewAllSuccessScore();
						 $('.nav-tabs > .active').next('li').find('a').trigger('click');
						$('#swimsuitForm')[0].reset();	
					}else if (response == "Voted") {
						swal('', 'You already scored this candidate', 'info');
						$('#swimsuitForm')[0].reset();	
					}else{
						swal('', response, 'error');
					}	
				}
			});
		}	
	
		
	});


	//save score of data
	$('#btnSave').click(function(){
		var beauty = $('#beauty').val();
		var poise = $('#poise').val();
		var overall = $('#overall').val();
		var judge_id = $('#judge_id').val();
		var candidate_id = $('#can_id').val();
		var save = 1;
		var error = 0;

		if (beauty > 30  ){
			error = 1;
			$("#beauty").select();
			$("#beauty").css('border-color', 'red');
			$("#total").html("");
		}else{
			$("#beauty").css('border-color', '');
		}

		if (poise > 10){
			error = 1;	
			$("#poise").select();
			$("#poise").css('border-color', 'red');
			$("#total").html("");
		}else{
			$('#poise').css('border-color', '');
		}

		if (overall > 10){
			error = 1;	
			$("#overall").select();
			$("#overall").css('border-color', 'red');
			$("#total").html("");
		}else{
			$('#overall').css('border-color', '');
		}
	
				$.ajax({
				type: "POST",
				url: "functions.php",
				data: {beauty: beauty, poise: poise, overall:overall, 
					judge_id: judge_id, 
					save: save, candidate_id: candidate_id,},
				success:function(response){
					if (response == "Save 1") {
						swal('', 'You cannot save score if you already save the final score.', 'info');
						$('#swimsuitForm')[0].reset();
					}else if (response == "Save"){
						swal('', 'Score save', 'success');
						viewAllSaveScore();
					}
				}
			});
		

	});

		

	
	$('#message').hide();
	//call login modal
	$('#btnShowLoginModal').click(function(e){
		e.preventDefault();
		$('#loginModal').modal('show');	
	});

	//login
	$('#formLogin').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "login.php",
			data: data,
			success: function(response){
				if (response == 1) {
					$('#btnLogin').html('Logging in....');
					setTimeout(function(){
						window.location.href= "index.php";
					}, 1000);
				}else{
					$('#message').html(response).show();
				}
			}

		})
	});
});