<?php 
  include_once "model.php"; 
  $model  = new Model();
  $package = $model->getPackageById($_GET['id']);
  $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $img = __DIR__."/image/".$package['image'];
?>

<html>
<head>
  <title>Your Website Title</title>
    <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
      <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= $package['name'];?> sugarbait">
  <meta name="robots" content="INDEX, FOLLOW">
  <meta itemprop="name" content="<?= $package['name'];?>">
    <meta name="author" content="Sugar Bait">
  <meta name="keywords" content="sugarbait sugar bait <?= $package['name'];?>">
  <meta property="og:url"           content="<?= $url;?>" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="<?= $package['name'];?>" />
  <meta property="og:description"   content="<?= $package['include'];?>" />
  <meta property="og:image"         content="<?= $img;?>" />
</head>
<body>
  <h1><?= $package['name'];?></h1>
  <img src="image/<?= $package['image'];?>">
</body>
</html>
