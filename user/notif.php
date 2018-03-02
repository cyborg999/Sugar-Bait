    <?php 
	session_start();
    include '../function.php';
	include '../connect.php';
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
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,700" rel="stylesheet" type='text/css'>
      
      
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
              <a class="navbar-brand" href="packages.php"><span class="title">Sugar</span>Bait</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="packages.php">BOOKING</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><?php echo $_SESSION['name'];?></a></li>
                <li class="active"><a href="notif.php" class="glyphicon glyphicon-bell"><span class="badge">
                      
                        
                 <?php 
                      
                        $fname = $_SESSION['name'];
                        $lname = $_SESSION['last'];
                    
                        $con = mysqli_connect("localhost", "root", "", "sugarbait");
                        if (!$con) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                
                       $sql = "SELECT COUNT(*) as total FROM notif WHERE firstname = '$fname' AND lastname = '$lname' ";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        $total = $row['total'];

                                        echo "$total";
                                    }
                                } else {
                                    echo "";
                                }

                                $con->close();
                                
                 ?>
                      
                    </span></a></li> 
                <li><a href="mycart.php" class="glyphicon glyphicon-shopping-cart" style="font-size: 15px"></a></li>
                 <li><a href="../logout.php">Log Out</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
                   
        <div class="well" style="margin-bottom: 5px">
            <h3>Notification</h3>
        </div>
        
        

       <?php
           $conn = mysqli_connect("localhost", "root", "", "sugarbait");
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }
        
          $fname = $_SESSION["name"];
          $lname = $_SESSION["last"];
          $sql = "SELECT  *  FROM notif WHERE firstname = '$fname' AND lastname = '$lname'";
          $result = $conn->query($sql);

       

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) { 
                  $id = $row['id'];
                  $fname = $row['firstname'];
                  $lname = $row['lastname'];
              
              }
          } else {
              echo "";
          }
          echo "</table>";
          $conn->close();
          ?> 

          

       <?php
           $conn = mysqli_connect("localhost", "root", "", "sugarbait");
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }
        
          $fname = $_SESSION["name"];
          $lname = $_SESSION["last"];
          $sql = "SELECT  *  FROM companyinfo";
          $result = $conn->query($sql);

       

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) { 
                  $bank = $row['bankaccount'];
                  
               
              
              }
          } else {
              echo "0 results";
          }
          echo "</table>";
          $conn->close();
          ?> 
                 <?php 
                      
                        $fname = $_SESSION['name'];
                        $lname = $_SESSION['last'];
                    
                        $con = mysqli_connect("localhost", "root", "", "sugarbait");
                        if (!$con) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                
                       $sql = "SELECT COUNT(*) as total FROM notif WHERE firstname = '$fname' AND lastname = '$lname' ";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                  ?> 
                                     <div class="col-md-12">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 text-center" style="padding: 10px; margin: 2em 0">
                                        <h5>Dear <?php echo $fname;?>, please deposit your 50% downpayment to our bank account #<?php echo $bank;?> to process your booking. Just upload your deposit slip. Thank You!</h5>
                                        
                                        <br>
                                        <button type="button" class="btn btn-info btn-sm" data-target="#modalUpload" data-toggle="modal">Upload</button>
                                        </div>
                                        
                                        
                                        <div class="col-md-4"></div> 
                                    </div>
        
                                                                    
                <?php
                                    }
                                } else {
                                    echo "";
                                }

                                $con->close();
                                
                 ?>
                                                        
                                                        
                                 
     </div>
    </div>
    
        <!-- Add Image Modal -->
        <div id="modalUpload" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
               <h5 class="modal-title">Deposit Slip</h5>
              </div>
              <?php
                
                $myfname = $_SESSION["name"];
                $mylname = $_SESSION["last"];
                $link = mysqli_connect("localhost", "root", "", "sugarbait");

                // Check connection
                if($link === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                if (isset($_POST['submit'])) {
                    $fileupload = $_FILES['fileupload']['name'];
                    $fileuploadTMP = $_FILES['fileupload']['tmp_name'];
                    $folder = "gallery/";

                    move_uploaded_file($fileuploadTMP, $folder.$fileupload);
                    
                 
                    $s = "INSERT INTO depositslip (firstname, lastname, image) VALUES ('$myfname', '$mylname', '$fileupload')";
                    
                   
                    if(mysqli_query($link, $s)){
                       echo '<script type="text/javascript"> alert("Successfully Uploaded!");</script>';
                     
                    } else{
                        echo "ERROR: Could not able to execute $s. ";
                      
                    }
                    
                    $q= "DELETE FROM notif WHERE firstname ='$myfname' AND lastname = '$mylname'";
                    
                   
                    if(mysqli_query($link, $q)){
                       echo '<script type="text/javascript"> alert("Successfully Uploaded!");</script>';
                       header("Refresh: 1");
                    } else{
                        echo "ERROR: Could not able to execute $q. ";
                      
                    }
                    
                    $que= "UPDATE reservepackage SET status = '2' WHERE firstname ='$myfname' AND lastname = '$mylname'";
                    
                   
                    if(mysqli_query($link, $que)){
                       echo '<script type="text/javascript"> alert("Successfully Uploaded!");</script>';
                       header("Refresh: 1");
                    } else{
                        echo "ERROR: Could not able to execute $que. ";
                      
                    }
                     
                }


                // close connection
                mysqli_close($link);
                ?>
            <div class="modal-body">
                 <form class="form-horizontal" enctype="multipart/form-data" method="post">
                          <div class="form-group">
                           <label  class="col-sm-2 control-label" for="fileupload"s>Image</label>
                            <div class="col-sm-10">
                              <input type="file" name="fileupload">
                            </div>
                          </div>
                          
                           
                          <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-4">
                                <button type="submit" class="btn btn-success custom" name="submit">Upload</button>
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
        <h5><span class="foot">Sugar</span>Bait &copy 2018 | sugarbait@gmail.com</h5>
    </div>
    
   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
  </body>
</html>
