<style>
    .movie-div {
            background: linear-gradient(rgba(189, 0, 24, 0.5), rgba(189, 0, 24, 0.5)), url(<?= site_url('assets/uploads/movies/mainimage/'.$movieinfo['image'])?>);
            background-size: cover;
            background-repeat: no-repeat;
            padding: 210px 0;
        }
    main {
        padding-bottom: 40px;
    }
    .services-wrapper {
        padding: 20px 0 35px 0;
    }
    .services-wrapper p {
        color: #050505;
        margin-top: 0px;
        margin-bottom: 25px;
    }
    .services-wrapper span.information {
        text-transform: uppercase;
    }
    .services-wrapper h6 {
        margin-bottom: 10px;
        color: #000;
        font-size: 16px;
    } 
    .services-wrapper h5 {
        color: #000;
        margin-top: 20px;
        margin-bottom: 25px;
    }
    iframe {
        margin-top: 0;
    }
    .checkout-wrapper {
        padding: 350px 0;
    }
    @media screen and (max-width: 768px) {
        .search-wrapper input,
        .search-wrapper select,
        .search-wrapper button {
            margin-top: 10px;
        }
    }
</style>

    <main>
        <article>
            <div class="movie-div"></div>
            <div class="services-wrapper">

                <div class="container">
                    <h4 class="text-left"><?=ucfirst($movieinfo['name'])?></h4>
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div>
                                <img src="<?= site_url('assets/uploads/movies/'.$movieinfo['image'])?>" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="movie-details">
                                <div>
                                    <span class="information">Cinema Location</span>
                                    <p> <?=ucfirst($cinemainfo[0]['name'])?><br>
                                        <?=ucfirst($cinemainfo[0]['address'])?>,<br> <?=ucfirst($cinemainfo[0]['cityname'])?>, <?=ucfirst($cinemainfo[0]['statename'])?></p>
                                </div>
                                <div>
                                    <span class="information">Date and time</span>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div>
                                                <p><?= date("D, jS F \, Y \ ", strtotime($cinemainfo[0]['moviedate'])) ?> </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="text-right">
                                                <p> <?= date('g:iA', strtotime($cinemainfo[0]['movietime'])) ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <span class="information">Number of seats reserved</span>
                                    <p>
                                        <?php if($adultticket > 0): ?>
                                            <?= $adultticket ?> Adult <br>
                                        <?php endif; ?>

                                        <?php if($studentticket > 0): ?>
                                           <?= $studentticket ?> Student <br>
                                        <?php endif; ?> 

                                        <?php if($childrenticket > 0): ?>
                                            <?php if($childrenticket = 1): ?>
                                                <?= $childrenticket ?> Child <br>
                                            <?php else: ?>
                                                <?= $childrenticket ?> Children <br>
                                            <?php endif; ?>
                                        <?php endif; ?> 
                                    </p>
                                </div>
                                <div>
                                    <span class="information">Ticket details</span>
                                    <p> <?= $totalticket ?> Regular tickets</p>
                                </div>
                                <div>
                                    <span>Total Cost</span>
                                    <h6>₦ <?=number_format($totalbill);?></h6>
                                </div>
                            </div>
                            <div class="billing-information">
                                <h5>Billing Information</h5>
                                <form action="<?=site_url('lifestyle/movies/checkout/'.$movieinfo['slug']) ?>" method="post">
                                    <div class="row">
                                        <div class="col-lg-6 ol-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" required="" class="form-control" name="firstname" placeholder="Your first name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 ol-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" required="" class="form-control" name="lastname" placeholder="Your last name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 ol-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" required="" class="form-control" name="email" placeholder="Your email">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 ol-md-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" required="" class="form-control" name="phone" placeholder="Full phone">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="or text-center">Or</p>
                                    <button class="btn btn-info btn-join">login to make payment</button>
                                    <p style="margin-top: 10px;">By continuing, I accept the terms and condition of this service, and hereby confirm that I have read the privacy policy.</p>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <iframe src="https://maps.google.com/maps?q=<?= $cinemainfo[0]['latitude']?>,<?= $cinemainfo[0]['longitude']?>&hl=en&z=17&amp;output=embed" width="100%" height="430" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </article>
    </main>
