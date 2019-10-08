                
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <small class="text-muted">Name </small>
                                <h6><?= $customerinfo['firstname']?> <?= $customerinfo['lastname']?></h6>

                                <small class="text-muted">Gender</small>
                                <h6><?= $customerinfo['gender']?></h6>

                                <small class="text-muted">Point</small>
                                <h6><?= $customerinfo['point']?></h6>

                                <small class="text-muted">Email address </small>
                                <h6><?= $customerinfo['email']?></h6>

                                <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?= $customerinfo['phone']?> , <?= $customerinfo['phone2']?></h6> 

                                <small class="text-muted">Status</small>
                                <?php 
                                    if($customerinfo['status']==1)
                                    { 
                                        $status="success";
                                        $dataliststatus = 'Active User';
                                    }
                                    else
                                    { 
                                        $status="danger";
                                        $dataliststatus = 'In-Active User';
                                    }
                                ?>
                                <h6><span class="label label-<?=$status?>"><?=$dataliststatus ?> </span></h6>
                                <!--
                                <small class="text-muted p-t-30 db">Address</small>
                                <h6><?= $customerinfo['address']?> <br>
                                    <?= $merchantcity['cityname']?>,<br>
                                    <?= $merchantstate['statename']?>.
                                </h6>
                            -->
                                
                                <small class="text-muted p-t-30 db"></small>
                                <br/>
                                <button class="btn btn-circle btn-info" data-get="<?=$customerinfo['id']?>" data-toggle="tooltip" title="Resend Activation Email"><i class="fa fa-envelope"></i></button>

                                <button class="btn btn-circle btn-warning m-l-10" data-get="<?=$customerinfo['id']?>" data-toggle="tooltip" title="Reset Password Email"><i class="fa fa-envelope"></i></button>
                               <!-- <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>-->
                            </div>
                            
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tabs -->
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                <!--<li class="nav-item">
                                    <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Timeline</a>
                                </li>-->
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url("jollofadmin/customers/orders/$customerinfo[id]")?>" >Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url("jollofadmin/customers/deliveryaddress/$customerinfo[id]")?>" >Delivery Address</a>
                                </li>
                            </ul>
                            <!-- Tabs -->
                            
                                
                                <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                    <div class="card-body">
                                        <form id="rest_data"  action="<?=site_url("jollofadmin/customers/usersedit/$customerinfo[id]")?>" method="post" class="merchant_form form-horizontal form-material" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-md-12">Name </label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" name="firstname" placeholder="First name" value="<?= $customerinfo['firstname']?>" class="form-control form-control-line" required="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="lastname" placeholder="Last name" value="<?= $customerinfo['lastname']?>" class="form-control form-control-line" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Points</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="point" placeholder="Customer Points" value="<?= $customerinfo['point']?>" class="form-control form-control-line cu_phone_js" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" name="phone" placeholder="Phone no" value="<?= $customerinfo['phone']?>" class="form-control form-control-line cu_phone_js" required="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="phone2" placeholder="Mobile no" value="<?= $customerinfo['phone2']?>" class="form-control form-control-line cu_phone_js" >
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Gender</label>
                                                        <br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline3" name="gender" value="male" class="custom-control-input" required=""  <?php if($customerinfo['gender']=='male') echo 'checked';?> >
                                                            <label class="custom-control-label" for="customRadioInline3">Male</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline4" name="gender"  required=""  <?php if($customerinfo['gender']=='female') echo 'checked';?> value="female" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadioInline4">Female</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label>Status</label>
                                                        <br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline1" name="status" value="1" class="custom-control-input" required=""  <?php if($customerinfo['status']==1) echo 'checked';?> >
                                                            <label class="custom-control-label  text-success" for="customRadioInline1">Active</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline2" name="status"  required=""  <?php if($customerinfo['status']==0) echo 'checked';?> value="0" class="custom-control-input">
                                                            <label class="custom-control-label text-danger" for="customRadioInline2">In-Active</label>
                                                        </div>
                                                    </div>

                                                    
                                                </div>
                                            </div>

                                            
                                            <hr>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button id="location_save" class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>