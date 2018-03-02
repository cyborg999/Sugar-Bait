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

    $sql = "SELECT  *  FROM packages WHERE id = '$id'";
    $result = $con->query($sql);


    if ($result->num_rows > 0) {
        
     // output data of each row
     while($row = $result->fetch_assoc()) { 
    $packageid = $row['id'];
    $name = $row['name'];
    $include = $row['include'];
    $capacity = $row['capacity'];
  
            }
        } 
                                                       
    $con->close();
    ?>
                                                        

<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

                                                       
<div>

    <div class="panel panel-default cstatus">
      <div class="panel-heading text-center">EDIT PACKAGE</div>
      <div class="panel-body">
                                                       
                   <div class="col-md-12 col-xs-12">
                       <form class="form-horizontal" role="form" action="edit.php" method="post">
                          <div class="control">
                          <div  class="label" style="color: black">Package Name</div>
                           
                              <input type="text" name="name" id="name" value="<?php echo $name;?>" class="form-control" readonly>
                         
                          </div>
                          
                          <div class="control">
                          <div  class="label" style="color: black">Inclusion</div>
                           
                              <input type="text" name="include" id="include" class="form-control" value="" required>
                         
                          </div>
                          
                          <div class="control">
                          <div  class="label" style="color: black">Capacity</div>
                          
                              <input type="text" name="capacity" id="capacity" class="form-control" value="" required>
                          </div>
                          
                          <div class="control">
                          <div  class="label" style="color: black">Price</div>
                          
                              <input type="text" name="price" id="price" class="form-control" value="" required>
                          </div>
                          
                        
                              <input type="hidden" name="package_id" id="package_id"  value="<?php echo $packageid;?>">
                
                           
                           <br>
                           
                          <div class="control">
                       
                                <input type="submit" class="btn btn-success pull-right"   id="submit" value="SUBMIT"/>
                        
                        
                          </div>
                 </form>
                      
                      
                     </div>  
                      
            
      
        </div>        
                   
    </div>

</div>


 