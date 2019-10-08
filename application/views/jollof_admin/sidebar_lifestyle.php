    
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
                                        <img src="<?=base_url()?>assets/uploads/rest_logo/<?=$this->session->avatar?>" alt="users" class="rounded-circle img-fluid" />
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
                                    
                                    <a href="<?=site_url('jollofadmin/authentication/logout')?>" title="Logout" class="btn btn-circle btn-sm">
                                        <i class="ti-power-off"></i>
                                    </a>
                                    
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                       	
                       	
                       	  
                       	  
                        

                          <?php if($this->session_manager->hasPermission("Dashboard::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="lifestylemovie") echo ' selected';?>">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="icon-Wrench"></i>
                                  <span class="hide-menu">Lifestyle Movies</span>
                              </a>
                              <ul aria-expanded="false" class="collapse  first-level">

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Cuisine::category') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/lifestyle/moviestickets')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="moviestickets") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu">Tickets</span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Cuisine::category') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/lifestyle/movies')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="movies") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu">Movies</span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Fashion::usersrole') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/lifestyle/cinemas')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="cinemas") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Cinemas </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Fashion::usersrole') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/lifestyle/showing')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="showing") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu">Movies Showing in Cinemas </span>
                                      </a>
                                  </li>
                                  <?php } ?>
                                 
                              </ul>
                          </li>
                          <?php } ?>

                          <?php if($this->session_manager->hasPermission("Dashboard::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="lifestyleevent") echo ' selected';?>">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="icon-Wrench"></i>
                                  <span class="hide-menu">Lifestyle Events</span>
                                  <span class="badge bg-danger ml-auto ml-md-2">4</span>
                              </a>
                              <ul aria-expanded="false" class="collapse  first-level">

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Cuisine::category') == 'ok'){ //if($this->session_manager->accessibleJollofAdmin('Lifestyle::movies') == 'ok'){  ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/lifestyle/eventstickets')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="eventstickets") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu">Event Tickets</span>
                                          <span class="badge bg-danger align-self-center ml-auto">Coming Soon</span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Fashion::usersrole') == 'ok'){ //if($this->session_manager->accessibleJollofAdmin('Lifestyle::events') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/lifestyle/events')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="events") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Events </span>
                                          <span class="badge badge-pill bg-danger ml-auto ml-md-2">4</span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Fashion::usersrole') == 'ok'){ //if($this->session_manager->accessibleJollofAdmin('Lifestyle::events') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/lifestyle/eventsmerchant')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="eventsmerchant") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Event Merchant</span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Fashion::usersrole') == 'ok'){ //if($this->session_manager->accessibleJollofAdmin('Lifestyle::events') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/lifestyle/eventscategory')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="eventscategory") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Event Category</span>
                                      </a>
                                  </li>
                                  <?php } ?>
                                 
                              </ul>
                          </li>
                          <?php } ?>

                          
                       	  
                       	  
                       	  
                          
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="changepassword") echo " selected";?>">
                       		<a href="<?=site_url('jollofadmin/dashboard/changepasswordform')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                       			<i class="icon-Security-Check"></i> 
                       			<span class="hide-menu">Change Password</span>
                       		</a>
                       	  </li>
                       	  
                          <li class="sidebar-item">
                       		<a href="<?=site_url('jollofadmin/authentication/logout')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
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