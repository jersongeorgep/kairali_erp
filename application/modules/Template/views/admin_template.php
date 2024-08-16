<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title> <?php echo $app_name; ?> - <?php echo $pageheading; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('app-assets/img/ico/favicon.ico'); ?>">
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
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('app-assets/vendors/css/chartist.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('app-assets/vendors/css/pickadate/pickadate.css'); ?>">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('app-assets/css/app.css'); ?>">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
     <script src="<?php echo site_url('app-assets/vendors/js/core/jquery-3.2.1.min.js'); ?>" type="text/javascript"></script>
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo site_url('app-assets/vendors/js/chartist.min.js'); ?>" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <script>
      var base_url = "<?= site_url(); ?>";
    </script>
  </head>
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


      <?php $this->load->view('Side_bar'); ?>

      <div class="main-panel">

       <?php $this->load->view('Header_page'); ?>

        <div class="main-content">
        	<div class="content-wrapper">
        		<?php $this->load->view($loadpage); ?>
			</div>
        </div>

        <?php $this->load->view('Footer_page');?>

      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- START Notification Sidebar-->
    <aside id="notification-sidebar" class="notification-sidebar d-none d-sm-none d-md-block"><a class="notification-sidebar-close"><i class="ft-x font-medium-3"></i></a>
      <div class="side-nav notification-sidebar-content">
        <div class="row">
          <div class="col-12 mt-1">
            <ul class="nav nav-tabs">
              <li class="nav-item"><a id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#activity-tab" aria-expanded="true" class="nav-link active">Activity</a></li>
            </ul>
            <div class="tab-content px-1 pt-1">
              <div id="activity-tab" role="tabpanel" aria-expanded="true" aria-labelledby="base-tab1" class="tab-pane active">
                <div id="activity" class="col-12 timeline-left">
                  <h6 class="mt-1 mb-3 text-bold-400">RECENT ACTIVITY</h6>
                  <div id="timeline" class="timeline-left timeline-wrapper">
                    <ul class="timeline">
                      <li class="timeline-line"></li>
                      <?php echo activityReport(); ?>
                      
                    </ul>
                    <a href="<?php echo site_url('library/clearalllog');?>" class="btn btn-danger square"> <i class="fa fa-delete"></i> Clear All Log report</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </aside>
    <!-- END Notification Sidebar-->
    
    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo site_url('app-assets/vendors/js/core/popper.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/core/bootstrap.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/perfect-scrollbar.jquery.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/prism.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/jquery.matchHeight-min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/screenfull.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/pace/pace.min.js'); ?>" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    
    <!-- BEGIN APEX JS-->
    <script src="<?php echo site_url('app-assets/js/app-sidebar.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/js/notification-sidebar.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/js/customizer.js'); ?>" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo site_url('app-assets/js/dashboard1.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/pickadate/picker.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/pickadate/picker.date.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/vendors/js/pickadate/picker.time.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('app-assets/js/pick-a-datetime.js'); ?>" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    
  </body>


</html>