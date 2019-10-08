
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

<!--  Sidebar Tray  -->
<div class="shop-sidebar">
    
    <?PHP if(($this->input->get("position")) && $this->input->get("position"))
        {
            $position_filter='?position='.$this->input->get("position");
            $position_filter .='&pages='.$this->input->get("pages");
            //echo $position_filter;
        }
        else{$position_filter=null;}
     ?>
    <form class="" action="<?= site_url('fashion/store/'.$cat_name.'/'.$position_filter)?>" method="get">
    <div class="shop-price-filter mb-60 mt-40">
        <h4 class="shop-sidebar-title">FILTER BY PRICE</h4>
        <div class="price_filter mt-40">
            
            <div id="slider-range" class="slider-range2"></div>
            <div class="price_slider_amount">
                <div class="label-input">
                    <label>price : </label>
                    <div class="input-range">
                        <span class="currencyNGN">₦</span>
                        <input type="text" id="amountmin2" class="cu_phone_js pricemin" name="filterpricemin" value="<?PHP if($this->input->get("filterpricemin")) echo $this->input->get("filterpricemin"); ?> "  placeholder="Add Min Price" />
                    </div>
                    <div class="input-range">
                        <span class="currencyNGN">₦</span>
                        <input type="text" id="amountmax2" class="cu_phone_js pricemax" name="filterpricemax"  value="<?PHP if($this->input->get("filterpricemax")) {echo $this->input->get("filterpricemax");} else echo '80000'; ?>" placeholder="Add Max Price" />
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
    <!--<div class="shop-widget mb-55">
        <h4 class="shop-sidebar-title">select by color</h4>
        <ul>
            <li>
                <a  href="#">Blue <span>(11)</span></a>
            </li>
            <li>
                <a  href="#">Dark Brown <span>(9)</span></a>
            </li>
            <li>
                <a  href="#">Green <span>(15)</span></a>
            </li>
        </ul>
    </div>
    
    <div class="shop-widget mb-55">
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
    <!--<div class="best-seller-area">
        <h4 class="shop-sidebar-title">Best Sellers</h4>
        <div class="best-seller-slider owl-carousel nav-style mt-30">
            <div class="best-seller-wrapper">
                <div class="single-best-seller-wrapper">
                    <div class="best-seller-img">
                        <a href="#"><img alt="" src="assets/img/product/best-seller-1.jpg"></a>
                    </div>
                    <div class="best-seller-content">
                        <h4><a href="#">Casual Loose Hollowed</a></h4>
                        <span>$15.99</span>
                    </div>
                </div>
                <div class="single-best-seller-wrapper">
                    <div class="best-seller-img">
                        <a href="#"><img alt="" src="assets/img/product/best-seller-2.jpg"></a>
                    </div>
                    <div class="best-seller-content">
                        <h4><a href="#">Meaneor Womens Floral</a></h4>
                        <span>$17.59</span>
                    </div>
                </div>
                <div class="single-best-seller-wrapper">
                    <div class="best-seller-img">
                        <a href="#"><img alt="" src="assets/img/product/best-seller-3.jpg"></a>
                    </div>
                    <div class="best-seller-content">
                        <h4><a href="#">Chiffon Flower Long</a></h4>
                        <span>$10.99</span>
                    </div>
                </div>
            </div>
            <div class="best-seller-wrapper">
                <div class="single-best-seller-wrapper">
                    <div class="best-seller-img">
                        <a href="#"><img alt="" src="assets/img/product/best-seller-4.jpg"></a>
                    </div>
                    <div class="best-seller-content">
                        <h4><a href="#">Casual Loose Hollowed</a></h4>
                        <span>$15.99</span>
                    </div>
                </div>
                <div class="single-best-seller-wrapper">
                    <div class="best-seller-img">
                        <a href="#"><img alt="" src="assets/img/product/best-seller-5.jpg"></a>
                    </div>
                    <div class="best-seller-content">
                        <h4><a href="#">Meaneor Womens Floral</a></h4>
                        <span>$17.59</span>
                    </div>
                </div>
                <div class="single-best-seller-wrapper">
                    <div class="best-seller-img">
                        <a href="#"><img alt="" src="assets/img/product/best-seller-6.jpg"></a>
                    </div>
                    <div class="best-seller-content">
                        <h4><a href="#">Chiffon Flower Long</a></h4>
                        <span>$10.99</span>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
</div>
<!-- End of Sidebar Tray  -->