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
                <li class="active"><a href="contactus.php">CONTACT US</a></li>
                <li><a href="messages.php">CHAT</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><?php echo $_SESSION['name'];?></a></li>
                <li><a href="notif.php" class="glyphicon glyphicon-bell"><span class="badge">
                      
                        
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
            <div class="col-md-12 jumbotron">
                <div class="slogan text-center">
                    <h3>Contact Us</h3>
                </div>
            </div>
            
            <div class="sblogo text-center">
                <img src="../image/sblogo.png" alt="">
                <br>
                <h3 class="loc" >Laguna Buenavista Executive Homes Calamba, Laguna</h3>
                <h4 class="num">Contact: 724-7494 | 09272378992</h4>
            </div>
     
     </div>
    </div>
    


    <div class="footer">
        <h5><span class="foot">Sugar</span>Bait &copy 2018 | sugarbait@gmail.com</h4>
    </div>
    
   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
  </body>
</html>
