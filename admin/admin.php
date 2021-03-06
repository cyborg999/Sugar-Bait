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
                <li class="active"><a href="admin.php">PACKAGES</a></li>
                <li><a href="gallery.php">GALLERY</a></li>
                <li class=""><a href="report.php">REPORTING</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                 <li class="active"><a href="notif.php" class="glyphicon glyphicon-user"><span class="badge">
                 
                 <?php 
                    
                        $con = mysqli_connect("localhost", "root", "", "sugarbait");
                        if (!$con) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                
                       $sql = "SELECT COUNT(*) as total FROM reservepackage WHERE status = '0' ";
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
                <li><a href="myaccount.php"><?php echo $_SESSION["name"]; ?></a></li>
                <li><a href="../logout.php">Log Out</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
            <div class="col-md-12 jumbotron">
                <div class="slogan text-center">
                    <h2>PACKAGES</h2>
                    <button class="btn btn-info" data-target="#modalUpload" data-toggle="modal">Add Package</button>
                </div>
            </div>
            
              <?php
           
           $conn = mysqli_connect("localhost", "root", "", "sugarbait");

       
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM packages";
        $result = mysqli_query($conn, $sql);
    ?>
        
    <?php
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $Pid = $row['id'];
    ?>
                     <div class='col-md-4 text-center' style='margin-bottom: 20px;'>
                        <img src="packages/<?php echo $row['image'];?>" width="200px" height="200px" alt="" style="padding: 10px; border-radius: 40px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                        <br>
                        <br>
                         <a type="button" class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#<?php echo $Pid ; ?>">Details</a>
                        <?php 
                        echo 
                        "<button type='button' class='btn btn-default btn-sm'><a style='text-decoration:none' id='view' rel='facebox' href='editpackage.php?id=".$Pid."'>Edit</a></button>"
                         ?>
                         <a type="button" class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#D<?php echo $Pid ; ?>">Delete</a>
                     </div>

                     <!-- View Modal -->
                      <div class="modal fade" id="<?php echo $Pid ; ?>" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><?php echo $row["name"] ?></h4>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                 
                                    <div class="col-md-12 text-center">
                                      <img src="packages/<?php echo $row["image"]; ?>" width="200px" height="200px">
                                     <br>
                                     <br>
                                        <h4><?php echo $row["include"] ?></h4>
                                        <h4><?php echo $row["capacity"] ?></h4>
                                        <h4>Php. <?php echo $row["price"] ?></h4>
                                    </div>
                                 
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                       <!-- End Modal -->
                       
                     
                       
                       <!-- Delete Modal -->
                      <div class="modal fade" id="D<?php echo $Pid ; ?>" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete <?php echo $row["name"] ?>?</h4>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                 
                                    <div class="col-md-12 text-center">

                                    <form class="form-horizontal" role="form" action="deletepackage.php" method="post">
                                              <div class="form-group">
                                                <div class="col-md-12">
                                                   
                                                     <input type="hidden" name="package_id" id="package_id"  value="<?php echo $Pid;?>">
                                                   
                                                    <button type="submit" class="btn btn-danger custom" name="submit">YES</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                                </div>
                                              </div>
                                     </form>
        
                                    </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                       <!-- End Modal -->
    <?php


        }
        } else {
            echo "0 results";
        }
    ?>
       
    <?php

            mysqli_close($conn);
    ?> 
    
     </div>
    </div>
    
    <!-- Add Package Modal -->
        <div id="modalUpload" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
               <h5 class="modal-title">New Package</h5>
              </div>
              <?php
               
                $link = mysqli_connect("localhost", "root", "", "sugarbait");

                // Check connection
                if($link === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                if (isset($_POST['submit'])) {
                    $fileupload = $_FILES['fileupload']['name'];
                    $fileuploadTMP = $_FILES['fileupload']['tmp_name'];
                    $folder = "packages/";

                    move_uploaded_file($fileuploadTMP, $folder.$fileupload);
                    
                    $name = mysqli_real_escape_string($link, $_POST['name']);
                    $include = mysqli_real_escape_string($link, $_POST['include']);
                    $capacity = mysqli_real_escape_string($link, $_POST['capacity']);
                    $price = mysqli_real_escape_string($link, $_POST['price']);
                    
                    $s = "INSERT INTO packages ( image, name, include, capacity, price ) VALUES ( '$fileupload', '$name', '$include', '$capacity', '$price')";
                    if(mysqli_query($link, $s)){
                       echo '<script type="text/javascript"> alert("Successfully Added!");</script>';
                       header("Refresh: 1; url= admin.php");
                    } else{
                        echo "ERROR: Could not able to execute $s. ";
                      
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
                           <label  class="col-sm-2 control-label" for="name">Name</label>
                            <div class="col-sm-10">
                              <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                          </div>
                          
                          <div class="form-group">
                           <label  class="col-sm-2 control-label" for="include">Inclusion</label>
                            <div class="col-sm-10">
                              <input type="text" name="include" id="include" class="form-control" required>
                            </div>
                          </div>
                          
                          <div class="form-group">
                           <label  class="col-sm-2 control-label" for="capacity">Good for</label>
                            <div class="col-sm-10">
                              <input type="text" name="capacity" id="capacity" class="form-control" required>
                            </div>
                          </div>
                          
                           <div class="form-group">
                           <label  class="col-sm-2 control-label" for="capacity">Price</label>
                            <div class="col-sm-10">
                              <input type="text" name="price" id="price" class="form-control" required>
                            </div>
                          </div>
                          
                           
                          <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-4">
                                <button type="submit" class="btn btn-success custom" name="submit">Submit</button>
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
        <h5><span class="foot">Sugar</span><span class="subtitle">Bait</span> &copy 2018 | sugarbait@gmail.com</h4>
    </div>
    
    <script>
    $(document).ready(function(){
        $("#edit").click(function(){
            var package_id = $("#package_id").val();
            $.get("editpackage.php",{
                id: package_id
            },function(response){
                (response.trim()=="shit")
                    alert("SUCCESS!");
                     window.location.reload();
                
            });
            
        });
         
    });

  </script>
   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
