<style>
    .carousel h1 {
        width: 50%;
        font-size: 52px;
        margin-bottom: 15px;
    }
    .carousel h5 {
        width: 37%;
        font-size: 18px;
    }
    .services-wrapper {
        padding: 40px 0 100px 0;
    }
    .services-wrapper h4 { 
        font-size: 30px;
        font-weight: bold; 
        color: #000000;
        margin-bottom: 15px;
        text-align: left;
        margin-top: 0;
    }
    .services-wrapper .pull-right a {
        margin-top: 30px;
    }
    @media screen and (max-width: 768px) {
        .carousel h1 {
            width: auto;
            font-size: 45px;
        }
        .carousel h6 {
            width: auto;
            font-size: 18px;
        }
    }
    .news-wrapper img
    {
        max-width: 255px;
        max-height: 255px;
    }
</style>
            <div>
                
                <div id="demo" class="carousel slide lifestyle-carousel" data-ride="carousel">

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
                                            <h1>Watch the new epic Tupac Trailer</h1>
                                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan consequat et lorem facilisis quis suspendisse maecenas pellentesque.</h5>
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
                                            <h1>Watch the new epic Tupac Trailer</h1>
                                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan consequat et lorem facilisis quis suspendisse maecenas pellentesque.</h5>
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
                                            <h1>Watch the new epic Tupac Trailer</h1>
                                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan consequat et lorem facilisis quis suspendisse maecenas pellentesque.</h5>
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
                                            <h1>Watch the new epic Tupac Trailer</h1>
                                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan consequat et lorem facilisis quis suspendisse maecenas pellentesque.</h5>
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
                                            <h1>Watch the new epic Tupac Trailer</h1>
                                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan consequat et lorem facilisis quis suspendisse maecenas pellentesque.</h5>
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
                                            <h1>Watch the new epic Tupac Trailer</h1>
                                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan consequat et lorem facilisis quis suspendisse maecenas pellentesque.</h5>
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
                    <!-- latest news Div -->
                    <div>
                        
    <?php if(!empty($latestnews)): ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div>
                                    <h4>Get the latest news on jollof</h4>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4">
                                <div class="pull-right">
                                    <a href="<?= site_url('lifestyle/blogs') ?>">See more news</a>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
        <?php $count=1; ?>
    <?php foreach ($latestnews as $news) :?>

        <?php if($count<=4): ?>

                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="news-wrapper">
                                    <a href="<?= site_url('lifestyle/blogs'.$news['slug']) ?>">
                                        <div>
                                            <img src="<?= base_url() ?>assets/lifestyle_banner/news-image.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsum dolor sit amet, consectetur </h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
            <?php endif; ?>
    <?php $count++; ?>
<?php endforeach; ?>
                    </div>
<?php else: ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div>
                                    <h4>Get the latest news on jollof</h4>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4">
                                <div class="pull-right">
                                    <a href="<?= site_url('lifestyle/blog') ?>">See more news</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="news-wrapper">
                                    <a href="">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/news-image.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsum dolor sit amet, consectetur </h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="news-wrapper">
                                    <a href="">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/fashion.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsum dolor sit amet, consectetur </h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="news-wrapper">
                                    <a href="">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/news-image-two.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsum dolor sit amet, consectetur </h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="news-wrapper">
                                    <a href="">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/news-image-three.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsum dolor sit amet, consectetur </h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
<?php endif; ?>
                    </div>
                    <!-- End latest news Div -->

                    <!-- latest Movies Div -->
                    <div class="mt-40">
                        <div>
                            <div class="row">
                                <div class="col-lg-6 col-md-8">
                                    <div>
                                        <h4>Latest Movies </h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-4">
                                    <div class="pull-right">
                                        <a href="<?= site_url('lifestyle/movies') ?>">See more movies</a>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php if(!empty($latestmovies)): ?>

                        <div class="row">
<?php $count=1; ?>
    <?php foreach ($latestmovies as $movies) :?>

        <?php if($count<=6): ?>

                            <div class="col-lg-2 col-md-2 col-sm-6 col-6">
                                <div class="movie-wrapper">
                                    <a href="<?= site_url('lifestyle/movies'.$movies['slug']) ?>">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/movies-image.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsumdo</h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
            <?php endif; ?>
    <?php $count++; ?>
<?php endforeach; ?>
                            </div>
<?php else: ?>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-6 col-6">
                                <div class="movie-wrapper">
                                    <a href="movies.html">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/movies-image.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsumdo</h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-6">
                                <div class="movie-wrapper">
                                    <a href="movies.html">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/movies-image-two.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsumdo</h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-6">
                                <div class="movie-wrapper">
                                    <a href="movies.html">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/movies-image-three.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsumdo</h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-6">
                                <div class="movie-wrapper">
                                    <a href="movies.html">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/movies-image-four.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsumdo</h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-6">
                                <div class="movie-wrapper">
                                    <a href="movies.html">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/movies-image-five.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsumdo</h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-6">
                                <div class="movie-wrapper">
                                    <a href="movies.html">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/movies-image-six.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsumdo</h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
