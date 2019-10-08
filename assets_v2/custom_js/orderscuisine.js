(function($) {
    'use strict';
    
    //alert(site_url);
    //  allow only number
    
    $(".cu_phone_js").on("keypress keyup blur",function (event) { 
                   $(this).val($(this).val().replace(/[^\d].+/, ""));
                    if ((event.which < 48 || event.which > 57)) {
                        event.preventDefault();
                    }
        
        });
        
    //  the status Process Order button
    $(document).on("click",".ord_pro", function(e){
        e.preventDefault();
        
        
        var ord_id_   = $(this).data('get'); // gets value
        //$('.preloader').css("display", "block");
            $.ajax({
                type:'POST',
                //url:'<?= site_url('fashion_admin/update_order_flow') ?>',
                url:site_url+'cuisineadmin/orders/update_orderflow',
                dataType: 'json',
                data:{
                        order:'pro',
                        ord_id:ord_id_
                    },
                success:function(html)
                {
                    
                }

            });
            window.location.reload();
    });
    
    //  the status Delivery button
    $(document).on("click",".ord_del", function(e){
        e.preventDefault();
        
        
        var ord_id_   = $(this).data('get'); // gets value
        //$('.preloader').css("display", "block");
        
            $.ajax({
                type:'POST',
                url:site_url+'cuisineadmin/orders/update_orderflow',
                dataType: 'json',
                data:{
                        order:'del',
                        ord_id:ord_id_
                    },
                success:function(html)
                {
                   
                }

            });
            window.location.reload();
    });
    
    //  the status Canceled Order button
         
    $(document).on("click",".ord_can[data-toggle='modal']", function(e){

        e.preventDefault();
        
        var url = $(this).attr('href');
        var ord_id   = $(this).data('get'); // gets value
        var orderid   = $(this).data('orderid'); // gets value
        
        var container = $(this).attr('data-target');
       
       $.post(url,{ data_id:ord_id,data_order:orderid},function(data){
                $(container).html(data).modal();
           }
       );
    });

})(jQuery);