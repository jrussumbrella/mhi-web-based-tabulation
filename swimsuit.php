<?php 
include('includes/header.php');
include('includes/nav.php');
include('includes/connections.php');
include('session.php');


  	 	//dynamically navigate into tabs 
$menu_list = mysqli_query($con, "SELECT * FROM candidates");
$counter = 0;
$tab_menu = "";
$tab_content = "";
while ($row = mysqli_fetch_assoc($menu_list)) {
	$id = $row['id'];
	if ($counter == 0) {
		$tab_menu .= "<li class='active'><a data-toggle='tab' href='#$id'>$id</a></li>";
		$tab_content .= "<div id='$id' class='tab-pane fade in active'>";
	}else{
		
		$tab_menu .= "<li><a data-toggle='tab' href='#$id'>$id</a></li>";
		$tab_content .= "<div id='$id' class='tab-pane fade'>";
	}
	
	$selectImage = mysqli_query($con, "SELECT * FROM candidates WHERE id = '$id'");
	while ($row = mysqli_fetch_assoc($selectImage)) {
		$image = $row['image'];
		$id = $row['id']; 
		$tab_content .="<img src='$image' class='img-thumbnail model' />";
	}
	$tab_content .= "<div></div></div>";
	$counter++;
}
?>
<body>

	<div class="container-fluid">

		<div class="row" style="margin-top:-10px;" >
			<div class="col-md-9 col-md-offset-1">
				<ul class="nav nav-tabs nav-justified">
					<?php echo $tab_menu; ?>
				</ul>
			</div>
		</div>
		
		<div class="row" style="margin-top:10px;">
			<div class="col-sm-4 col-md-offset-1">
				<center>
					<div class="tab-content">
						<?php
						echo $tab_content; 
						?>
						<button type="button" class="btn btn-primary custom1 btnPrev">Previous</button>
						<button type="submit" class="btn btn-primary custom1 btnNext">Next</button>
					</div>
					<img src="images/logo.png" class="logo">
				</center>
			</div>

			<div class="col-sm-5">
				<div class="panel panel-primary">
					<div class="panel-heading text-center"><h2>BEST IN SWIMSUIT</h2></div>
					<div class="panel-body">
						<form  id="swimsuitForm" >
							<input type="hidden" id="can_id" name="can_id">
							<input type="hidden" id="judge_id" name="judge_id" value="<?php echo $judgeId; ?>">
							<div class="form-group text-center">
								<label class="lbl2">PHYSICAL BEAUTY 30%</label><br>
								<center>
									<input type="number" name="beauty" min="1"  max="30" class="form-control form" id="beauty" >
								</center>
							</div> 
							<div class="form-group text-center">
								<label class="lbl2">POISE AND PROJECTION 10%</label><br>
								<center>
									<input type="number" name="poise" min="1"  max="10"  class="form-control form" id="poise" >
								</center>	
							</div>  
							<div class="form-group text-center">
								<label class="lbl2">OVERALL IMPRESSION 10%</label><br>
								<center>
									<input type="number"  name="overall" min="1"  max="10"  class="form-control form" id="overall">
								</center>	
							</div>
							<center>
								<div class="alert alert-success text-center form-control form">
									<strong>Total </strong><label id="total"></label>
								</div>
							</center>
							<div class='actions text-center'>				  				
								<button type="button" id="btnSave"class="btn btn-primary  custom2">Save</button>
								<button type="submit" id="btnSaveAndNext"  class="btn btn-primary custom2">Final Save & Next</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="alert alert-success text-center">Success score:</div></h3>
						<div id="successScore"></div>
						<hr>
						<div class="alert alert-info text-center"><i class="far fa-save"></i> Saved score:</div></h3>
						<div id="saveScore"></div>
						
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert.js"></script>
<script src="js/app.js"></script>	
<script src="js/validate.js"></script>
</body>
</html>