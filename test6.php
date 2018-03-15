<?php 
  $url = $_SERVER['HTTP_HOST']."/Sugar-Bait/";
  $img = "http://".$url."image/b1.png";
  $packageName = "Package 1"
?>
<!DOCTYPE html>
<html>
<head>
  <title>Jordan Sadiwa</title>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Hello, Im Jordan Sadiwa. 25, Full Stack Web Developer from Pasay City. Feel free to contact me. sadiwajordan@yahoo.com linkedin https://ph.linkedin.com/in/jordan-sadiwa-2414a497">
  <meta name="robots" content="INDEX, FOLLOW">
  <meta itemprop="name" content="jordan sadiwa">
    <meta name="author" content="Jordan Sadiwa">
    <meta property="fb:app_id" content="966242223397117" />
  <meta name="keywords"
          content="Description Goes here">
    <meta property="og:url"           content="<?= $url;?>/>
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="<?= $packageName;?>" />
  <meta property="og:description"   content="<?= $packageName;?>" />
  <meta property="og:image"         content="<?= $img;?>" />
  
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>

</body>
</html>