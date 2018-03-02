  <script src="../lib/jquery.js" type="text/javascript"></script>
  <script src="../js/facebox.js" type="text/javascript"></script>

  <script type="text/javascript">
       jQuery(document).ready(function($) {
          $('a[rel*=facebox]').facebox({
            loadingImage : '../image/loading.gif',
            closeImage   : '../image/closelabel.png'
             window.location.reload();
          });
           
	$("#view").click(function(){
    $.facebox({ ajax: "my-facebox-file.html" });
   });
           
       })
      
  </script>
  
  
  
  
    <?php
    $con = mysqli_connect("localhost", "root", "", "sugarbait");
    if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
    }
                                                        
        
    $id =$_REQUEST['id'];

    $sql = "SELECT  *  FROM reservepackage WHERE id = '$id'";
    $result = $con->query($sql);


    if ($result->num_rows > 0) {
        
     // output data of each row
     while($row = $result->fetch_assoc()) { 
    $Pid = $row['id'];
    $fname = $row['firstname'];
    $lname = $row['lastname'];
    $date = $row['date'];
    $req = $row['request'];
    
            }
        } 
                                                       
    $con->close();
    ?>
                                                        

 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

                                                       
<div>

    <div class="panel panel-default cstatus">
      <div class="panel-heading text-center">RESERVATION DETAILS</div>
      <div class="panel-body">
                                                       
                   
                       <div class="col-md-12 col-xs-12">
                       
                        <div class="control">
                            <div class="label" style="color: black">Client Name</div>
                            <input type="text" class="form-control" value="<?php echo $fname." ".$lname ;?>" readonly/>
                        </div>
                
                        <div class="control">
                            <div class="label" style="color: black">Date and Time</div>
                            <input type="text" class="form-control" value="<?php echo $date ;?>" readonly/>
                        </div>

                        <div class="control">
                             <div class="label" style="color: black">Special Request</div>
                            <input type="text" class="form-control" value="<?php echo $req ;?>" readonly/>
                        </div>
                       </div>
                    
                     
                      
                     
                <input type="hidden" id="owner_id" value="<?php echo $Pid; ?>">
                
             
      
      </div>
      
               <div style="margin-top: 10px" align="center">
                   
                    <form>
                 
                    <input type="button" class="btn btn-info btn-sm" style="color: black" href="javascript:void(0);" id="accept"  value="ACCEPT"/>
                    <input type="button" class="btn btn-danger btn-sm" style="color: black" href="javascript:void(0);" id="decline"  value="DE-CLINE"/>
                    
                    </form>
                </div>     
    </div>

</div>


  <script>
    $(document).ready(function(){
        $("#accept").click(function(){
            var owner_id = $("#owner_id").val();
            $.get("accept.php",{
                id: owner_id
            },function(response){
                (response.trim()=="shit")
                    alert("SUCCESS!");
                     window.location.reload();
                
            });
            
        });
         
    });
      
      $(document).ready(function(){
        $("#decline").click(function(){
            var owner_id = $("#owner_id").val();
            $.get("decline.php",{
                id: owner_id
            },function(response){
                (response.trim()=="shit")
                    alert("SUCCESS!");
                    window.location.reload();
                    
            });
            
        });
         
    });


  </script>