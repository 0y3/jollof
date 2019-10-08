<style>
    .img_div {
        min-height:245px ;
        text-align: center;
    }
    .img_divimg {
        height:242px ;
        width: 242px;
    }
    .breadcrumblist {
        color: #888;
        font-size: 12px;
        font-weight: normal;
        line-height: 1.5;
        margin-bottom: 0;
    }
    .breadcrumblist a{
        color: #888;
    }
    .breadcrumblist a.current {
        color: #e74c3c;
        font-weight: bold;
        margin-right: 5px;
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



</style>
<!--header top part-->
<div id="home" class="fashion_mem_wrapper">
<script>
    var rest_banner = '<?= $resta->banner; ?>';
    if(rest_banner != ''){
        
        rest_banner = '<?= base_url() ?>assets/uploads/fashion_logo/<?= $resta->banner; ?>';
        
        $(".res_mem_wrapper").css({
                "background-image": 'url(" ' + fashion_banner +' ")',
            });
    }
</script>
    <div class="res_trans"></div>
            
        <div class="res_contdiv">
           
            <div class="res_contdiv_a " >
                
                <div class="res_mem_logo">
                    <?php if(!empty($resta->logo)): ?>
                    
                        <img class="logo_img " src="<?= base_url() ?>assets/uploads/fashion_logo/<?= $resta->logo; ?>" alt="<?= $resta->logo; ?>">
                    
                    <?php else: ?>
                        
                        <img class="img-responsive logo_img" src="https://placeholdit.co//i/120x120?bg=BDBDBD" width="100%" height="100%" />
                    
                    <?php endif; ?>
                </div>
                
                <div class="res_mem_logo_cont">
                    <br>
                    <h1 title="<?= $resta->companyname ?>"> <?= $resta->companyname ?> </h1>
                    <!--
                    <ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">
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
                    -->
                </div>
                
                <div class="clearfix"></div>
                
            </div>
            
        </div>
         
</div>

<!--header bottom part-->

<div class="page_content_offset">
            <div class="container">
                    <div class="row clearfix">
                        
                            <!--right column-->
                            <aside class="col-lg-3 col-md-3 col-sm-3 sidebar">
                                    <!--widgets-->
                                    <div class="sidebar-menu widget bg-white shadow" >
                                    <!--<figure class="widget shadow r_corners wrapper m_bottom_30">-->
                                            <figcaption>
                                                    <h3 class="color_light">Store Category</h3>
                                            </figcaption>
                                            <div class="widget_contentt">
                                                    <!-- Sidebar navigation -->
                                                <ul class="nav sidebar-nav">
                                                <?php foreach ($store_nav as $navs) :?>
                                                    <?php if(!empty($navs['nav_cate_submenu'])): ?>

                                                    <li class="dropdown">
                                                        <a class="ripple-effect dropdown-toggle color_dark tr_delay_hover click_nav" href=""  data-nav_cate_id="<?= $navs['categoryid']?>" data-parentid="0" data-slug="<?= $navs['slug']?>" data-name="<?= $navs['categoryname']?>" data-toggle="dropdownn">

                                                      <?= $navs['categoryname']?>
                                                      <span class="sidebar-badge"><?= $navs['categoryparentcount']?></span>
                                                      <b class="caret"></b>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <?php foreach ($navs['nav_cate_submenu'] as $subnavs) :?>
                                                        <li>
                                                            <a href="" class="color_dark tr_delay_hover click_nav"  data-nav_cate_id="<?= $subnavs['categoryid']?>" data-parentid="<?= $subnavs['categoryparentid']?>" data-slug="<?= $subnavs['slug']?>" data-name="<?= $subnavs['categoryname']?>" tabindex="-1">
                                                              <?= $subnavs['categoryname']?>
                                                              <span class="sidebar-badge badge-circle"> <?= $subnavs['categoryparentcount']?></span>
                                                            </a>
                                                        </li>
                                                        <?php endforeach; ?>

                                                        <?php foreach ($navs['nav_cate_submenu'] as $subnavs) :?>
                                                            <?php foreach ($subnavs['submenu_nav'] as $submenunavs) :?>
                                                                <li>
                                                                    <a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $submenunavs['slug']?>" class="color_dark tr_delay_hover click_nav" data-nav_cate_submenu_id="<?= $submenunavs['cat_fasid']?>" data-nav_cate_id="<?= $submenunavs['categoryid']?>" data-parentid="<?= $submenunavs['categoryparentid']?>" data-slug="<?= $submenunavs['slug']?>" data-name="<?= $submenunavs['categoryname']?>">
                                                                    <?= $submenunavs['categoryname']?>
                                                                    <span class="sidebar-badge badge-circle"> <?= $submenunavs['categoryparentcount']?></span>
                                                                    </a>
                                                                </li> 
                                                            <?php endforeach; ?>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                  </li>

                                                    <?php else: ?>
                                                    <li>
                                                    <a class="color_dark tr_delay_hover click_nav" href="<?= base_url()?>fashion/products/<?= $navs['slug']?>" data-nav_cate_id="<?= $navs['categoryid']?>" data-parentid="0" data-slug="<?= $navs['slug']?>" data-name="<?= $navs['categoryname']?>">
                                                      <?= $navs['categoryname']?>
                                                      <span class="sidebar-badge"><?= $navs['categoryparentcount']?></span>
                                                    </a>
                                                    </li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div>
                                    <!--</figure>-->
                                    </div>
                                    <!--banner-->

                                    <!--<div class="containerr m_bottom_30">
                                            
                                            <div id="iview2" class="iview" style="width: 100%;">
                                                    <div data-iview:image="<?= base_url() ?>assets/img/300x600_1.jpg"></div>
                                                    <div data-iview:image="<?= base_url() ?>assets/img/300x600_2.jpg"></div>
                                                    <div data-iview:image="<?= base_url() ?>assets/img/300x600_3.jpg"></div>
                                            </div>
                                    </div>

                                    <a href="#" class="d_block r_corners m_bottom_30">
                                            <img src="images/banner_img_6.jpg" alt="">
                                    </a>-->
                                    
                            </aside>
                            
                            <!--right content column-->

                            <section id="WaitMe_fash" class="col-lg-9 col-md-9 col-sm-9">


                                    <!--sort-->
                                     <!--<div class="row clearfix m_bottom_10">
                                            <div class="col-lg-7 col-md-8 col-sm-12 m_sm_bottom_10">
                                                    <p class="d_inline_middle f_size_medium">Sort by:</p>
                                                    <div class="clearfix d_inline_middle m_left_10">
                                                            <!--product name select--
                                                            <div class="custom_select f_size_medium relative f_left">
                                                                    <div class="select_title r_corners relative color_dark">Product name</div>
                                                                    <ul class="select_list d_none"></ul>
                                                                    <select name="product_name">
                                                                            <option value="Product SKU">Product SKU</option>
                                                                            <option value="Product Price">Product Price</option>
                                                                            <option value="Product ID">Product ID</option>
                                                                    </select>
                                                            </div>
                                                            <button class="button_type_7 bg_light_color_1 color_dark tr_all_hover r_corners mw_0 box_s_none bg_cs_hover f_left m_left_5"><i class="fa fa-sort-amount-asc m_left_0 m_right_0"></i></button>
                                                    </div>
                                                    
                                                   <!--manufacturer select--
                                                    <div class="custom_select f_size_medium relative d_inline_middle m_left_15 m_xs_left_5 m_mxs_left_0 m_mxs_top_10">
                                                            <div class="select_title r_corners relative color_dark">Select manufacturer</div>
                                                            <ul class="select_list d_none"></ul>
                                                            <select name="manufacturer">
                                                                    <option value="Manufacture 1">Manufacture 1</option>
                                                                    <option value="Manufacture 2">Manufacture 2</option>
                                                                    <option value="Manufacture 3">Manufacture 3</option>
                                                            </select>
                                                    </div>
                                            </div>
                                    </div>-->
                                    <hr class="m_bottom_10 divider_type_3">

                                            
        <?php if(!empty($get_prd)): ?>
                
            <?php 
            foreach($get_prd as $post){
                $cat_name =  $post['cat_name'] ;
             }
            ?>  
        
        <!--<h3 class="tt_uppercase m_bottom_20 color_dark heading1 animate_ftr"><?= $cat_name?> </h3>-->
        <div class="d_inline_middle breadcrumblist">
            <span class="" ><a href="<?= site_url('fashion/store/'.$this->uri->segment(3))?>" class="" ><?= $resta->companyname ?> Store </a></span> 
            <span class="set_breadcrums_call" ></span>
            <!--<span class="set_breadcrums_call" >  >> <a href="" class="current"><?= $resta->companyname ?></a></span>-->
        </div>
        <!--product item-->
        <section id="store_cont" class="products_container clearfix m_bottom_25 m_sm_bottom_15">
            
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
        <hr class="m_bottom_10 divider_type_3">
                                    
    </section>
                            
                    </div>
            </div>
    </div>
<script>
    $(document).ready(function(){
            $('#iview2').iView({
                    pauseTime: 5000,
                    pauseOnHover: true,
                    directionNavHoverOpacity: 0,
                    controlNav: true,
                    controlNavNextPrev: false,
                    controlNavTooltip: false,
                    timer: "360Bar",
                    timerDiameter: 30,
                    timerPadding: 3,
                    timerStroke: 4,
                    timerBarStroke: 0,
                    timerColor: "#0F0",
                    timerPosition: "top-right"
            });
    });
</script>

<script>
        jQuery(document).ready(function($) {
                    
            function run_waitMe(el, num, effect){
		text = 'Please wait...';
		fontSize = '';
		switch (num) {
			case 1:
			maxSize = '';
			textPos = 'vertical';
			break;
			case 2:
			text = '';
			maxSize = 30;
			textPos = 'vertical';
			break;
			case 3:
			maxSize = 30;
			textPos = 'horizontal';
			fontSize = '18px';
			break;
		}
		el.waitMe({
			effect: effect,
			text: text,
			bg: 'rgba(255,255,255,0.7)',
			color: '#000',
			maxSize: maxSize,
			waitTime: -1,
			source: 'img.svg',
			textPos: textPos,
			fontSize: fontSize,
			onClose: function(el) {}
		});
            }       
            
            //run_waitMe($('#WaitMe_fash'), 1, 'orbit');
        $(document).on('click', 'a.click_nav', function(e){ 
            e.preventDefault(); 
            var catid = $(this).data("nav_cate_id");
            var catslug = $(this).data("slug");
            var catparentid = $(this).data("parentid");
            var catname = $(this).data("name");
            var storeid = '<?= $resta->id; ?>';
            var breadcrums;
            //alert('catid--'+catid +' catslug--'+catslug +' catparentid--'+catparentid+' catname--'+catname);
            
            run_waitMe($('#WaitMe_fash'), 1, 'orbit');
            $.ajax({
                type:'POST',
                url:'<?= site_url('products/ajaxcall_store') ?>',
                data:{cat_id:catid,cat_slug:catslug,cat_parentid:catparentid,cat_name:catname,storeid:storeid},
                dataType: 'json',
                cache:false,
                success:function(html){
                
                breadcrums=" >><a href='' class='click_nav current' data-nav_cate_id="+catid+" data-parentid="+catparentid+" data-slug="+catslug+"data-name="+catname+"> "+catname+" </a> ";
                $('.set_breadcrums_call').html(breadcrums);
                $('#store_cont').html(html.content);

                $('#WaitMe_fash').waitMe('hide');

                }
            });
        });
                        
        });
        
                
</script>

