


                    <div class="row text-center">

                        <div class="col-sm-6 col-lg-3">
                            <a href="order_pending" class="widget widget-hover-effect2">
                                <div class="ord_t_p widget-extra themed-background-dark">
                                    <h4 class="widget-content-light"><strong>Pending</strong> Orders</h4>
                                </div>
                                <div class="widget-extra-full"><span class="h2 ord_h2_p themed-color-dark animation-expandOpen"><?= sizeof($pending)?></span></div>
                            </a>
                        </div>
                        
                        <div class="col-sm-6 col-lg-3">
                            <a href="order_processing" class="widget widget-hover-effect2">
                                <div class="ord_t_pr widget-extra themed-background-dark">
                                    <h4 class="widget-content-light"><strong>Processing</strong> Orders</h4>
                                </div>
                                <div class="widget-extra-full"><span class="h2 ord_h2_pr themed-color-dark animation-expandOpen"><?= sizeof($processing)?></span></div>
                            </a>
                        </div>
                        
                        <div class="col-sm-6 col-lg-3">
                            <div href="order_delivered" class="widget widget-hover-effect2">
                                <div class="ord_t_d widget-extra themed-background-dark">
                                    <h4 class="widget-content-light"><strong>Disperse / Delivered</strong> Orders</h4>
                                </div>
                                <div class="widget-extra-full">
                                    <a href="order_delivery" data-toggle="tooltip"  title="View Disperse Order">
                                        <span class="h2 ord_h2_d themed-color-dark animation-expandOpen">
                                           <i class="fa fa-road"></i> <?= sizeof($delivery)?> 
                                        </span>
                                   </a>       
                                    <span class="h2 ord_h2_d themed-color-dark animation-expandOpen"> / </span>
                                    <a href="order_delivered" data-toggle="tooltip"  title="View Delivered Order" class="">
                                        <span class="h2 ord_h2_d2 themed-color-dark animation-expandOpen">
                                            <?= sizeof($delivered)?><i class="fa fa-signal"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-lg-3">
                            <a href="order_cancel" class="widget widget-hover-effect2">
                                <div class="ord_t_c widget-extra themed-background-dark">
                                    <h4 class="widget-content-light"><strong>Canceled</strong> Orders</h4>
                                </div>
                                <div class="widget-extra-full"><span class="h2 ord_h2_c themed-color-dark animation-expandOpen"><?= sizeof($canceled)?></span></div>
                            </a>
                        </div>
                        
                        

                    </div>
                
                    