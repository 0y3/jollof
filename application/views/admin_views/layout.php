<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jollof Cuisine Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url()?>admin_assets/bootstrap/css/bootstrap.min.css">
  
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?=base_url()?>admin_assets/plugins/morris/morris.css">
  
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>admin_assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>admin_assets/dist/css/AdminLTE.min.css">
  
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>admin_assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url()?>admin_assets/plugins/datepicker/datepicker3.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?=base_url()?>admin_assets/plugins/timepicker/bootstrap-timepicker.min.css">
  
  <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
  <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>
  
  <script>
  var API_BASE = '<?=base_url()?>api/';
  </script>
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="<?=base_url()?>admin_assets/dist/css/skins/skin-blue.min.css">
  
  <!-- favicon -->
  <link rel="shortcut icon" href="<?=base_url()?>admin_assets/dist/img/favicon.png" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?=site_url("dashboard")?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>JOLLOF</b> Admin</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <i class="fa fa-user"></i>
              <span class="hidden-xs"><?=$this->session->firstname?> <?=$this->session->lastname?></span> - <small><?=$this->session->userLevel?></small>
            </a>
            <ul class="dropdown-menu">
              
              <li>
                <!-- inner menu: contains the actual data -->
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 130px;">
                <ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                  <li>
                    <a href="<?=site_url("dashboard/myAccount")?>">
                      <i class="fa fa-user text-aqua"></i> Update My Account
                    </a>
                  </li>
                  <li>
                    <a href="<?=site_url("dashboard/changePasswordForm")?>">
                      <i class="fa fa-lock text-yellow"></i> Change Password
                    </a>
                  </li>
                  <li>
                    <a href="<?=site_url("dashboard/signout")?>">
                      <i class="fa fa-sign-out text-red"></i> Sign Out
                    </a>
                  </li>
                </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 195.122px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
              </li>
              
            </ul>
          </li>
          
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <?php include_once 'sidebar.php'; ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if(isset($pageheader)) echo $pageheader; ?>
        <small><?php if(isset($pageTabTitle)) echo $pageTabTitle; ?></small>
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-laptop"></i> Home</a></li>
        <?php if(isset($breadCrumbs)) echo $breadCrumbs; ?>
        <!-- <li class="active">Here</li>  -->
      </ol>
      
    </section>

    <!-- Main content -->
    <section class="content">
	
		<?php include_once 'alerts.php'; ?>
      <!-- Your Page Content Here -->
      <?php include_once $content_file . '.php'; ?>
      <!-- End of content -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Version <strong>1.0.0</strong>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">Softcom Limited</a>.</strong> All rights reserved.
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>admin_assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>admin_assets/bootstrap/js/bootstrap.min.js"></script>

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?=base_url()?>admin_assets/plugins/morris/morris.min.js"></script>


<!-- FLOT CHARTS -->
<script src="<?=base_url()?>admin_assets/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?=base_url()?>admin_assets/plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?=base_url()?>admin_assets/plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?=base_url()?>admin_assets/plugins/flot/jquery.flot.categories.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="<?=base_url()?>admin_assets/plugins/knob/jquery.knob.js"></script>

<!-- DataTables -->
<script src="<?=base_url()?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>admin_assets/dist/js/app.min.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?=base_url()?>admin_assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url()?>admin_assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap time picker -->
<script src="<?=base_url()?>admin_assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<?php if(isset($mainmenu) && $mainmenu == 'dashboard') { ?>
<script src="<?=base_url()?>admin_assets/dist/js/pages/dashboard.js?<?=strtotime(date("Y-m-d H:i:s"))?>"></script>
<?php } ?>

<?php if(isset($mainmenu) && $mainmenu == 'transactions') { ?>
<script src="<?=base_url()?>admin_assets/dist/js/pages/transactions.js?<?=strtotime(date("Y-m-d H:i:s"))?>"></script>
<?php } ?>

<?php if(isset($mainmenu) && $mainmenu == 'orangecards') { ?>
<script src="<?=base_url()?>admin_assets/dist/js/pages/orangecards.js?<?=strtotime(date("Y-m-d H:i:s"))?>"></script>
<?php } ?>

<!-- ChartJS 1.0.1 -->
<script src="<?=base_url()?>admin_assets/plugins/chartjs/Chart.min.js"></script>

<script src="<?=base_url()?>admin_assets/dist/js/validator/jquery.form-validator.min.js"></script>
<script src="<?=base_url()?>admin_assets/dist/js/jqvalidation/jquery.validate.js"></script>


<script>
	 
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

  //Date range picker
    $('.reservation').daterangepicker().val('');
    
  	// Date picker
    $('.datepicker').datepicker({
      autoclose: true
    }).val('');

  	// Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
    
  });
</script>

<script>
	$().ready(function() {
		// validate the comment form when it is submitted
		$(".formvalidate").validate({
			  errorClass: "text-red"
			});
	});
	</script>
	
	

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>