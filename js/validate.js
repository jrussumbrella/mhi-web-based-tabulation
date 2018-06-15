$(document).ready(function(){
			

	$('.form-control').keyup(function(){
		calculateScore();
	});

	function calculateScore() {
		var beauty = $("#beauty").val();
		var poise = $("#poise").val();
		var overall = $("#overall").val();
		var total = 0;

		if (beauty > 30  ){
			swal("Error", "Please enter between 1-30 only", "error");
			$("#beauty").select();
			$("#beauty").css('border-color', 'red');
			$("#total").html("");
		}else{
			$("#beauty").css('border-color', '');
		}

		if (poise > 10){
			swal("Error", "Please enter between 1-10 only", "error");
			$("#poise").select();
			$("#poise").css('border-color', 'red');
			$("#total").html("");
		}else{
			$('#poise').css('border-color', '');
		}

		if (overall > 10){
			swal("Error", "Please enter between 1-10 only", "error");
			$("#overall").select();
			$("#overall").css('border-color', 'red');
			$("#total").html("");
		}else{
			$('#overall').css('border-color', '');
		}

		$(".form-control").each(function() {
			if(!isNaN(this.value) && this.value.length!=0) {
					total += parseFloat(this.value);		
				}	
		});		
		$("#total").html(total.toFixed( 2));

	}



});

