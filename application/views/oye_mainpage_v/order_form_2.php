<style>
table.table_order > tbody > tr
{
    border-top: 1px solid #DDD;
    margin: 0px;
    padding: 0px;
}
table.table_order > tbody > tr:last-child 
{
    border-bottom: 1px solid #DDD;
}
table.table_order > tbody > tr > td
{
    padding-top: 10px!important;
    padding-bottom: 0px!important;
}
.custom-checkbox {
  min-height: 1rem;
  padding-left: 0;
  margin-right: 0;
  cursor: pointer;
  position: relative;
}
.custom-checkbox .custom-control-input {
        position: absolute;
        display:none;
        
}
  .custom-checkbox .custom-control-indicator {
    position: absolute;
    top:0px;
    left:-18px;
    z-index: 1;
    content: "";
    display: inline-block;
    position: relative;
    width: 30px;
    height: 10px;
    background-color: #818181;
    border-radius: 15px;
    margin-right: 10px;
    -webkit-transition: background .3s ease;
    transition: background .3s ease;
    vertical-align: middle;
    margin: 0 16px;
    box-shadow: none; 
  }
    .custom-checkbox .custom-control-indicator:after {
      content: "";
      position: absolute;
      display: inline-block;
      width: 18px;
      height: 18px;
      background-color: #f1f1f1;
      border-radius: 21px;
      box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4);
      left: -2px;
      top: -4px;
      -webkit-transition: left .3s ease, background .3s ease, box-shadow .1s ease;
      transition: left .3s ease, background .3s ease, box-shadow .1s ease; 
    }
  .custom-checkbox .custom-control-input:checked ~ .custom-control-indicator {
    background-color: #84c7c1;
    background-image: none;
    box-shadow: none !important; 
  }
    .custom-checkbox .custom-control-input:checked ~ .custom-control-indicator:after {
      background-color: #84c7c1;
      left: 15px; 
    }
  .custom-checkbox .custom-control-input:focus ~ .custom-control-indicator {
    box-shadow: none !important; 
  }
  
  /* Custom modal content styling */

.modal-container {
  max-width: 500px;
  border-radius: .3em;
  box-shadow: 0 0.1em 0.4em rgba(0,0,0,.3);
}

