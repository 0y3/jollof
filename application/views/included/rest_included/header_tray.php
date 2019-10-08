                    <div class="content-header">

                        <ul class="nav-horizontal text-center">

                            <li class="d_tray ">
                                <a href="<?= site_url('restaurant-admin/dashboard')?>"><i class="fa fa-bar-chart"></i> Dashboard</a>
                            </li>

                            <li class="o_tray">
                                <a href="<?= site_url('restaurant-admin/order')?>"><i class="fa fa-shopping-cart"></i> Orders </a>
                            </li>
                            
                            <li class="p_tray">
                                <a href="<?= site_url('restaurant-admin/order_pending')?>"><i class="fa fa-exclamation"></i> Pending Orders<span class="badge pull-right note_red note_count"></span> </a>
                            </li >
                            
                            <li class="c_tray">
                                <a href="<?= site_url('restaurant-admin/product')?>"><i class="fa fa-cutlery"></i> Cuisines</a>
                            </li>
                            
                            <li class="m_tray">
                                <a href="<?= site_url('restaurant-admin/settings')?>"><i class="fa fa-cogs"></i> Settings</a>
                            </li>
                            
                            <!--<li class="a_tray">
                                <a href="#"><i class="fa fa-users"></i> Active Users</a>
                            </li>-->

                        </ul>

                    </div>



<script>
$(document).ready(function(){
 
    function load_unseen_notification(view = '')
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
 
    load_unseen_notification();
    
    $(document).on('click', '.p_tray', function(){
        $('.note_count').html('');
        load_unseen_notification('yes');
       });

    setInterval(function(){ 
        load_unseen_notification();
    }, 5000);
 
    });

</script>