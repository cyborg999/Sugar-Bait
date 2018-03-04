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
                <li class="active"><a href="packages.php">BOOKING</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
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

                <div class="container">
                    <div class="row col-md-12" style="padding: 10px">
                     
                
     <div class="col-md-8">         
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
                        <img src="../admin/packages/<?php echo $row['image'];?>" width="200px" height="200px" alt="" style="padding: 10px; border-radius: 40px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
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
                              <h4 class="modal-title"><?php echo $row["fname"] ?></h4>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                 
                                    <div class="col-md-12 text-center">
                                      <img src="../admin/packages/<?php echo $row["image"]; ?>" width="200px" height="200px">
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
             
              
                    <div class="col-md-4 text-center">
                          <div class="well">
                          <h4>BOOKING</h4>
                          <hr>
                          
                           <form class="form-horizontal" role="form" action="reserve.php" method="post">
                          <div class="form-group">
                         <label  class="col-sm-4 control-label" for="packagename">Package</label>
                            <div class="col-sm-8">
                               <?php
           
                                $conn = mysqli_connect("localhost", "root", "", "sugarbait");
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $sql = "SELECT * FROM packages";
                                $result = mysqli_query($conn, $sql);
                                ?>
                                 <select name="packagename" style="width: 200px">
                                  <option selected>Choose Package</option>
                                <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>             
                                <?php
                                    }
                                    } else {
                                        echo "0 results";
                                    }
                                ?>
                              </select>
                                <?php

                                        mysqli_close($conn);
                                ?> 
    
                                  
                            </div>
                          </div>
                          
                       <div class="form-group">
                           <div class="controls input-append date form_date" data-date-format="dd MM yyyy" data-link-field="dtp_input1">
                                 <label  class="col-sm-4 control-label" for="date">Date & Time</label>
                                 <div class="col-sm-8">
                 <input type="date" name="date">
                                
                                <span class="add-on"><i class="icon-remove"></i></span>
                                <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>
                            <input type="hidden" id="dtp_input1" value="" /><br/>
                           
                        </div>
                          
                           <div class="form-group">
                            <div class="col-sm-12">
                              <input type="hidden" name="fname" id="fname" class="form-control" value="<?php echo $_SESSION["name"];?>">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm-12">
                              <input type="hidden" name="lname" id="lname" class="form-control" value="<?php echo $_SESSION["last"];?>">
                            </div>
                          </div>
                          
                            <div class="form-group">
                            <label  class="col-sm-4" for="date">Special Request</label>
                            <div class="col-sm-8">
                              <textarea name="request" id="request" cols="25" rows="5"></textarea>
                            </div>
                          </div>
                          
                           <div class="form-group">
                            <div class="col-sm-12">
                              <input type="hidden" name="status" id="status" class="form-control" value="0">
                            </div>
                          </div>
                           
                          <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-4">
                                <button type="submit" class="btn btn-success custom" name="submit" id="submit">Submit</button>
                            </div>
                          </div>
                 </form>
                          </div>
                      </div>
                       
           </div>
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
   <!--   <script type="text/javascript" src="../datepicker/bootstrap-datetimepicker.min.js"></script>-->
   <!--  <script type="text/javascript" src="../datepicker/bootstrap-datetimepicker.fr.js"></script> -->
    <script src="../js/scripts.js"></script>
   <script type="text/javascript">
   <!--  $('.form_date').datetimepicker({
        //language:  'fr',
    <!--     weekStart: 1,
    <!--     todayBtn:  1,
    <!--     minDate: '+5d',
  <!--  autoclose: 1,
  <!--  todayHighlight: 1,
  <!--  startView: 2,
  <!--  forceParse: 0,
    <!--     showMeridian: 1
  <!--   }); 
</script>

  </body>
</html>
