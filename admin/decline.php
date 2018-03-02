<?php

$con = mysqli_connect("localhost", "root", "", "sugarbait");
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

$query = $con->query("DELETE FROM reservepackage WHERE id = '$id' ");

if($query){
    echo "shit";
}else{
    echo "wtf";
}

?>