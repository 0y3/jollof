<style>
    .eventbg {
        background: linear-gradient(rgba(241, 64, 64, 0.7), rgba(241, 64, 64, 0.7)), url(<?= base_url() ?>assets/img/events.png);
    }
    .services-wrapper {
        padding: 20px 0 0 0;
    }
    .services-wrapper .pull-right a {
        color: #000;
        margin-top: 35px;
    }
    .services-wrapper h6 {
        font-size: 16px;
    }
    .recommended-wrapper {
        margin-top: 10px;
        margin-bottom: 5px;
    }
    .services-wrapper h4 {
        margin-top: 10px;
    }
    .recommended-wrapper > div {
        padding: 10px;
    }
    .btn.btn-info.btn-join {
        width: 100%;
        margin-top: 5px;
    }
    .services-wrapper .recommended-wrapper h5 {
        font-size: 20px;
        margin-top: 0;
    }
    .search-wrapper input, .search-wrapper select {
        padding-top: 6px;
        background: #e0e0e0;
    }
    .search-wrapper .row {
        margin-top: 10px;
    }
    .date-wrapper {
        margin-top: -35px;
    }
    @media screen and (max-width: 768px) {
        .search-wrapper input,
        .search-wrapper select,
        .search-wrapper button {
            margin-top: 10px;
        }
        .recommended-wrapper {
            margin-top: 40px;
        }
    }
</style>

        <div class="movies-wrapper eventbg">
                <div class="container">
                    <div>
                        <h1>Jollof Events</h1>
                        <h6>Live your passion by attending events </h6>
                    </div>
                </div> 
            </div> 
            <div class="container">
                <div class="search-wrapper">
                    <h4 class="text-center">Search for Events</h4>
                    <form action="<?= site_url('lifestyle/eventsearch')?>" method="get">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <label>Location</label>
                                <input type="text" class="form-control" name="" placeholder="Lagos">
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <label>Category</label>
                                <input type="text" class="form-control" name="" placeholder="All Categories">
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <label>Date</label>
                                <input type="date" class="form-control" name="" placeholder="Any date">
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <br>
                                <button class="btn btn-info btn-join">search events</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  


            <div class="services-wrapper">
                <div class="container"> 
                    <div>
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div>
                                    <h4 class="text-left">Events Recommendation</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Events Div -->
                    <div class="row">
<?php if(!empty($event)): ?>
    <?php $count=1; ?>
    <?php foreach ($event as $events) :?>

                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <a href="<?=site_url('lifestyle/events/details/'.$events['slug'])?>">
                                <div class="recommended-wrapper">
                                    <img src="<?= site_url('assets/uploads/events/'.$events['image'])?>" class="img-fluid" alt="">
                                    <div>
                                        <div class="date-wrapper">
                                            <p> <?= date(" jS ", strtotime($events['eventdate'][0]['eventdate'])) ?>
                                            <br> <?= date(" M ", strtotime($events['eventdate'][0]['eventdate'])) ?></p>
                                        </div>
                                        <h5 title="<?=$events['name']?>">
                                            <?php
                                                    $value = $events['name'];
                                                        $limit = '49';
                                                        if (strlen($value) > $limit) {
                                                                 $trimValues = substr($value, 0, $limit).'...';
                                                                  } 
                                                        else {
                                                                $trimValues = $value;
                                                          }
                                                    //character_limiter($resta['companydesc'],25); 
                                                          echo $trimValues;
                                            ?>
                                        </h5>
                                        <div>
                                            <p> <?= date("D, jS F \, Y \ ", strtotime($events['eventdate'][0]['eventdate'])) ?> | <?= date('g:iA', strtotime($events['eventdate'][0]['eventstarttime']))?>
                                            <br> <?= $events['address']?>, <?= $events['cityname']?>, <?= $events['statename']?></p>
                                        </div>
                                        <span>
                                            <?php if($events['price'] >0): ?>
                                            ₦ <?=number_format($events['price']);?>
                                            <?php else: ?>
                                                FREE
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>

        <?php if($count<=9): ?>

        <?php endif; ?>
    <?php $count++; ?>
    <?php endforeach; ?>

    <?php if($eventcount>9): ?>
                        <div class="col-lg-12 text-center showmore mb-20">
                            <a class="loadmore" href="<?= site_url('lifestyle/eventsshowmore/1')?>" ><h6>Load More</h6></a>
                        </div>
    <?php endif; ?>
<?php else: ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <a href="">
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
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <a href="">
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
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <a href="">
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

                            <div class="col-lg-4 col-md-4 col-sm-6 mt-20">
                                <a href="">
                                    <div class="recommended-wrapper">
                                        <img src="<?= base_url() ?>assets/img/event-image-four.png" class="img-fluid" alt="">
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
                            <div class="col-lg-4 col-md-4 col-sm-6 mt-20">
                                <a href="">
                                    <div class="recommended-wrapper">
                                        <img src="<?= base_url() ?>assets/img/event-image-five.png" class="img-fluid" alt="">
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
                            <div class="col-lg-4 col-md-4 col-sm-6 mt-20">
                                <a href="">
                                    <div class="recommended-wrapper">
                                        <img src="<?= base_url() ?>assets/img/event-image-six.png" class="img-fluid" alt="">
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
<?php endif; ?>

                        
                    </div>

                    <!-- End Events Div -->
                </div>
            </div>
