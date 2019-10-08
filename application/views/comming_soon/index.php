
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title><?= $titel ?></title>

<link rel="icon" type="image/ico" href="<?= base_url() ?>assets/img/<?= $icon ?>">


<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css">
<link href="<?= base_url() ?>assets/css/comming_soon_jollof.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>assets/css/media.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">



<script src="<?=base_url(); ?>assets/js/jquery-2.2.4.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>assets/js/background.slide.js"></script>

      <script type="text/javascript">
            $(document).ready(function() {
                $("body").backgroundCycle({
                    imageUrls: [
                      /*'<?=base_url()?>assets/admin/img/bg_1.jpg',
                        '<?=base_url()?>assets/admin/img/bg_2.jpg',
                        '<?=base_url()?>assets/admin/img/bg_3.jpg'*/
                        <?php foreach($banners as $banner) :?>
                            <?php
                            if($banner['bannerjollofsitetypeid']==1)
                            {
                            $img='cuisine_banner/'.$banner['imagename'];
                            }
                            elseif($banner['bannerjollofsitetypeid']==2)
                            {
                            $img='fashion_banner/'.$banner['imagename'];
                            }
                            elseif($banner['bannerjollofsitetypeid']==3)
                            {
                            $img='jollof_banner/'.$banner['imagename'];
                            }
                            elseif($banner['bannerjollofsitetypeid']==4)
                            {
                            $img='lifestyle_banner/'.$banner['imagename'];
                            }
                            elseif($banner['bannerjollofsitetypeid']==5)
                            {
                            $img='biz_banner/'.$banner['imagename'];
                            }
                            elseif($banner['bannerjollofsitetypeid']==6)
                            {
                            $img='scholar_banner/'.$banner['imagename'];
                            }
                            ?>

                            '<?= site_url('assets/jollof_banners/'.$img)?>',
                        <?php endforeach; ?>
                    ],
                    fadeSpeed: 2000,
                    //duration: 5000,
          duration: 8000,
                    backgroundSize: SCALING_MODE_COVER
                });
            });
        </script>

</head>


<body class="light">

<!-- Snow-->
 
    <canvas class="snow-canvas"></canvas>
 
<!-- started id wrap  -->

<div id="wrap"> 
  
  <!--starts logo div -->
  
  <div class="logo">
      <div class="container"> <a href="<?= site_url()?>"><img class="logo" style="width: 250px;" src="<?= base_url() ?>assets/img/jolloflogobig.png" alt="SoonX logo" /></a> </div>
    <div class="clear"></div>
  </div>
  
  <!--ended logo div -->
  
  <div class="clear"></div>
  
  <!-- starts counter -->
  
  <div class="counter lightcounter" style="margin-top:10px ;">
    <div class="container">
      <ul class="countdown_2" style="margin: unset;">        
          <li>
            <span class="days">00</span> 
              <p class="days_ref">days</p>     
          </li>
          <li>
            <span class="hours">00</span> 
            <p class="hours_ref">hours</p>
          </li>
          <li>
            <span class="minutes">00</span>
            <p class="minutes_ref">min</p>
         </li>  
         <li>
          <span class="seconds last">00</span>
          <p class="seconds_ref">seconds</p>
         </li>
      </ul>
      <div class="lightnotify mid">
          <h1 style="color: #e74c3c">Exciting new products and services coming soon</h1>           
           <div id="result"></div>
           <div class="form">
           
           <form action="" method="get" onSubmit="return false">
           
          <div class="field">
          	  <input type="email" placeholder="E-mail Address" required name="EMAIL" id="EMAIL" />
          	  <input type="submit" value="NOTIFY ME" />                    
          </div>
          
          </form>
          
          </div>
     </div>
     <div class="clear"></div>
      <div class="lightsocial">
       <ul>
          <li><a href="#." class="fa fb"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#." class="fa tw"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#." class="fa in"><i class="fa fa-instagram"></i></a></li>
          <li><a href="#." class="fa gp"><i class="fa fa-google"></i></a></li>
        </ul>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  
  <!-- end counter -->
  <div class="clear"></div>
  
  <!-- start footer -->
  
  <div class="lightfooter">
    <div class="container">
      <p>Copyrights © 2018 Jollof - All Rights Reserved.</p>
    </div>
    <div class="clear"></div>
  </div>
  
  <!--end footer --> 
  
</div>

<!-- ended id wrap  --> 

<!-- JS File --> 

<script src="<?= base_url() ?>assets/js/snow-plugin.js"></script> 

<script>
$(".snow-canvas").snow();
</script>


<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.downCount.js"></script> 
<script type="text/javascript" src="<?= base_url() ?>assets/js/functions.js"></script> 

<script type="text/javascript">
$(document).ready(function() { 
	$('.countdown_2').downCount({
		date: '05/14/2018 12:10:00',
  offset: +1
	});
});
</script>
</body>
</html>