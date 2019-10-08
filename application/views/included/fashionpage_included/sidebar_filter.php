<!--  Sidebar Tray  -->
<style>
.label-input {
    width: 70%;
    margin-top: 0PX;
}
.price_slider_amount>button {
    width: 30%;
}
.label-input input {
    /*background-color: #e4e4e4;
    width: 50px;*/
    width: 17%;
    border: medium none;
    padding-left: 1px;
}
.input-range{
    float: left;
    border: 1px solid #ddd;
    line-height: 24px;
    width: 35%;
    padding: 0 5px 0 5px;
    margin-left: 5px;
}
.pricemin, .pricemax {
    position: absolute;
}
.currencyNGN
{
    display: inline-block;
    padding-top: 1px;
}
#slider-range span.ui-slider-handle{
    cursor: pointer;
}
.filter_div{
    position: relative;
}
.filter_form{
    max-height: 200px;
    overflow: auto;
    overflow-x: hidden;
    padding-right: 10px;
}
.filter_form li{
    padding: 10px
}
.filter_form li:last-child{
    padding-bottom: 20px
}
.filter_form input{
    height: unset;
    width: unset;
    margin-right: 10px;
}
.filter_form .filter_count {
    color: #999;
    font-size: .9em;
    margin-left: 5px;
    font-weight: 400;
}
.filter_cover:hover {
    color: #e74c3c!important;
}

