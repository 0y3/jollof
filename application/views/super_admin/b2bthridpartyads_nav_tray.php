
<?php
        $this->load->model('oye/Super_admin_model');
        $usertype ="third";
        $all    = $this->Super_admin_model->_count_all_b2bthridpartyads($usertype,"3");
        $pending = $this->Super_admin_model->_count_all_b2bthridpartyads($usertype,"0");
        $approved  = $this->Super_admin_model->_count_all_b2bthridpartyads($usertype,"1");
        //print("<pre>".print_r($pending,true)."</pre>");
        //die;

?>


                    <div class="row text-center">

                        <div class="col-sm-6 col-lg-3">
                            <a href="thridpartyadsall" class="widget widget-hover-effect2">
                                <div class="ord_t_a widget-extra themed-background-dark">
                                    <h4 class="widget-content-light"><strong>All</strong> Third Party ADs </h4>
                                </div>
                                <div class="widget-extra-full"><span class="h2 ord_h2_a themed-color-dark animation-expandOpen"><?= $all?></span></div>
                            </a>
                        </div>
                        
                        <div class="col-sm-6 col-lg-3">
                            <a href="thridpartyads" class="widget widget-hover-effect2">
                                <div class="ord_t_p widget-extra themed-background-dark">
                                    <h4 class="widget-content-light"><strong>Pending</strong> Third Party ADs </h4>
                                </div>
                                <div class="widget-extra-full"><span class="h2 ord_h2_p themed-color-dark animation-expandOpen"><?= $pending?></span></div>
                            </a>
                        </div>
                        
                        <div class="col-sm-6 col-lg-3">
                            <a href="thridpartyadsapproved" class="widget widget-hover-effect2">
                                <div class="ord_t_r widget-extra themed-background-dark">
                                    <h4 class="widget-content-light"><strong>Approved</strong> Third Party ADs </h4>
                                </div>
                                <div class="widget-extra-full"><span class="h2 ord_h2_r themed-color-dark animation-expandOpen"><?= $approved?></span></div>
                            </a>
                        </div>
                        
                        
                        

                    </div>
                
                    