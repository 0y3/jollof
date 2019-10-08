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

.center {
 text-align: center;   
}

.merge-bottom-input {
  width: 67px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

.merge-top-left-button {
  border-top-left-radius: 0;
}

.merge-top-right-button {
  border-top-right-radius: 0;
}
.bord{
    border-bottom: 1px solid #DDD;
    padding: 5px 0;
}

</style>

            <div id="wait_addcart" class="modal-content">

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
                                                ₦ <span class="main_price"><?= $prd['productprice'];?> </span> 
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
                                                <a class="btn btn-danger" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                            </span>
                                            <input type="text" disabled name="mainpricediv" data-f_price="<?= $prd['productprice'];?>" data-options_total="0" data-qty_num="1" id=" mainQTY_<?= $prd['id'];?>" class="mainQTY_div form-control text-center" value="1" min=1>
                                            <span class="input-group-btn">
                                                <a class="btn btn-info " data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
                                            </span> 
                                            
                                        </div>
                                        
                                    </div> <!--col-->
                                    <div class=" col-md-7">
                                        <span class="instr">Add Instructions</span>
                                        <div class="form-group instr_hide" id="" style=" display: none;">
                                            
                                            <textarea rows="2" maxlength="520" id="prd_inst_<?= $prd['id'];?>" class="form-control" placeholder="Special instructions (optional). Please note: For any requests that require price alterations, we’ll update your bill after the order is processed." ></textarea>
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
                            
                            <div id="sub_menu_div_<?= $prd_list['childproductid'] ?>">
                                
                            </div>
                            <div class="col-sm-12 nopadding bord">
                                
                                <div class="col-sm-4 ">
                                    <div><strong><?= $prd_list['productname'] ?></strong></div>
                                </div>
                                
                                <div class="col-sm-4 ">
                                    
                                    <div class="form-control input-sm center merge-bottom-input"  name="first">0</div>

                                    <div class="btn-group btn-block" data-price="<?= $prd_list['price']; ?>" data-sub_menu_id="<?= $prd_list['childproductid'] ?>"
                                        data-sub_menu_name="<?= $prd_list['productname'] ?>" role="group" aria-label="plus-minus">
                                      <button type="button" class="btn btn-sm btn-danger minus-button merge-top-left-button" disabled="disabled"><span class="glyphicon glyphicon-minus"></span></button>
                                      <button type="button" class="btn btn-sm btn-success plus-button merge-top-right-button"><span class="glyphicon glyphicon-plus"></span></button>
                                    </div><!-- end button group -->
                                
                                </div> <!-- end column -->
                                        
                                <div class="col-sm-4 "> 
                                    ₦<span class="sub_price_ord_4" ><?= $prd_list['price']; ?></span>
                                </div>
                                  
                            </div>
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
        $(".instr").click(function(e){
            
            $(".instr_hide").slideToggle();
    });
    </script>
    
<script>
    
  $(document).ready( () => {
  
  $('.minus-button').click( (e) => {
    
    var calc;
    var total_count = $('.mainQTY_div').val();
    var total_price = $('.main_price').text();
    
    var inputmin = $('.main_number_spinner').closest('.main_number_spinner').find('input'); // find the Quantity div
    var min_input = inputmin.attr('min');   // get the Quantity min att
    
    
    // change this to whatever minimum you'd like
    const minValue = 0

    const currentInput = $(e.currentTarget).parent().prev()[0];         // get the prev parant div after minus-button value
    const current_price = $(e.currentTarget).parent().data('price');        // get the price of product
    const current_id = $(e.currentTarget).parent().data('sub_menu_id');    // get the id of product
    const current_name = $(e.currentTarget).parent().data('sub_menu_name');    // get the name of product
    

    let minusInputValue = $(currentInput).html();
    
    if (minusInputValue > minValue) {
        
        
        minusInputValue --; 
        total_count --;
        
        min_input --;
        inputmin.prop('min',min_input); // set a new min value
        
        calc = parseFloat(total_price) - parseFloat(current_price) ;
      
      
      $($(e.currentTarget).next()).removeAttr('disabled');
      $(currentInput).html(minusInputValue);

      if (minusInputValue <= minValue) {
        $(e.currentTarget).attr('disabled', 'disabled');
        $('#sub_menu_'+current_id).remove();
      }
    }
    
    $('.mainQTY_div').data('options_total', calc.toFixed(2));
    
    //$('.mainQTY_div').val(total_count);
    $('.main_price').text(calc.toFixed(2));
    
    $(".sub_menu_"+current_id).data('sub_menu_qty', minusInputValue);
    
  });

  $('.plus-button').click( (e) => {
      
    var calc, option_cala;
    var total_count = $('.mainQTY_div').val();
    var total_price = $('.main_price').text();
    var options_total = $('.mainQTY_div').data('options_total');
    
    var inputmin = $('.main_number_spinner').closest('.main_number_spinner').find('input'); // find the Quantity div
    var min_input = inputmin.attr('min');   // get the Quantity min att
    
    
            
      
    const maxValue = 100
    
    

    const currentInput = $(e.currentTarget).parent().prev()[0];
    const current_price = $(e.currentTarget).parent().data('price');        // get the price of product
    const current_id = $(e.currentTarget).parent().data('sub_menu_id');    // get the id of product
    const current_name = $(e.currentTarget).parent().data('sub_menu_name');    // get the name of product


    let plusInputValue = $(currentInput).html();

    if (plusInputValue < maxValue) {
        
        plusInputValue ++;
        total_count ++;
        min_input ++;
        
        inputmin.prop('min',min_input); // set a new min value
        
        
        option_cala = parseFloat(options_total) + parseFloat(current_price);
        calc = parseFloat(total_price) + parseFloat(current_price) ;
      
      $($(e.currentTarget).prev()[0]).removeAttr('disabled');
      $(currentInput).html(plusInputValue);

      if (plusInputValue >= maxValue) {
        $(e.currentTarget).attr('disabled', 'disabled');
      }
    }
    
    
    if($('#sub_menu_'+current_id).length == 0) {
       
        $("#sub_menu_div_"+current_id).append('<input type="hidden" name="sub_menu_list[]" id="sub_menu_'+current_id+'" class="sub_menu_'+current_id+'" data-sub_menu_price="'+current_price+'" data-sub_menu_name="'+current_name+'" data-sub_menu_id="'+current_id+'" data-sub_menu_qty="0" value="" >');
    }
    
    $('.mainQTY_div').data('options_total', option_cala.toFixed(2));
    
    //$('.mainQTY_div').val(total_count);
    $('.main_price').text(calc.toFixed(2));
    
    $(".sub_menu_"+current_id).data('sub_menu_qty', plusInputValue);
    
  });
  
});

</script>
    
<script>
    
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
     //run_waitMe($('body'), 1, 'orbit');
     
$(document).ready(function(){
    $('.addtocart').click(function(e){
        e.preventDefault();
        
        var cartmicrosite = "cuisine"
        var restaurant_id = $(this).data("restaurantid");
        var product_id = $(this).data("productid");
        var product_img = $('#prd_img_' + product_id).val();
        var product_name = $(this).data("productname");
        var product_price = $('.main_price').text();
        var orginal_price = <?= $prd['productprice'];?>;
        var org_qty = $(".mainQTY_div").data("qty_num");
        var quantity = $('.mainQTY_div').val();
        var inst = $("#prd_inst_"+ product_id).val();
        
        var userss = $('input[name="sub_menu_list[]"]').map(function(){ 
                    return this.value; 
                }).get();
                
        var userss = $('input[name="sub_menu_list[]"]').map(function() {
                        return [$.map($(this).data(), function(v) {
                            return v;
                        })];
                    }).get();
        
        
        var users = [];
                $('input[name="sub_menu_list[]"]').each(function(){
                  var $this = $(this);
                  users.push([ $this.data('sub_menu_name'), $this.data('sub_menu_qty'), $this.data('sub_menu_price') ]);
                });
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
        run_waitMe($('#wait_addcart'), 1, 'orbit');
             
         $.ajax({
          url:"<?php echo base_url(); ?>cart/add",
          method:"POST",
          data:{
                  restaurant_id:restaurant_id,
                  product_id:product_id,
                  product_img:product_img,
                  product_name:product_name,
                  product_price:product_price,
                  real_price:orginal_price,
                  real_qty:org_qty,
                  quantity:quantity,
                  desc:inst,
                  sub_menu_list: users,
                  last_cartadded:cartmicrosite
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
                      $('#wait_addcart').waitMe('hide');
           
          }
         });
         
         });
});
 
</script>
                <script>
                    
                   
                    
                    
                    $('.main_number_spinner a').click(function (e) {
                        
                        //var target_pr = $(this).attr('price');
                        //var target_grd = $(this).attr('grandprice');
                        
                        var calc;
                        
                        
                        var btn = $(this);
                        var input = btn.closest('.main_number_spinner').find('input');
                        var current_price = $(".mainQTY_div").data("f_price");
                        var options_total = $(".mainQTY_div").data("options_total");
                        var qty_get = $(".mainQTY_div").data("qty_num");
                        var total_price = $('.main_price').text();
                        var oldValue = input.val().trim();
                       

                    if (btn.attr('data-dir') === 'up') {
                        oldValue++;
                        qty_get++;
                        calc = parseFloat(total_price) + parseFloat(current_price);
                        
                        $('.main_price').text(calc.toFixed(2));
                        $(".mainQTY_div").data('qty_num', qty_get);
                      
                        
                    } else {
                      if (oldValue > input.attr('min') ) {
                            oldValue--;
                            qty_get--;
                        
                            calc = parseFloat(total_price) - parseFloat(current_price);
                            //calc = calc1 + parseFloat(options_total);

                            $('.main_price').text(calc.toFixed(2));
                            $(".mainQTY_div").data('qty_num', qty_get);
                      }
                      
                    }
                    
                    input.val(oldValue);
                    
                    
                  });
                  
                  
                  
                  
                </script>