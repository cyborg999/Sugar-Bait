<?php

$con = mysqli_connect("localhost", "root", "", "sugarbait");
if (!$con) {
die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

$query = $con->query("UPDATE reservepackage SET status = '1' WHERE id = '$id' ");



$sql = "SELECT * FROM reservepackage  WHERE id = '$id'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
                                        
$fname = $row['firstname'];
$lname = $row['lastname'];
                        
        }
} else {
                                      
}

$query = $con->query("INSERT INTO notif (packageID, firstname, lastname) VALUES ('$id', '$fname', '$lname') ");





if($query){
    echo "success";
}else{
    echo "oh no!";
}

?>