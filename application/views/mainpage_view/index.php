            <div>
                <div class="container">
                    <div class="relative">
                        <div class="welcome-wrapper">
                            <p class="fairly-bold">Welcome to Jollof</p>
                            <div class="d-flex">
                                <div class="p-2">
                                    <a class="btn btn-info btn-join" href="<?= site_url('accounts/signup')?>">Sign up</a>
                                </div>
                                <div class="p-2">
                                    <a class="btn btn-info btn-join" href="<?= site_url('accounts/login')?>">Sign in</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->

                    <ul class="carousel-indicators">
<?php if(!empty($banner)): ?>  

    <?php $count_=0; ?>
    <?php foreach($banner as $imgs) :?>
                        <li data-target="#demo" data-slide-to="<?=$count_;?>" class="<?php if($count_==0) echo 'active' ?>"></li>
    <?php $count_++; ?>
    <?php endforeach; ?>

<?php else: ?>
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                        <li data-target="#demo" data-slide-to="3"></li>
                        <li data-target="#demo" data-slide-to="4"></li>
                        <li data-target="#demo" data-slide-to="5"></li>
<?php endif; ?>
                    </ul>
                    <!-- The slideshow -->
                    <div class="carousel-inner">
<?php if(!empty($banner)): ?>
    <?php $count=0; ?>
    <?php foreach($banner as $imgs) :?>

    <?php 
   //print("<pre>".print_r($imgs,true)."</pre>"); die;
         if($imgs->usertype=='cuisine')
         {
            $img='cuisine_banner/'.$imgs->imagename;
         }
         elseif($imgs->usertype=='fashion')
         {
            $img='fashion_banner/'.$imgs->imagename;
         }
         elseif($imgs->usertype=='thirdparty')
         {
            $img='thirdparty_banner/'.$imgs->imagename;
         }
         elseif($imgs->usertype=='admin')
         {
           
            if($imgs->bannerjollofsitetypeid==1)
            {
                $img='cuisine_banner/'.$imgs->imagename;
            }
            elseif($imgs->bannerjollofsitetypeid==2)
            {
               $img='fashion_banner/'.$imgs->imagename;
            }
            elseif($imgs->bannerjollofsitetypeid==3)
            {
               $img='jollof_banner/'.$imgs->imagename;
            }
            elseif($imgs->bannerjollofsitetypeid==4)
            {
               $img='lifestyle_banner/'.$imgs->imagename;
            }
            elseif($l_banner['bannerjollofsitetypeid']==5)
            {
              $img='biz_banner/'.$imgs->imagename;
            }
            elseif($l_banner['bannerjollofsitetypeid']==6)
            {
              $img='scholar_banner/'.$imgs->imagename;
            }
         }
    ?>  
                        <div class="carousel-item <?php if($count==0) echo 'active' ?> ">
                            <div class="carousel-image" style="background-image:url('<?= site_url('assets/jollof_banners/'.$img)?>')">
    <?php if( !empty($imgs->imageurl) ): ?>
                                <div>
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <div class="d-flex">
                                                <div class="p-2">
                                                    <a href="<?=$imgs->imageurl?>" class="btn btn-info btn-join"> Click Here!!! </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    <?php endif; ?>
                            </div>
                        </div>
                        <?php echo $count; ?>
    <?php $count++; ?>
    <?php endforeach; ?>
