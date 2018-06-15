
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Miss Hundred Islands</title>
  <link rel="stylesheet" href="../css/ourbootstrap.css">
  <style>

  </style>
  </head>
  <body>


  
 <nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">DASHBOARD</a>
    </div>
  </div>
</nav>

 

	<div class="container-fluid">
  <div class="panel panel-default">
  <div class="panel-body">
     <div class="row" style="margin-bottom: 10px;">
    <div class="col-md-10">
          <ul class="nav nav-tabs">
      <li class="active"><a href="admin.php">FINAL SWIMSUIT</a></li>
      <li><a href="">FINAL LONG GOWN</a></li>
         <li><a href="">INTELLIGENCE</a></li>
        <li><a href="">TOP 7</a></li>
      <li><a href="">TOP 3</a></li>
    </ul>
    </div>
    
  </div>
     <div class="row" >
    <div class="col-md-12">
        <div class="table-responsive">
      <button class="btn btn-primary " style='margin=top:10px; margin-bottom: 10px'>PRINT</button>  
   
    <div id="container"></div>
    
      
  </div>

    </div>

        
</div>

	
	
	
	</div>
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script >
    $(document).ready(function(){
      setInterval(function(){
        $('#container').load('tblSwimsuit.php');
      }, 1000);
    });
  </script>
  
  </body>
</html>