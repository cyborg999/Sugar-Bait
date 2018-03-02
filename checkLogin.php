<?php
include 'connect.php';
include 'function.php';

session_start();

$_SESSION["username"]=$_POST['uname'];
$_SESSION["password"]=$_POST['pass'];
$_SESSION["module"]=$_POST['module'];

if($_SESSION["module"] == 'admin')
{

	$sql = "SELECT * FROM admin";
	$result = $dbh ->query($sql);
	
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	

	if ($row['username'] == $_SESSION["username"] and $row['password'] == $_SESSION["password"])
	{

		$_SESSION["name"] = $row['firstname'];

		$_SESSION["id"] = $row['id'];
		$_SESSION["in"] = 'in';
		header('location:admin/admin.php');
	}
	else {
		echo '<script type="text/javascript"> alert("Wrong Username or Password!");</script>';
		header("Refresh: 1; url=index.php");
	}
	}
	}

}
else if($_SESSION["module"] == 'user')
{

	$sql2 = "SELECT * FROM members";
	$result2 = $dbh ->query($sql2);

	if ($result2->num_rows > 0) {
	// output data of each row
	while($row2 = $result2->fetch_assoc()) {

	if ($row2['user_username'] == $_SESSION["username"] and $row2['user_password'] == $_SESSION["password"])
	{
        $_SESSION["id"] = $row2['id'];
		$_SESSION["fname"] = $row2['user_fname'];
        $_SESSION["lname"] = $row2['user_lname'];
        $_SESSION["meter"] = $row2['meternum'];
        $_SESSION["cluster"] = $row2['clusternum'];
        $_SESSION["bday"] = $row2['user_bday'];
        $_SESSION["add"] = $row2['user_housenum'];
        $_SESSION["email"] = $row2['user_email'];
        $_SESSION["phone"] = $row2['user_phonenum'];
		
		$_SESSION["in"] = 'in';
		header('location:i.user/account.php');
	}
	else {
		echo '<script type="text/javascript"> alert("Wrong Username or Password!");</script>';
		header("Refresh: 1; url=index.php");
	}
	}
	}

}
else if($_SESSION["module"] == 'reader')
{

	$sql3 = "SELECT * FROM readers";
	$result3 = $dbh ->query($sql3);

	if ($result3->num_rows > 0) {
	// output data of each row
	while($row3 = $result3->fetch_assoc()) {

	if ($row3['username'] == $_SESSION["username"] and $row3['password'] == $_SESSION["password"])
	{
		
		$_SESSION["clusternum"] = $row3['clusternum'];
		$_SESSION["in"] = 'in';
		header('location:i.reader/bill.php');
	}
	else {
		echo '<script type="text/javascript"> alert("Wrong Username or Password!");</script>';
		header("Refresh: 1; url=index.php");
	}
	}
	}

}
	


$dbh ->close();
?>