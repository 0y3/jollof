<!DOCTYPE html>
<html>
<head>
	
	<title>Aircraft Maintenance System | AMS</title>
    <?PHP include('includes/asset_loader.php'); ?>
    <?PHP include('includes/fancybox.php'); ?>
	
<meta charset="UTF-8"></head>

<body>
<section id="main-content">
 <header>
	  <div class="centered" id="bagraund-header">
        <div id="logo">
			<a href="<?PHP echo site_url('dashboard'); ?>"><img src="<?PHP echo base_url() ?>assets/images/px.gif" width="230" height="80" alt=""></a>
		</div>
 
		<div id="user-panel">
			<?PHP include('includes/page_top.php'); ?> 
 		</div>        
       </div>
 </header>
	<nav>
    	<div class="centered">
             <?PHP include('includes/app_menu.php'); ?>
		</div>
	</nav>
 <section id="control-panel">
     <div class="centered">
     	<div class="greeting">
            <div id="breadCrumbHolder">
            	<ul id="breadcrumb">
                    <li><a href="<?PHP echo site_url('dashboard/index'); ?>" title="My Home"><img src="<?PHP echo base_url(); ?>assets/images/home.gif" alt="Home" class="home" /></a></li>
                    <?PHP if(isset($breadCrumbs)) echo $breadCrumbs; ?>
                </ul>
            </div>
        </div>  
        <div class="grid-1">
            <div class="title-grid"><span>Error Page</span> 
             </div>
            <div class="content-gird">
            	<?PHP include('includes/notifications.php'); ?>
            <div class="clear"></div>
         </div> </div> 
     </div> 
 </section> <!--end control-panel-->  
 
  <!--end content-->   

<div class="empty"></div>
</section>   <!--end main-content-->     
             
 <?PHP include('includes/footer.php'); ?>
</body>
</html>