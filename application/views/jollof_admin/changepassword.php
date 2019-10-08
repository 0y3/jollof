                    
                    <div class="">
                        <div class="">
                            <div class="card-body">
                                <form class="form" id="changepassword_data"  action="" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon22"><i class="ti-email"></i></span>
                                            </div>
                                            <input type="email" name="user_email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon22" value="<?=$userinfo->email?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" name="old_password" class="form-control" placeholder="Old Password" aria-label="Password" aria-describedby="basic-addon33" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                                            </div>
                                            <input id="pwd" type="password" name="new_password" class="form-control" placeholder="New Password" aria-label="Password" aria-describedby="basic-addon33" required="">
                                            <div id="message_c" class="invalid-feedback">Sorry, that username's taken. Try another?</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon4"><i class="ti-lock"></i></span>
                                            </div>
                                            <input id="cfmpwd" type="password" name="cnf_password" class="form-control" placeholder="Confirm Password" aria-label="Password" aria-describedby="basic-addon4" required="">
                                            <div id="message" class="invalid-feedback">Sorry, that username's taken. Try another?</div>
                                        </div>
                                    </div>
                                    
                                    <button id="saveit" type="submit" class="btn btn-success m-r-10">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>