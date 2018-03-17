<?php 
  include_once "model.php"; 
  $model  = new Model();
  $package = $model->getPackageById($_GET['id']);


  $url = $_SERVER['HTTP_HOST']."/sg";
  $img = "http://".$url.'/admin/packages/'.$package['image'];
  $packageName = $package['name'];
  $desc = $package['include'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sugar Bait - <?= $packageName;?></title>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sugarbait Sugar Bait <?= $packageName;?>">
  <meta name="robots" content="INDEX, FOLLOW">
  <meta itemprop="name" content="<?= $packageName;?>">
    <meta name="author" content="sugar bait">
    <meta property="fb:app_id" content="966242223397117" />
  <meta name="keywords"
          content="Sugarbait Sugar Bait <?= $packageName;?>">
    <meta property="og:url"           content="<?= $url;?>"/>
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="<?= $packageName;?>" />
  <meta property="og:description"   content="<?= $desc;?>" />
  <meta property="og:image"         content="<?= $img;?>" />
  
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>

</body>
