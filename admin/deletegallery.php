<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
$link = mysqli_connect("localhost", "root", "", "sugarbait");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security

$gallery_id = mysqli_real_escape_string($link, $_POST['gallery_id']);



// attempt insert query execution
$sql = "DELETE FROM gallery WHERE id = '$gallery_id'";

if(mysqli_query($link, $sql)){
   echo '<script type="text/javascript"> alert("Successfully Deleted!");</script>';
	header("Refresh: 1; url= gallery.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>