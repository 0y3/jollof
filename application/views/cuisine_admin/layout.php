<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/ico" href="<?=base_url()?>assets_v2/assets/images/favicon.ico">
    <title>Jollof Admin Panel</title>
    <!-- Custom CSS -->
  	
  	<?php if(isset($mainmenu) && $mainmenu == "products"){?>
        <!-- Include the plugin's CSS :  -->
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/bootstrap-multiselect.css" type="text/css"/>
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/css-loader.css">
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/token-input-facebook.css">
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/selectize.default.css">

        <!-- Crop Css  -->
        <link href="<?= base_url() ?>assets/css/cropbox.css" rel="stylesheet">
        
  	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_v2/assets/libs/dropzone/dist/min/dropzone.min.css">
        
        <link href="<?= base_url() ?>assets_v2/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_v2/dist/css/product.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/css-loader.css">
  	<?php } ?>
  	
  	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_v2/assets/libs/select2/dist/css/select2.min.css">
  	
    <!-- Fusion charts assets -->
  	<!-- <script type="text/javascript" src="https://static.fusioncharts.com/code/latest/fusioncharts.js"></script> 
  	<script type="text/javascript" src="https://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script> -->
  
    <link href="<?=base_url()?>assets_v2/dist/css/style.min.css" rel="stylesheet">
    <script src="<?=base_url()?>assets_v2/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url(); ?>assets/js/jquery-ui.min.js"></script>
    <script> var site_url = '<?php echo site_url(); ?>';  </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
   .ajax-loader {
        visibility: hidden;
        background-color: rgba(255,255,255,0.7);
        position: absolute;
        z-index: 99999 !important;
        overflow: hidden;
        top: 0;
        left: 0;
        width: 100%;
        height:100%;
    }

    .ajax-loaderr img {
        position: relative;
        top:50%;
        left:50%;
    }
    .loader .is-active{
        background-color: rgba(255,255,255,0.7) !important;
    }
    .loader img {
        position: relative;
        top:50%;
        left:50%;
    }
    .caret {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: 2px;
        vertical-align: middle;
        border-top: 4px solid;
        border-right: 4px solid transparent;
        border-left: 4px solid transparent;
    }
    #variant_order,#variant_name {
        width:100px; 
    }
    #variant_order input,#variant_name input{
        float: left;
        width:100px; 
    }
    #variant_order a,#variant_name a{
        float: left;
        width:40px; 
    }
    #variant_name,#variant_order,#variant_discount, #variant_status {
        position: absolute;
        display:none;
    }
