// $(function() {
// 	$('[data-decrease]').click(decrease);
// 	$('[data-increase]').click(increase);
// 	$('[data-value]').change(valueChange);
// });

// function decrease() {
// 	var value = $(this).parent().find('[data-value]').val();
// 	if(value > 1) {
// 		value--;
// 		$(this).parent().find('[data-value]').val(value);
// 	}
// }

// function increase() {
// 	var value = $(this).parent().find('[data-value]').val();
// 	if(value < 100) {
// 		value++;
// 		$(this).parent().find('[data-value]').val(value);
// 	}
// }

// function valueChange() {
// 	var value = $(this).val();
// 	if(value == undefined || isNaN(value) == true || value <= 0) {
// 		$(this).val(1);
// 	} else if(value >= 101) {
// 		$(this).val(100);
// 	}
// }

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

bill= $(".totalprice").attr('data-field');
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();

                if(parseInt(bill)>0)
                {
                    calc=parseInt(bill)*(currentVal-1);
                    calc=(calc).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    $(".totalprice").html('₦ '+calc);
                }
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
                if(parseInt(bill)>0)
                {
                    calc=parseInt(bill)*(currentVal+1);
                    calc=(calc).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    $(".totalprice").html('₦ '+calc);
                }
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(1);
    }
});

$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    error=0;
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        error=1;
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        error=1;
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }

    if(error==0)
    {
        if(parseInt(bill)>0)
        {
            calc=parseInt(bill)*valueCurrent;
            calc=(calc).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            $(".totalprice").html('₦ '+calc);
        }
    }
    
    
});

$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    function savetosession(grand_price){
      //alert(grand_price);
      $.ajax({
          type: "POST",
          url: site_url+'lifestyle/savetosession',
          data:{
                grandtotal:grand_price
               },
          success: function (data) {
            console.log("Success!!");
          },
          error: function (xhr, desc, err) {
            console.log('error');
          }
        });
  }

  var payment =  '<div class="total-amount">'+
                    '<div class="row">'+
                        '<div class="col-lg-6 col-md-6">'+
                            '<div>'+
                                '<h6>Total</h6>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-lg-6 col-md-6">'+
                            '<div class="pull-right">'+
                                '<h6>₦ 0</h6>'+
                            '</div>'+
                        '</div>'+
                    '</div> '+
                '</div>'+
                '<div>'+
                    '<span class="isDisabled"><a href="" class="btn btn-info btn-join" id="proceed">Proceed</a></span>'+
                '</div>';


//$('.btn-adultnumber').click(function(e){
$('#WaitMe_price').on('click', '.btn-adultnumber', function(e){
    e.preventDefault();

    var moviebilladult = $(".adultbill").attr('data-field');
    var oldprice = parseInt($(".totalprice").attr('data-field'));

    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());

    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();

                if(parseInt(moviebilladult)>0)
                {
                    //calc=parseInt(moviebilladult)*(currentVal-1);
                    calc = parseInt(oldprice)-parseInt(moviebilladult);
                    $(".totalprice").attr("data-field", calc);
                    calc=(calc).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    $(".totalprice").html('₦ '+calc);
                }
            } 

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
                if(parseInt(moviebilladult)>0)
                {
                    //calc=parseInt(moviebilladult)*(currentVal+1);
                    calc = parseInt(oldprice)+parseInt(moviebilladult);
                    $(".totalprice").attr("data-field", calc);
                    calc=(calc).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    $(".totalprice").html('₦ '+calc);
                }
            }

        }
    } else {
        input.val(0);
    }
});

$('#WaitMe_price').on('click', '.btn-studentnumber', function(e){
    e.preventDefault();

    var moviebillstudent = $(".studentbill").attr('data-field');
    var oldprice = parseInt($(".totalprice").attr('data-field'));

    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());

    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();

                if(parseInt(moviebillstudent)>0)
                {
                    //calc=parseInt(moviebilladult)*(currentVal-1);
                    calc = parseInt(oldprice)-parseInt(moviebillstudent);
                    $(".totalprice").attr("data-field", calc);
                    calc=(calc).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    $(".totalprice").html('₦ '+calc);
                }
            } 

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
                if(parseInt(moviebillstudent)>0)
                {
                    //calc=parseInt(moviebilladult)*(currentVal+1);
                    calc = parseInt(oldprice)+parseInt(moviebillstudent);
                    $(".totalprice").attr("data-field", calc);
                    calc=(calc).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    $(".totalprice").html('₦ '+calc);
                }
            }

        }
    } else {
        input.val(0);
    }
});

