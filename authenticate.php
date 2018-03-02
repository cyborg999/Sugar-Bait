<?php 
 require 'connect.php';

 session_start();

 $username = "";
 $password = "";
 
 if(isset($_POST['uname'])){
  $username = $_POST['uname'];
 }
 if (isset($_POST['pass'])) {
  $password = $_POST['pass'];

 }
 
 $q = 'SELECT * FROM users WHERE username=:uname AND password=:pass';

 $query = $dbh->prepare($q);

 $query->execute(array(':uname' => $username, ':pass' => $password));


 if($query->rowCount() == 0){
  header('Location: index.php?err=1');
 }else{

  $row = $query->fetch(PDO::FETCH_ASSOC);

  session_regenerate_id();
  $_SESSION['sess_user_id'] = $row['id'];
  $_SESSION['sess_username'] = $row['username'];
  $_SESSION['sess_password'] = $row['password'];
  $_SESSION['sess_userrole'] = $row['role'];

  echo $_SESSION['sess_userrole'];
  echo $_SESSION['sess_password'];
  echo $_SESSION['sess_username'];
     

  if( $_SESSION['sess_userrole'] == "admin"){
    
    if ($row['username'] == $_SESSION["sess_username"] and $row['password'] == $_SESSION["sess_password"])
	{

		$_SESSION["name"] = $row['firstname'];

		$_SESSION["id"] = $row['id'];
		$_SESSION["in"] = 'in';
		 header('Location: admin/notif.php');
	}

  }else{

     if ($row['username'] == $_SESSION["sess_username"] and $row['password'] == $_SESSION["sess_password"])
	{

		$_SESSION["name"] = $row['firstname'];
        $_SESSION["last"] = $row['lastname'];

		$_SESSION["id"] = $row['id'];
		$_SESSION["in"] = 'in';
        header('Location: user/packages.php');
	}
  }
 }


?>