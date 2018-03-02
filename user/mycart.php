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
    <!-- Bootstrap Date-Picker Plugin -->
    <link href="../datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
 
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
                <li ><a href="packages.php">BOOKING</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
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
                <li class="active"><a href="mycart.php" class="glyphicon glyphicon-shopping-cart" style="font-size: 15px"></a></li>
                <li><a href="../logout.php">Log Out</a></li>
           
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
        <div class="well" style="margin-bottom: 5px">
            <h3>My Cart</h3>
        </div>
                                          <div style="padding: 10px">
                                                     <?php
                                                         $conn = mysqli_connect("localhost", "root", "", "sugarbait");
                                                            if (!$conn) {
                                                                die("Connection failed: " . mysqli_connect_error());
                                                            }
                                                      
                                                        $fname = $_SESSION["name"];
                                                        $lname = $_SESSION["last"];
                                                        $sql = "SELECT  *  FROM reservepackage WHERE firstname = '$fname' AND lastname = '$lname'";
                                                        $result = $conn->query($sql);

                                                        echo "<table  class='table' >
                                                           <tr>
                                                           
                                                           <th width=25%>Package</th>
                                                           <th width=30%>Date & Time</th>
                                                           <th width=15%>Status</th>
                                                          
                                                           </tr>";

                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) { 
                                                                $id = $row['id'];
                                                                $pname = $row['packagenum'];
                                                                $date = $row['date'];
                                                                $status= $row['status'];
                                                                
                                                                if($status==0){
                                                                    $shit = "<span class='label label-danger'>PENDING</span>";
                                                                }else {
                                                                     $shit = "<span class='label label-info'>ACCEPTED</span>";
                                                                }
                                                               
                                                         

                                                            echo 
                                                                "<tr>
                                                                <td>" . $pname . "</td>
                                                                <td>" . $date ."</td>
                                                           
                                                                
                                                                <td> ".$shit." </td>
                                                            
                                                                </tr>";
                                                            }
                                                        } else {
                                                            echo "0 results";
                                                        }
                                                        echo "</table>";
                                                        $conn->close();
                                                        ?> 
                                                        </div>
                
     </div>
   </div>

   

    
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
