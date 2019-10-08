<style>
        .movie-div {
            background: linear-gradient(rgba(189, 0, 24, 0.5), rgba(189, 0, 24, 0.5)), url(<?= site_url('assets/uploads/events/mainimage/'.$eventinfo[0]['image'])?>);
            background-size: cover;
            background-repeat: no-repeat;
            padding: 230px 0;
        }
        .services-wrapper {
            padding: 50px 0;
        }
        .services-wrapper h6 {
            font-size: 16px;
        }
        .recommended-wrapper {
            margin-bottom: 20px;
        }
        .recommended-wrapper > div {
            padding: 10px;
        }
        .btn.btn-info.btn-join {
            width: 100%;
            margin-top: 5px;
        }
        .search-wrapper input, .search-wrapper select {
            padding-top: 6px;
            background: #e0e0e0;
        }
        .search-wrapper .row {
            margin-top: 10px;
        }
        .services-wrapper .selection-wrapper .selection-value {
            width: auto;
            margin-top: 0;
        }
        .recommended-wrapper .btn.btn-info.btn-join {
            padding: 10px 20px;
            margin-top: 5px;
            margin-right: 10px;
        }
        .services-wrapper .recommended-wrapper p {
            margin: 25px 0;
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

    <main>
        <article>
            <div class="movie-div"></div>
            <div class="container">
                <div class="services-wrapper">
                    <div class="row">
<?php foreach ($eventinfo as $events) :?> 
                        <div class="col-lg-8 col-md-8">
                            <div>
                                <h3 class="event-name"><?=$events['name']?></h3>
                                <h6>by <?=$events['companyname']?></h6>
                                <div class="event-description">
                                    <h5>Description</h5>
                                    <?=$events['description']?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="checkout-wrapper">
                                <h6><?= $events['address']?>,<br> <?= $events['cityname']?>, <?= $events['statename']?></h6>
                                <h6><?= date("D, jS F \, Y \ ", strtotime($events['eventdate'][0]['eventdate'])) ?></h6>
                                <h5>
                                    <?php if($events['price'] >0): ?>
                                        ₦ <?=number_format($events['price']);?>
                                    <?php else: ?>
                                        FREE
                                    <?php endif; ?>
                                </h5>
                                <a href="<?=site_url('lifestyle/events/checkout/'.$events['slug'])?>" class="btn btn-info btn-join">buy ticket</a>
                            </div>
                            <div>
                                <iframe src="https://maps.google.com/maps?q=<?= $events['latitude']?>,<?= $events['longitude']?>&hl=en&z=17&amp;output=embed" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                                
                            </div>
                        </div>
<?php endforeach; ?>
                    </div>

                    <h5>Similar Events</h5>

                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 mb-20">
                            <a href="">
                                <div class="recommended-wrapper">
                                    <img src="images/event-image-ten.png" class="img-fluid" alt="">
                                    <div>
                                        <p class="bold">LAGOS 2019 Digital Transformation and Innovation Summit</p>
                                        <div>
                                            <p>Thu, September 11, 2020 | 10:00 AM
                                            <br>Lagos Oriental Hotel, 3 Lekki - Epe Expressway, Lagos</p>
                                        </div>
                                        <span>N 3000</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </article>
    </main>