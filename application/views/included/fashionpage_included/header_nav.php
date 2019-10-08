<style>
   .mean-bar {
    top: 20px;
    } 
</style>          

            <div class="header-bottom black-bg">
                <div class="container">
                    <div class="menu-position">
                       <div class="row">
                            <div class="col-lg-12 d-none d-lg-block">
                                <div class="main-menu">
                                    <nav>
                                        <ul>
                                        
                                        <?php foreach ($nav as $navs) :?>
                                                
                                                <li class="mega-menu-position">
                                                    <a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>" title="<?= $navs['categoryname']?>">
                                                        
                                                        <?php
                                                            $value = $navs['categoryname'];
                                                            $limit = '20';
                                                            if (strlen($value) > $limit) {
                                                                     $trimValues = substr($value, 0, $limit).'...';
                                                                      } 
                                                            else {
                                                                    $trimValues = $value;
                                                              }
                                                        //character_limiter($resta['companydesc'],25); 
                                                              echo $trimValues;
                                                        ?>
                                                    </a>
                                                    
                                                    <!--sub menu-->    
                                                    <?php if(!empty($navs['nav_cate_submenu'])): ?>
                                                    <ul class="mega-menu">
                                                        <div style=" margin-left: 30px;"><a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>"><h5><?= $navs['categoryname']?></h5></a></div>
                                                        <!-- Ad  -->
                                                        <!--<li>
                                                            <ul>
                                                                <li><a href="shop.html"><img alt="" src="<?= base_url() ?>assets/jollof_banners/banner/menu-img-4.jpg"></a></li>
                                                            </ul>
                                                        </li>-->
                                                        <!-- Ad end -->
                                                        <?php foreach ($navs['nav_cate_submenu'] as $subnavs) :?>
                                                        <li>
                                                            <ul>
                                                                <!--<li><a href="shop.html"><img alt="" src="<?= base_url() ?>assets/jollof_banners/banner/menu-img.jpg"></a></li>-->
                                                                <li>
                                                                    <a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $subnavs['slug']?>">
                                                                        <b class="mega-menu-title"><?= $subnavs['categoryname']?></b>
                                                                    </a>
                                                                </li>
                                                                <?php foreach ($subnavs['submenu_nav'] as $submenunavs) :?>
                                                                <li><a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $submenunavs['slug']?>"><?= $submenunavs['categoryname']?></a></li>
                                                                <?php endforeach; ?>
                                                                <li class="divider"></li>
                                                                
                                                                
                                                            </ul>
                                                        </li>
                                                        <?php endforeach; ?>
                                                        
                                                        
                                                    </ul>
                                                    <?php endif; ?>
                                                    <!--sub menu End--> 
                                                    
                                                </li>
                                                
                                            <?php endforeach; ?> 
                                                <li class="mega-menu-position">
                                                    <a href="<?= base_url()?>fashion/products/layaway" title="Layaway"> Layaway</a>
                                                </li>
                                                <li class="mega-menu-position">
                                                    <a href="<?= base_url()?>fashion/allstore" title="All Store"> All Store</a>
                                                </li>
                                                
                                           
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                           <!--
                            <div class="col-lg-4 col-md-12">
                                <div class="header-search">
                                    <form action="#" class="header-search-form">
                                        <input type="text" placeholder="Find a product">
                                        <button>
                                            <i class="ion-ios-search-strong"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                           -->
                            <div class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active">
                                        <ul class="menu-overflow">
                                            
                                            <?php foreach ($nav as $navs) :?>
                                            
                                            <li><a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>" title="<?= $navs['categoryname']?>"><?= $navs['categoryname']?></a>
                                                <!--sub menu-->    
                                                <?php if(!empty($navs['nav_cate_submenu'])): ?>
                                                <ul>
                                                    
                                                    <?php foreach ($navs['nav_cate_submenu'] as $subnavs) :?>
                                                    <li>
                                                        <a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $subnavs['slug']?>"><?= $subnavs['categoryname']?></a>
                                                        <ul>
                                                        <?php foreach ($subnavs['submenu_nav'] as $submenunavs) :?>
                                                            <li><a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $submenunavs['slug']?>"><?= $submenunavs['categoryname']?></a></li>
                                                            
                                                        <?php endforeach; ?>
                                                        </ul>
                                                    </li>
                                                    <?php endforeach; ?> 
                                                    
                                                </ul>
                                                <?php endif; ?>
                                                <!--sub menu End-->
                                            </li>
                                            <?php endforeach; ?> 
                                            <li>
                                                <a href="<?= base_url()?>fashion/products/layaway" title="Layaway"> Layaway</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url()?>fashion/allstore" title="All Store"> All Store</a>
                                            </li>
                                            
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  End of header nav -->
