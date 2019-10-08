
<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<!--



-->
    <meta charset="utf-8">
    <meta name="description" content="<?= $meta_keyword ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title><?= $title ?></title>
    <link rel="icon" type="image/ico" href="<?= base_url() ?>assets/img/<?= $icon ?>">

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/font-awesome.min.css">
<link href="<?= base_url() ?>assets/css/jquery-ui.min.css" rel="stylesheet">


<!--Notification stylesheet include-->
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/jBox.css">
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.css">
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/themes/NoticeFancy.css">
    

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/rest/plugins.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/rest/themes.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/rest/david_main.css">



    <!-- Optional JavaScript --> 
    <script src="<?=base_url(); ?>assets/js/jquery-2.2.4.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="<?=base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>-->
    
    
    <script src="<?=base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url(); ?>assets/js/bootstrap-select.min.js"></script>
    <script src="<?=base_url(); ?>assets/js/jquery-ui.min.js"></script>
    
    <script src="<?= base_url() ?>extensions/jBox/Source/jBox.js"></script>
    <script src="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.js"></script>


<script src="<?= base_url() ?>assets/js/rest/plugins.js"></script>
<script src="<?= base_url() ?>assets/js/modernizr.js"></script>
<script src="<?= base_url() ?>assets/js/rest/app.js"></script>

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script> -->
    
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.fancybox.min.css">
    <script src="<?=base_url(); ?>assets/js/jquery.fancybox.min.js"></script>



    
<!--<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap-tokenfield.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap-tagsinput.css">
<!--<script src="<?=base_url(); ?>assets/js/typeahead.jquery.js" ></script>
<script src="<?=base_url(); ?>assets/js/bootstrap3-typeahead.js" ></script>
<script src="<?=base_url(); ?>assets/js/bootstrap-tokenfield.min.js"></script>
<script src="<?=base_url(); ?>assets/js/bootstrap-tagsinput.js"></script>-->



<link rel="stylesheet" href="<?=base_url(); ?>assets/css/token-input-facebook.css">
<script src="<?=base_url(); ?>assets/js/jquery.tokeninput.js"></script>


<link href="<?= base_url(); ?>assets/admin/css/elegant-icons-style.css" rel="stylesheet" />


<script src="<?=base_url(); ?>assets/js/datepair.js"></script>
<script src="<?=base_url(); ?>assets/js/jquery.datepair.js"></script>

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.timepicker.min.css">
<script src="<?=base_url(); ?>assets/js/jquery.timepicker.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>admin_assets/plugins/datepicker/datepicker3.css">
<script src="<?=base_url(); ?>admin_assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap-colorpicker.css">
<script src="<?=base_url(); ?>assets/js/bootstrap-colorpicker.js"></script>


<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/waitMe.css">
<script src="<?= base_url() ?>assets/js/waitMe.js"></script>

<!-- Crop Css and js -->
<link href="<?= base_url() ?>assets/css/cropbox.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/js/cropbox.js"></script>

<style>
    .db_prdimg 
    {
        width: 70px;
        height: 50px;
    }
    
    #cat_order,#cat_name,#cat_code 
    {
        width:200px; 
    }
    #cat_order input,#cat_name input, #cat_code input,#charge_name input{
        float: left;
        width:100px; 
    }
    
    #cat_order a,#cat_name a ,#charge_name a{
        float: left;
        width:40px; 
    }
    #cat_name,#cat_order,#cat_status, #prd_status ,#cat_code,#charge_name {
        position: absolute;
        display:none;
    }
    .O_Uplode {
        position: relative;
    }
    .UplodeIcon {
        position: absolute;
        top: 8px;
        left: 20px;
        font-size: 20px;
    }
    .form-style-base {
        position: absolute;
        top: 0px;
        z-index: 999;
        opacity: 0;
        cursor: pointer;
    }
    .form-style-fake {
        top: 0px;
        padding-left: 50px;
    }
    .Prd_UploadView {
        border: 2px dashed #eaedf1;
        background-color: #eee;
        padding: 10px;
        display:none;
        position:relative;
    }
    .Prd_UploadView img{
        max-width: 100px;
        max-height: 90px;
    }
    .logo_UploadView{
        border: 2px dashed #eaedf1;
        background-color: #eee;
        padding: 10px;
        position:relative;
    }
    .logo_UploadView img{
        max-width: 100px;
        max-height: 90px;
    }
    .Gp_rmv {
	position:absolute;
	top:0px;
	left:105px;
	color:#F30;
	cursor:pointer;
    }
    .label_pending {
        background-color: #394263; 
    }
    .ccl
    {
        padding-top: 5px;
        font-weight: 800;
       
    }
    .note_red
    {
        background-color: red;
    }
</style>

</head>

