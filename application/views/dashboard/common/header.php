<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Online Booking System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?php echo base_url()."assets/";?>img/icon.png">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bootstrap/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>font-awesome/css/font-awesome.min.latest.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/AdminLTE.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/morris/morris.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"></link>
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/skins/_all-skins.min.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/daterangepicker/daterangepicker.css"> -->
  <script src="<?php echo base_url()."assets/"; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!--<script src="<?php echo base_url()."assets/"; ?>plugins/daterangepicker/daterangepicker.js"></script>-->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries 
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respodn.min.js"></script>
  <![endif]-->
   <style type="text/css">
   table{
    font-size: 12px;
    font-weight: 5px;
   }
   .content-wrapper{
      background-image: url("<?php echo base_url()."assets/img/container-bg.png"; ?>");
      background-size:cover;
      background-size:100%;
      background-attachment: fixed;
   }

   .underconstruction{
      background-image: url("<?php echo base_url()."assets/img/underconstruction.png"; ?>");
      background-size:100%;
      min-height: 450px;
   }

   h1{
    color:#99a19a;
   }
    .error-mess{
        color:red;
    }
    .para-no-margin{
      margin:0;
    }
  .navbar-collapse.in {
      padding-top:30px;
  }
</style>
</head>
<body class="hold-transition skin-blue layout-top-nav wysihtml5-supported">
<div class="wrapper">  