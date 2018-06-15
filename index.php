<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Miss Hundred Islands</title>
  <link rel="stylesheet" href="css/ourbootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/test.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/carousel.css">
  <link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
  

</head>
<body>
  <?php 
  include('includes/nav.php'); 
  include('includes/connections.php');
  include('includes/login_modal.php');

  //dynamic carousel for displaying images for candidates
  $candidates = mysqli_query($con, "SELECT * FROM candidates");
  $counter = 0;
  $content = "";
  while ($row = mysqli_fetch_assoc($candidates)) {
    $image = $row['image'];
    if ($counter == 0) {
      $content .= "<div class='item active'>
      <div class='col-md-3 col-xs-12'>
        <img src='$image' class='img-responsive center-block'>
      </div>
    </div>";
  }else{
   $content .= "<div class='item'>
   <div class='col-md-3'>
    <img src='$image' class='img-responsive center-block'>
  </div>
</div>";
}
$counter++;     
}

?>

<div class="container">
  <div class="row">
   <!-- carousel --> 
   <div id="myCarousel" class="carousel fdi-Carousel slide">
    <!-- Carousel items -->
    <div class="carousel fdi-Carousel slide" id="eventCarousel" data-interval="0">
      <div class="carousel-inner onebyone-carosel">

        <?php echo $content; ?>
        
      </div>
      <a class="left carousel-control" href="#eventCarousel" data-slide="prev"></a>
      <a class="right carousel-control" href="#eventCarousel" data-slide="next"></a>
    </div>
    <!--/carousel-inner-->
  </div>
</div>
<!--/myCarousel-->
<hr>
<div class="row" >
  <div class="col-md-12" >
    <center>
     <?php 

     if (isset($_SESSION['id'])) :
      $judgeId = $_SESSION['id'];
    ?>
    <a class='btn btn-primary btn-lg custom' href='swimsuit.php'>SWIMSUIT</a>
    <a class='btn btn-primary btn-lg custom' href=''>LONG GOWN</a>
    <a class='btn btn-primary btn-lg custom' href=''>TOP 7</a>
    <a class='btn btn-primary btn-lg custom' href=''>TOP 3</a>
  <?php endif ?>
</center>
</div>


</div>
<hr>
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-body">
       <div class="text-center">
         <h2> CORONATION NIGHT <br> DON LEOPOLDO CONVENTION CENTER <br>
          MARCH 17, 2018
        </h2>
      </div>
    </div>
  </div>
</div> 

</div>
</div>



<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
<script src="js/app.js"></script>
</body>
</html>