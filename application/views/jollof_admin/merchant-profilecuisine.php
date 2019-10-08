                
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30">
                                <?php if($merchantinfo['merchanttype']=='cuisine'): ?>
                                <img src="<?= site_url('assets/uploads/rest_logo/'.$merchantinfo['logo'])?>" class="rounded-circle" width="150" height="150"  />
                                <?php elseif($merchantinfo['merchanttype']=='fashion'): ?>
                                <img src="<?= site_url('assets/uploads/fashion_logo/'.$merchantinfo['logo'])?>" class="rounded-circle" width="150" height="150" />
                                <?php endif; ?>
                                    <h4 class="card-title m-t-10"><?= $merchantinfo['companyname']?></h4>
                                    <!--<h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div>-->
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body">
                                <small class="text-muted">Email address </small>
                                <h6><?= $merchantinfo['email']?></h6>

                                <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?= $merchantinfo['phone']?> , <?= $merchantinfo['phone2']?></h6> 

                                <small class="text-muted p-t-30 db">Address</small>
                                <h6><?= $merchantinfo['address']?> <br>
                                    <?= $merchantcity['cityname']?>,<br>
                                    <?= $merchantstate['statename']?>.
                                </h6>

                                <div class="map-box">
                                    <iframe src="https://maps.google.com/maps?q=<?= $merchantinfo['latitude']?>,<?= $merchantinfo['longitude']?>&hl=en&z=18&amp;output=embed" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                                   <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                                </div> 

                                <button class="btn btn-circle btn-secondary b2b_resendActivationEmail" data-get="<?=$merchantinfo['id']?>" data-toggle="tooltip" title="Resend Activation Email"><i class="fa fa-envelope"></i></button>

                                <button class="btn btn-circle btn-warning m-l-10 b2b_resetPasswordEmail" data-get="<?=$merchantinfo['id']?>" data-toggle="tooltip" title="" data-original-title="Reset Password Email"><i class="fa fa-envelope"></i></button>
                                <!--<small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
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
                                    <a class="nav-link active " id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('jollofadmin/merchants/b2bproducts/').$merchantinfo['slug']?>" >Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('jollofadmin/merchants/b2borders/').$merchantinfo['slug']?>" >Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('jollofadmin/merchants/b2busers/').$merchantinfo['slug']?>" >Users</a>
                                </li
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('jollofadmin/merchants/b2bpromos/').$merchantinfo['slug']?>" >Promos</a>
                                </li>
                            </ul>
                            <!-- Tabs -->
                            <!--
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                    <div class="card-body">
                                        <div class="profiletimeline m-t-0">
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a></p>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="../../assets/images/big/img1.jpg" class="img-fluid rounded" /></div>
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="../../assets/images/big/img2.jpg" class="img-fluid rounded" /></div>
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="../../assets/images/big/img3.jpg" class="img-fluid rounded" /></div>
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="../../assets/images/big/img4.jpg" class="img-fluid rounded" /></div>
                                                        </div>
                                                        <div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../../assets/images/users/2.jpg" alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div> <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <div class="m-t-20 row">
                                                            <div class="col-md-3 col-xs-12"><img src="../../assets/images/big/img1.jpg" alt="user" class="img-fluid rounded" /></div>
                                                            <div class="col-md-9 col-xs-12">
                                                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="javascript:void(0)" class="btn btn-success"> Design weblayout</a></div>
                                                        </div>
                                                        <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../../assets/images/users/3.jpg" alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                                    </div>
                                                    <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../../assets/images/users/4.jpg" alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <blockquote class="m-t-10">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--
                                <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">Johnathan Deo</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">(123) 456 7890</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">johnathan@admin.com</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                                <br>
                                                <p class="text-muted">London</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        <h4 class="font-medium m-t-30">Skill Set</h4>
                                        <hr>
                                        <h5 class="m-t-30">Wordpress <span class="pull-right">80%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">Photoshop <span class="pull-right">70%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                    </div>
                                </div>
                                -->
                                <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                    <div class="card-body">
                                        <form id="rest_data"  action="" method="post" class="merchant_form form-horizontal form-material" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-md-12">Merchant Name </label>
                                                <div class="col-md-12">
                                                    <input type="text" name="companyname" value="<?= $merchantinfo['companyname']?>" class="form-control form-control-line" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" value="<?= $merchantinfo['email']?>" class="form-control form-control-line" readonly="" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone no</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="phone" value="<?= $merchantinfo['phone']?>" class="form-control form-control-line cu_phone_js" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Mobile no</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="phone2" value="<?= $merchantinfo['phone2']?>" class="form-control form-control-line cu_phone_js" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Address</label>
                                                <div class="col-md-12">
                                                    <textarea rows="2" name="address" required="" class="lat_add form-control form-control-line"><?= $merchantinfo['address']?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Select State</label>
                                                <div class="col-sm-12">
                                                    <select id="state_div" name="stateid" class="form-control form-control-line"  value="<?= $merchantinfo['stateid']?>" required="">
                                                        
                                                        <?php if(!empty($rest_state)): ?>

                                                                <?php foreach ($rest_state as $state_list) :?>
                                                                    <?php if($merchantinfo['stateid'] == $state_list['id']): ?>
                                                                        <option value="<?= $state_list['id'] ?>" selected="" ><?= $state_list['statename'] ?></option>
                                                                    <?php else: ?>
                                                                        <option value="<?= $state_list['id'] ?>" ><?= $state_list['statename'] ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach;?>
                                                            <?php else: ?>

                                                                <option value="<?= $merchantinfo['stateid'] ?>" ><?= $merchantinfo['stateid'] ?></option>

                                                        <?php endif; ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Select City</label>
                                                <div class="col-sm-12">
                                                    <select id="city_div" name="cityid" class="form-control form-control-line" value=" <?= $merchantinfo['cityid']?>" required="">
                                                        <?php if(!empty($rest_state)): ?>

                                                                <?php foreach ($rest_city as $city_list) :?>
                                                                    <?php if($merchantinfo['cityid'] == $city_list['id']): ?>
                                                                        <option value="<?= $city_list['id'] ?>" selected="" ><?= $city_list['cityname'] ?></option>
                                                                    <?php else: ?>
                                                                        <option value="<?= $city_list['id']?>" ><?= $city_list['cityname']?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach;?>
                                                            <?php else: ?>

                                                                <option value="<?=  $merchantinfo['cityid'] ?>" ><?= $merchantstate['statename']?></option>

                                                        <?php endif; ?>
                                                    </select>

                                                </div>

                                            </div>
                                            <?php if($merchantinfo['merchanttype']=='cuisine'): ?>
                                            <div class="form-group">
                                                 <label class="col-sm-12">Store Description</label>
                                                 <div class="col-md-12">
                                                    <textarea rows="2" name="companydesc" required="" class="lat_add form-control form-control-line"><?= $merchantinfo['companydesc']?></textarea>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <div>
                                                <input type="hidden" name="latitude" id="latitude"  value="<?= $merchantinfo['latitude'] ?>" readonly />
                                                <input type="hidden" name="longitude" id="longitude"  value="<?= $merchantinfo['longitude'] ?>" readonly />
                                                <input type="hidden" name="id" value="<?= $merchantinfo['id']?>" readonly />
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Status</label>
                                                        <br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline1" name="status" value="1" class="custom-control-input" required=""  <?php if($merchantinfo['status']==1) echo 'checked';?> >
                                                            <label class="custom-control-label  text-success" for="customRadioInline1">Active</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline2" name="status"  required=""  <?php if($merchantinfo['status']==0) echo 'checked';?> value="0" class="custom-control-input">
                                                            <label class="custom-control-label text-danger" for="customRadioInline2">In-Active</label>
                                                        </div>
                                                    </div>

                                                    <?php if($merchantinfo['merchanttype']=='cuisine'): ?>  

                                                    <div class="col-md-6">
                                                        <label>Table Reservation Status</label>
                                                        <br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline3" name="tablereservation"  required=""  <?php if($merchantinfo['tablereservation']==1) echo 'checked';?> value="1" class="custom-control-input">
                                                            <label class="custom-control-label  text-success" for="customRadioInline3">Active</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline4"name="tablereservation"  required=""  <?php if($merchantinfo['tablereservation']==0) echo 'checked';?> value="0" class="custom-control-input">
                                                            <label class="custom-control-label text-danger" for="customRadioInline4">In-Active</label>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                            <hr>

                                            <div class="form-group">
                                                <label class="col-md-12">Merchant Payment Type </label>
                                                <div class="col-md-12">
                                                    <select id="" name="paymenttype" class="form-control custom-select" required="">
                                                        <option value="" >--Select A Payment Option --</option>
                                                        <option value="Day" <?php if($merchantinfo['paymenttype']=='Day') echo 'selected';?> >Daily</option>
                                                        <option value="Week" <?php if($merchantinfo['paymenttype']=='Week') echo 'selected';?> >Weekly</option>
                                                        <option value="Month" <?php if($merchantinfo['paymenttype']=='Month') echo 'selected';?> >Monthly</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Merchant BankName </label>
                                                <div class="col-md-12">
                                                    <select id="city_div" name="bankName" class="form-control form-control-line" value=" <?= $merchantinfo['paystackbanksid']?>" required="">
                                                        <?php if(!empty($banks)): ?>

                                                                <option value="" ></option>
                                                                <?php foreach ($banks['data'] as $bank_list) :?>
                                                                    <?php if($merchantinfo['bankName'] == $bank_list['code']): ?>
                                                                        <option value="<?= $bank_list['name'] ?>" selected="" ><?= $bank_list['name'] ?></option>
                                                                    <?php else: ?>
                                                                        <option value="<?= $bank_list['name'] ?>" ><?= $bank_list['name'] ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach;?>
                                                            <?php else: ?>

                                                                <option value="<?=  $merchantinfo['bankName'] ?>" ><?= $merchantstate['bankName']?></option>

                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Account Name </label>
                                                <div class="col-md-12">
                                                    <input type="text" name="accountName" value="<?= $merchantinfo['accountName']?>" class="form-control form-control-line" required="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Account Number </label>
                                                <div class="col-md-12">
                                                    <input type="text" name="accountNo" value="<?= $merchantinfo['accountNo']?>" class="form-control form-control-line cu_phone_js" required="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Merchant % Charges </label>
                                                <div class="col-md-12">
                                                    <input type="number" name="percharge" value="<?= $merchantinfo['percharge']?>" class="form-control form-control-line" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Merchant % Charges Status</label>
                                                <br>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline5" name="perchargestatus"  required=""  <?php if($merchantinfo['perchargestatus']==1) echo 'checked';?> value="1" class="custom-control-input">
                                                    <label class="custom-control-label  text-success" for="customRadioInline5">Active</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline6"name="perchargestatus"  required=""  <?php if($merchantinfo['perchargestatus']==0) echo 'checked';?> value="0" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline6">In-Active</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button id="" type="submit" class="btn btn-success">Update Profile</button>
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