fade {
    position: absolute;
    bottom: 0px;

    display: block;
  
    width: 100%;
    height: 30px;
  
    background-image: linear-gradient(to bottom, 
        rgba(255, 255, 255, 0), 
        rgba(255, 255, 255, 1.9)
    100%);
}
</style>
<div class="shop-sidebar">
    <div class="shop-catigory-wrapper mb-55">
        <h4 class="shop-catigory-title">Categories</h4>
        <div class="shop-catigory">
            <ul id="faq">
                <?php foreach ($nav as $navs) :?>
                 <!--sub menu-->    
                    <?php if(!empty($navs['nav_cate_submenu'])): ?>
                    
                <li> <a data-toggle="collapse" data-parent="#faq<?= $navs['id']?>" href="#shop-catigory-<?= $navs['id']?>"><?= $navs['categoryname']?> <i class="ion-ios-arrow-down"></i></a>
                    <ul id="shop-catigory-<?= $navs['id']?>" class="panel-collapse collapse">
                        <li><a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>"><?= $navs['categoryname']?></a></li>
                        
                        <?php foreach ($navs['nav_cate_submenu'] as $subnavs) :?>
                        <li><a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $subnavs['slug']?>"><?= $subnavs['categoryname']?></a></li>
                            <?php foreach ($subnavs['submenu_nav'] as $submenunavs) :?>
                            <li><a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $submenunavs['slug']?>"><?= $submenunavs['categoryname']?></a></li>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        
                        
                    </ul>
                </li>
                    <!--sub menu End-->
                    <?php else: ?>
                <li> <a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>"><?= $navs['categoryname']?></a> </li>
                    <?php endif; ?>
                    
                <?php endforeach; ?>
                    
                
            </ul>
        </div>
    </div>
    <?PHP if(($this->input->get("position")) && $this->input->get("position"))
        {
            $position_filter='?position='.$this->input->get("position");
            $position_filter .='&pages='.$this->input->get("pages");
            //echo $position_filter;
        }
        else{$position_filter=null;}
     ?>
    <form class="" action="<?= site_url('fashion/products/'.$cat_name.'/'.$position_filter)?>" method="get">
    <div class="shop-price-filter mb-60">
        <h4 class="shop-sidebar-title">FILTER BY PRICE</h4>
        <div class="price_filter mt-40">
            
            <div id="slider-range"></div>
            <div class="price_slider_amount">
                <div class="label-input">
                    <label>price : </label>
                    <div class="input-range">
                        <span class="currencyNGN">₦</span>
                        <input type="text" id="amountmin" class="cu_phone_js pricemin" name="filterpricemin" value="<?PHP if($this->input->get("filterpricemin")) echo $this->input->get("filterpricemin"); ?> "  placeholder="Add Min Price" />
                    </div>
                    <div class="input-range">
                        <span class="currencyNGN">₦</span>
                        <input type="text" id="amountmax" class="cu_phone_js pricemax" name="filterpricemax"  value="<?PHP if($this->input->get("filterpricemax")) {echo $this->input->get("filterpricemax");} else echo '80000'; ?>" placeholder="Add Max Price" />
                    </div>
                    
                </div>
                <button type="submit">Filter</button> 
            </div>
        </div>
    </div>
    
    <?php if(!empty($colors_prdcounts)): ?>
    <div class="shop-widget mb-55">
        <h4 class="shop-sidebar-title">select by color</h4>
        <div class="filter_div">
            <div class="filter_form">
                <ul>
                    <?php foreach ($colors_prdcounts as $colors) :?>
                    <li>
                        <div class="filter_cover">
                            <input type="checkbox" name="color[<?=$colors['colorid']?>]" value="<?=$colors['colorname']?>"  <?PHP if($this->input->get("color")) {foreach($this->input->get("color") as $key=>$value){if($value== $colors['colorname'] ) echo 'checked';}} ?> onclick="this.form.submit() ">
                            <span class="filter_name"> <?=$colors['colorname']?> </span>
                            <span class="filter_count">(<?=$colors['full_color_count']?>)</span>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            <fade/>
            </div>
        </div>
    </div>
    <?php endif; ?>
     
    <?php if(!empty($sizes_prdcounts)): ?>
    <div class="shop-widget mb-55">
        <h4 class="shop-sidebar-title">select by Size</h4>
        <div class="filter_div">
            <div class="filter_form">
                <ul>
                    <?php foreach ($sizes_prdcounts as $sizes) :?>
                    <?php if(!empty($sizes['sizeid'])): ?>
                    <li>
                        <div class="filter_cover">
                            <input type="checkbox" name="size[<?=$sizes['sizeid']?>]" value="<?=$sizes['sizeid']?>"  <?PHP if($this->input->get("size")) {foreach($this->input->get("size") as $key=>$value){if($value== $sizes['sizeid'] ) echo 'checked';}} ?> onclick="this.form.submit() ">
                            <span class="filter_name"> <?=$sizes['sizecode']?><small> <?=$sizes['sizename']?></small> </span>
                            <span class="filter_count">(<?=$sizes['full_size_count']?>)</span>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <fade/>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if(!empty($stores_filterprdcounts)): ?>
    <div class="shop-widget mb-55">
        <h4 class="shop-sidebar-title">select by Stores</h4>
        <div class="filter_div">
            <div class="filter_form">
                <ul>
                    <?php foreach ($stores_filterprdcounts as $stores) :?>
                    <?php if(!empty($stores['merchantid'])): ?>
                    <li>
                        <div class="filter_cover">
                            <input type="checkbox" name="store[<?=$stores['merchantid']?>]" value="<?=$stores['companyname']?>"  <?PHP if($this->input->get("store")) {foreach($this->input->get("store") as $key=>$value){if($value== $stores['companyname'] ) echo 'checked';}} ?> onclick="this.form.submit() ">
                            <span class="filter_name"> <?=$stores['companyname']?> </span>
                            <span class="filter_count">(<?=$stores['full_store_count']?>)</span>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <fade/>
            </div>
        </div>
    </div>
    <?php endif; ?>
        
    <?php if(!empty($stores_prdcounts)): ?>
    <div class="shop-widget mb-55">
        <h4 class="shop-sidebar-title">Stores</h4>
        <ul>
            <?php foreach ($stores_prdcounts as $stores) :?>
            <li id="<?= $stores['merchantid']?>">
                <a  href="<?= site_url('fashion/store/'. $stores['companyurl'])?>"><?= $stores['companyname']?>  <span>(<?= $stores['storeproductcount']?>)</span></a>
            </li>
            <?php endforeach; ?>
            <!--<li>
                <a  href="#">Lacoste  <span>(10)</span></a>
            </li>-->
        </ul>
    </div>
    <?php endif; ?>
    
    <div class="best-seller-area">
        <h4 class="shop-sidebar-title">Best Sellers</h4>
        <div class="best-seller-slider owl-carousel nav-style mt-30">
            <?php foreach  (array_chunk($best_sellers, 3, true) as $bestsellers) :?>
            <div class="best-seller-wrapper">
                <?php foreach ($bestsellers as $best_seller) :?>
                <?php if(!empty($best_seller['prd_qcs'])): ?>
                <?php foreach ($best_seller['prd_qcs'] as $recommends) :?>
                <div class="single-best-seller-wrapper">
                    
                    <div class="best-seller-img">
                        <a href="<?= base_url()?>fashion/store/<?= $recommends['store_url']?>/<?= $recommends['prd_url']?>">
                                                            
                            <?php if(!empty($recommends['frontimage'])): ?>

                                <img src="<?= site_url('assets/uploads/fashion_prod/thumbs/'.$recommends['frontimage'])?>" class="img-responsive" alt="<?= $recommends['frontimage']; ?>" >

                            <?php elseif (!empty($recommends['imagename'])): ?>

                                <img src="<?= site_url('assets/uploads/fashion_prod/thumbs/'.$recommends['imagename'])?>" class=" img-responsive" alt="<?= $recommends['imagename']; ?>" >

                            <?php else: ?>

                                <img src="<?= site_url('assets/img/product_img_1.jpg')?>" class="img-responsive" alt="<?= $recommends['imagename']; ?>" >

                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="best-seller-content ">
                        <h4 title="<?= $recommends['productname'] ?>">
                                <a href="<?= site_url('fashion/store/'.$recommends['store_url'].'/'.$recommends['prd_url'] )?>" class="color_darkk">

                                    <?php
                                            $value = $recommends['productname'];
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
                        <?php if($recommends['discount_price_count'] !=0): ?>
                        <?php
                            $disco  = $recommends['discount_price'];
                            $was_price  = $recommends['price'];
                            $new_price  =  number_format(floatval($was_price) - floatval($disco), 2,'.', ',');
                        ?>
                        <div class="product-price">
                            <span class="old" style=" font-size: 13px;">₦<?= number_format(floatval($was_price), 2,'.', ',');?></span>
                            <span class="new">₦<?=$new_price?> </span>
                        </div>
                        <?php else: ?>  
                        <div class="product-price">
                        <span class="" style="color:#e74c3c; fn"><a>₦<?= number_format(floatval($recommends['price']), 2,'.', ',');?></span>
                        </div>
                        <?php endif; ?>
                        <div class="mt-20">
                            <p class="linkcolor " title="Store Name: <?= $recommends['storename'] ?>" style=" margin-top: -20px;">
                            <?php
                                    $value_name = $recommends['storename'];
                                        $limit = '22';
                                        if (strlen($value_name) > $limit) {
                                                 $trimValues_storename = substr($value_name, 0, $limit).'...';
                                                  } 
                                        else {
                                                $trimValues_storename = $value_name;
                                          }
                                    echo "<a href='".site_url('fashion/store/'.$recommends['store_url'])."'>".$trimValues_storename."</a>";
                            ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif;?>
                <?php endforeach; ?>
                
            </div>
            <?php endforeach; ?>
            
        </div>
    </div>
    
    
    <!--<div class="shop-widget mb-55">
        <h4 class="shop-sidebar-title">compare product</h4>
        <ul>
            <li>
                <a  href="#">Vinperl handbag <span>X</span></a>
            </li>
            <li>
                <a  href="#">Vinperl handbag<span>X</span></a>
            </li>
        </ul>
    </div>-->
    
    </form>
</div>
<!-- End of Sidebar Tray  -->

