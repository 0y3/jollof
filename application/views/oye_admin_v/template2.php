<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title><?= $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=<?=$meta_keyword; ?> />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="<?= base_url(); ?>assets/admin/css/temp_style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="<?= base_url(); ?>assets/js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="<?= base_url(); ?>assets/admin/css/font-awesome.css" rel="stylesheet"> 

<!--Google Fonts-->
<!--<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>-->



<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="<?= base_url(); ?>assets/admin/js/chartinator.js" ></script>
    

<!--skycons-icons-->
<script src="<?= base_url(); ?>assets/admin/js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="<?= base_url(); ?>admin/dashboard"> <h1>jollof</h1> 
									<!--<img id="logo" src="" alt="Logo"/>--> 
								  </a> 								
							</div>
							<!--search-box-->
								<div class="search-box">
									<form>
										<input type="text" placeholder="Search..." required="">	
										<input type="submit" value="">					
									</form>
								</div><!--//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								<ul class="nofitications-dropdown">
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 3 new messages</h3>
												</div>
											</li>
											<li><a href="#">
											   <div class="user_img"><img src="http://lorempixel.com/g/50/50" /></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											</a></li>
											<li class="odd"><a href="#">
												<div class="user_img"><img src="http://lorempixel.com/50/50/sport" /></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor </p>
												<p><span>1 hour ago</span></p>
												</div>
											  <div class="clearfix"></div>	
											</a></li>
											<li><a href="#">
											   <div class="user_img"><img src="http://lorempixel.com/50/50" /></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											</a></li>
											<li>
												<div class="notification_bottom">
													<a href="#">See all messages</a>
												</div> 
											</li>
										</ul>
									</li>
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 3 new notification</h3>
												</div>
											</li>
											<li><a href="#">
												<div class="user_img"><img src="http://lorempixel.com/50/50" /></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											  <div class="clearfix"></div>	
											 </a></li>
											 <li class="odd"><a href="#">
												<div class="user_img"><img src="http://lorempixel.com/50/50/sports/1" /></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											 </a></li>
											 <li><a href="#">
												<div class="user_img"><img src="http://lorempixel.com/g/50/50" /></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											 </a></li>
											 <li>
												<div class="notification_bottom">
													<a href="#">See all notifications</a>
												</div> 
											</li>
										</ul>
									</li>	
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">8</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 8 pending Order</h3>
												</div>
											</li>
											<li>
                                                                                            <a href="#">
												<div class="task-info">
													<span class="task-desc">ORD29288110SS</span><span class="percentage">#1000.00</span>
													<div class="clearfix"></div>	
												</div>
                                                                                                <div class="no_font" >
                                                                                                    <span class="">Marinara pizza..... </span><span class="text-danger">30min ago</span>
												</div>
											
                                                                                            </a>
                                                                                            
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="#">
												<div class="task-info">
													<span class="task-desc">ORD000267429</span><span class="percentage">#2000.00</span>
													<div class="clearfix"></div>	
												</div>
                                                                                                <div class="no_font" >
                                                                                                    <span class="">Marinara pizza..... </span><span class="text-danger">1hr ago</span>
												</div>
											
                                                                                            </a>
                                                                                            
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="#">
												<div class="task-info">
													<span class="task-desc">ORD29288110SS</span><span class="percentage">#600.00</span>
													<div class="clearfix"></div>	
												</div>
                                                                                                <div class="no_font" >
                                                                                                    <span class="">Marinara pizza..... </span><span class="text-danger">1 hr ago</span>
												</div>
											
                                                                                            </a>
                                                                                            
                                                                                        </li>
											
											<li>
												<div class="notification_bottom">
													<a href="#">See all pending Order</a>
												</div> 
											</li>
										</ul>
									</li>	
								</ul>
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							<div class="profile_details">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
                                                                                            <span class="prfil-img"><img class="img-circle " src="http://lorempixel.com/50/50" /> </span> 
												<div class="user-name">
													<p>Oye</p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
											<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
											<li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>				
						</div>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">


<!--dashboard view-->    
<?php
    $this->load->view($page_loader); //Admin Dashboard Nav Nav
?>
<!--ends dashboard view-->


<div class="clearfix"> </div>

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2017 jollof. All Rights Reserved | Design by  <a href="" target="_blank">stakle</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>

<!--slider menu-->    
<?php
    $this->load->view($sidebar); //Admin Dashboard Nav Nav
?>
<!--ends slider menu-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>

<!--static chart-->
<script src="<?= base_url(); ?>assets/admin/js/Chart.min.js"></script>

<!--scrolling js-->
		<script src="<?= base_url(); ?>assets/admin/js/jquery.nicescroll.js"></script>
		<script src="<?= base_url(); ?>assets/admin/js/scripts.js"></script>
		<!--//scrolling js-->
<script src="<?= base_url(); ?>assets/js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>                     