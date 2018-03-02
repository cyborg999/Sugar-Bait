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
                <li><a href="packages.php">PACKAGES</a></li>
                <li class="active"><a href="contactus.php">CONTACT US</a></li>
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
                    <h3>Contact Us</h3>
                </div>
            </div>
            
            <div class="sblogo text-center">
                <img src="image/sblogo.png" alt="">
                <br>
                <h3 class="loc" >Laguna Buenavista Executive Homes Calamba, Laguna</h3>
                <h4 class="num">Contact: 724-7494 | 09272378992</h4>
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
