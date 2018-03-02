<?php 
error_reporting(0);
  include_once "../model.php"; 
  $model  = new Model();
  $data = $model->filterReservePackage($_GET,true);
  $model->exportCSVListener($data);
?>