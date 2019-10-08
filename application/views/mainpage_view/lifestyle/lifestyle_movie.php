<style>
    .bgaa{
        background-size: contain;
        background-position: 50%;
        background-repeat: no-repeat;
    }
    .services-wrapper {
        padding: 20px 0 35px 0;
    }
    .services-wrapper .pull-right a {
        color: #000;
        margin-top: 35px;
    }
    .services-wrapper .recommended-wrapper span {
        color: #545B62;
    }
    .recommended-wrapper {
        margin-bottom: 5px;
    }
    .btn.btn-info.btn-join {
        width: 100%;
    }
    .services-wrapper .recommended-wrapper h5 {
        font-size: 15px;
    }
    .services-wrapper h4 {
        margin-top: 10px;
    }
    .maximg
    {
        width: 100%;
        max-height: 20rem;
        border-radius: 5% 5% 0 0;
    }
    @media screen and (max-width: 768px) {
        .search-wrapper input,
        .search-wrapper select,
        .search-wrapper button {
            margin-top: 10px;
        }
    }
</style>

        <div class="movies-wrapper">
                <div class="container">
                    <div>
                        <h1>Jollof Movies</h1>
                        <h6>Your one stop site for movie premiere</h6>
                    </div>
                </div> 
            </div> 
            <div class="container">
                <div class="search-wrapper">
                    <h4 class="text-center">Search for Movies</h4>
                    <form action="<?= site_url('lifestyle/moviesearch')?>" method="get">
                        <div class="row">
                            <div class="col-lg-6 col-md-4">
                                <div class="form-input">
                                    <input type="text" class="form-control" name="search" placeholder="Hollywood">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <select class="form-control">
                                            <option>Lagos</option>
                                            <option>Abuja</option>
                                            <option>Kano</option>
                                            <option>Port Harcourt</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <select class="form-control">
                                            <option>All Cinemas</option>
                                            <option>Abuja</option>
                                            <option>Kano</option>
                                            <option>Port Harcourt</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <button class="btn btn-info btn-join">search</button>
                                    </div>
                                </div>
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
                                    <h4 class="text-left">Search Results</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Events Div -->
                    <div class="row">
<?php if(!empty($movie)): ?>
    <?php $count=1; ?>
    <?php foreach ($movie as $movies) :?>

                        <div class="col-lg-3 col-md-4 col-sm-6 mb-20">
                            <div class="recommended-wrapper">
                                <?php if(!empty($movies['image'])): ?>
                                <img src="<?= site_url('assets/uploads/movies/'.$movies['image'])?>" class="img-fluid maximg" alt="">
                                <?php else: ?>
                                <img src="<?= site_url('assets/uploads/movies/movie-search.png')?>" class="img-fluid" alt="">
                                <?php endif; ?>
                                <div>
                                    <span class="genre">Genre: <?= $movies['genre']?></span>
                                    <h5 title="<?=$movies['moviename']?>">
                                        <?php
                                                $value = $movies['moviename'];
                                                    $limit = '25';
                                                    if (strlen($value) > $limit) {
                                                             $trimValues = substr($value, 0, $limit).'...';
                                                              } 
                                                    else {
                                                            $trimValues = $value;
                                                      }
                                                //character_limiter($resta['companydesc'],25); 
                                                      echo ucfirst($trimValues);
                                        ?>
                                    </h5>
                                    <div>
                                        <p title="<?=$movies['starring']?>">Staring:  
                                            <?php
                                                $value = $movies['starring'];
                                                    $limit = '40';
                                                    if (strlen($value) > $limit) {
                                                             $trimValues = substr($value, 0, $limit).'...';
                                                              } 
                                                    else {
                                                            $trimValues = $value;
                                                      }
                                                //character_limiter($resta['companydesc'],25); 
                                                      echo $trimValues;
                                        ?> </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div>
                                                <span>Rating: <?=$movies['age_restriction']?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7">
                                            <div class="text-right">
                                                <span>Running Time: <?= date('G\h:i\m\i\n', strtotime($movies['duration'])) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="<?=site_url('lifestyle/movies/details/'.$movies['movieslug'])?>" class="btn btn-info btn-join">buy ticket</a>
                            </div>
                        </div>

        <?php if($count<=8): ?>

        <?php endif; ?>
    <?php $count++; ?>
    <?php endforeach; ?>

    <?php if($moviecount>9): ?>
                        <div class="col-lg-12 text-center showmore mb-20">
                            <a class="loadmore" href="<?= site_url('lifestyle/movieshowmore/1')?>" ><h6>Load More</h6></a>
                        </div>
    <?php endif; ?>
<?php else: ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-20">
                            <h1>No Record </h1>
                        </div>
<?php endif; ?>

                        
                    </div>

                    <!-- End Events Div -->
                </div>
            </div>
