<?php

$link = mysqli_connect("localhost", "root", "", "sugarbait");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security

$BA_id = mysqli_real_escape_string($link, $_POST['BA_id']);
$bank = mysqli_real_escape_string($link, $_POST['bank']);


// attempt insert query execution
$sql = "UPDATE companyinfo SET bankaccount = '$bank' WHERE id = '$BA_id'";
if(mysqli_query($link, $sql)){
   echo '<script type="text/javascript"> alert("Successfully Changed!");</script>';
	header("Refresh: 1; url= myaccount.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>