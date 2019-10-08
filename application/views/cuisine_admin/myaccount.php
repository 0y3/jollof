                    
                    <div class="">
                        <div class="">
                            <div class="card-body">
                                <form class="form" id="myaccount_data"  action="" method="post">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" name="user_firstname" value="<?=$userinfo->firstname?>" class="form-control" placeholder="First name" aria-label="Username" aria-describedby="basic-addon11" required="">
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <label>Last Name</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" name="user_lastname" value="<?=$userinfo->lastname?>" class="form-control" placeholder="Last name" aria-label="Username" aria-describedby="basic-addon11" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon22"><i class="ti-email"></i></span>
                                            </div>
                                            <input type="email" name="user_email" value="<?=$userinfo->email?>" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon22" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telephone</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon22"><i class="ti-mobile"></i></span>
                                            </div>
                                            <input type="text" name="user_phone" value="<?=$userinfo->phonenumber?>" class="form-control cu_phone_js" placeholder="+23480 ___ __ ___ ">
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success m-r-10">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>