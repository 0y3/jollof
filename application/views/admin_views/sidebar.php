
  
	<section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->firstname?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">App Menu</li>
        <!-- Optionally, you can add icons to the links -->
        
        
          <li class="<?php if(isset($mainmenu) && $mainmenu=="dashboard") echo "active";?>">
       		<a href="<?=site_url('dashboard')?>"><i class="fa fa-laptop"></i> <span>Dashboard</span></a>
       	  </li>
       	  
       	  <?php if($this->valSessObj->hasPermission("Restaurants::index") == true){ ?>
       	  <li class="<?php if(isset($mainmenu) && $mainmenu=="restaurant") echo "active";?>">
       		<a href="<?=site_url('restaurants')?>"><i class="fa fa-bank"></i> <span>Restaurant</span></a>
       	  </li>
       	  <?php } ?>
       	  
       	  <?php if($this->valSessObj->hasPermission("Transaction::index") == true){ ?>
       	  <li class="<?php if(isset($mainmenu) && $mainmenu=="transactions") echo "active";?>">
       		<a href="<?=site_url('transaction')?>"><i class="fa fa-opencart"></i> <span>Transactions</span></a>
       	  </li>
       	  <?php } ?>
          
          
          <?php if($this->valSessObj->hasPermission("Users::index") == true || $this->valSessObj->hasPermission("User_roles::index") == true){ ?>
          <li class="treeview<?php if(isset($mainmenu) && $mainmenu=="usermanagement") echo ' active';?>">
	          <a href="#"><i class="fa fa-users"></i> <span>User Management</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <?PHP if($this->valSessObj->accessible('Users::index') == 'ok'){ ?>
				<li<?php if(isset($submenu) && $submenu=="users") echo ' class="active"';?>><a href="<?=site_url('admin/users')?>">Users</a></li>
	            <?PHP } ?>
	            
	            <?PHP if($this->valSessObj->accessible('User_roles::index') == 'ok'){ ?>
				<li <?php if(isset($submenu) && $submenu=="userroles") echo ' class="active"';?>><a href="<?=site_url('admin/user_roles')?>">User Roles</a></li>
				<?PHP } ?>
	            
	          </ul>
          </li>
          <?php } ?>
          
          <li class="<?php if(isset($mainmenu) && $mainmenu=="messages") echo "active";?>">
       		<a href="<?=site_url('admin/dashboard/signout')?>"><i class="fa fa-sign-out"></i> <span>Log Out</span></a>
       	  </li>
                            
          
          
      </ul>
      <!-- /.sidebar-menu -->
    </section>