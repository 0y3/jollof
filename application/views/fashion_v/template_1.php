<style>
    .photoframe a img{
        max-width: 242px;
        max-height: 242px;
        
    }
    
    .shadow {
    box-shadow: 0 2px 3px -1px #DCDCDC;
}
.sidebar-search-text {
    display: block;
    padding: 15px 15px 20px;
    margin: 35px 0 5px;
    background-color: #fafafa;
    color: #000;
    border-bottom: 1px solid #ededed;
}
.sidebar-search-text input {
    font-size: 16px;
    border: none;
        border-bottom-width: medium;
        border-bottom-style: none;
        border-bottom-color: currentcolor;
    border-bottom: 2px dotted #E0E0E0;
    padding-bottom: 9px;
    box-shadow: none;
}
.sidebar .sidebar-nav {
    margin: 0;
    padding: 0;
    padding-top: 5px;
    background: #fff;
}
.sidebar .sidebar-nav li {
    position: relative;
    list-style-type: none;
    border-bottom: 0;
}
.sidebar .sidebar-nav li a {
    position: relative;
    cursor: pointer;
    user-select: none;
    display: block;
    padding: 6px 56px 6px 16px;
    text-decoration: none;
    clear: both;
    font-weight: 400;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis;
    white-space: nowrap;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    color: inherit;
    border-bottom: 1px solid #ededed;
}
.ripple-effect {
    position: relative;
    overflow: hidden;
    -webkit-transform: translate3d(0,0,0);
}
.sidebar-badge {
    position: absolute;
    right: 16px;
    top: 0;
}
.sidebar-nav li .caret {
    position: absolute;
    right: 37px;
    top: 30%;
    
}
.sidebar .sidebar-nav .dropdown-menu {
    position: relative;
    width: 100%;
    margin: 0;
    padding: 0;
    padding-left: 10px;
    border: none;
    border-radius: 0;
    font-size: 14px;
    color: black;
    font-weight: bolder;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.sidebar .sidebar-nav li {
    position: relative;
    list-style-type: none;
    border-bottom: 0;
}

.nopadding {
    padding: 0;
}

</style>
<div class="container-flud" style=" margin-top: 20px; width: 90%; margin-left: auto; margin-right: auto;">
    
    <div class="row clearfix" class="page_content_offset">
				<aside class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30 ">
				<!--widgets-->
	
<div class=" sidebar">					<!--Bestsellers-->
    <div class="bg-white shadow">
              
              
        <div class="sidebar-menu widget" >
                 
            <figcaption>
                <h3 class="color_light">Category</h3>
            </figcaption>
                <!--<div class="sidebar-search-text">
                    <input class="form-control" placeholder="Search Cranes in India" type="text">
                </div>-->
                <!-- Sidebar navigation -->
                <ul class="nav sidebar-nav">
                <?php foreach ($nav as $navs) :?>
                    <?php if(!empty($navs['nav_cate_submenu'])): ?>
                    
                    <li class="dropdown">
                    <a class="ripple-effect dropdown-toggle color_dark tr_delay_hover" href="<?= base_url()?>fashion/products/<?= $navs['slug']?>" data-toggle="dropdownn">
                      
                      <?= $navs['categoryname']?>
                      <!--<span class="sidebar-badge">12</span>-->
                      <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($navs['nav_cate_submenu'] as $subnavs) :?>
                        <li>
                            <a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $subnavs['slug']?>" class="color_dark tr_delay_hover"  data-nav_cate_id="<?= $subnavs['id']?> " tabindex="-1">
                              <?= $subnavs['categoryname']?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                        
                        <?php foreach ($navs['nav_cate_submenu'] as $subnavs) :?>
                            <?php foreach ($subnavs['submenu_nav'] as $submenunavs) :?>
                                <li>
                                    <a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $submenunavs['slug']?>" class="color_dark tr_delay_hover" data-nav_cate_submenu_id="<?= $submenunavs['id']?> ">
                                    <?= $submenunavs['categoryname']?>
                                    </a>
                                </li> 
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ul>
                  </li>
                    
                    <?php else: ?>
                    <li>
                    <a class="color_dark tr_delay_hover" href="<?= base_url()?>fashion/products/<?= $navs['slug']?>">
                      <?= $navs['categoryname']?>
                      <!--<span class="sidebar-badge">3</span>-->
                    </a>
                    </li>
                    <?php endif; ?>
                <?php endforeach; ?>
                </ul>
                <!--
                <ul class="nav sidebar-nav">
                  <li class="dropdown">
                    <a class="ripple-effect dropdown-toggle" href="#" data-toggle="dropdown">
                      
                      Travel
                      <span class="sidebar-badge">
                        12
                      </span>
                      <b class="caret">
                      </b>
                    </a>
                    <ul class="dropdown-menu">
                        <li >
                        <a href="#" tabindex="-1">
                          Europe
                          <span class="sidebar-badge">
                            12
                          </span>
                        </a>
                      </li>
                     
                    </ul>
                  </li>
                  <li>
                    <a href="#">
                      Gifts
                      <span class="sidebar-badge">
                        3
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Products
                      <span class="sidebar-badge">
                        456
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Tickets
                      <span class="sidebar-badge badge-circle">
                        12
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Health
                      <span class="sidebar-badge badge-circle">
                        45
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Things To Do
                      <span class="sidebar-badge badge-circle">
                        117
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Fashion
                      <span class="sidebar-badge badge-circle">
                        117
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Fun Stuff
                      <span class="sidebar-badge badge-circle">
                        117
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Electronics
                      <span class="sidebar-badge badge-circle">
                        117
                      </span>
                    </a>
                  </li>
                </ul>-->
                <!-- Sidebar divider -->
              </div>
    </div>
</div>

</aside>
        
        
        
        
        
        

				<section class="col-lg-9 col-md-9 col-sm-9">
                                    
					<!--<h2 class="tt_uppercase m_bottom_20 color_dark heading1 animate_ftr">All Products</h2>-->
                                        
                                        <?php
                                            if(isset($page_loader))
                                            {
                                                if ( file_exists( APPPATH.'views/'.$page_loader.'.php' ) ) 
                                                {
                                                    $this->load->view($page_loader); // Product tray
                                                }
                                                else 
                                                {
                                                    $this->load->view($error_page); //error page
                                                }

                                            }
                                            else
                                            {
                                                $this->load->view($error_page); //error page
                                            }
                                        ?>
				
				</section>

			</div>
    
</div>