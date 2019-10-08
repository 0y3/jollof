
    
        <div class=" col-md-12">


                <?php
                    if(isset($customeraddinfo))
                    { 
                        $action='addressedit';
                        $savename='Update Address';
                    }
                    else{ 
                        $action='addresssave';
                        $savename='Save Address';

                    }
                ?>
                <form id="cate_form" action="<?= site_url('jollofadmin/customers/'.$action) ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-md-12">Customer Name </label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" value="<?= $customerinfo['firstname'].' '. $customerinfo['lastname'] ?> " class="form-control form-control-line" readonly="">
                                <input type="hidden" name="id" value="<?= $customerinfo['id'] ?>" readonly="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Address Name </label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="firstname" placeholder="First name" value="<?php if(isset($customeraddinfo)) echo $customeraddinfo['firstname'];?>" class="form-control form-control-line" required="">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="lastname" placeholder="Last name" value="<?php if(isset($customeraddinfo)) echo $customeraddinfo['lastname']?>" class="form-control form-control-line" required="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12">Phone</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="phone" placeholder="Phone no" value="<?php if(isset($customeraddinfo)) echo $customeraddinfo['phone']?>" class="form-control form-control-line cu_phone_js" required="">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone2" placeholder="Mobile no" value="<?php if(isset($customeraddinfo)) echo $customeraddinfo['phone2']?>" class="form-control form-control-line cu_phone_js" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Street Address</label>
                        <div class="col-md-">
                            <textarea class="form-control form-control-line" name="address" placeholder="Street Address" rows="2" required=""><?php if(isset($customeraddinfo)) echo $customeraddinfo['address']?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Location</label>
                        <div class="row">
                            <div class="col-md-6">
                                <select id="state_div" name="stateid" class="form-control form-control-line" required="">
                                    <?php if(!empty($state)): ?>
                                        <option value="">Select State</option>
                                        
                                        <?php foreach ($state as $state_list) :?>

                                            <?php if(isset($customeraddinfo) && $customeraddinfo['stateid'] == $state_list['id'] ): ?>
                                                <option value="<?= $state_list['id'] ?>" selected="" ><?= $state_list['statename'] ?></option>
                                            <?php else: ?>
                                                <option value="<?= $state_list['id'] ?>"><?= $state_list['statename'] ?></option>
                                            <?php endif; ?>

                                        <?php endforeach;?>
                                    <?php else: ?>
                    
                                        <option value="">State not available</option>

                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                 <select id="city_div" name="cityid" class="form-control form-control-line" value=" <?php if(isset($customeraddinfo)) echo $customeraddinfo['cityid']?>" required="">

                                    <?php if(isset($customeraddinfo)): ?>
                                            <?php foreach ($city as $city_list) :?>
                                                <?php if($customeraddinfo['cityid'] == $city_list['id']): ?>
                                                    <option value="<?= $city_list['id'] ?>" selected="" ><?= $city_list['cityname'] ?></option>
                                                <?php else: ?>
                                                    <option value="<?= $city_list['id']?>" ><?= $city_list['cityname']?></option>
                                                <?php endif; ?>
                                            <?php endforeach;?>

                                    <?php endif; ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <?php if(isset($customeraddinfo)): ?>
                    <div class="form-group">
                        <div class="row">

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
                    <?php endif; ?>
                    
                    <hr>
                    
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button id="location_save" class="btn btn-success"><?=$savename?></button>
                        </div>
                    </div>

                </form>
            </div>
                               
                           