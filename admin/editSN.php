<?php

$link = mysqli_connect("localhost", "root", "", "sugarbait");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security

$SN_id = mysqli_real_escape_string($link, $_POST['SN_id']);
$newSN = mysqli_real_escape_string($link, $_POST['newSN']);


// attempt insert query execution
$sql = "UPDATE companyinfo SET smartnum = '$newSN' WHERE id = '$SN_id'";
if(mysqli_query($link, $sql)){
   echo '<script type="text/javascript"> alert("Successfully Changed!");</script>';
	header("Refresh: 1; url= myaccount.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>