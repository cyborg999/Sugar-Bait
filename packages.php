<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="image/sb.ico">
    <title>SugarBait</title>
      
      
    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
              <a class="navbar-brand" href="index.php"><span class="title">Sugar</span>Bait</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="gallery.php">GALLERY</a></li>
                <li class="active"><a href="packages.php">PACKAGES</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
                <li><a href="#modalLogin" data-toggle="modal">SEND MESSAGE</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#modalLogin" data-toggle="modal">Log In</a></li>
                <li><a href="#modalRegister" data-toggle="modal">Register</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
            <div class="col-md-12 jumbotron">
                <div class="slogan text-center">
                    <h3>Packages</h3>
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
    ?>
                     <div class='col-md-4 text-center' style='margin-bottom: 20px;'>
                        <img src="admin/packages/<?php echo $row['image'];?>" width="200px" height="200px" alt="" style="padding: 10px; border-radius: 40px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                        <br>
                        <br>
                         <a type="button" class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#<?php echo $row["id"]; ?>">Details</a>
                    
                     </div>

                     <!-- View Modal -->
                      <div class="modal fade" id="<?php echo $row["id"]; ?>" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><?php echo $row["name"] ?></h4>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                    <style type="text/css">
                                      #share-buttons {
                                        margin-top: 40px;
                                      }
                                      #share-buttons img {
                                        width: 39px;
                                      }
                                    </style>
                                    <div class="col-md-12 text-center">
                                      <img src="admin/packages/<?php echo $row["image"]; ?>" width="200px" height="200px">
                                     <br>
                                     <br>
                                        <h4><?php echo $row["include"] ?></h4>
                                        <h4><?php echo $row["capacity"] ?></h4>
                                        <h4>Php. <?php echo $row["price"] ?></h4>
                                        <div id="share-buttons">
                                          <?php
  $url = $_SERVER['HTTP_HOST']."/sg";
                                          ?>
                                          <!-- Facebook -->
                                          <a href="http://www.facebook.com/sharer.php?u=<?= $url."/";?>package.php?id=<?= $row['id'];?>" target="_blank">
                                              <img src="image/facebook.png" alt="Facebook" />
                                          </a>
                                          <!-- Google+ -->
                                          <a href="https://plus.google.com/share?url=<?= $url;?>" target="_blank">
                                              <img src="image/google.png" alt="Google" />
                                          </a>
                                          <!-- Twitter -->
                                          <a href="https://twitter.com/share?url=<?= $url;?>&amp;text=<?= $row["name"] ?>&amp;hashtags=sugarbait" target="_blank">
                                              <img src="image/twitter.png" alt="Twitter" />
                                          </a>
                                        </div>
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
    

     
 
     <!-- Login Modal -->
        <div id="modalLogin" class="modal fade">
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
        
        <!-- Register Modal -->
        <div id="modalRegister" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
               <h5 class="modal-title">REGISTER</h5>
              </div>
              <div class="modal-body">
                 <form class="form-horizontal" role="form" action="register.php" method="post">
                          <div class="form-group">
                           <label  class="col-sm-2 control-label" for="firstname">FirstName</label>
                            <div class="col-sm-10">
                              <input type="text" name="firstname" id="firstname" class="form-control" required>
                            </div>
                          </div>
                          
                          <div class="form-group">
                           <label  class="col-sm-2 control-label" for="lastname">LastName</label>
                            <div class="col-sm-10">
                              <input type="text" name="lastname" id="lastname" class="form-control" required>
                            </div>
                          </div>
                          
                          <div class="form-group">
                           <label  class="col-sm-2 control-label" for="username">Username</label>
                            <div class="col-sm-10">
                              <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                          </div>
                          
                          <div class="form-group">
                           <label  class="col-sm-2 control-label" for="password">Password</label>
                            <div class="col-sm-10">
                              <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                          </div>
                          
                          <div class="form-group">
                           <label  class="col-sm-2 control-label" for="address">Address</label>
                            <div class="col-sm-10">
                              <input type="text" name="address" id="address" class="form-control" required>
                            </div>
                          </div>
                          
                          <div class="form-group">
                           <label  class="col-sm-2 control-label" for="address">Contact</label>
                            <div class="col-sm-10">
                              <input type="text" name="contact" id="contact" class="form-control" required>
                            </div>
                          </div>
                          
                           <div class="form-group">
                            <div class="col-sm-10">
                              <input type="hidden" name="user" id="user" class="form-control" value="user">
                            </div>
                          </div>
                           
                          <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-4">
                                <button type="submit" class="btn btn-success custom" name="go" id="go">Submit</button>
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
    
   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>