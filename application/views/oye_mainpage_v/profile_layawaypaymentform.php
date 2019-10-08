<style type="text/css">
    /** MEDIA QUERIES **/
    .mo_radio{
            width: 15% !important;
        }
    @media only screen and (max-width: 989px){
        .mo_radio{
            width: 20% !important;
        }
    }

    @media only screen and (max-width: 764px){
        .mo_radio{
            width: 20% !important;
        }
    }

    @media only screen and (max-width: 586px){ 
        .mo_radio{
            width: 20% !important;
        }
    }
</style>

        <div id="WaitMe_pwd" class="modal-content" style="max-width: 400px;">

            <div class="modal-header ">
                
                <span class="text-center" style=" font-size: 24px; color: #000;">
                    Layaway Part Payment
                </span>

            </div>

            <div class="modal-body">
               
                    <form id="couponformcheck" method="POST" action="<?= base_url() ?>checkout/layawaypartpayment"> 
                            
                        <div class="row">
                            <div class="col-md-12 errorclass alert alert-danger alert-dismissable get_errorpwd" style="display: none;">

                                <span class="error_msgr_lg"></span>

                            </div>
                        
                        
                        
                            <div class="col-md-12 form-group">
                                <label for="email">Layaway Order Code</label>
                                <div class="col-md-">
                                    <input type="text" name="code" id="l_code" readonly="" class="col-md-12 form-control" placeholder="Enter a Coupon Code" value="<?=$layaway['ordercode']?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="email">Amount To Pay</label>
                                <div class="col-md-">
                                    <input type="text" name="code" id="l_code" readonly="" class="col-md-12 form-control" value="₦<?=number_format(floatval($layaway['amountperpaymentplan']),2,'.', ',')?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="row">
                                                        
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-select expiration-mrg">
                                                                <label>Credit Card Type</label>
                                                                
                                                                <?php foreach ($add_card as $row) :?>

                                                                <label class="input-group">
                                                                    <span style="width: 4%;" class="input-group-addon mo_radio" >
                                                                        <input type="radio"  style=" height:unset;" name="card_au" value="<?= $row['authorizationcode'] ?>"  />
                                                                    </span>
                                                                    <div class="form-control form-control-static">
                                                                        **** **** **** <?= $row['last4'] ?>
                                                                    </div>
                                                                </label>

                                                                <?php endforeach;?>

                                                                <label class="input-group">
                                                                    <span  style="" class="input-group-addon mo_radio">
                                                                        <input type="radio" style=" height:unset;"   name="card_au" value="0" checked="checked" readonly=""/>
                                                                    </span>
                                                                    <div class="form-control form-control-static">
                                                                        New / Other Card
                                                                    </div>
                                                                </label>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                            </div>
                    
                            <div class="col-md-12 form-group">
                                <button class="btn-block btn btn-danger" id="_submit" type="submit">Make Payment</button>
                            </div>
                        </div>

                    </form>
                    
                
            </div><!-- .modal-body --> 
            
        </div><!-- .modal-content --> 

   



<script> 
      
$("#_submit").on("click", function (e) {
    $(this).attr("disabled", true);
    run_waitMe($('#WaitMe_pwd'), 1, 'orbit'); 
    $(this).closest("form").submit()
});
      
    $("#couponformcheckk").submit(function (e){
        
        e.preventDefault();
        run_waitMe($('#WaitMe_pwd'), 1, 'orbit'); 
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();
        //$('form').submit();

    });
</script>