<?php

if(isset($_POST["submit"]))
{
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
$link = mysqli_connect("localhost", "root", "", "sugarbait");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $packageName=$_POST["packagename"];
    
}
// Escape user inputs for security

$datetime = mysqli_real_escape_string($link, $_POST['date']);
$fname = mysqli_real_escape_string($link, $_POST['fname']);
$lname = mysqli_real_escape_string($link, $_POST['lname']);
$request = mysqli_real_escape_string($link, $_POST['request']);
$status = mysqli_real_escape_string($link, $_POST['status']);



// attempt insert query execution
//$sql = "INSERT INTO reservepackage ( packagenum, date, firstname, lastname, request, status) 
//VALUES ('$packageName', '$datetime','$fname', '$lname', '$request', '$status')";
//if(mysqli_query($link, $sql)){
//	header("Refresh: 1; url= packages.php");
//} else{
//    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
//}

$sql = "INSERT INTO reservepackage ( packagenum, date, firstname, lastname, request, status) 
VALUES ('$packageName', '$datetime','$fname', '$lname', '$request', '$status')";
if(mysqli_query($link, $sql)){
   echo '<script type="text/javascript"> alert("Successfully Added!");</script>';
	header("Refresh: 1; url= packages.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>