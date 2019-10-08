<!--Sidebar starts here-->


<div id="sidebar">

    <div id="sidebar-scroll">

        <div class="sidebar-content">

            <a href="index.html" class="sidebar-brand">
                <i class="fa fa-home"></i><span class="sidebar-nav-mini-hide"><strong>JOLLOF</strong></span>
            </a>


            <ul class="sidebar-nav">
                
                <li class="nav_d">
                    <a href="<?= site_url('admin/dashboard')?>"><i class="fa fa-dashboard sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard </span></a>
                </li>


                <li class="nav_o">

                    <a href="#" class=" sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-shopping-cart sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Orders <span class="badge note_red ordercount"></span></span></a>

                    <ul>

                        <li>
                            <a href="<?= site_url('admin/order')?>">All Orders <span class="badge note_red note_count"></span></a>
                        </li>

                        <li>
                            <a href="<?= site_url('admin/table_reservation')?>">Table Reservation <span class="badge note_red table_count"></span></a>
                        </li>

                    </ul>

                </li>



                <li class="nav_a">

                    <a href="" class=" sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-file-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Approval task</span></a>

                    <ul>

                        <li>
                            <a href="<?= site_url('admin/b2bregistration')?>">B2B Registration Review</a>
                        </li>

                        <li>
                            <a href="<?= site_url('admin/b2baddregistration')?>">Add Restaurant Review</a>
                        </li>

                        <li>
                            <a href="<?= site_url('admin/b2bpromobanner')?>">B2B Promo Banner Display Review</a>
                        </li>

                        <li>
                            <a href="<?= site_url('admin/thirdpartyads')?>">Third Party Ads Review</a>
                        </li>

                        <li>
                            <a href="<?= site_url('admin/comments')?>">B2C Comment Review</a>
                        </li>

                        <li>
                            <a href="<?= site_url('admin/b2btestimonial')?>">B2B Testimonial Review</a>
                        </li>

                       <!-- <li>
                            <a href="<?= site_url('admin/giftredemption')?>">Gift Redemption Review</a>
                        </li>-->

                    </ul>

                </li>

                <li class="nav_b2b">

                    <a href="#" class=" sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-folder-open sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">B2B Reporting</span></a>

                    <ul>

                        <li>
                            <a href="<?= site_url('admin/b2bregistered')?>">View Registered B2Bs</a>
                        </li>

                        <li>
                            <a href="#">Sales Intelligence</a>
                        </li>

                        <li>
                            <a href="<?= site_url('admin/order')?>">Order Transactions Report</a>
                        </li>

                    </ul>

                </li>
        
                <li class="nav_b2c">
        
                    <a href="#" class=" sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-file-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">B2C Reporting</span></a>
        
                    <ul>
        
                        <li>
                            <a href="<?= site_url('admin/b2cusers')?>">View Signed Up B2Cs</a>
                        </li>
        
                        <li>
                            <a href="<?= site_url('admin/b2corders')?>">View B2Cs Orders</a>
                        </li>
        
                        <li>
                            <a href="#">View B2C Table Reservations</a>
                        </li>
        
                    </ul>
        
                </li>
               

                <li class="nav_ads">

                    <a href="#" class=" sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-wrench sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"> Promos & Ads Management</span></a>

                    <ul>

                        <li>
                            <a href="<?= site_url('admin/b2bpromobannerall')?>">B2B Promo Ads</a>
                        </li>

                        <li>
                            <a href="<?= site_url('admin/thirdpartyadsall')?>">Third Party Ads</a>
                        </li>

                    </ul>

                </li>


                <li class="nav_u">

                    <a href="#" class=" sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-wrench sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">User Management</span></a>

                    <ul>

                        <li>

                            <a href="#">Create/Edit Portal Logins</a>

                        </li>

                        <li>

                            <a href="#">Edit My Profile</a>

                        </li>

                        <li>

                            <a href="">Change My Password</a>

                        </li>

                        <li>

                            <a href="#">Users Audit Trail</a>

                        </li>

                    </ul>

                </li>



                <li class="nav_b">

                    <a href="#" class=" sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-money sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Billing </span></a>

                    <ul>

                        <li>

                            <a href="<?= site_url('admin/b2bbilling')?>">Manage B2B Billing</a>

                        </li>

                        <li>

                            <a href="<?= site_url('admin/b2bbillingreport')?>">Generate B2B Billing Report</a>

                        </li>
                        <li>

                            <a href="<?= site_url('admin/deliveringcharges')?>">Delivering Charges</a>

                        </li>

                    </ul>

                </li>

                <li class="nav_c">

                    <a href="#" class=" sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-bullhorn sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Banner Management</span></a>

                    <ul>

                        <li>

                            <a href="<?= site_url('admin/jollofbannerhomeset')?>">Manage Jollof Banner</a>

                        </li>
                        
                        <li>

                            <a href="<?= site_url('admin/cuisinebannerrestaurantpage')?>">Manage Cuisine Banner</a>

                        </li>

                        <li>

                            <a href="">Manage Fashion Banner</a>

                        </li>

                        <li>

                            <a href="">Manage Lifestyle Banner</a>

                        </li>

                        <li>
                            
                            <a href="">Manage Lifestyle Banner</a>
                        
                        </li>

                    </ul>

                </li>


