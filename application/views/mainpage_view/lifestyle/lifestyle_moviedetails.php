<style>
    .movie-div {
            background: linear-gradient(rgba(189, 0, 24, 0.5), rgba(189, 0, 24, 0.5)), url(<?= site_url('assets/uploads/movies/mainimage/'.$movieinfo[0]['image'])?>);
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
        margin-top: 15px;
        margin-bottom: 25px;
    }
    .services-wrapper span.information {
        text-transform: uppercase;
    }
    .services-wrapper p a {
        color: #F19005;
    }
    .services-wrapper .review-div {
        margin-top: 10px;
    }
    .services-wrapper .review-wrapper h6 {
        margin-bottom: 10px;
        color: #000;
    } 
    iframe {
        margin-top: 0;
    }
    @media screen and (max-width: 768px) {
        .search-wrapper input,
        .search-wrapper select,
        .search-wrapper button {
            margin-top: 10px;
        }
    }
    .services-wrapper iframe
    {
        width: 100% !important;
        height: 315px !important;
    }
</style>

    <main>
        <article>
            <div class="movie-div"></div>
            <div class="services-wrapper">
<?php foreach ($movieinfo as $movies) :?> 

                <div class="container">
                    <h4 class="text-left"><?=ucfirst($movies['name'])?></h4>
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div>
                                <?=$movies['triller_youtubeurl']?>
                                
                                <p><?=$movies['summary']?></p>
                                <span class="information">Information about this movie</span>
                                 <p>Director: <?=$movies['director']?> <br>
                                    Stars: <?=$movies['starring']?>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="checkout-wrapper">
                                <h5>Buy Movie Ticket</h5>
                                <form action="<?=site_url('lifestyle/movies/checkout/'.$movies['slug']) ?>" method="post">
                                    <div>
                                        <select id="cinemastate" class="form-control">
                                            <option>Select State</option>
                                        <?php if(!empty($cinemashowed)): ?>
                                            <?php foreach ($cinemashowed as $state_list) :?>
                                                <option data-slug="<?=$movies['id']?>" value="<?= $state_list['stateid'] ?>"><?= $state_list['statename'] ?></option>
                                            <?php endforeach;?>
                                        <?php endif; ?>
                                        </select>
                                    </div>
                                    <div id="WaitMe_cinema">
                                        <select id="cinema" class="form-control">
                                            <option>Select your prefered cinema</option>
                                        </select>
                                    </div>
                                    <div id="WaitMe_datetime" class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <select id="cinemadate" class="form-control">
                                                <option>Preferred Date</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <select id="cinematime" class="form-control">
                                                <option>Preferred Time</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="WaitMe_price">
                                        <div class="selection-wrapper">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-4">
                                                    <div>
                                                        <p class="bold">Adult: </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7 col-md-8">
                                                    <div class="pull-right">
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="adultcount">
                                                                    <img src="<?= site_url('assets/img/minus.png')?>" class="img-fluid" alt="minus icon">
                                                                </button>
                                                            </span>
                                                            <input type="text" name="adultcount" class="form-control input-number selection-value" value="0" min="0" max="10">
                                                            <span class="input-group-btn">
                                                                <button type="button" disabled="disabled" class="btn btn-default btn-number" data-type="plus" data-field="adultcount">
                                                                    <img src="<?= site_url('assets/img/plus.png')?>" id="adult-plus" class="img-fluid" alt="plus icon">
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="selection-wrapper">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-4">
                                                    <div>
                                                        <p class="bold ">Student: </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7 col-md-8">
                                                    <div class="pull-right">
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="studentcount">
                                                                    <img src="<?= site_url('assets/img/minus.png')?>" class="img-fluid" alt="minus icon">
                                                                </button>
                                                            </span>
                                                            <input type="text" name="studentcount" class="form-control input-number selection-value" value="0" min="1" max="10">
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="plus" data-field="studentcount">
                                                                    <img src="<?= site_url('assets/img/plus.png')?>" id="adult-plus" class="img-fluid" alt="plus icon">
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="selection-wrapper">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-4">
                                                    <div>
                                                        <p class="bold">Children: </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7 col-md-8">
                                                    <div class="pull-right">
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="kidcount">
                                                                    <img src="<?= site_url('assets/img/minus.png')?>" class="img-fluid" alt="minus icon">
                                                                </button>
                                                            </span>
                                                            <input type="text" name="kidcount" class="form-control input-number selection-value" value="0" min="1" max="10">
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-default btn-number"  disabled="disabled" data-type="plus" data-field="kidcount">
                                                                    <img src="<?= site_url('assets/img/plus.png')?>" id="adult-plus" class="img-fluid" alt="plus icon">
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="total-amount">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div>
                                                        <h6>Total</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="pull-right">
                                                        <h6>₦ 0</h6>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div>
                                            <span class="isDisabled"><a href="" class="btn btn-info btn-join" id="proceed">Proceed</a></span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

<?php endforeach; ?>
            </div>
        </article>
    </main>