<body>
    
    <div id="page-wrapper">

        <div class="preloader themed-background">

            <h1 class="push-top-bottom text-light text-center"><strong>Jollof</strong>Cuisine</h1>

            <div class="inner">

                <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>

                <div class="preloader-spinner hidden-lt-ie10"></div>

            </div>

        </div>

        <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
	

            <!--slider menu-->    
            <?php
                $this->load->view($sidebar); // Dashboard sidebar Nav
            ?>
            <!--ends slider menu-->



            


            <div id="main-container">
            
                <!--header menu-->    
                <?php
                    $this->load->view($header); // Dashboard header
                ?>
                <!--ends header menu-->
                
                <!--<header class="navbar navbar-default">

                    <ul class="nav navbar-nav-custom">

                        <li>

                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">

                                <i class="fa fa-bars fa-fw"></i>

                            </a>

                        </li>

                    </ul>


                    <form action="page_ready_search_results.php" method="post" class="navbar-form-custom">

                        <div class="form-group">

                            <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">

                        </div>

                    </form>

                    <ul class="nav navbar-nav-custom pull-right">

                        
                        <li class="dropdown">

                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">

                                <i class="fa fa-bell"></i>

                                <span class="label label-primary label-indicator animation-floating">3</span>

                            </a>

                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">

                                <li class="dropdown-header text-center">Activity</li>

                                <li>

                                    <div class="alert alert-success alert-alt">

                                        <small>5 min ago</small><br>

                                        <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale (N3000)

                                    </div>

                                    <div class="alert alert-info alert-alt">

                                        <small>10 min ago</small><br>

                                        <i class="fa fa-arrow-up fa-fw"></i> Please Update your profile

                                    </div>


                                    <div class="alert alert-danger alert-alt">

                                        <small>Yesterday</small><br>

                                        <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)" class="alert-link">You have 12 pending request</a>

                                    </div>

                                </li>

                            </ul>

                        </li>	

                        <li class="dropdown">

                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">

                                <img src="img/1.png" alt="avatar"> <i class="fa fa-angle-down"></i>

                            </a>

                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">

                                <li class="dropdown-header text-center">Account</li>

                                <li>

                                    <a href="#">

                                        <i class="fa fa-envelope-o fa-fw pull-right"></i>

                                        <span class="badge pull-right">5</span>

                                        Messages

                                    </a>

                                </li>

                                <li class="divider"></li>

                                <li>

                                    <a href="#">

                                        <i class="fa fa-user fa-fw pull-right"></i>

                                        Profile

                                    </a>

                                </li>

                                <li class="divider"></li>

                                <li>


                                    <a href="#"><i class="fa fa-sign-out fa-fw pull-right"></i> Logout</a>

                                </li>


                            </ul>

                        </li>

                    </ul>

                </header> -->
                
                
                
                
                
                

                <div id="page-content">
                    
                    
                    
                    <!--header menu-->    
                    <?php
                        $this->load->view($tray); // Dashboard tray
                    ?>
                    <!--ends header menu-->

                    <!--Headers For Main content starts here-->
                    <div class="clearfix">
                        
                        <div class="conte">
                        <?php
                            if(isset($page_loader))
                            {
                                if ( file_exists( APPPATH.'views/'.$page_loader.'.php' ) ) 
                                {
                                    $this->load->view($page_loader); // Dashboard tray
                                }
                                else 
                                {
                                    $this->load->view($error_page); //error page
                                }
                            
                            }
                            else
                            {
                                $this->load->view($error_page); //error page
                            }
                        ?>
                        </div>  
                        
                    </div>

                    <!--Headers For Main content Ends here-->


                    

                    

                </div>

                <footer class="clearfix">

                    <div class="pull-right">

                        Designed by <a href="http://www.staklesolutions.com" target="_blank"><b>Stakle Solution</b></a>

                    </div>

                    <div class="pull-left">

                        <strong>2018</strong> &copy; <a href="http://www.jollof.com" target="_blank">EBS</a>

                    </div>

                </footer>


            </div>

        </div>

    </div>
    

    <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

    <!--<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header text-center">

                    <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>

                </div>

                <div class="modal-body">

                    <form action="index.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">

                        <fieldset>

                            <legend>Vital Info</legend>

                            <div class="form-group">

                                <label class="col-md-4 control-label">Username</label>

                                <div class="col-md-8">

                                    <p class="form-control-static">Admin</p>

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="user-settings-email">Email</label>

                                <div class="col-md-8">

                                    <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="admin@example.com">

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>

                                <div class="col-md-8">

                                    <label class="switch switch-primary">

                                        <input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>

                                        <span></span>

                                    </label>

                                </div>

                            </div>

                        </fieldset>

                        <fieldset>

                            <legend>Password Update</legend>

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="user-settings-password">New Password</label>

                                <div class="col-md-8">

                                    <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>

                                <div class="col-md-8">

                                    <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">

                                </div>

                            </div>

                        </fieldset>

                        <div class="form-group form-actions">

                            <div class="col-xs-12 text-right">

                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>

                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>-->
    
    <script>
        $(document).ready(function() {
            new jBox('Tooltip', {
                attach: '.jboxtooltip'
            });
            
                  
            
        });
        setInterval(function(){ 
            new jBox('Tooltip', {
                attach: '.jboxtooltip'
            });
        }, 1000);
    </script>  

</body>

</html>