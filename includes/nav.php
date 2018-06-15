 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand " href="#"><i class="fas fa-crown" style="color:yellow"></i> MISS HUNDRED ISLANDS 2018</a>
    </div>
    <ul class="nav navbar-nav">
      <?php if(isset($_SESSION['id'])) : ?>
        <li><a href="#" class='btnHome'>Home</a></li>
      <?php endif ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php if(isset($_SESSION['id'])) : ?>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
         <?php echo "Judge ".$_SESSION['id'];?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>    
        </ul>
    </li>
    <?php else: ?>
      <li><a href="#" id="btnShowLoginModal"><i class="fas fa-sign-in-alt"></i> LOGIN</a></li>
    <?php endif ?>
    </ul>
  </div>
</nav>
