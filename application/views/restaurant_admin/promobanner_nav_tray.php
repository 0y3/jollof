
<?php
        $this->load->model('oye/Restaurant_admin_model');
        $promo_or_free = "free";
        $status=1;
        $banner    = $this->Restaurant_admin_model->_count_all_slider(6,$promo_or_free,$status=FALSE);
        $sidebar_slider = $this->Restaurant_admin_model->_count_all_slider(7,$promo_or_free,$status=FALSE);
        $banner_promo    = $this->Restaurant_admin_model->_count_all_slider(6,$promo=FALSE,$status=FALSE);
        $sidebar_slider_promo = $this->Restaurant_admin_model->_count_all_slider(7,$promo=FALSE,$status=FALSE);
        //print("<pre>".print_r($all,true)."</pre>");die;

?>


                    <div class="row text-center">

                        <div class="col-sm-6 col-lg-3">
                            <a href="promobannerall" class="widget widget-hover-effect2">
                                <div class="ord_t_a widget-extra themed-background-dark">
                                    <h4 class="widget-content-light"><strong>Merchant </strong>Mainpage Sliders </h4>
                                </div>
                                <div class="widget-extra-full"><span class="h2 ord_h2_a themed-color-dark animation-expandOpen"><?= $banner+$sidebar_slider;?></span></div>
                            </a>
                        </div>
                        
                        <div class="col-sm-6 col-lg-3">
                            <a href="promobanner" class="widget widget-hover-effect2">
                                <div class="ord_t_p widget-extra themed-background-dark">
                                    <h4 class="widget-content-light"><strong>Promo </strong> Sliders </h4>
                                </div>
                                <div class="widget-extra-full"><span class="h2 ord_h2_p themed-color-dark animation-expandOpen"><?= $banner_promo+$sidebar_slider_promo?></span></div>
                            </a>
                        </div>
                        <!--
                        <div class="col-sm-6 col-lg-3">
                            <a href="promobannerapproved" class="widget widget-hover-effect2">
                                <div class="ord_t_r widget-extra themed-background-dark">
                                    <h4 class="widget-content-light"><strong>Approved B2B</strong> Banners</h4>
                                </div>
                                <div class="widget-extra-full"><span class="h2 ord_h2_r themed-color-dark animation-expandOpen"><?= $approved?></span></div>
                            </a>
                        </div>
                        -->
                        
                        

                    </div>
                
                    