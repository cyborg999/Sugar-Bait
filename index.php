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
                <li class="active"><a href="index.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="gallery.php">GALLERY</a></li>
                <li><a href="packages.php">PACKAGES</a></li>
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
                    <h4>Put a smile to your guest's faces</h4>
             
                    <h5>as they dive into a sweet and heavenly treat</h5>
                </div>
                <div class="error">
                               <?php
                                $errors = array(
                                    1=>"Invalid username or password Try again",
                                    2=>"Please login to access this area"
                                  );

                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 2) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }
                               ?>  
                    </div>
            </div>
     </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8 page1">
              <div class="forceColor1"></div>
                
                    <img class="logo" src="./image/sugarbaitLG.png" alt="">
               
                <hr class="style">
                <h3 class="loc" >Laguna Buenavista Executive Homes Calamba, Laguna</h3>
                <h4 class="num">Contact: 09272378992</h4>
                
                <a href="https://www.facebook.com/sugarbaitcandybuffet/" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-instagram"></a>
                
            </div>
            
            <div class="col-lg-4">
         
                  <div id="myCarousel1" class="carousel slide" data-ride="carousel" style="width: 320px; margin-top:20px; margin-left: 5px">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel1" data-slide-to="1"></li>
                     
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <div class="item active">
                        <img src="image/b1.png" alt="">
                      </div>
                      <div class="item">
                        <img src="image/b2.png" alt="">
                      </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel1" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                  
                   <div id="myCarousel2" class="carousel slide" data-ride="carousel" style="width: 320px; margin-top: 20px; margin-left: 5px">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel2" data-slide-to="1"></li>
                      
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <div class="item active">
                        <img src="image/b2.png" alt="Los Angeles">
                      </div>
                      <div class="item">
                        <img src="image/b1.png" alt="Los Angeles">
                      </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel2" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
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
                            <h5 class="pull-left" style="padding-left: 15px; font-size: 15px">Don't have account yet? Register First.</h5>
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
