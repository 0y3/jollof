    
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
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="dashboard") echo " selected";?>">
                       		<a href="<?=site_url('jollofadmin/dashboard')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                       			<i class="icon-Monitor-Analytics"></i> 
                       			<span class="hide-menu">Dashboard</span>
                       		</a>
                       	</li>
                       	
                       	
                       	  <?php if($this->session_manager->hasPermission("Orders::index")) {?>
                       	  <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="orders") echo " selected";?>">
                       		<a href="<?=site_url('jollofadmin/orders')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                       			<i class="icon-Shopping-Cart"></i> 
                       			<span class="hide-menu">Manage Orders</span>
                       		</a>
                       	  </li>
                       	  <?php } ?>

                          <?php if($this->session_manager->hasPermission("Tablereservation::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="tablereservation") echo " selected";?>">
                          <a href="<?=site_url('jollofadmin/tablereservation')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                            <i class="icon-Puzzle"></i> 
                            <span class="hide-menu">Table Reservation</span>
                          </a>
                          </li>
                          <?php } ?>
                       	  
                       	
                          <?php if($this->session_manager->hasPermission("Merchants::index") || $this->session_manager->hasPermission("Customer::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="b2b") echo ' selected';?>">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="icon-Wrench"></i>
                                  <span class="hide-menu">Approval Task </span>
                              </a>
                              <ul aria-expanded="false" class="collapse  first-level">
                                  
                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Merchants::index') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/merchants?status=0')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="merchant") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> B2B Registration Review </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Merchants::testimonial') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/merchants/testimonial')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="testimonial") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> B2B Testimonial Review </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Merchants::comments') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/merchants/comments')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="comments") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> B2C Comment Review </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Customers::index') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/customers')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="customer") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Signed Up B2C's Review </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Customers::index') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/customers/guest')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="customer") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Guest B2C's Review </span>
                                      </a>
                                  </li>
                                  <?php } ?>
                                  
                                  
                              </ul>
                          </li>
                          <?php } ?>


                          <?php if($this->session_manager->hasPermission("Promos::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="promos") echo ' selected';?>">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="icon-Wrench"></i>
                                  <span class="hide-menu">Promo and Ad's </span>
                              </a>
                              <ul aria-expanded="false" class="collapse  first-level">

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Promos::b2bpromos') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/promos/b2bpromos')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="b2bpromos") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> B2B  Promo Review </span>
                                      </a>
                                  </li>
                                  <?php } ?>
                                  
                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Promos::thirdpartyads') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/promos/thirdpartyads')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="thirdpartyads") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Third Party Ads </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                   <?PHP if($this->session_manager->accessibleJollofAdmin('Promos::settings') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/promos/settings')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="promosettings") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu">Settings </span>
                                      </a>
                                  </li>
                                  <?php } ?>
                                  
                                  

                              </ul>
                          </li>
                          <?php } ?>


                          <?php if($this->session_manager->hasPermission("Merchants::b2b")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="b2breview") echo ' selected';?>">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="icon-Wrench"></i>
                                  <span class="hide-menu">Manage B2B's </span>
                              </a>
                              <ul aria-expanded="false" class="collapse  first-level">

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Merchants::b2b') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/merchants/b2b')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="merchantb2b") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> View Registered B2B's </span>
                                      </a>
                                  </li>
                                  <?php } ?>
                                  
                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Merchants::cuisineproduct') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/merchants/cuisineproduct')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="cuisineproduct") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> B2B's Cuisine Products </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Merchants::fashionproduct') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/merchants/fashionproduct')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="fashionproduct") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> B2B's Fashion Products </span>
                                      </a>
                                  </li>
                                  <?php } ?>


                              </ul>
                          </li>
                          <?php } ?>

                          
                          <?php if($this->session_manager->hasPermission("Customers::b2c")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="b2c") echo " selected";?>">
                          <a href="<?=site_url('jollofadmin/customers/b2c')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                            <i class="icon-Business-ManWoman"></i> 
                            <span class="hide-menu">Manage B2C's </span>
                          </a>
                          </li>
                          <?php } ?>


                          <?php if($this->session_manager->hasPermission("Dashboard::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="voucher") echo ' selected';?>">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="icon-Wrench"></i>
                                  <span class="hide-menu">Voucher Management</span>
                              </a>
                              <ul aria-expanded="false" class="collapse  first-level">

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Coupon::index') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/coupon')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="coupon") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu">Coupon Management </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                              </ul>
                          </li>
                          <?php } ?>


                          <?php if($this->session_manager->hasPermission("Dashboard::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="jpoints_giftportal") echo ' selected';?>">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="icon-Wrench"></i>
                                  <span class="hide-menu">Jpoints & Gift Portal </span>
                              </a>
                              <ul aria-expanded="false" class="collapse  first-level">

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Jpoints::index') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/Jpoints')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="jpointsmanagement") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> J-Points Management </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Giftportal::index') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/giftportal')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="giftportalmanagement") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Gift Portal Management </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Giftportal::index') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/giftportal/orders')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="giftportalorders") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Gift Portal Orders </span>
                                      </a>
                                  </li>
                                  <?php } ?>


                              </ul>
                          </li>
                          <?php } ?>


                          <?php if($this->session_manager->hasPermission("Billing::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="billing") echo ' selected';?>">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="icon-Wrench"></i>
                                  <span class="hide-menu">Billing </span>
                              </a>
                              <ul aria-expanded="false" class="collapse  first-level">

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Billing::index') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/billing')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="billingmanagement") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu">Manage B2B Billing</span>
                                      </a>
                                  </li>
                                  <?php } ?>
                                  
                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Billing::billingreport') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/billing/billingreport')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="billingreport") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Generate B2B Billing Report </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Billing::deliveringcharges') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/billing/deliveringcharges')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="deliveringcharges") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Delivering Charges </span>
                                      </a>
                                  </li>
                                  <?php } ?>


                              </ul>
                          </li>
                          <?php } ?>

                          <?php if($this->session_manager->hasPermission("Dashboard::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="banners") echo ' selected';?>">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="icon-Wrench"></i>
                                  <span class="hide-menu">Banner Management </span>
                              </a>
                              <ul aria-expanded="false" class="collapse  first-level">

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Banners::jollof') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/banners/jollof')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="bannersjollof") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu">Manage Jollof Banners</span>
                                      </a>
                                  </li>
                                  <?php } ?>
                                  
                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Banners::cuisine') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/banners/cuisine')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="bannerscuisine") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Cuisine Banners </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Banners::fashion') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/banners/fashion')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="bannerfashion") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Fashion Banners </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Banners::lifestyle') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/banners/lifestyle')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="bannerlifestyle") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Lifestyle Banners </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Banners::biz') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/banners/biz')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="bannerbiz") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Biz Banners </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Banners::scholar') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/banners/scholar')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="bannerscholar") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Scholar Banners </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Banners::jollof') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/banners/jollofsignup')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="bannerjollofsignup") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Jollof Admin Signup Banners </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Banners::cuisine') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/banners/cuisinesignup')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="bannercuiainesignup") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Cuisine Admin Signup Banners </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Banners::fashion') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/banners/fashionsignup')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="bannerfashionsignup") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Fashion Admin Signup Banners </span>
                                      </a>
                                  </li>
                                  <?php } ?>


                              </ul>
                          </li>
                          <?php } ?>

                          <?php if($this->session_manager->hasPermission("Dashboard::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="fashionsettings") echo ' selected';?>">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="icon-Wrench"></i>
                                  <span class="hide-menu">Fashion Settings</span>
                              </a>
                              <ul aria-expanded="false" class="collapse  first-level">

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Fashion::navigations') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/fashion/navigations')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="fashionnavigation") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu">Manage Navigations & Categories</span>
                                      </a>
                                  </li>
                                  <?php } ?>
                                  
                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Fashion::colorvariant') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/fashion/colorvariant')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="fashioncolorvariant") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Colors Variant </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Fashion::sizevariant') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/fashion/sizevariant')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="fashionsizevariant") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Size Variant </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Fashion::brand') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/fashion/brand')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="fashionbrand") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Fashion Brand </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Fashion::usersrole') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/fashion/usersrole')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="usersrole") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Users Roles </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Fashion::layaway') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/fashion/layaway')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="layaway") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Layaway </span>
                                      </a>
                                  </li>
                                  <?php } ?>
                                 
                              </ul>
                          </li>
                          <?php } ?>

                          <?php if($this->session_manager->hasPermission("Dashboard::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="cuisinesettings") echo ' selected';?>">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="icon-Wrench"></i>
                                  <span class="hide-menu">Cuisine Settings</span>
                              </a>
                              <ul aria-expanded="false" class="collapse  first-level">

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Cuisine::category') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/cuisine/category')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="cuisinecategory") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu">Manage Cuisine Categories</span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Fashion::usersrole') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/cuisine/usersrole')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="usersrole") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Users Roles </span>
                                      </a>
                                  </li>
                                  <?php } ?>
                                 
                              </ul>
                          </li>
                          <?php } ?>

                          <?php if($this->session_manager->hasPermission("Dashboard::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="lifestyle") echo ' selected';?>">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="icon-Wrench"></i>
                                  <span class="hide-menu">Lifestyle</span>
                              </a>
                              <ul aria-expanded="false" class="collapse  first-level">

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Cuisine::category') == 'ok'){ //if($this->session_manager->accessibleJollofAdmin('Lifestyle::movies') == 'ok'){  ?>
                                  <li class="sidebar-item">
                                      <a target="_blank" href="<?=site_url('jollofadmin/lifestyle/movies')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="movies") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu">Movies</span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Fashion::usersrole') == 'ok'){ //if($this->session_manager->accessibleJollofAdmin('Lifestyle::events') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a target="_blank" href="<?=site_url('jollofadmin/lifestyle/events')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="events") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Events </span>
                                      </a>
                                  </li>
                                  <?php } ?>
                                 
                              </ul>
                          </li>
                          <?php } ?>

                          <?php if($this->session_manager->hasPermission("Dashboard::index")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="settings") echo ' selected';?>">
                              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                  <i class="icon-Wrench"></i>
                                  <span class="hide-menu">General Settings</span>
                              </a>
                              <ul aria-expanded="false" class="collapse  first-level">

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Dashboard::othersettings') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/dashboard/othersettings')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="othersettings") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu">Other Settings</span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Users::index') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/users/usersrole')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="usersrole") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Users Roles </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Users::index') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/users')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="users") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Users </span>
                                      </a>
                                  </li>
                                  <?php } ?>

                                  <?PHP if($this->session_manager->accessibleJollofAdmin('Dashboard::locationn') == 'ok'){ ?>
                                  <li class="sidebar-item">
                                      <a href="<?=site_url('jollofadmin/dashboard/location')?>" class="sidebar-link<?php if(isset($submenu) && $submenu=="location") echo ' active';?>">
                                          <i class="icon-Record"></i>
                                          <span class="hide-menu"> Manage Locations </span>
                                      </a>
                                  </li>
                                  <?php } ?>
                                 
                              </ul>
                          </li>
                          <?php } ?>

                       	  <?php if($this->session_manager->hasPermission("Dashboard::indexx")) {?>
                          <li class="sidebar-item<?php if(isset($mainmenu) && $mainmenu=="users") echo " selected";?>">
                          <a href="<?=site_url('jollofadmin/users')?>" class="sidebar-link waves-effect waves-dark sidebar-link">
                            <i class="icon-Business-ManWoman"></i> 
                            <span class="hide-menu">Manage Users</span>
                          </a>
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