<?php 

$model->restricAccessUser(); 
$total = $model->getNotificationByName();
?>
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="admin.php"><span class="title">Sugar</span>Bait</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="<?= ($active=='booking') ? 'active' : '';?>"><a href="packages.php">BOOKING</a></li>
        <li class="<?= ($active=='contact') ? 'active' : '';?>"><a href="contactus.php">CONTACT US</a></li>
        <li class="<?= ($active=='chat') ? 'active' : '';?>"><a href="contactus.php">CHAT</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><?php echo $_SESSION['name'];?></a></li>
               <li><a href="notif.php" class="glyphicon glyphicon-bell"><span class="badge"><?= $total['total'];?></span></a></li> 
          <li><a href="mycart.php" class="glyphicon glyphicon-shopping-cart" style="font-size: 15px"></a></li>
          <li><a href="../logout.php">Log Out</a></li>
     
        </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>