<!--
                <li class="nav_l">

                    <a href="#" class=" sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-trophy sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Loyalty Campaigns</span></a>

                    <ul>

                        <li>

                            <a href="#">Campaign Settings</a>

                        </li>

                        <li>

                            <a href="#">Discount Voucher Winners</a>

                        </li>

                        <li>

                            <a href="#">Create/Edit Redeemable Gifts</a>

                        </li>

                    </ul>

                </li>
                
-->
                <li class="nav_f">

                    <a href="#" class=" sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cogs sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Fashion Settings</span></a>

                    <ul>

                        <li>

                            <a href="<?= site_url('admin/fashioncategory')?>">Navigation/ Categories Settings</a>

                        </li>
                        
                        <li>

                            <a href="<?= site_url('admin/fashioncolor')?>">Add / Edit Color</a>

                        </li>
                        
                        <li>

                            <a href="<?= site_url('admin/fashionsize')?>">Add / Edit Size</a>

                        </li>

                    </ul>

                </li>
                
                <li class="nav_cu">

                    <a href="#" class=" sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cogs sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Cuisine Settings</span></a>

                    <ul>
                        
                        <li>

                            <a href="<?= site_url('admin/cuisinecategory')?>">Cuisine Category Settings</a>

                        </li>
                    </ul>

                </li>

                <li class="nav_g">

                    <a href="#" class=" sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cogs sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">General Settings</span></a>

                    <ul>
                        <li>

                            <a href="<?= site_url('admin/settings')?>">Other Settings</a>

                        </li>

                        <li>

                            <a href="<?= site_url('admin/location') ?>">Create/Edit Areas/Locations</a>

                        </li>
<!--
                        <li>

                            <a href="<?= site_url('admin/faqeditor')?>">Edit FAQ</a>

                        </li>

                        <li>

                            <a href="#">Edit Terms & Conditions</a>

                        </li>

                        <li>

                            <a href="#">Edit Privacy Policy</a>

                        </li>
-->
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
      url:'<?= site_url('super_admin/unseen_table') ?>',
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data)
      {
       if(data.unseen_notification > 0)
       {
        $('.table_count').html(data.unseen_notification);
       }
       else{$('.table_count').html('');}
      }
     });
    }
    
    
    
    function allordercount ()
    {
        var table_c = $('.table_count').html();
        var order_c = $('.note_count').html();
        if(table_c =='')
        {
            table_c=0;
        }
        if(order_c =='')
        {
            order_c=0;
        }
        var total_count = parseInt(table_c) + parseInt(order_c); 
        if(total_count > 0)
       {
        $('.ordercount').html(total_count);
       }
        //ordercount
    }
    
    
    
    load_unseen_notification();
    allordercount();
    
    $(document).on('click', '.table_click', function(){
        $('.table_count').html('');
        load_unseen_notification('yes');
       });

    setInterval(function(){ 
        load_unseen_notification();
        //allordercount();
    }, 5000);
    setInterval(function(){ 
        allordercount();
    }, 1000);
 
    });

</script>