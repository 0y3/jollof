$('#cinemastate').change(function(){

        alert('cool');
        var stateID = $(this).val();
        var datatypeslug = $(':selected', this).attr('data-slug');
        if(stateID && datatypeslug){
            $.ajax({
                type:'POST',
                url:"<?= site_url('lifestyle/cinemabystate') ?>",
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
    });