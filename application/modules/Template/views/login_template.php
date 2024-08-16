<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title><?php echo $app_name; ?> - <?php echo $pagename; ?></title>
    <link rel="apple-touch-icon" sizes="60x60" href="<?php //echo site_url('app-assets/img/ico/apple-icon-60.html'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php //echo site_url('app-assets/img/ico/apple-icon-76.html');?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php //echo site_url('app-assets/img/ico/apple-icon-120.html');?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php //echo site_url('app-assets/img/ico/apple-icon-152.html');?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('app-assets/img/ico/favicon.ico');?>">
	<link rel="shortcut icon" type="image/png" href="<?php echo site_url('app-assets/img/ico/favicon.ioc'); ?>" />
    <link rel="shortcut icon" type="image/png" href="<?php //echo site_url('app-assets/img/ico/favicon-32.png');?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('app-assets/fonts/feather/style.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('app-assets/fonts/simple-line-icons/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('app-assets/fonts/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('app-assets/vendors/css/perfect-scrollbar.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('app-assets/vendors/css/prism.min.css'); ?>">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('app-assets/css/app.css'); ?>">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
  <style>
  	.bg_img{
		background-position:center;
		background-repeat:no-repeat;
		background-size:cover;
		position:absolute;
		width:100%;
		height:100%;
	}
  </style>
  </head>
  <body data-col="1-column" class=" 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper">
          <div class="bg_img" style="background-image:url(<?php echo site_url('app-assets/img/bg.png'); ?>);"></div>
          <?php $this->load->view($loadpage); ?>
          </div>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo site_url('app-assets/vendors/js/core/jquery-3.2.1.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/core/popper.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/core/bootstrap.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/perfect-scrollbar.jquery.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/prism.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/jquery.matchHeight-min.js');?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/screenfull.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/pace/pace.min.js');?>" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="<?php echo site_url('app-assets/js/app-sidebar.js');?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/js/notification-sidebar.js');?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/js/customizer.js');?>" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>


</html>