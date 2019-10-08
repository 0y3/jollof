		<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile dropdown m-t-20">
                                <div class="user-pic">
                                    
                                    <?php 
                                        	if($this->session->avatar != "")
                                        	{
                                        ?>  
                                        <img src="<?=base_url()?>assets/uploads/fashion_logo/<?=$this->session->avatar?>" alt="users" class="rounded-circle img-fluid" />
                                        <?php 
                                        	}
                                        	else 
                                        	{
                                        ?>
                                        	<img src="<?=base_url()?>assets/uploads/profile_pic/noimage.jpg" alt="users" class="rounded-circle img-fluid" />
                                        <?php 
                                        	}
                                        ?>
                                        
                                </div>
                                <div class="user-content hide-menu m-t-10">
                                    <h5 class="m-b-10 user-name font-medium"><?=$this->session->firstname?> <?=$this->session->lastname?></h5>
                                    
                                    <a href="<?=site_url('fashionadmin/authentication/logout')?>" title="Logout" class="btn btn-circle btn-sm">
                                        <i class="ti-power-off"></i>
                                    </a>
                                    
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="dashboard") echo " selected";?>">
                       		<a href="<?=site_url('fashionadmin/dashboard')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                       			<i class="icon-Monitor-Analytics"></i> 
                       			<span class="hide-menu">Dashboard</span>
                       		</a>
                       	</li>
                       	
                       	
                       	  <?php if($this->session_manager->hasPermission("Admin::order")) {?>
                       	  <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="orders") echo " selected";?>">
                       		<a href="<?=site_url('fashionadmin/orders')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                       			<i class="icon-Shopping-Cart"></i> 
                       			<span class="hide-menu">Manage Orders</span>
                       		</a>
                       	  </li>
                       	  <?php } ?>
                       	  
                       	  <?php if($this->session_manager->hasPermission("Admin::product")) {?>
                       	  <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="products") echo " selected";?>">
                       		<a href="<?=site_url('fashionadmin/products')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                       			<i class="icon-Puzzle"></i> 
                       			<span class="hide-menu">Manage Products</span>
                       		</a>
                       	  </li>
                       	  <?php } ?>
       	  
       	  
                          
                          <?php if($this->session_manager->hasPermission("Admin::users")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="users") echo " selected";?>">
                       		<a href="<?=site_url('fashionadmin/users')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                       			<i class="icon-Business-ManWoman"></i> 
                       			<span class="hide-menu">Manage Users</span>
                       		</a>
                       	  </li>
                       	  <?php } ?>
                          
                          
                          <?php if($this->session_manager->hasPermission("Promos::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="promos") echo " selected";?>">
                       		<a href="<?=site_url('fashionadmin/promos')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                       			<i class="icon-Business-ManWoman"></i> 
                       			<span class="hide-menu">Manage Promos</span>
                       		</a>
                       	  </li>
                       	  <?php } ?>
                       	  
                       	  
                       	  
                       	  
                       	  
                       	  
                       	  
                       	  
                       	  <?php if($this->session_manager->hasPermission("Dashboard::settings")) {?>
                       	  <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="settings") echo " selected";?>">
                       		<a href="<?=site_url('fashionadmin/dashboard/settings')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                       			<i class="icon-Calendar"></i> 
                       			<span class="hide-menu">Settings</span>
                       		</a>
                       	  </li>
                       	  <?php } ?>
                       	  
                        
                        
                        <?php if($this->session_manager->hasPermission("Problemcategory::index") || $this->session_manager->hasPermission("Clientcategory::index")) {?>
                       	  <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="setup") echo ' selected';?>">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="icon-Wrench"></i>
                                <span class="hide-menu">Setup </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                
                                <?PHP if($this->session_manager->accessible('Problemcategory::index') == 'ok'){ ?>
                                <li class="sidebar-item">
                                    <a href="<?=site_url('problemcategory')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="problemcategories") echo ' active';?>">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> Problem Category </span>
                                    </a>
                                </li>
                                <?php } ?>
                                
                                <?PHP if($this->session_manager->accessible('Clientcategory::index') == 'ok'){ ?>
                                <li class="sidebar-item">
                                    <a href="<?=site_url('clientcategory')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="clientcategories") echo ' active';?>">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> Client Categories </span>
                                    </a>
                                </li>
                                <?php } ?>

                            </ul>
                        </li>
                        <?php } ?>
                        
                          
                          
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="changepassword") echo " selected";?>">
                       		<a href="<?=site_url('fashionadmin/dashboard/changepasswordform')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                       			<i class="icon-Security-Check"></i> 
                       			<span class="hide-menu">Change Password</span>
                       		</a>
                       	  </li>
                       	  
                          <li class="sidebar-item">
                       		<a href="<?=site_url('fashionadmin/authentication/logout')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                           		<i class="icon-Power"></i> 
                           		<span class="hide-menu">Log Out</span>
                       		</a>
                       	  </li>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>