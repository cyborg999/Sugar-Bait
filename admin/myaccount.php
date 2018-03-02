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
     
                <li><a href="admin.php">PACKAGES</a></li>
                <li><a href="gallery.php">GALLERY</a></li>
                <li class=""><a href="report.php">REPORTING</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li ><a href="notif.php" class="glyphicon glyphicon-user"><span class="badge">
                 
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
                 <li class="active"><a href="myaccount.php"><?php echo $_SESSION["name"]; ?></a></li>
                 <li><a href="../logout.php">Log Out</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
           
           
             <?php 
           
                        
                        $first = $_SESSION["name"];
           
                        $con = mysqli_connect("localhost", "root", "", "sugarbait");
                        if (!$con) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                
                        $sql = "SELECT * FROM users WHERE firstname = '$first' ";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $sess_id = $row['id'];
                                        $fname = $row['firstname'];
                                        $lname = $row['lastname'];
                                        $add   = $row['address'];
                                        $num   = $row['contact'];

                                       
                                    }
                                } else {
                                    echo "";
                                }

                        $con->close();        
              ?> 
           
           
           
           
            
        <div class="well" style="margin-bottom: 5px">
            <h3>My Account</h3>
        </div>
           <div class="col-sm-12">
                         
                           <div class="col-sm-6" style="padding: 30px">
                              <div  class="label" style="color: black">Full Name</div>
                              <input type="text" name="name" id="name" value="<?php echo $fname." ".$lname;?>" class="form-control" readonly>
                              <br>
                              
                              <div  class="label" style="color: black">Address</div>
                              <input type="text" name="add" id="add" value="<?php echo $add;?>" class="form-control" readonly>
                              <br>
                               
                              <div  class="label" style="color: black">Contact No.</div>
                              <input type="text" name="num" id="num" value="<?php echo $num;?>" class="form-control" readonly>
                              <br>
                              
                              <button type="button" class="btn btn-default btn-xs pull-left" data-target="#modalChangepass" data-toggle="modal">Change Password</button>
                              <button type="button" class="btn btn-default btn-xs pull-right" data-target="#modalAddNew" data-toggle="modal">Add New Admin</button>
                              <br>
                              <br>
                           </div>
                          
                          <?php
             
           
                            $con = mysqli_connect("localhost", "root", "", "sugarbait");
                            if (!$con) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $sql = "SELECT * FROM companyinfo";
                                    $result = $con->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            $SBid = $row['id'];
                                            $bank = $row['bankaccount'];
                                            $globe = $row['globenum'];
                                            $smart   = $row['smartnum'];
                                     


                                        }
                                    } else {
                                        echo "";
                                    }

                            $con->close();        

                          ?>
                          
                          
                           <div class="col-sm-6" style="padding: 30px">
                              <div  class="label" style="color: black">SB Bank Account</div>
                              <input type="text" name="ba" id="ba" value="<?php echo $bank;?>" class="form-control" readonly>
                              <br>
                              
                              <div  class="label" style="color: black">SB Globe Number</div>
                              <input type="text" name="globe" id="globe" value="<?php echo $globe;?>" class="form-control" readonly>
                              <br>
                               
                              <div  class="label" style="color: black">SB Smart Number</div>
                              <input type="text" name="smart" id="smart" value="<?php echo $smart;?>" class="form-control" readonly>
                              <br>
                              <div class="col-sm-12">
                              <div class="col-sm-4 text-center" style="padding-bottom: 15px">
                              <button type="button" class="btn btn-default btn-xs " data-target="#modalChangeBA" data-toggle="modal">Change Bank Account</button>
                              </div>
                           
                              <div class="col-sm-4 text-center" style="padding-bottom: 15px">
                              <button type="button" class="btn btn-default btn-xs " data-target="#modalChangeGN" data-toggle="modal">Change Globe No.</button>
                              </div>
                            
                              <div class="col-sm-4 text-center" style="padding-bottom: 15px">
                              <button type="button" class="btn btn-default btn-xs " data-target="#modalChangeSN" data-toggle="modal">Change Smart No.</button>
                              </div>
                              </div>
                           
                           </div>
                          
                           
                           
                            
                
               
           
           </div>                        
     
     </div>
    </div>
    
    
    <!-- Change Password Modal -->
        <div id="modalChangepass" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
               <h5 class="modal-title">Change Password</h5>
              </div>
              <div class="modal-body">
                 <form class="form-horizontal" role="form" action="changepass.php" method="post">
                         
                          <div class="form-group">
                           <label  class="col-sm-3 control-label" for="uname">New Password</label>
                            <div class="col-sm-9">
                              <input type="password" name="newpass" id="newpass" class="form-control" required>
                            </div>
                          </div>
                          
                               <input type="hidden" name="sess_id" id="sess_id" value="<?php echo $sess_id;?>" >
                           
                          <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-4">
                                <button type="submit" class="btn btn-success custom" >Submit</button>
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
        <div id="modalAddNew" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
               <h5 class="modal-title">New Administrator</h5>
              </div>
              <div class="modal-body">
                 <form class="form-horizontal" role="form" action="addadmin.php" method="post">
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
                              <input type="hidden" name="admin" id="admin" class="form-control" value="admin">
                            </div>
                          </div>
                           
                          <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-4">
                                <button type="submit" class="btn btn-success custom" >Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal -->
        
        
         <!-- Change Bank Account Modal -->
        <div id="modalChangeBA" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
               <h5 class="modal-title">Change Bank Account</h5>
              </div>
              <div class="modal-body">
                 <form class="form-horizontal" role="form" action="editBA.php" method="post">
                         
                          <div class="form-group">
                           <label  class="col-sm-3 control-label" for="uname">New Bank Account</label>
                            <div class="col-sm-9">
                              <input type="text" name="bank" id="bank" class="form-control" required>
                            </div>
                          </div>
                          
                               <input type="hidden" name="BA_id" id="BA_id" value="<?php echo $SBid;?>" >
                           
                          <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-4">
                                <button type="submit" class="btn btn-success custom" >Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal -->
        
         <!-- Change Globe No. Modal -->
        <div id="modalChangeGN" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
               <h5 class="modal-title">Change Globe Number</h5>
              </div>
              <div class="modal-body">
                 <form class="form-horizontal" role="form" action="editGN.php" method="post">
                         
                          <div class="form-group">
                           <label  class="col-sm-3 control-label" for="uname">New Number</label>
                            <div class="col-sm-9">
                              <input type="text" name="newGN" id="newGN" class="form-control" required>
                            </div>
                          </div>
                          
                               <input type="hidden" name="GN_id" id="GN_id" value="<?php echo $SBid;?>" >
                           
                          <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-4">
                                <button type="submit" class="btn btn-success custom" >Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal -->
        
        <!-- Change Smart No. Modal -->
        <div id="modalChangeSN" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
               <h5 class="modal-title">Change Smart Number</h5>
              </div>
              <div class="modal-body">
                 <form class="form-horizontal" role="form" action="editSN.php" method="post">
                         
                          <div class="form-group">
                           <label  class="col-sm-3 control-label" for="uname">New Number</label>
                            <div class="col-sm-9">
                              <input type="text" name="newSN" id="newSN" class="form-control" required>
                            </div>
                          </div>
                          
                               <input type="hidden" name="SN_id" id="SN_id" value="<?php echo $SBid;?>" >
                           
                          <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-4">
                                <button type="submit" class="btn btn-success custom">Submit</button>
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
  </body>
</html>
