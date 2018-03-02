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

$package_id = mysqli_real_escape_string($link, $_POST['package_id']);
$include = mysqli_real_escape_string($link, $_POST['include']);
$capacity = mysqli_real_escape_string($link, $_POST['capacity']);
$price = mysqli_real_escape_string($link, $_POST['price']);



// attempt insert query execution
$sql = "UPDATE packages SET include = '$include', capacity = '$capacity', price = '$price' WHERE id = '$package_id'";
if(mysqli_query($link, $sql)){
   echo '<script type="text/javascript"> alert("Successfully Added!");</script>';
	header("Refresh: 1; url= admin.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>