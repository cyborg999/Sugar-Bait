<?php $model->restricAccessAdmin(); ?>
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
        <li class="<?= ($active=='packages') ? 'active' : '';?>"><a href="admin.php">PACKAGES</a></li>
        <li class="<?= ($active=='gallery') ? 'active' : '';?>"><a href="gallery.php">GALLERY</a></li>
        <li class="<?= ($active=='report') ? 'active' : '';?>"><a href="report.php">REPORTING</a></li>
        <li class="<?= ($active=='contact') ? 'active' : '';?>"><a href="contactus.php">CONTACT US</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li class="active"><a href="notif.php" class="glyphicon glyphicon-user"><span class="badge"><?= $total['total'];?></span></a></li> 
        <li><a href="myaccount.php"><?php echo $_SESSION["name"]; ?></a></li>
        <li><a href="../logout.php">Log Out</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>