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
    <meta property="og:url"           content=" http://<?= $url;?>"/>
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="<?= $packageName;?>" />
  <meta property="og:description"   content="<?= $desc;?>" />
  <meta property="og:image"         content="<?= $img;?>" />
  <meta property="og:image:width"         content="200px" />
  <meta property="og:image:height"         content="200px" />
  

   <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,700" rel="stylesheet" type='text/css'>
      
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
   </head>

    
<body>
    <div class="container">
       <div class="row">
        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php"><span class="title">Sugar</span>Bait</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="gallery.php">GALLERY</a></li>
                <li class="active"><a href="packages.php">PACKAGES</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
                <li><a href="#modalLogin" data-toggle="modal">SEND MESSAGE</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#modalLogin" data-toggle="modal">Log In</a></li>
                <li><a href="#modalRegister" data-toggle="modal">Register</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
        <style type="text/css">

          .jumbotron,
          .jumbotron h1,
          .jumbotron img {
            color: white;
            font-weight: 700;
            margin: 0 auto;
            text-align: center;
          }
          .sblogo p {
            padding-top: 20px;
            font-size: 18px;
            display: block;
            clear: both;
          }
        </style>
            <div class="col-md-12 jumbotron">
                <h1><?=$packageName;?></h1>
                <img src="<?=$img;?>" alt="">
            </div>
                <br>
            
            <div class="sblogo text-center">
                <br>
                <br>
                <p><?=$desc;?></p>

            </div>
     
     </div>
    </div>

      
    
    <div class="footer">
        <h5><span class="foot">Sugar</span><span class="subtitle">Bait</span> &copy 2018 | sugarbait@gmail.com</h4>
    </div>
  </body>
</html>
