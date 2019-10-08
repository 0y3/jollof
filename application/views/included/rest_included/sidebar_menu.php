<!--Sidebar starts here-->


<div id="sidebar">

    <div id="sidebar-scroll">

        <div class="sidebar-content">

            <a href="<?= site_url('restaurant-admin/dashboard')?>" class="sidebar-brand">
                <i class="fa fa-home"></i><span class="sidebar-nav-mini-hide"><strong>JOLLOF CUISINE</strong></span>
            </a>


            <ul class="sidebar-nav">
                
                <li class="nav_d">
                    <a href="<?= site_url('restaurant-admin/dashboard')?>"><i class="fa fa-dashboard sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard </span></a>
                </li>
                

                <li class="nav_m">

                    <a href="" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cutlery sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Menu Managment</span></a>

                    <ul>

                        <li>
                            <a href="<?= site_url('restaurant-admin/product')?>">All Menu</a>
                        </li>

                        <li>
                            <a href="<?= site_url('restaurant-admin/add_product')?>">Add Menu</a>
                        </li>
                        
                        <li>
                            <a href="<?= site_url('restaurant-admin/category')?>">Menu Categories</a>
                        </li>

                    </ul>

                </li>
                
                <li class="nav_o">

                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-shopping-cart sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Orders <span class="badge note_red note_count"></span> </span></a>

                    <ul>

                        <li>
                            <a href="<?= site_url('restaurant-admin/order')?>">ALL Food Orders</a>
                        </li>

                        <li>
                            <a href="<?= site_url('restaurant-admin/order_pending')?>" class="pending_click">Pending Orders <span class="badge note_red note_count"></span> </a>
                        </li>
                        
                        <li>
                            <a href="<?= site_url('restaurant-admin/order_processing')?>">Processing Orders</a>
                        </li>
                        
                        <li>
                            <a href="<?= site_url('restaurant-admin/order_delivery')?>">Disperse Orders</a>
                        </li>
                        
                        <li>
                            <a href="<?= site_url('restaurant-admin/order_delivered')?>">Delivered Orders</a>
                        </li>
                        
                        <li>
                            <a href="<?= site_url('restaurant-admin/order_cancel')?>">Cancel Orders</a>
                        </li>
                        

                    </ul>

                </li>

                <li class="nav_t ">
                    <a href="<?= site_url('restaurant-admin/table_reservation')?>" class="table_click"><i class="fa fa-file-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Table Reservation <span class="badge note_red table_count"></span> </span></a>
                </li>

                

                <!--<li class="nav_r">

                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-folder-open sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Restaurant Mang.</span></a>

                    <ul>
                        
                        <li>
                            <a href="#"> Create Restaurant</a>
                        </li>

                        <li>
                            <a href="#">Switch Btw Restaurant</a>
                        </li>

                    </ul>

                </li>-->

                
                <li class="nav_a">

                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cogs sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Administration</span></a>

                    <ul>
                        <li>

                            <a href="<?= site_url('restaurant-admin/profile')?>">Profile</a>

                        </li>

                        <li>

                            <a href="<?= site_url('restaurant-admin/settings')?>">General Settings</a>

                        </li>
                        
                        <li>

                            <a href="<?= site_url('restaurant-admin/promo_banner')?>">Promos $ Banners</a>

                        </li>

                        <li>

                            <a href="<?= site_url('restaurant-admin/users')?>">Users </a>

                        </li>
                        
                        <li>

                            <a href="<?= site_url('restaurant-admin/userroles')?>">Roles & Permissions</a>

                        </li>

                        <!--<li>

                            <a href="#">Users Audit Trail</a>

                        </li>-->

                    </ul>

                </li>





</ul>
</div>
</div>
</div>

<!--Sidebar Ends here-->

<script>
$(document).ready(function(){
 
    function load_unseen_notification(view = '')
    {
     $.ajax({
      url:'<?= site_url('restaurant_admin/unseen_table') ?>',
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data)
      {
       if(data.unseen_notification > 0)
       {
        $('.table_count').html(data.unseen_notification);
       }
      }
     });
    }
 
    load_unseen_notification();
    
    $(document).on('click', '.table_click', function(){
        $('.table_count').html('');
        load_unseen_notification('yes');
       });

    setInterval(function(){ 
        load_unseen_notification();; 
    }, 5000);
 
    
    
    //  check pending order
    function load_unseen_order_notification(view = '')
    {
     $.ajax({
      url:'<?= site_url('restaurant_admin/unseen_orders') ?>',
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data)
      {
       if(data.unseen_notification > 0)
       {
        $('.note_count').html(data.unseen_notification);
       }
      }
     });
    }
 
    load_unseen_order_notification();
    
    $(document).on('click', '.pending_click', function(){
        $('.note_count').html('');
        load_unseen_order_notification('yes');
       });

    setInterval(function(){ 
        load_unseen_order_notification();
    }, 5000);
 
 });

</script>

