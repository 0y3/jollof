<style>
   .mean-bar {
    top: 20px;
    } 
</style>
            <div class="header-bottom black-bg">
                <div class="container">
                    <div class="menu-position">
                       <div class="row">
                            <div class="col-lg-8 d-none d-lg-block">
                                <div class="main-menu">
                                    <nav>
                                        <ul>
                                            <li><a href="javascript:void(0)">home</a>
                                                <ul class="submenu">
                                                    <li><a href="<?= site_url(''); ?>">Jollof Home</a></li>
                                                    <li><a href="<?= site_url('cuisine'); ?>">Cuisine Home</a></li>
                                                </ul>
                                            </li>

                                        <?php if( !isset($_SESSION['logged_in']) || $_SESSION['Type'] != 'User' ): ?>
                                            <li><a href="<?= site_url('accounts/login'); ?>">Sign In</a></li>
                                            <li><a href="<?= site_url('accounts/login?register=active'); ?>">Sign Up</a></li>
                                        <?php else: ?>
        
                                            <li class="">
                                                <a href="javascript:void(0)" >My Account (<?=$_SESSION['first_name']?>)</a>
                                                    <!--sub menu-->
                                                    <ul class="submenu">
                                                        <li><a href="<?= site_url('accounts/profile') ?>">Profile</a></li>
                                                        <li><a href="<?= site_url('accounts/order') ?>">Orders</a></li>
                                                        <!--<li><a href="shop.html">Caps &amp; Hats</a></li>-->
                                                        <li><a href="<?= site_url('accounts/table_reservation') ?>">Table  Reservation</a></li>
                                                        <li><a href="<?= site_url('accounts/giftportal') ?>">Giftportal Orders</a></li>
                                                        <li><a href="<?=site_url('accounts/layaway') ?>">layaway</a></li>
                                                        <li><a href="javascript:void(0)">Point: <span class="point_count"></span> </a></li>
                                                        <li><a href="<?= site_url('accounts/logout') ?>">logout</a></li>
                                                    </ul>
                                            <li>
                                        <?php endif; ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!--<div class="col-lg-4 col-md-12">
                                <div class="header-search">
                                    <form action="#" class="header-search-form">
                                        <input type="text" placeholder="Find a product">
                                        <button>
                                            <i class="ion-ios-search-strong"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>-->
                            <div class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active" style="display: block;">
                                        <ul class="menu-overflow">
                                            <li><a href="javascript: void(0)">HOME</a>
                                                <ul>
                                                    <li><a href="<?= site_url(''); ?>">Jollof Home</a></li>
                                                    <li><a href="<?= site_url('cuisine'); ?>">Cuisine Home</a></li>
                                                </ul>
                                            </li>
                                        <?php if( !isset($_SESSION['logged_in']) || $_SESSION['Type'] != 'User' ): ?>
                                            <li><a href="<?= site_url('accounts/login'); ?>">Sign In</a></li>
                                            <li><a href="<?= site_url('accounts/login?register=active'); ?>">Sign Up</a></li>
                                         <?php else: ?>
                                            <li class="">
                                                <a href="javascript:void(0)" >My Account (<?=$_SESSION['first_name']?>)</a>
                                                    <!--sub menu-->
                                                    <ul class="">
                                                        <li><a href="<?= site_url('accounts/profile') ?>">Profile</a></li>
                                                        <li><a href="<?= site_url('accounts/order') ?>">Orders</a></li>
                                                        <!--<li><a href="shop.html">Caps &amp; Hats</a></li>-->
                                                        <li><a href="<?= site_url('accounts/table_reservation') ?>">Table  Reservation</a></li>
                                                        <li><a href="<?= site_url('accounts/giftportal') ?>">Giftportal Orders</a></li>
                                                        <li><a href="<?= site_url('accounts/layaway')?>">layaway</a></li>
                                                        <li><a href="javascript:void(0)">Point: <span class="point_count"></span> </a></li>
                                                        <li><a href="<?= site_url('accounts/logout') ?>">logout</a></li>
                                                    </ul>
                                            <li>
                                        <?php endif; ?>
                                            <!--
                                            <li><a href="#">pages</a>
                                                <ul>
                                                    <li><a href="about-us.html">about us</a></li>
                                                    <li><a href="cart-page.html">cart page</a></li>
                                                    <li><a href="checkout.html">checkout</a></li>
                                                    <li><a href="wishlist.html">wishlist</a></li>
                                                    <li><a href="contact.html">contact us</a></li>
                                                    <li><a href="contact.html">loging / register</a></li>
                                                    <li><a href="shop.html">shop page</a></li>
                                                    <li><a href="shop-list.html">shop list</a></li>
                                                    <li><a href="product-details.html">product details</a></li>
                                                    <li><a href="shop-grid-full-wide.html">shop grid full wide</a></li>
                                                    <li><a href="shop-list-full-wide.html">shop list full wide</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">shop</a>
                                                <ul>
                                                    <li><a href="#">WoMen</a>
                                                        <ul>
                                                            <li><a href="shop.html">Bags &amp; Purses</a></li>
                                                            <li><a href="shop.html">Beauty</a></li>
                                                            <li><a href="shop.html">Coats &amp; Jackets</a></li>
                                                            <li><a href="shop.html">Curve &amp; Plus Size</a></li>
                                                            <li><a href="shop.html">Denim</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Men</a>
                                                        <ul>
                                                            <li><a href="shop.html">Bags</a></li>
                                                            <li><a href="shop.html">Blazers</a></li>
                                                            <li><a href="shop.html">Caps &amp; Hats</a></li>
                                                            <li><a href="shop.html">Gifts</a></li>
                                                            <li><a href="shop.html">Grooming</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Accessories</a>
                                                        <ul>
                                                            <li><a href="shop.html">Belts</a></li>
                                                            <li><a href="shop.html">Bow ties</a></li>
                                                            <li><a href="shop.html">Caps</a></li>
                                                            <li><a href="shop.html">Hats</a></li>
                                                            <li><a href="shop.html">Denim</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">BLOG</a>
                                                <ul>
                                                    <li><a href="blog.html">blog page</a></li>
                                                    <li><a href="blog-left-sidebar.html">blog sidebar</a></li>
                                                    <li><a href="blog-details.html">blog details</a></li>
                                                    <li><a href="blog-details-slider.html">blog details slider</a></li>
                                                    <li><a href="blog-details-video.html">blog details video</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html"> Contact us </a></li>
                                            -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  End of header nav -->

            <script>
                // microsite nav 
                $(document).ready(function() {
                    $('.linkcoloractive').removeClass('linkcoloractive').addClass('linkcolor');
                    //$('.cuisine').removeClass('linkcolor').addClass('linkcoloractive');
                });
            </script>