<?php endif; ?>
                    </div>
                    <!-- End latest Movies Div -->



                    <!-- Tourist Attraction Div -->
                    <div class="mt-40">
                        <div>
                            <div class="row">
                                <div class="col-lg-6 col-md-8">
                                    <div>
                                        <h4>Recommended Tourist attraction</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-4">
                                    <div class="pull-right">
                                        <a href="<?= site_url('lifestyle/tourist') ?>">See more offers</a>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php if(!empty($tourist)): ?>

                        <div class="row">
<?php $count=1; ?>
    <?php foreach ($tourist as $tourists) :?>

        <?php if($count<=4): ?>

                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="tourist-wrapper">
                                    <a href="<?= site_url('lifestyle/tourists'.$tourists['slug']) ?>">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/tourists-image.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsum dolor sit amet, consectetur </h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
            <?php endif; ?>
    <?php $count++; ?>
<?php endforeach; ?>
                            </div>
<?php else: ?>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="tourist-wrapper">
                                    <a href="">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/tourists-image.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsum dolor sit amet, consectetur </h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="tourist-wrapper">
                                    <a href="">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/tourists-image-two.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsum dolor sit amet, consectetur </h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="tourist-wrapper">
                                    <a href="">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/tourists-image-three.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsum dolor sit amet, consectetur </h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="tourist-wrapper">
                                    <a href="">
                                        <div>
                                            <img src="<?= base_url() ?>assets/img/tourists-image-four.png" class="img-fluid" alt="">
                                            <h5>Lorem ipsum dolor sit amet, consectetur </h5>
                                            <span>1 Hour ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
<?php endif; ?>
                    </div>
                    <!-- End Tourist Attraction Div -->

                    <br>

                    <!-- Promo Div -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <img src="<?= base_url() ?>assets/img/bground.png" class="img-fluid mt-20" alt="">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <img src="<?= base_url() ?>assets/img/b-ground.png" class="img-fluid mt-20" alt="">
                        </div>
                    </div>
                    <!-- End Promon Div -->

                    <!-- Events Div -->
                    <div class="mt-40">
                        <div>
                            <div class="row">
                                <div class="col-lg-6 col-md-8">
                                    <div>
                                        <h4>Recommended Events</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-4">
                                    <div class="pull-right">
                                        <a href="<?= site_url('lifestyle/events') ?>">See more offers</a>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php if(!empty($event)): ?>

                        <div class="row">
<?php $count=1; ?>
    <?php foreach ($event as $events) :?>

        <?php if($count<=3): ?>

                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <a href="<?= site_url('lifestyle/events/'.$events['slug']) ?>">
                                    <div class="recommended-wrapper">
                                        <img src="<?= base_url() ?>assets/img/event-image.png" class="img-fluid" alt="">
                                        <div>
                                            <div class="date-wrapper">
                                                <p>11<br>Sep</p>
                                            </div>
                                            <h5>LAGOS 2019 Digital Transformation and Innovation Summit</h5>
                                            <div>
                                                <p>Thu, September 11, 2020 | 10:00 AM
                                                <br>Lagos Oriental Hotel, 3 Lekki - Epe Expressway, Lagos</p>
                                            </div>
                                            <span>N 3000</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

            <?php endif; ?>
    <?php $count++; ?>
<?php endforeach; ?>
                            </div>
<?php else: ?>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <a href="events.html">
                                    <div class="recommended-wrapper">
                                        <img src="<?= base_url() ?>assets/img/event-image.png" class="img-fluid" alt="">
                                        <div>
                                            <div class="date-wrapper">
                                                <p>11<br>Sep</p>
                                            </div>
                                            <h5>LAGOS 2019 Digital Transformation and Innovation Summit</h5>
                                            <div>
                                                <p>Thu, September 11, 2020 | 10:00 AM
                                                <br>Lagos Oriental Hotel, 3 Lekki - Epe Expressway, Lagos</p>
                                            </div>
                                            <span>N 3000</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <a href="events.html">
                                    <div class="recommended-wrapper">
                                        <img src="<?= base_url() ?>assets/img/event-image-two.png" class="img-fluid" alt="">
                                        <div>
                                            <div class="date-wrapper">
                                                <p>11<br>Sep</p>
                                            </div>
                                            <h5>LAGOS 2019 Digital Transformation and Innovation Summit</h5>
                                            <div>
                                                <p>Thu, September 11, 2020 | 10:00 AM
                                                <br>Lagos Oriental Hotel, 3 Lekki - Epe Expressway, Lagos</p>
                                            </div>
                                            <span>FREE</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <a href="events.html">
                                    <div class="recommended-wrapper">
                                        <img src="<?= base_url() ?>assets/img/event-image-three.png" class="img-fluid" alt="">
                                        <div>
                                            <div class="date-wrapper">
                                                <p>11<br>Sep</p>
                                            </div>
                                            <h5>LAGOS 2019 Digital Transformation and Innovation Summit</h5>
                                            <div>
                                                <p>Thu, September 11, 2020 | 10:00 AM
                                                <br>Lagos Oriental Hotel, 3 Lekki - Epe Expressway, Lagos</p>
                                            </div>
                                            <span>FREE</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
<?php endif; ?>
                    </div>
                    <!-- End Tourist Attraction Div -->




                </div>
            </div>