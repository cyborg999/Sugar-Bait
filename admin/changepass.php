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

$sess_id = mysqli_real_escape_string($link, $_POST['sess_id']);
$newpass = mysqli_real_escape_string($link, $_POST['newpass']);




// attempt insert query execution
$sql = "UPDATE users SET password = '$newpass'  WHERE id = '$sess_id'";
if(mysqli_query($link, $sql)){
   echo '<script type="text/javascript"> alert("Successfully Edited!");</script>';
	header("Refresh: 1; url= myaccount.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>