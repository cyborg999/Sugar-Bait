<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
echo "<pre>";
print_r($_SESSION);
?>
<img src="$_SESSION['captcha']['image_src']">
</body>
</html>