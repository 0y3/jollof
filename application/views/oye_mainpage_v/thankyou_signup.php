<div class="container" style="margin-top:5%;">
        <div class="row">
            
            <div class="col-sm-12 jumbotron linkcolor" style="box-shadow: 2px 2px 4px #000000;">
                <div class="alert alert-success alert-dismissable" id="get_error" style="display: none;">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                    <span class="error_msgr"></span>
                </div>
                <div class="alert alert-danger alert-dismissable" id="get_error_danger" style="display: none;">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                    <span class="error_msgr"></span>
                </div>
                <h2 class="text-center">Thank you for signing up with <img src="<?=base_url()?>assets/img/jollof_logo.png" alt=""></h2><!--<span style="color:#F89406;">The</span><span style="color:#26A65B;">Jollof</span><span style="color:#19B5FE;">Number</span>-->
                <center>
                    <div class="btn-group" style="margin-top:50px;">
                        <p>Kindly Activate your account by following the link sent to this email 
                        <b class="eee" style="color:#F89406;"><?=$useremail?> </b>
                        </p>
                    </div>
                    <p> pls <a class="resendemail" href=""><b>click here</b></a> to resend..</p>
                </center>
                
            </div>
        </div>
    </div>
<script>
    /*
     setInterval(function(){ 
            window.location.href='<?= site_url()?>';
        }, 15000);
    */
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
 
$(".resendemail").click(function(e){
        
        run_waitMe($('body'), 1, 'orbit');
        e.preventDefault();
        var email = '<?= $_GET['email']?>';//$('.eee').val();
        $.ajax({
            type:'POST',
            dataType: 'json',
            url:'<?= site_url('accounts/resendConfirmation')?>',
            data:{email:email},
            //data:'email='+$('.r_ema').val(),
            success:function(data){
                
                if(data.status === '1' )
                {
                    $("#get_error").show('fast').delay(5000).fadeOut('slow');
                    //$("#get_error").effect( "shake" );
                    $('.error_msgr').text(data.content);
                    
                    $('body').waitMe('hide');
                }
                else{
                    $("#get_error_danger").show('fast').delay(5000).fadeOut('slow');
                    $('.error_msgr').text(data.content);
                    
                    $('body').waitMe('hide');
                }
            }
        });
    });
</script>
    