</style>
<body>
    
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- check_Loginin Users -->
    <!-- ============================================================== -->
    <?php
        if(!isset($_SESSION['cuisineAdmin']) || $_SESSION['cuisineAdmin'] != true || $_SESSION['Type'] != 'cuisine')
        {
            redirect('cuisineadmin/authentication/login', 'refresh');   
        }
        else
        {
            if(!isset($_SESSION['Paymentid']) ||  $_SESSION['Paymentid'] == '')
            {
                if(isset($mainmenu) && $mainmenu !="settings")
                {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'You Need to Complet your Store Details Before any Action is Performed ');
                redirect('cuisineadmin/dashboard/settings', 'refresh');   
                }
            }

            else if(!isset($_SESSION['forcechangepassword']) ||  $_SESSION['forcechangepassword'] == '1')
            {
                if(isset($mainmenu) && $mainmenu !="changepassword")
                {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'You Need to Change your default Password Before any Action is Performed ');
                redirect('cuisineadmin/dashboard/changepasswordform', 'refresh');   
                }
            }
        }

      ?>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" target="_blank" href="<?=site_url();?>">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            
                            <!-- Light Logo icon -->
                            <img src="<?=base_url()?>assets_v2/assets/images/logo.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="<?=base_url()?>assets_v2/assets/images/logo.png" alt="homepage" class="dark-logo" />
                            
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="sl-icon-menu font-20"></i>
                            </a>
                        </li>
                        


                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <i class="ti-search font-16"></i>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                        

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                
                                
                                <?php 
                                	if($this->session->avatar != "")
                                	{
                                ?>  
                                <img src="<?=base_url()?>assets/uploads/rest_logo/<?=$this->session->avatar?>" alt="user" class="rounded-circle" width="31">
                                <?php 
                                	}
                                	else 
                                	{
                                ?> 
                                	<img src="<?=base_url()?>assets/uploads/profile_pic/noimage.jpg" alt="user" class="rounded-circle" width="31">
                                <?php 
                                	}
                                ?>
        
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        
                                        <?php 
                                        	if($this->session->avatar != "")
                                        	{
                                        ?>  
                                        <img src="<?=base_url()?>assets/uploads/rest_logo/<?=$this->session->avatar?>" alt="user" class="img-circle" width="60">
                                        <?php 
                                        	}
                                        	else 
                                        	{
                                        ?> 
                                        	<img src="<?=base_url()?>assets/uploads/profile_pic/noimage.jpg" alt="user" class="img-circle" width="60">
                                        <?php 
                                        	}
                                        ?>
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?=$this->session->firstname?> <?=$this->session->lastname?></h4>
                                        <p class=" m-b-0"><?=$this->session->userLevel?></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="<?=site_url("cuisineadmin/dashboard/myaccount")?>">
                                    <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                
                                <a class="dropdown-item" href="<?=site_url('cuisineadmin/dashboard/changepasswordform')?>">
                                    <i class="ti-wallet m-r-5 m-l-5"></i> Change Password</a>
                                
                                <div class="dropdown-divider"></div>
                                
                                <a class="dropdown-item" href="<?=site_url("cuisineadmin/dashboard/settings")?>">
                                    <i class="ti-settings m-r-5 m-l-5"></i> Store Setting</a>
                                
                                <div class="dropdown-divider"></div>
                                
                                <a class="dropdown-item" href="<?=site_url('cuisineadmin/authentication/logout')?>">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        
        
        
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include_once 'sidebar_v2.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        
        
        
        
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"><?=@$pageheader?></h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?=site_url('cuisineadmin/dashboard')?>">Home</a>
                                    </li>
                                    <?php if(isset($breadCrumbs)) echo $breadCrumbs; ?>
                                    <!--<li class="breadcrumb-item active" aria-current="page">Library</li>-->
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                This is some text within a card block.
                            </div>
                        </div>
                    </div>
                </div>-->
                
                <div class="row">
                    <div class="col-12">
                        <?php include_once "alerts.php"; ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        	<div class="card-body">
                				<?php include_once $content_file . '.php'; ?>
                			</div>
                		</div>
                	</div>
                </div>
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
       			<?php include_once "footer.php"; ?>
			</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?=base_url()?>assets_v2/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url()?>assets_v2/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url()?>assets_v2/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?=base_url()?>assets_v2/dist/js/app.min.js"></script>
    <script src="<?=base_url()?>assets_v2/dist/js/app.init.js"></script>
    <script src="<?=base_url()?>assets_v2/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?=base_url()?>assets_v2/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?=base_url()?>assets_v2/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url()?>assets_v2/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?=base_url()?>assets_v2/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url()?>assets_v2/dist/js/custom.min.js"></script>
    
    <?php if(isset($mainmenu) && $mainmenu == "products"){?>
    <!-- Include the plugin's JS:  -->
    <script type="text/javascript" src="<?=base_url(); ?>assets/js/bootstrap-multiselect.js"></script>
    <script src="<?=base_url(); ?>assets/js/jquery.tokeninput.js"></script>
    
    <!-- Selectize -->
    <script src="<?=base_url(); ?>assets/js/selectize.js"></script>

    <!-- Crop Css and js -->
    <script src="<?= base_url() ?>assets/js/cropbox.js"></script>
    
    <!-- DataTable js -->
    <script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    
    <script src="<?=base_url()?>assets_v2/dist/js/pages/datatable/datatable-advanced.init.js"></script>
    
    <script src="<?=base_url()?>assets_v2/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets_v2/assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="<?=base_url()?>assets_v2/assets/libs/ckeditor/ckeditor.js"></script>
    <script src="<?=base_url()?>assets_v2/assets/libs/ckeditor/samples/js/sample.js"></script>
    <script src="<?=base_url()?>assets_v2/custom_js/productscuisine.js"></script>
    
    <?php } ?>
    
    <?php if(isset($mainmenu) && $mainmenu == "orders"){?>
    <script src="<?=base_url()?>assets_v2/custom_js/orderscuisine.js"></script>    
    <?php } ?>
    
    <?php if(isset($mainmenu) && $mainmenu == "dashboard"){?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    
    <script type="text/javascript">  
        // get last month dognut chat
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Product', 'Number'],  
                          <?php foreach ($lastmouthsales as $lastmouthsale)  
                          {  
                               echo "['".$lastmouthsale["productname"]."', ".$lastmouthsale["full_count"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Product Sold Last Month',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('chart-container-2'));  
                chart.draw(data, options);  
           }  
        </script>
        
        <script>
            //get product sales month chat
            google.charts.load('current', {packages: ['corechart', 'line']});
            google.charts.setOnLoadCallback(drawCurveTypes);

            function drawCurveTypes() {
                  var data = new google.visualization.DataTable();
                  data.addColumn('date', 'Month');
                  data.addColumn('number', 'Sales');
                  //data.addColumn('number', 'Ewa-Riro');
                    <?php 
                    /*
                    foreach ($mouthlysales as $mouthlysale)  
                    {  
                        $sub_array[]=$mouthlysale['productname'];
                        // echo "['".$lastmouthsale["productname"]."', ".$lastmouthsale["full_count"]."],";  
                    } 
                    $sub_array = array_unique($sub_array);
                    
                    foreach ($sub_array as $sub)  
                    {  
                        echo "data.addColumn('number', '".$sub."');\n";  
                    }
                    
                    foreach ($mouthlysales as $mouthlysale) 
                    {  
                        
                        echo "data.addRows([
                                    [new Date(".$mouthlysale['created_year'].", ".$mouthlysale['created_month']."), 
                                    
                                ],";  
                    }  
                     * 
                     */
                    ?>
                     data.addRows([
                    <?php
                    foreach ($mouthlysales as $mouthlysale) 
                    {  
                        
                        echo "[new Date(".$mouthlysale['created_year'].", ".$mouthlysale['created_month']."),".$mouthlysale["full_count"]."],";  
                    }  
                    ?>
                    ]);

                  /*data.addRows([
                    //[new Date(2014, 0), 0, 0,1,2,3],    [new Date(2014,1), 10, 5,5,2,55],   [new Date(2014,2), 23, 15,32,5,78],  [new Date(2014,3), 17, 9,10,41,11],   [new Date(2014,4), 18, 10,12,13,32],  [new Date(2014,5), 9, 5,32,23,33],
                    /*[6, 11, 3],   [7, 27, 19],  [8, 33, 25],  [9, 40, 32],  [10, 32, 24], [11, 35, 27],
                    [12, 30, 22], [13, 40, 32], [14, 42, 34], [15, 47, 39], [16, 44, 36], [17, 48, 40],
                    [18, 52, 44], [19, 54, 46], [20, 42, 34], [21, 55, 47], [22, 56, 48], [23, 57, 49],
                    [24, 60, 52], [25, 50, 42], [26, 52, 44], [27, 51, 43], [28, 49, 41], [29, 53, 45],
                    [30, 55, 47], [31, 60, 52], [32, 61, 53], [33, 59, 51], [34, 62, 54], [35, 65, 57],
                    [36, 62, 54], [37, 58, 50], [38, 55, 47], [39, 61, 103], [40, 64, 56], [41, 65, 57],
                    [42, 63, 55], [43, 66, 58], [44, 67, 59], [45, 69, 61], [46, 69, 61], [47, 70, 62],
                    [48, 72, 64], [49, 68, 60], [50, 66, 58], [51, 65, 57], [52, 67, 59], [53, 70, 62],
                    [54, 71, 63], [55, 72, 64], [56, 73, 65], [57, 75, 67], [58, 70, 62], [59, 68, 60],
                    [60, 64, 56], [61, 60, 52], [62, 65, 57], [63, 67, 59], [64, 68, 60], [65, 69, 61],
                    [66, 70, 62], [67, 72, 64], [68, 75, 67], [79, 80, 72]
                    
                  ]);*/

                  var options = {
                    hAxis: {
                      title: 'Months'
                    },
                    vAxis: {
                      title: 'Qty'
                    },
                    series: {
                      1: {curveType: 'function'}
                    }
                  };

                  var chart = new google.visualization.LineChart(document.getElementById('chart-container'));
                  chart.draw(data, options);
                }
        </script>
        <script>
            /*
            google.charts.load('current', {packages: ['corechart', 'line']});
            google.charts.setOnLoadCallback(drawCurveTypes);

            function drawCurveTypes() {
                  var data = new google.visualization.DataTable();
                  data.addColumn('date', 'Time of Day');
                  data.addColumn('number', 'Beans');
                  data.addColumn('number', 'Ewa-Riro');
                    
                  data.addRows([
                    [new Date(2014, 0,1), 0,1],    [new Date(2014,0,12), 10, 5],   [new Date(2014,1, 3), 23, 15],  [new Date(2014,1, 20), 17, 9],   [new Date(2014,4), 18, 10],  [new Date(2014,5), 9, 5]
                    /*[6, 11, 3],   [7, 27, 19],  [8, 33, 25],  [9, 40, 32],  [10, 32, 24], [11, 35, 27],
                    [12, 30, 22], [13, 40, 32], [14, 42, 34], [15, 47, 39], [16, 44, 36], [17, 48, 40],
                    [18, 52, 44], [19, 54, 46], [20, 42, 34], [21, 55, 47], [22, 56, 48], [23, 57, 49],
                    [24, 60, 52], [25, 50, 42], [26, 52, 44], [27, 51, 43], [28, 49, 41], [29, 53, 45],
                    [30, 55, 47], [31, 60, 52], [32, 61, 53], [33, 59, 51], [34, 62, 54], [35, 65, 57],
                    [36, 62, 54], [37, 58, 50], [38, 55, 47], [39, 61, 103], [40, 64, 56], [41, 65, 57],
                    [42, 63, 55], [43, 66, 58], [44, 67, 59], [45, 69, 61], [46, 69, 61], [47, 70, 62],
                    [48, 72, 64], [49, 68, 60], [50, 66, 58], [51, 65, 57], [52, 67, 59], [53, 70, 62],
                    [54, 71, 63], [55, 72, 64], [56, 73, 65], [57, 75, 67], [58, 70, 62], [59, 68, 60],
                    [60, 64, 56], [61, 60, 52], [62, 65, 57], [63, 67, 59], [64, 68, 60], [65, 69, 61],
                    [66, 70, 62], [67, 72, 64], [68, 75, 67], [79, 80, 72]
                    */
                  ]);

                  var options = {
                    hAxis: {
                      title: 'Months'
                    },
                    vAxis: {
                      title: 'Qty'
                    },
                    series: {
                      1: {curveType: 'function'}
                    }
                  };

                  var chart = new google.visualization.LineChart(document.getElementById('chart-container'));
                  chart.draw(data, options);
                }
                */
        </script>
    <?php } ?>
    
    <?php if(isset($mainmenu) && $mainmenu == "promos"){?>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_v2/dist/css/promos.css">
    <!-- Crop Css and js --><!-- Crop Css  -->
    <link href="<?= base_url() ?>assets/css/cropbox.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/js/cropbox.js"></script>
    
    <script src="<?=base_url()?>assets_v2/custom_js/promoscuisine.js"></script>    
    <?php } ?>
    
    <?php if(isset($mainmenu) && (($mainmenu == "settings") || ($mainmenu == "myaccount") || ($mainmenu == "changepassword")) ):?>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCY2buDtbYIot8Llm_FkQXHW36f0Cme6TI&callback=initMap">
    </script>
    <script src="<?=base_url()?>assets_v2/custom_js/settingscuisine.js"></script>
    <script>
        // get latitude and longitude of location 
        function getLatitudeLongitude(callback, address) {
            // If adress is not supplied, use default value 'Ferrol, Galicia, Spain'
            address = address || '80b, Lafiaji way, Dolphin, Ikoyi';
            // Initialize the Geocoder
            geocoder = new google.maps.Geocoder();
            if (geocoder) {
                geocoder.geocode({
                    'address': address
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        callback(results[0]);
                    }
                });
            }
        }
    
    </script>
    <?php endif; ?>
    
    
    
    
    
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    
    <script>
        $(".table").on("click","[data-toggle='modal']", function(e){

            e.preventDefault();

            var url = $(this).attr('href');
            var ord_id   = $(this).data('get'); // gets value
            var orderid   = $(this).data('orderid'); // gets value

            var container = $(this).attr('data-target');

                $.post(url,{ data_id:ord_id,data_order:orderid},function(data){
                    $(container).html(data).modal();
                });
        });  
        
    </script>

<link href="<?= base_url() ?>assets/css/jquery.timepicker.min.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/bootstrap-datepicker.css" rel="stylesheet">

<script src="<?= base_url() ?>assets/js/jquery.timepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.datepair.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            
            
            var nowTemp = new Date();
            var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
            
             $('#datepromo').datepicker({
              beforeShowDay: function(e) {
                return e.valueOf() <= now.valueOf() ? 'disabled' : '';
            },
                'format': 'yyyy-mm-dd',
                'autoclose': true
                
            });
        });
    </script>
    
    
	
</body>

</html>