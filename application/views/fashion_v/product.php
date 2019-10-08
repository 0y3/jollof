<style>
    .img_div {
        min-height:245px ;
        text-align: center;
    }
    .img_divimg {
        height:242px ;
        width: 242px;
    }

</style>
 

        <?php if(!empty($get_prd)): ?>
                
            <?php 
            foreach($get_prd as $post){
                $catt_name =  $post['cat_name'] ;
             }
            ?>  
        
        <h3 class="tt_uppercase m_bottom_20 color_dark heading1 animate_ftr"><?= $cat_name?> </h3>
        <!--products-->
        <section class="products_container clearfix m_bottom_25 m_sm_bottom_15">
            
            <?php foreach ($get_prd as $allprd) :?>
            
              <?php if(!empty($allprd['prd_qcs'])): ?>
                <!--product item-->
                <div class="product_item specials">
                        <figure class="r_corners photoframe shadow relative animate_ftb long">
                                <!--product preview-->
                                <?php foreach ($allprd['prd_qcs'] as $prd_details) :?>
                                
                                
                                
                                
                                
                                
                                
                                <div class="img_div ">
                                <a href="<?= base_url()?>fashion/store/<?= $prd_details['store_url']?>/<?= $prd_details['prd_url']?>" class="d_block relative pp_wrap">
                                    
                                        <!--sale product-->
                                        <?php if(!empty($prd_details['discount_percentage'])): ?>
                                            <?php
                                                $disco  = $prd_details['discount_price'];
                                                $was_price  = $prd_details['price'];
                                                $new_price  = floatval($was_price) - floatval($was_price) ;
                                            ?>
                                            <span class="hot_stripe"><img src="<?= site_url('assets/img/sale_product.png')?>" alt=""></span>
           
                                        <?php endif; ?>
                                        
                                            
                                        <?php if(!empty($prd_details['frontimage'])): ?>
                                            
                                            <img src="<?= site_url('assets/uploads/fashion_prod/'.$prd_details['frontimage'])?>" class=" tr_all_hover img_divimg img-responsive" alt="<?= $prd_details['frontimage']; ?>" >
                                            
                                        <?php elseif (!empty($prd_details['imagename'])): ?>
                                            
                                            <img src="<?= site_url('assets/uploads/fashion_prod/'.$prd_details['imagename'])?>" class=" tr_all_hover img_divimg img-responsive" alt="<?= $prd_details['imagename']; ?>" >
                                        
                                        <?php else: ?>
                                            
                                            <img src="<?= site_url('assets/img/product_img_1.jpg')?>" class="tr_all_hover img_divimg" alt="<?= $prd_details['imagename']; ?>" >
                                        
                                        <?php endif; ?>
                                        <!--
                                        <span data-popup="#quick_view_product" data_productid="<?= $allprd['prd_id']; ?>" class="box_s_none button_type_5 color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                                        -->
                                        
                                </a>
                                     <?php if(intval($prd_details['color_count'])  > 1): ?>
                                           
                                        <div data_productid="<?= $prd_details['id']; ?>"class=" "> <?=$prd_details['color_count']?> Colors Available</div>
                                        
                                    <?php else: ?>
                                        <br>
                                    <?php endif; ?>
                                </div>
                                <!--description and price of product-->
                                <figcaption data_prd_qcsid="<?= $prd_details['id']; ?>" data_productid="<?= $allprd['prd_id']; ?>">
                                        <h5 class="m_bottom_10" title="<?= $prd_details['productname'] ?>">
                                            <a href="<?= site_url('fashion/store/'.$prd_details['store_url'].'/'.$prd_details['prd_url'] )?>" class="color_dark">
                                                
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
                                        </h5>
                                        <div class="clearfix">
                                            
                                            <?php if(!empty($prd_details['discount_percentage'])): ?>
                                            <?php
                                                $disco  = $prd_details['discount_price'];
                                                $was_price  = $prd_details['price'];
                                                $new_price  =  number_format(floatval($was_price) - floatval($disco), 2,'.', ',');
                                            ?>
                                            <p class="scheme_color f_left f_size_large m_bottom_15"><s style=" font-size: 13px;">₦<?= number_format(floatval($was_price), 2,'.', ',');?></s> &nbsp; ₦<?=$new_price;?></p>
                                            <?php else: ?>   
                                                <p class="scheme_color f_left f_size_large m_bottom_15">₦<?= number_format(floatval($prd_details['price']), 2,'.', ',');?></p>
                                            <?php endif; ?>
                                                
                                                <!--rating-->
                                                <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li>
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                </ul>
                                        </div>
                                    <div class="clearfix">
                                        <span title="<?= $prd_details['storename'] ?>">
                                            <?php
                                                        $value_name = $prd_details['storename'];
                                                            $limit = '22';
                                                            if (strlen($value_name) > $limit) {
                                                                     $trimValues_storename = substr($value_name, 0, $limit).'...';
                                                                      } 
                                                            else {
                                                                    $trimValues_storename = $value_name;
                                                              }
                                                        //character_limiter($resta['companydesc'],25); 
                                                              //echo "<a href='.site_url('fashion/store/').'" ".$trimValues_storename;
                                                              echo "<a href='".site_url('fashion/store/'.$prd_details['store_url'])."'>".$trimValues_storename."</a>";
                                                ?>
                                        </span>
                                    </div>
                                    <!--
                                        <button id="<?= $prd_details['id']; ?>" data_prd_qcsid="<?= $prd_details['id']; ?>" class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
                                    --> 
                                </figcaption>
                                <?php endforeach; ?>
                        </figure>
                </div>
              
            <!--product item-->
              <?php else: ?>

              <?php endif; ?>
            <?php endforeach; ?>
               
                
        </section>
        
         
                     
        <?php else: ?>

            <div class="alert alert-warning alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Oh snap!</strong>
                Sorry No product for this Category Now.
            </div>

        <?php endif; ?>