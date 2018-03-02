<?php

$link = mysqli_connect("localhost", "root", "", "sugarbait");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security

$GN_id = mysqli_real_escape_string($link, $_POST['GN_id']);
$newGN = mysqli_real_escape_string($link, $_POST['newGN']);


// attempt insert query execution
$sql = "UPDATE companyinfo SET globenum = '$newGN' WHERE id = '$GN_id'";
if(mysqli_query($link, $sql)){
   echo '<script type="text/javascript"> alert("Successfully Changed!");</script>';
	header("Refresh: 1; url= myaccount.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>