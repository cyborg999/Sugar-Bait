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

$firstname = mysqli_real_escape_string($link, $_POST['firstname']);
$lastname = mysqli_real_escape_string($link, $_POST['lastname']);
$username = mysqli_real_escape_string($link, $_POST['username']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$address = mysqli_real_escape_string($link, $_POST['address']);
$contact = mysqli_real_escape_string($link, $_POST['contact']);
$role = mysqli_real_escape_string($link, $_POST['admin']);


// attempt insert query execution
$sql = "INSERT INTO users ( firstname, lastname, username, password, address, contact, role) 
VALUES ('$firstname', '$lastname','$username','$password', '$address', '$contact', '$role')";
if(mysqli_query($link, $sql)){
   echo '<script type="text/javascript"> alert("Successfully Added!");</script>';
	header("Refresh: 1; url= myaccount.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>