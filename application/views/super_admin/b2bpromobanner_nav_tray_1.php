
<?php
    /*
        $this->load->model('oye/Super_admin_model');
        $usertype ="restaurant";
        $all    = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"3");
        $pending = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"0");
        $approved  = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"1");
        //print("<pre>".print_r($pending,true)."</pre>");
        //die;
     * 
     */

?>


                    <div class="row text-center">

                        <div class="col-sm-6 col-lg-3">
                            <a href="b2bpromobannerall" class="widget widget-hover-effect2">
                                <div class="ord_t_a widget-extra themed-background-dark">
                                    <h4 class="widget-content-light"><strong>All B2B</strong> Banners </h4>
                                </div>
                                <div class="widget-extra-full"><span class="h2 ord_h2_a themed-color-dark animation-expandOpen"><?= $all?></span></div>
                            </a>
                        </div>
                        
                        <div class="col-sm-6 col-lg-3">
                            <a href="b2bpromobanner" class="widget widget-hover-effect2">
                                <div class="ord_t_p widget-extra themed-background-dark">
                                    <h4 class="widget-content-light"><strong>Pending B2B</strong> Banners </h4>
                                </div>
                                <div class="widget-extra-full"><span class="h2 ord_h2_p themed-color-dark animation-expandOpen"><?= $pending?></span></div>
                            </a>
                        </div>
                        
                        <div class="col-sm-6 col-lg-3">
                            <a href="b2bpromobannerapproved" class="widget widget-hover-effect2">
                                <div class="ord_t_r widget-extra themed-background-dark">
                                    <h4 class="widget-content-light"><strong>Approved B2B</strong> Banners</h4>
                                </div>
                                <div class="widget-extra-full"><span class="h2 ord_h2_r themed-color-dark animation-expandOpen"><?= $approved?></span></div>
                            </a>
                        </div>
                        
                        
                        

                    </div>
                
                    