<?php else: ?>
                        <div class="carousel-item active">
                            <div class="carousel-image">
                                <div>
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1>Welcome to Jollof</h1>
                                            <h5>Your number 1 Aggregator website where you get everything you want all in one place </h5>
                                            <div class="d-flex">
                                                <div class="p-2">
                                                    <a class="btn btn-info btn-join" href="signup.html">Join</a>
                                                </div>
                                                <div class="p-2">
                                                    <a class="btn btn-info btn-join" href="signin.html">Log in</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-image">
                                    <div>
                                        <div class="container">
                                            <div class="carousel-caption">
                                                <h1>Welcome to Jollof</h1>
                                                <h5>Your number 1 Aggregator website where you get everything you want all in one place </h5>
                                                <div class="d-flex">
                                                    <div class="p-2">
                                                        <a class="btn btn-info btn-join" href="signup.html">Join</a>
                                                    </div>
                                                    <div class="p-2">
                                                        <a class="btn btn-info btn-join" href="signin.html">Log in</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-image">
                                    <div>
                                        <div class="container">
                                            <div class="carousel-caption">
                                                <h1>Welcome to Jollof</h1>
                                                <h5>Your number 1 Aggregator website where you get everything you want all in one place </h5>
                                                <div class="d-flex">
                                                    <div class="p-2">
                                                        <a class="btn btn-info btn-join" href="signup.html">Join</a>
                                                    </div>
                                                    <div class="p-2">
                                                        <a class="btn btn-info btn-join" href="signin.html">Log in</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-image">
                                    <div>
                                        <div class="container">
                                            <div class="carousel-caption">
                                                <h1>Welcome to Jollof</h1>
                                                <h5>Your number 1 Aggregator website where you get everything you want all in one place </h5>
                                                <div class="d-flex">
                                                    <div class="p-2">
                                                        <a class="btn btn-info btn-join" href="signup.html">Join</a>
                                                    </div>
                                                    <div class="p-2">
                                                        <a class="btn btn-info btn-join" href="signin.html">Log in</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-image">
                                    <div>
                                        <div class="container">
                                            <div class="carousel-caption">
                                                <h1>Welcome to Jollof</h1>
                                                <h5>Your number 1 Aggregator website where you get everything you want all in one place </h5>
                                                <div class="d-flex">
                                                    <div class="p-2">
                                                        <a class="btn btn-info btn-join" href="signup.html">Join</a>
                                                    </div>
                                                    <div class="p-2">
                                                        <a class="btn btn-info btn-join" href="signin.html">Log in</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-image">
                                    <div>
                                        <div class="container">
                                            <div class="carousel-caption">
                                                <h1>Welcome to Jollof</h1>
                                                <h5>Your number 1 Aggregator website where you get everything you want all in one place </h5>
                                                <div class="d-flex">
                                                    <div class="p-2">
                                                        <a class="btn btn-info btn-join" href="signup.html">Join</a>
                                                    </div>
                                                    <div class="p-2">
                                                        <a class="btn btn-info btn-join" href="signin.html">Log in</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
<?php endif; ?>
                    </div>


                </div>
            </div>
            <div class="services-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="cuisine">
                                <h4>Cuisine</h4>
                                <span>Explore the beauty of culture </span>
                                <h6><a href="<?= site_url('cuisine')?>">Read More &nbsp;<i class="fa fa-angle-right"></i></a></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="cuisine fashion">
                                <h4>Fashion</h4>
                                <span>Explore the beauty of culture </span>
                                <h6><a href="<?= site_url('fashion')?>">Read More &nbsp;<i class="fa fa-angle-right"></i></a></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="cuisine lifestyle">
                                <h4>Lifestyle</h4>
                                <span>Explore the beauty of culture </span>
                                <h6><a href="<?= site_url('lifestyle')?>">Read More &nbsp;<i class="fa fa-angle-right"></i></a></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="cuisine scholar">
                                <h4>Scholar</h4>
                                <span>Explore the beauty of culture </span>
                                <h6><a href="<?= site_url('scholar')?>">Read More &nbsp;<i class="fa fa-angle-right"></i></a></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="cuisine business">
                                <h4>Business</h4>
                                <span>Explore the beauty of culture </span>
                                <h6><a href="<?= site_url('business')?>">Read More &nbsp;<i class="fa fa-angle-right"></i></a></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="cuisine gift">
                                <h4>Gift Portal</h4>
                                <span>Explore the beauty of culture </span>
                                <h6><a href="<?= site_url('giftportal')?>">Read More &nbsp;<i class="fa fa-angle-right"></i></a></h6>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <img src="<?= base_url() ?>assets/img/bground.png" class="img-fluid mt-20" alt="">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <img src="<?= base_url() ?>assets/img/b-ground.png" class="img-fluid mt-20" alt="">
                        </div>
                    </div>
                    <div class="partners">
                        <h4>Our Partners</h4>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                                <img src="<?= base_url() ?>assets/img/partners.png" class="img-fluid mt-20" alt="">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                                <img src="<?= base_url() ?>assets/img/partners.png" class="img-fluid mt-20" alt="">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                                <img src="<?= base_url() ?>assets/img/partners.png" class="img-fluid mt-20" alt="">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                                <img src="<?= base_url() ?>assets/img/partners.png" class="img-fluid mt-20" alt="">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                                <img src="<?= base_url() ?>assets/img/partners.png" class="img-fluid mt-20" alt="">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                                <img src="<?= base_url() ?>assets/img/partners.png" class="img-fluid mt-20" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>