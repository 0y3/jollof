<style>
        .movie-div {
            background: url(<?= site_url('assets/uploads/events/mainimage/'.$eventinfo[0]['image'])?>);
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
            margin-top: 9px;
        }
        .services-wrapper input {
            background: #E0E0E0;
            height: 45px;
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
<form>

            <div class="movie-div"></div>
            <div class="container">
                <div class="services-wrapper">
                    <div class="row">
<?php foreach ($eventinfo as $events) :?> 
                        <div class="col-lg-8 col-md-8">
                            <div>
                                <h3 class="event-name"><?=ucfirst($events['name'])?></h3>
                                <h6><?= $events['address']?>,<br> <?= $events['cityname']?>, <?= $events['statename']?></h6>
                                <h6><?= date("D, jS F \, Y \ ", strtotime($events['eventdate'][0]['eventdate'])) ?></h6>
                                <div class="event-description">
                                    <h5>Your Information</h5>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Firstname</label>
                                                    <input type="text" name="firstname" required="" class="form-control" placeholder="Firstname">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Lastname</label>
                                                    <input type="text" name="lastname" required="" class="form-control" placeholder="Lastname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" required="" class="form-control" placeholder="you@email.com">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input type="text" name="phone" required="" class="form-control" placeholder="081xxxxxxxxx">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">

                            <div class="checkout-wrapper">
                                <h5>Ticket Order</h5>
                                <p class="bold">Event Ticket</p>
                                    <div>
                                        <div class="selection-wrapper">
                                            <div class="row">

                                            </div>
                                            <div class="selection-wrapper">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-4">
                                                            <div>
                                                                <p class="bold">Quantity</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7 col-md-8">
                                                            <div class="pull-right">
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant">
                                                                            <img src="<?= site_url('assets/img/minus.png')?>" class="img-fluid" alt="minus icon">
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" name="quant" readonlyy class="form-control input-number selection-value" value="1" min="1" max="10">
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant">
                                                                            <img src="<?= site_url('assets/img/plus.png')?>" id="adult-plus" class="img-fluid" alt="plus icon">
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </div>
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
                                                    <h6 class="totalprice" data-field="<?=$events['price']?>">
                                                        <?php if($events['price'] >0): ?>
                                                            ₦ <?=number_format($events['price']);?>
                                                        <?php else: ?>
                                                            FREE
                                                        <?php endif; ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div>
                                        <button  type="Summit" class="btn btn-info btn-join" id="proceed">Make Payment</button>
                                    </div>
                                
                            </div>
                            <div>
                                <iframe src="https://maps.google.com/maps?q=<?= $events['latitude']?>,<?= $events['longitude']?>&hl=en&z=17&amp;output=embed" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                                
                            </div>
                        </div>

<?php endforeach; ?>
                    </div>

                </div>
            </div>
</form>
        </article>
    </main>