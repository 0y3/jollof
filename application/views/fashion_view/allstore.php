
                        <div class="pb-20">
                            <div class="header-search-4 clearfix">
                                <form action="<?= site_url('fashion/products')?>" method="get">
                                <div class="category-select-wrapper">
                                    <select name="cate_option" class="category-select orderby">
                                        <option value="">All Categories</option>
                                        <?php foreach ($nav as $navs) :?>
                                        <option value="<?= $navs['id']?>" title="<?= $navs['categoryname']?>">
                                            <?php
                                                $value = $navs['categoryname'];
                                                $limit = '13';
                                                if (strlen($value) > $limit) {
                                                         $trimValues = substr($value, 0, $limit).'...';
                                                          } 
                                                else {
                                                        $trimValues = $value;
                                                  }
                                                //character_limiter($resta['companydesc'],25); 
                                                  echo $trimValues;
                                            ?>
                                        </option>
                                        <?php endforeach; ?>
                                        <!--
                                        <option value="">Computers</option>
                                        <option value="">Laptops </option>
                                        <option value="">Watches</option>
                                        -->
                                    </select>
                                </div>
                                <div class="catigory-search catigorydivform">
                                    
                                        <input type="text" name="search" placeholder="Search for product here...">
                                        <button class="catigory-btn" type="submit"><i class="ion-ios-search-strong"></i> </button>
                                    
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="shop-topbar-wrapper">
                            <div class="grid-list-options">
                                <!--<ul class="view-mode">
                                    <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ion-grid"></i></a></li>
                                    <li><a href="#product-list" data-view="product-list"><i class="ion-android-menu"></i></a></li>
                                </ul>-->
                            </div>
                            <div class="product-sorting-wrapper">
                                
                                <form action="<?= site_url('fashion/products/'.$cat_name.'/')?>" method="get">
                                <div class="product-show shorting-style">
                                    <label>Show:</label>
                                    <select name="pages" id="pages">
                                        <option value="12" <?PHP if(($this->input->get("pages")) && $this->input->get("pages")=='12') echo 'selected'; ?>>12</option>
                                        <option value="24" <?PHP if(($this->input->get("pages")) && $this->input->get("pages")=='24') echo 'selected'; ?>>24</option>
                                        <option value="36" <?PHP if(($this->input->get("pages")) && $this->input->get("pages")=='36') echo 'selected'; ?>>36</option>
                                    </select>
                                </div>
                                </form>
                                
                            </div>
                        </div>
                        <div class="grid-list-product-wrapper">
                            <div class="product-view product-grid">
                                <div class="row">

<?php if(!empty($get_prd)): ?>   
                                    
    <?php foreach ($get_prd as $allstore) :?>
        <?php
                if (isset($allstore['logo'])&& !empty($allstore['logo'])) {
                    $img = $allstore['logo'];
                    } 
                else {
                        $img='noimage.jpg';
                  }
        ?>
    <div class="product-width col-lg-4 col-xl-4 col-md-4">
        <div class="product-wrapper mb-30">
            <div class="product-img">
                <a href="<?= base_url()?>fashion/store/<?= $allstore['slug']?>">
                    <img src="<?= site_url("assets/uploads/fashion_logo/$img")?>" class="img-responsive"  alt="">
                </a>
                <!--
                <div class="product-action">
                    <a class="action-plus" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                        <i class="ion-ios-eye-outline"></i>
                    </a>
                    <a class="action-heart" title="Wishlist" href="#">
                        <i class="ion-ios-heart-outline"></i>
                    </a>
                    <a class="action-cart" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                        <i class="ion-stats-bars"></i>
                    </a>
                </div>
                -->
            </div>
            <div class="product-content">
                <h4><a href="<?= base_url()?>fashion/store/<?= $allstore['slug']?>">

                        <?php
                            $value = $allstore['companyname'];
                                $limit = '22';
                                if (strlen($value) > $limit) {
                                         $trimValues = substr($value, 0, $limit).'...';
                                          } 
                                else {
                                        $trimValues = $value;
                                  }
                                  echo $trimValues;
                        ?>
                    </a></h4>
                <div class="product-price-cart-wrapper">
                    <div class="product-rating-price-wrapper">
                        <div class="product-price">
                            <span>Products:- <?=$allstore['storeproductcount'] ?> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>   
                                    
<?php else: ?>
    <div class="product-width col-lg-3 col-xl-2 col-md-3">

        
        <h4>Oh snap!</h4>
        <p>Sorry No Store .</p>

    </div>

<?php endif; ?>  

                                    
                                
                                   
                                </div>
                            </div>
                            <div class="pagination-style f-right mt-20">
                                <!--<ul>
                                    <li>
                                        <a href="#">1</a>
                                    </li>
                                    <li>
                                        <a class="active" href="#">2</a>
                                    </li>
                                    <li>
                                        <a href="#">...</a>
                                    </li>
                                    <li>
                                        <a href="#">10</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            >>
                                        </a>
                                    </li>
                                </ul>-->
                            </div>
                        </div>
