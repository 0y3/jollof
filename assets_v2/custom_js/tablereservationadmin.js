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
    $("#zero_config").on("click",".ord_pro", function(e){
        e.preventDefault();
        
        
        var ord_id_   = $(this).data('get'); // gets value
        //$('.preloader').css("display", "block");
            $.ajax({
                type:'POST',
                //url:'<?= site_url('fashion_admin/update_order_flow') ?>',
                url:site_url+'jollofadmin/tablereservation/update_orderflow',
                dataType: 'json',
                data:{
                        order:'pro',
                        ord_id:ord_id_
                    },
                success:function(html)
                {
                    if(html.status === '1')
                    {
                        window.location.reload();
                    }
                    else if(html.status === '0')
                    {
                        window.location.reload();
                    }
                    
                    
                }

            });
    });
    
    //  the Accept Table Reservation  button
    $("#zero_config").on("click",".table_accept", function(e){
        e.preventDefault();
        
        
        var ord_id_   = $(this).data('get'); // gets value
        var url  = site_url+'jollofadmin/tablereservation/add/'+ord_id_;
        $(location).attr('href', url);
        
        /*
        $('.preloader').css("display", "block");
        
            $.ajax({
                type:'POST',
                url:site_url+'jollofadmin/tablereservation/add/'+ord_id_,
                dataType: 'json',
                data:{
                        table:'accept',
                        _id:ord_id_
                    },
                success:function(html)
                {
                    
                    if(html.status === '1')
                    {
                        window.location.reload();
                    }
                    else if(html.status === '0')
                    {
                        window.location.reload();
                    }
                    else
                    {
                        window.location.href = site_url+'jollofadmin/dashboard/accessdenied';
                    }
                    
                    window.location.reload();
                }

            });
            */
    });


    // on delete user  
    $("#zero_config").on("click",".table_delete", function(e){
       e.preventDefault();

       var msgg = 'Are you sure you want to Delete this Table Reservation ? -- '+ $(this).data('name');
       var s_Id = $(this).data('get');
       var url  = site_url+'jollofadmin/tablereservation/delete/'+s_Id;
       confirmDialog_cart(msgg, function(){
        $(location).attr('href', url);
        /*
           //$('.preloader').css("display", "block");
            $.ajax({
                    type: "POST",
                    url:url,
                    dataType: 'json',
                    data: {
                            table:'can',
                            _id: s_Id
                          }
                }).done(function (data) {
                    if (data.status === '1')
                        {
                            
                        }


                    }); 
                //window.location.reload();
                */
        });

    });
    function confirmDialog_cart(message, onConfirm){
        var fClose = function(){
                    modal.modal("hide");
        };
        var modal = $("#modal_conf");
        modal.modal("show");
        $("#confirmMessage").empty().append(message);
        $("#confirmOk").one('click', onConfirm);
        $("#confirmOk").one('click', fClose);
        $("#confirmCancel").one("click", fClose);
    }
    
    

})(jQuery);