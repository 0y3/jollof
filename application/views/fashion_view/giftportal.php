                        <div class="pb-20">
                            <div class="header-search-4 clearfix">
                                <form action="<?= site_url('giftportal/searchproducts')?>" method="get">
                                <div class="catigory-searchh catigorydivform">
                                    
                                        <input type="text" name="search" placeholder="Search for Giftportal Product here...">
                                        <button class="catigory-btn" type="submit"><i class="ion-ios-search-strong"></i> </button>
                                    
                                </div>
                                </form>
                            </div>
                        </div>

                        <div class="shop-topbar-wrapper">
                            <div class="grid-list-options">
                                <ul class="view-mode">
                                    <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ion-grid"></i></a></li>
                                    <li><a href="#product-list" data-view="product-list"><i class="ion-android-menu"></i></a></li>
                                </ul>
                            </div>
                            <!--<div class="product-sorting-wrapper">
                                <form action="<?= site_url('fashion/store/'.$cat_name.'/')?>" method="get">
                                <div class="product-shorting shorting-style">
                                    <label>Sort by:</label>
                                    <select name="position" id="position">
                                        <option value=""> Position</option>
                                        <option value="name" <?PHP if(($this->input->get("position")) && $this->input->get("position")=='name') echo 'selected'; ?>> Name</option>
                                        <option value="price_high_low" <?PHP if(($this->input->get("position")) && $this->input->get("position")=='price_high_low') echo 'selected'; ?>> Price: Low to High</option>
                                        <option value="price_low_high" <?PHP if(($this->input->get("position")) && $this->input->get("position")=='price_low_high') echo 'selected'; ?>> Price: High to Low</option>
                                    </select>

                                </div>
                                <div class="product-show shorting-style">
                                    <label>Show:</label>
                                    <select name="pages" id="pages">
                                        <option value="12" <?PHP if(($this->input->get("pages")) && $this->input->get("pages")=='12') echo 'selected'; ?>>12</option>
                                        <option value="24" <?PHP if(($this->input->get("pages")) && $this->input->get("pages")=='24') echo 'selected'; ?>>24</option>
                                        <option value="36" <?PHP if(($this->input->get("pages")) && $this->input->get("pages")=='36') echo 'selected'; ?>>36</option>
                                    </select>
                                </div>
                                </form>
                            </div>-->
                        </div>
                        <div class="grid-list-product-wrapper">
                            <div class="product-view product-grid">
                                <div class="row">
                                    
                                <?php if(!empty($get_prd)): ?>   
                                    
                                    <?php foreach ($get_prd as $allprd) :?>
            
                                        <?php if(!empty($allprd['prd_qcs'])): ?>
                                    <div class="product-width col-lg-6 col-xl-3 col-md-6">
                                        <div class="product-wrapper mb-30">
                                        
                                            <?php foreach ($allprd['prd_qcs'] as $prd_details) :?>
                                            <!--sale product-->
                                                <?php if(!empty($prd_details['sales'])): ?>
                                                
                                                    <span class="hot_stripe"><img class=" img-responsive" src="<?= site_url('assets/img/sale_product_type_2.png')?>" alt=""></span>
           
                                                <?php endif; ?>
                                            <!-- Images -->
                                            <div class="product-img">
                                                
                                                 
                                                
                                                <a href="<?= base_url()?>giftportal/product/<?= $prd_details['prd_url']?>">
                                                    
                                                    <?php if(!empty($prd_details['frontimage'])): ?>
                                            
                                                        <img src="<?= site_url('assets/uploads/fashion_prod/'.$prd_details['frontimage'])?>" class="img-responsive" alt="<?= $prd_details['frontimage']; ?>" >

                                                    <?php elseif (!empty($prd_details['imagename'])): ?>

                                                        <img src="<?= site_url('assets/uploads/fashion_prod/'.$prd_details['imagename'])?>" class=" img-responsive" alt="<?= $prd_details['imagename']; ?>" >

                                                    <?php else: ?>

                                                        <img src="<?= site_url('assets/img/product_img_1.jpg')?>" class="img-responsive" alt="<?= $prd_details['imagename']; ?>" >

                                                    <?php endif; ?>
                                                </a>
                                                <div class="product-action">
                                                    <a title="View Product" href="<?= site_url('giftportal/product/'.$prd_details['prd_url'] )?>">
                                                        <i class="ion-ios-eye-outline"></i>
                                                    </a>
                                                    <!--
                                                    <a class="action-heart" title="Wishlist" href="#">
                                                        <i class="ion-ios-heart-outline"></i>
                                                    </a>
                                                    
                                                    <a class="action-cart" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                                                        <i class="ion-stats-bars"></i>
                                                    </a>
                                                    -->
                                                </div>
                                                
                                            </div>
                                            <!-- End Of Product Images -->
                                            
                                            <!-- product details -->
                                            <div class="product-content">
                                                <?php if(intval($prd_details['color_count'])  > 1): ?>
                                           
                                                    <div data_productid="<?= $prd_details['id']; ?>"class=" "><p> <?=$prd_details['color_count']?> Colors Available</p></div>

                                                <?php else: ?>
                                                    <p>&nbsp;</p>
                                                <?php endif; ?>
                                                    <h4 title="<?= $prd_details['productname'] ?>">
                                                    <a href="<?= site_url('giftportal/product/'.$prd_details['prd_url'] )?>" class="color_dark">
                                                
                                                        <?php
                                                                $value = $prd_details['productname'];
                                                                    $limit = '22';
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
                                                </h4>
                                                <div class="product-price-cart-wrapper">
                                                    <div class="product-rating-price-wrapper">
                                                        <!--<div class="product-rating">
                                                            <i class="ion-star"></i>
                                                            <i class="ion-star"></i>
                                                            <i class="ion-star"></i>
                                                            <i class="ion-star"></i>
                                                            <i class="ion-star"></i>
                                                        </div>-->
                                                        <br>
                                                        <div class="product-price">
                                                            <span class=""><?= number_format(floatval($prd_details['jpoints']),0,'', ',');?> Jpoint</span>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    <div class="product-cart">
                                                        <!--<a href="<?= site_url('giftportal/product/'.$prd_details['prd_url']) ?>" class="action-plus" title="Quick Buy" data-toggle="modal" data-container="modal_quickproduct_container" data-target="#modal_quickproduct_container" >
                                                            <i class="ion-bag"></i>
                                                        </a>-->
                                                        <a href="<?= site_url('giftportal/product/'.$prd_details['prd_url'] )?>" class="color_dark"> <i class="ion-bag"></i></a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <!-- End Of product details -->
                                            
                                            
                                            <!-- list view -->
                                            <div class="product-list-content">
                                                <h4 title="<?= $prd_details['productname'] ?>">
                                                    <a href="<?= site_url('giftportal/product/'.$prd_details['prd_url'] )?>" class="color_dark">
                                                
                                                        <?php
                                                                $value = $prd_details['productname'];
                                                                    $limit = '40';
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
                                                </h4>
                                                <!--<div class="product-rating">
                                                    <i class="ion-star"></i>
                                                    <i class="ion-star"></i>
                                                    <i class="ion-star"></i>
                                                    <i class="ion-star"></i>
                                                    <i class="ion-star"></i>
                                                </div>-->
                                                <?php if(intval($prd_details['color_count'])  > 1): ?>
                                           
                                                    <div data_productid="<?= $prd_details['id']; ?>"class=" "><p> <?=$prd_details['color_count']?> Colors Available</p></div>
                                                <?php endif; ?>
                                                
                                                    <span class=""><?= number_format(floatval($prd_details['jpoints']),0,'', ',');?> Jpoint</span>
                                                
                                                <p>
                                                     <?php
                                                                $value = $prd_details['productshortdesc'];
                                                                    $limit = '160';
                                                                    if (strlen($value) > $limit) {
                                                                             $trimValues = substr($value, 0, $limit).'...';
                                                                              } 
                                                                    else {
                                                                            $trimValues = $value;
                                                                      }
                                                                //character_limiter($resta['companydesc'],25); 
                                                                      echo $trimValues;
                                                        ?>
                                                </p>
                                                <div class="product-list-action">
                                                    <a title="View Product" href="<?= site_url('giftportal/product/'.$prd_details['prd_url'] )?>"><i class="ion-ios-eye-outline"></i> View Product</a>
                                                    
                                                        
                                                </div>
                                            </div>
                                            <!-- List View -->
                                            
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    
                                        <!--product item-->
                                        <?php else: ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>   
                                    
                                <?php else: ?>
                                    <div class="product-width col-lg-6 col-xl-4 col-md-6">
                                    
                                        
                                        <h4>Oh snap!</h4>
                                        <p>Sorry No Giftportal product for this Category Now.</p>
                                    
                                    </div>

                                <?php endif; ?>    
                                    
                                    
                                    
                                    
                                    
                                    
                                   
                                </div>
                            </div>
                            <div class="pagination-style f-right mt-20">
                                <?=$links?>
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
        