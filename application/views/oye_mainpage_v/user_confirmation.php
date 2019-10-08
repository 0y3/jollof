<style>
    .bodydiv{
        color: #222;
        font-size: 13px;
        font-family: sans-serif;
        background: #fff url(../assets/img/404bg.png) left top repeat-x;
    }
    h1 {
        font-size:300%;
        font-family:'Trebuchet MS', 
            Verdana, sans-serif;
        color:#000
    }
    #page {
        font-size:122%;
        margin:144px auto 0 auto;
        text-align:center;
        line-height:1.2;
    }
    #message {
        padding-right:400px;
        min-height:360px;
        /*background:transparent url(../assets/img/jollof_logo2.png) left top no-repeat;*/
    }

</style>
<div class="container-fluid bodydiv">
    
    <div id="page">
        
        <div id="messagee">
            <h1 style="color:#0fad00">Account Confirmed</h1>
                <p><?=$error_msg?></p>
        </div>
    </div>

    
</div>
<script>
    $(document).ready(function(){
      setTimeout(function() {
       window.location.href = '<?= site_url('') ?>';
      }, 10000);
    });
</script>

