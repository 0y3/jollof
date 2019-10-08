<!--Sidebar starts here-->


<div id="sidebar">

    <div id="sidebar-scroll">

        <div class="sidebar-content">

            <a href="<?= site_url('fashion-admin/dashboard')?>" class="sidebar-brand">
                <i class="fa fa-home"></i><span class="sidebar-nav-mini-hide"><strong>JOLLOF FASHION</strong></span>
            </a>


            <ul class="sidebar-nav">
                
                <li class="nav_d">
                    <a href="<?= site_url('fashion-admin/dashboard')?>"><i class="fa fa-dashboard sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard </span></a>
                </li>
                

                <li class="nav_m">

                    <a href="" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-tags sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Product Managment</span></a>

                    <ul>

                        <li>
                            <a href="<?= site_url('fashion-admin/product')?>">All Product</a>
                        </li>

                        <li>
                            <a href="<?= site_url('fashion-admin/newproduct')?>">Add Product</a>
                        </li>
                        
                        <li>
                            <a href="<?= site_url('fashion-admin/product_stock_manager')?>">Stock Manager</a>
                        </li>

                    </ul>

                </li>
                
                <li class="nav_o">

                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-shopping-cart sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Orders <span class="badge note_red note_count"></span></span></a>

                    <ul>

                        <li>
                            <a href="<?= site_url('fashion-admin/order')?>">All Orders</a>
                        </li>

                        <li>
                            <a href="<?= site_url('fashion-admin/order_pending')?>" class="pending_click">Pending Orders<span class="badge note_red note_count"></span> </a>
                        </li>
           
                        <li>
                            <a href="<?= site_url('fashion-admin/order_processing')?>">Processing Orders</a>
                        </li>
                        
                        <li>
                            <a href="<?= site_url('fashion-admin/order_delivery')?>">Disperse Orders</a>
                        </li>
                        
                        <li>
                            <a href="<?= site_url('fashion-admin/order_delivered')?>">Delivered Orders</a>
                        </li>
                        
                        <li>
                            <a href="<?= site_url('fashion-admin/order_cancel')?>">Cancel Orders</a>
                        </li>
                        
                        

                    </ul>

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

                            <a href="<?= site_url('fashion-admin/profile')?>">Profile</a>

                        </li>

                        <li>

                            <a href="<?= site_url('fashion-admin/settings')?>">General Settings</a>

                        </li>
                        
                        <li>

                            <a href="<?= site_url('fashion-admin/users')?>">Users </a>

                        </li>
                        
                        <li>

                            <a href="<?= site_url('fashion-admin/userroles')?>">Roles & Permissions</a>

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
 
    //  check pending order
    function load_unseen_order_notification(view = '')
    {
     $.ajax({
      url:'<?= site_url('fashion_admin/unseen_orders') ?>',
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