.modal-title {
  font-weight: 700;
  font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

.modal-body {
  max-width: 480px;
  max-height:480px;
  min-height: 50px;
  overflow-y: auto;
  
 
}

.modal-footer {
  padding: 1.5em;
  text-align: right;
}
  
</style>

            <div class="modal-content">

                <div class="modal-title">

                </div>

                <div class="modal-body ">

                    <div class="col-md-12 nopadding">
                        
                        
                        <?php foreach ($product as $prd) :?>
                        <form id="<?= $prd['restaurantid'] ?>">
                            
                        <input type="hidden" name="restaurantid" value="<?= $prd['restaurantid'] ?>">
                        
                        <div class="col-md-12">
                            <div class="col-md-3" style="padding-right:0;">
                                <div class="order_img"> 
                                    <?php
                                    
                                        if(!empty($prd['productimage']))
                                            {
                                                $prd_img= $prd['productimage'];
                                            }
                                        else 
                                            {
                                                $prd_img= 'no_food_img.jpg';
                                            }
                                    ?>
                                    <img class="" src="<?= base_url() ?>assets/uploads/rest_prod/<?= $prd_img ?>">
                                    <input type="hidden" id="prd_img_<?= $prd['id'];?>" name="" value="<?= $prd_img?>">
                                </div>
                            </div>
                            <div class="col-md-9 ">
                                
                                <div class="list__label--header">
                                
                                    <?= $prd['productname'];?>
                                
                                </div>
                            
                            </div>
                        </div>
                        
                        <div class=" col-md-12 ">

                            <div class="section-label " style=" padding-bottom: 0;"> 

                                <a class="section-label-a"> 
                                    <span class="spansize" > 
                                        Price
                                    </span> 
                                    <b></b> 
                                </a>
                            </div>
                            <div class="row">
      
                                    <div class="col-md-6">
                                            <input type="radio" checked="checked" name="price" id="radio1" value="">
                                            <label for="radio1">
                                                ₦<span class="main_price_1"><?= $prd['productprice'];?> </span>
                                            </label>                                        
                                    </div> <!--col-->
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-primary addtocart" data-grandprice="" data-restaurantid="<?= $prd['restaurantid'];?>" data-productid="<?= $prd['id'];?>" data-productname="<?= $prd['productname'];?>" data-productprice="<?= $prd['productprice'];?>">
                                            <i class="fa fa-shopping-cart"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>

                        </div>
                        
                        <div class=" col-md-12 ">

                            <div class="section-label " style=" padding-bottom: 0;"> 

                                <a class="section-label-a"> 
                                    <span class="spansize"> 
                                        Quantity
                                    </span> 
                                    <b></b> 
                                </a>
                            </div>
                            <div class="row ">
      
                                    <div class="col-md-5">
                                       
                                        <div class="input-group main_number_spinner col-md-10">
                                        
                                            <span class="input-group-btn">
                                                <a class="btn btn-danger " data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                            </span>
                                            <input type="text" disabled data-price="<?= $prd['productprice']; ?>" data-grandprice="" name="" id="mainQTY_<?= $prd['id'];?>" class="form-control text-center" value="1" min=1>
                                            <span class="input-group-btn">
                                                <a class="btn btn-info " data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
                                            </span> 
                                            
                                        </div>
                                        
                                    </div> <!--col-->
                                    <div class=" col-md-7">
                                        <span class="instr">Add Instructions</span>
                                        <div class="form-group instr_hide" id="" style=" display: none;">
                                            
                                            <textarea rows="2" maxlength="520" id="prd_inst_<?= $prd['id'];?>" class="form-control" placeholder="Special instructions (optional). Please note: For any requests that require price alterations, we’ll update your bill after the order is processed." > </textarea>
                                        </div>
                                        
                                    </div>
                                </div>

                        </div>
                        <?php endforeach;?>
                        
                        
                        <div class=" col-md-12" >
                            
                            <?php if(!empty($product_list)): ?>
                            
                            <div class="section-label " style=" padding-bottom: 0;"> 

                                <a class="section-label-a"> 
                                    <span class="spansize"> 
                                        (Optional - Choose as many as you want)
                                    </span> 
                                    <b></b> 
                                </a>
                            </div>
                            
                            <?php foreach ($product_list as $prd_list) :?>
                            <table class="table table_order">
                                <tbody>
                                    
                                    <tr>
                                        <td>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" data-target="<?= $prd_list['id'] ?>" data-tit_price="" class="custom-control-input checkbok_clk" >
                                                <span class="custom-control-indicator"></span> 
                                            </label>
                                            <div><?= $prd_list['productname'] ?></div>
                                        </td>
                                        <td >
                                            <div class="input-group number-spinner col-md-7 col-md-offset-2 numid_<?= $prd_list['id'] ?>">
                                                <span class="input-group-btn">
                                                    <a class="btn btn-danger <?= $prd_list['id'] ?> disabled" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                                </span>
                                                <input type="text"  disabled class="form-control text-center ord_input_4" value="1" min=1>
                                                <span class="input-group-btn">
                                                    <a class="btn btn-info <?= $prd_list['id'] ?> disabled" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
                                                </span>
                                            </div>    
                                        </td>
                                        <td class=""> 
                                            ₦<span class="sub_price_ord_4" ><?= $prd_list['price']; ?></span>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <?php endforeach;?>
                            <?php else: ?>
                            </form>
                            <?php endif; ?>
                        </div>
                        
                        
                    </div>
  
                </div>

                <button data-fancybox-close="" class="fancybox-close-small" title="Close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35"><path d="M12,12 L23,23 M23,12 L12,23"></path></svg></button>

            </div>
                    
<script>
    
$(document).ready(function(){
    $('.addtocart').click(function(e){
        e.preventDefault();
        
        var restaurant_id = $(this).data("restaurantid");
        var product_id = $(this).data("productid");
        var product_img = $('#prd_img_' + product_id).val();
        var product_name = $(this).data("productname");
        var product_price = $(this).data("productprice");
        var quantity = $('#mainQTY_' + product_id).val();
        var inst = $("#prd_inst_"+ product_id).val();
        
        /*
         * alert(
                'ID:' + product_id + 
                '\n\rProduct Image:' + product_img + 
                '\n\rProduct name:' + product_name + 
                '\n\rProduct price:' + product_price + 
                '\n\rQTY:' + quantity +
                '\n\rDesc:' + inst
              );
              */

         $.ajax({
          url:"<?php echo base_url(); ?>cart/add",
          method:"POST",
          data:{
                  restaurant_id:restaurant_id,
                  product_id:product_id,
                  product_img:product_img,
                  product_name:product_name,
                  product_price:product_price,
                  quantity:quantity,
                  desc:inst
              },
          success:function(data)
          {
                //$.fancybox.close();
                $('.cart_count').load("<?php echo base_url(); ?>cart/cart_count");
                $('#cart_details').load("<?php echo base_url(); ?>cart/view2");
                  new jBox('Notice', {
                        //animation: 'flip',
                        animation: {
                          open: 'tada',
                          close: 'zoomIn'
                        },
                        position: {
                          x: 10,
                          y: 100
                        },
                        attributes: {
                          x: 'right',
                          y: 'bottom'
                        },
                        color: 'green',
                        autoClose: Math.random() * 8000 + 2000,
                        content: 'Success! Product Added To Cart',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                      });
                      $.fancybox.close();
                      
                      var $vat = parseFloat($('.cart_vat').text());
                      var $sub_grand = parseFloat($('.cart_price_sub_grandtotal').text());
                      var $grand_price = $sub_grand + $vat;

                      $(".cart_price_grandtotal").text($grand_price);
           
          }
         });
         
         });
});
 
</script>
                <script>
                    
                   
                    
                    
                    $('.main_number_spinner a').click(function () {
                        
                        //var target_pr = $(this).attr('price');
                        //var target_grd = $(this).attr('grandprice');
                        
                        
                        var btn = $(this),
                        input = btn.closest('.main_number_spinner').find('input'),
                        oldValue = input.val().trim();
                        
                        var target_pr =  $(input).data('price');
                        var target_grd = $(input).data('grandprice');
                         

                    if (btn.attr('data-dir') === 'up') {
                        oldValue++;
                        
                      
                        
                    } else {
                      if (oldValue > input.attr('min')) {
                        oldValue--;
                        
                       
                        
                      }
                    }
                    input.val(oldValue);
                    
                    
                  });
                  
                  
                  // sub list cart on click
                  $('.checkbok_clk').click(function () 
                  {
                       var target = $(this).data('target');
                        
                        if ($(this).is(':checked')) 
                        {
                            
                            
                            $('.' + target).removeClass('disabled'); // disable or able the sub product list button 'call this function using the sub-product id'
                            
                            $(".numid_"+target+" a").click(function (e) 
                            {
                                var btn = $(this);
                                var input = btn.closest('.number-spinner').find('input');
                                var oldValue = input.val().trim();
                                
                                
                                    if (btn.attr('data-dir') === 'up') 
                                    {
                                        oldValue++;
                                        //alert(oldValue);
                                    } 
                                    else 
                                    {
                                      if (oldValue > input.attr('min')) 
                                      {
                                        oldValue--;
                                        //alert(oldValue);
                                      }
                                    }
                                    
                                input.val(oldValue);
                                e.preventDefault();
                                
                            });
                        }
                        else 
                        {
                            
                           $('.' + target).addClass('disabled');
                                
                                // return the input box to 1
                                var input = $(".numid_"+target+" ").find('input');
                                var oldValue = input.val().trim();
                                input.val(1);
                            
                        }
                        
                  });
                  
                  
                     // spinner(+-btn to change value) & total to parent input 
//                    var original_price= parseFloat($(".main_price_1").text());
//                    var qty_count=1;
//                    var mainprice= parseFloat($(".main_price_1").text());
//                   
//                    $('.main_number_spinner a').click(function () {
//                        var btn = $(this),
//                        input = btn.closest('.main_number_spinner').find('input'),
//                         oldValue = input.val().trim();
//                         
//
//                    if (btn.attr('data-dir') == 'up') {
//                        oldValue++;
//                        var calc = mainprice * oldValue;
//                        $(".main_price_1").text(calc);
//                    } else {
//                      if (oldValue > input.attr('min')) {
//                        oldValue--;
//                        var calc = mainprice * oldValue;
//                        $(".main_price_1").text(calc);
//                      }
//                    }
//                    input.val(oldValue);
//                    qty_count=oldValue;
//                  });
//                  
//                  $('.checkbok_clk').click(function () {
//                        
//                        var target = $(this).data('target');
//                        var subprice = parseFloat($('.sub_price_' + target).text()); // selected checkbox price
//                        
//                        if ($(this).is(':checked')) {
//                            $('.' + target).removeClass('disabled');
//                            
//                            var get_mainprice = parseFloat($(".main_price_1").text()); // Main cart price
//                            
//                            var fir_calc = subprice + (original_price *qty_count)
//                            //alert('1st '+fir_calc);
//                            $(".main_price_1").text(fir_calc);
//                            
//                            
//                            $('.number-spinner a').click(function () {
//                            
//                            var btn = $(this),
//                            input = btn.closest('.number-spinner').find('input'),
//                            oldValue = input.val().trim();
//                         
//                                if (btn.attr('data-dir') === 'up') {
//                                    oldValue++;
//                                    var calc = fir_calc + (subprice * oldValue);
//                                    alert('2nd '+calc);
//                                    
//                                    //$(".main_price_1").text(calc);
//                                } 
//                                else {
//                                  if (oldValue > input.attr('min')) {
//                                    oldValue--;
//                                    var calc = fir_calc + (subprice * oldValue);
//                                    //alert(calc);
//                                    
//                                    //$(".main_price_1").text(calc);
//                                  }
//                                }
//                            input.val(oldValue);
//                            });
//                            
//                            
//                        }
//                        else {
//                            $('.' + target).addClass('disabled');
//                            var calc = original_price*qty_count;
//                            $(".main_price_1").text(calc);
//                        }
//                        
//                  });
                  
                </script>