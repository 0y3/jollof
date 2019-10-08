(function($) {
    'use strict';
    
    // social widgets
    $('.sw_button').on('click',function(){
        $(this).parent().toggleClass('opened').siblings().removeClass('opened');
    });
    
    
    //  allow only number
    
    $(".cu_phone_js").on("keypress keyup blur",function (event) { 
                   $(this).val($(this).val().replace(/[^\d].+/, ""));
                    if ((event.which < 48 || event.which > 57)) {
                        event.preventDefault();
                    }
        
        });
    
    
   


})(jQuery);