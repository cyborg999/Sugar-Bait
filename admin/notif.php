<?php 
  include_once "../model.php"; 

  $model  = new Model();
  $total = $model->getReservePackageByStatus(0);  
  $reservePackage = $model->getReservePackages();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../image/sb.ico">
    <title>SugarBait</title>
    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/facebox.css">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,700" rel="stylesheet" type='text/css'>
        <script src="../lib/jquery.js" type="text/javascript"></script>
        <script src="../js/facebox.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
              $('a[rel*=facebox]').facebox({
                loadingImage : '../image/loading.gif',
                closeImage   : '../image/closelabel.png'
              });

              $("#view").click(function(){
                $.facebox({ ajax: "my-facebox-file.html" });
              });
            })    
        </script>
  </head>
  <body>
    <div class="container">
       <div class="row">
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
     
                <li><a href="admin.php">PACKAGES</a></li>
                <li><a href="gallery.php">GALLERY</a></li>
                <li class=""><a href="report.php">REPORTING</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="notif.php" class="glyphicon glyphicon-user"><span class="badge"><?= $total['total']; ?></span></a></li> 
                 <li><a href="myaccount.php"><?php echo $_SESSION["name"]; ?></a></li>
                 <li><a href="../logout.php">Log Out</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
            
                    <div class="well" style="margin-bottom: 5px">
            <h3>Bookings</h3>
        </div>
        <div style="padding: 10px">
    <table  class='table' >
      <tr>
        <th width=10%>Package</th>
        <th width=15%>Name</th>
        <th width=10%>Status</th>
        <th width=10%>Action</th>
      </tr>
      <?php foreach($reservePackage as $idx => $package): ?>
        <tr>
        <td><?= $package['name'] ?></td>
        <td><?= $package['firstname'] . " " . $package['lastname'] ?></td>
        <td>
            <?php
              if($package['status'] == 0){
                echo "ON PROCESS";
              } elseif($package['status'] == 1){
                echo "PENDING";
              } else {
                echo "DEAL";
              }
            ?>
        </td>
        <td> 
            <button type='button' class='btn btn-info btn-xs'><a style='text-decoration: none; color:white' id='view' rel='facebox' href='details.php?id=<?= $package['id'];?>'>View Details</a>
        </td>
      </tr>
      <?php endforeach ?>
    </table>
  </div>
 </div>
</div>
    
    
    <!-- Login Modal -->
        <div id="" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
               <h5 class="modal-title">Log In</h5>
              </div>
              <div class="modal-body">
                 <form class="form-horizontal" role="form" action="authenticate.php" method="post">
                         
                          <div class="form-group">
                           <label  class="col-sm-2 control-label" for="uname">Username</label>
                            <div class="col-sm-10">
                              <input type="text" name="uname" id="uname" class="form-control" required>
                            </div>
                          </div>
                          
                          <div class="form-group">
                           <label  class="col-sm-2 control-label" for="pass">Password</label>
                            <div class="col-sm-10">
                              <input type="password" name="pass" id="pass" class="form-control" required>
                            </div>
                          </div>
                        
                           
                          <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-4">
                                <button type="submit" class="btn btn-success custom" name="login" id="login">Log In</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal -->
    
    
    <div class="footer">
        <h5><span class="foot">Sugar</span><span class="subtitle">Bait</span> &copy 2018 | sugarbait@gmail.com</h5>
    </div>
    
   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