$('#WaitMe_price').on('click', '.btn-childrennumber', function(e){
    e.preventDefault();

    var moviebillchildren = $(".childrenbill").attr('data-field');
    var oldprice = parseInt($(".totalprice").attr('data-field'));

    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());

    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();

                if(parseInt(moviebillchildren)>0)
                {
                    //calc=parseInt(moviebilladult)*(currentVal-1);
                    calc = parseInt(oldprice)-parseInt(moviebillchildren);
                    $(".totalprice").attr("data-field", calc);
                    calc=(calc).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    $(".totalprice").html('₦ '+calc);
                }
            } 

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
                if(parseInt(moviebillchildren)>0)
                {
                    //calc=parseInt(moviebilladult)*(currentVal+1);
                    calc = parseInt(oldprice)+parseInt(moviebillchildren);
                    $(".totalprice").attr("data-field", calc);
                    calc=(calc).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    $(".totalprice").html('₦ '+calc);
                }
            }

        }
    } else {
        input.val(0);
    }
});

    //run_waitMe($('#WaitMe_datetime'), 3, 'orbit');
    $('#cinemastate').change(function(){

        $("#cinemadate")
        .empty()
        .append('<option>Preferred Date</option>');

        $("#cinematime")
        .empty()
        .append('<option>Preferred Time</option>');

        $("#WaitMe_price")
        .empty()
        .append(payment);

        var stateID = $(this).val();
        var datatypeslug = $(':selected', this).attr('data-slug');
        if(stateID && datatypeslug){
            run_waitMe($('#WaitMe_cinema'), 3, 'orbit');
            $.ajax({
                type:'POST',
                url:  site_url+'lifestyle/cinemabystate',
                data:{
                        slug : datatypeslug,
                        stateid : stateID 
                    },
                success:function(html){
                    $('#cinema').html(html);
                }
            }); 
        }else{
            $('#cinema').html('<option value="">Select state first</option>'); 
        }
        $('#WaitMe_cinema').waitMe('hide');
    });

    $('#cinema').change(function(){

        $("#cinematime")
        .empty()
        .append('<option>Preferred Time</option>');

        $("#WaitMe_price")
        .empty()
        .append(payment);

        var cinemaid = $(this).val();
        var datatypeslug = $(':selected', this).attr('data-slug');
        if(cinemaid && datatypeslug){
            run_waitMe($('#WaitMe_datetime'), 3, 'orbit');
            $.ajax({
                type:'POST',
                url:  site_url+'lifestyle/datebycinema',
                data:{
                        slug : datatypeslug,
                        id : cinemaid 
                    },
                success:function(html){
                    $('#cinemadate').html(html);
                }
            }); 
        }else{
            $('#cinemadate').html('<option value="">Select Cinema first</option>'); 
        }
        $('#WaitMe_datetime').waitMe('hide');
    });

    $('#cinemadate').change(function(){

        $("#WaitMe_price")
        .empty()
        .append(payment);
        
        var date = $(this).val();
        var cinemaid = $('#cinema').val();
        var datatypeslug = $(':selected', this).attr('data-slug');
        if(cinemaid && datatypeslug){
            run_waitMe($('#cinematime'), 3, 'orbit');
            $.ajax({
                type:'POST',
                url:  site_url+'lifestyle/timebycinema',
                data:{
                        date : date,
                        slug : datatypeslug,
                        cinid : cinemaid ,
                    },
                success:function(html){
                    $('#cinematime').html(html);
                }
            }); 
        }else{
            $('#cinematime').html('<option value="">Select Cinema first</option>'); 
        }
        $('#cinematime').waitMe('hide');
    });

    $('#cinematime').change(function(){

        var timeid = $(this).val();

        if(timeid){
            run_waitMe($('#WaitMe_price'), 3, 'orbit');
            $.ajax({
                type:'POST',
                url:  site_url+'lifestyle/detailsbycinema',
                data:{
                        id : timeid
                    },
                success:function(html){
                    $('#WaitMe_price').html(html);
                }
            }); 
        }else{
            //$('#WaitMe_price').html('<option value="">Select Cinema first</option>'); 
        }
        $('#WaitMe_price').waitMe('hide');
    });