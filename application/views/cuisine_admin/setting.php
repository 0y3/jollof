                
<style>
    .O_Uplode {
        position: relative;
    }
    .UplodeIcon {
        position: absolute;
        top: 8px;
        left: 20px;
        font-size: 20px;
    }
    .form-style-base {
        position: absolute;
        top: 0px;
        z-index: 999;
        opacity: 0;
        cursor: pointer;
    }
    .form-style-fake {
        top: 0px;
        padding-left: 50px;
    }
    .Prd_UploadView {
        border: 2px dashed #eaedf1;
        background-color: #eee;
        padding: 10px;
        display:none;
        position:relative;
    }
    .Prd_UploadView img{
        max-width: 100px;
        max-height: 90px;
    }
    .logo_UploadView{
        border: 2px dashed #eaedf1;
        background-color: #eee;
        padding: 10px;
        position:relative;
    }
    .logo_UploadView img{
        max-width: 100px;
        max-height: 90px;
    }
    .Gp_rmv {
        position: absolute;
        top: 0px;
        left: 105px;
        color: #F30;
        cursor: pointer;
    }
</style>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <form id="rest_data"  action="" method="post" class="cuisinestore_form form-horizontal form-bordered" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Store Info</h4>
                                </div>
                                <hr>
                                <div class="form-body">
                                    <div class="card-body">
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Store Name</label>
                                                            <input type="text" id="Name" name="store_name" class="form-control" placeholder="" value="<?= $rest_info->companyname ?>" required="">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Short Description</label>
                                                            <textarea id="product-short-description" name="store_desc" class="form-control" rows="2"><?= $rest_info->companydesc ?></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Email</label>
                                                            <input type="email" id="Name" name="" class="form-control" placeholder="" readonly="" value="<?= $rest_info->email ?>" required="">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Telephone</label>
                                                            <input type="text" id="Name" name="store_phone1"  class="cu_phone_js form-control" placeholder="" required="" value="<?= $rest_info->phone ?>">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Mobile</label>
                                                            <input type="text" id="Name" name="store_phone2" class="cu_phone_js form-control" placeholder="" value="<?= $rest_info->phone2 ?>">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group has-danger">
                                                            <label class="control-label">Logo</label>
                                                            <div class="col-md-8">

                                                                <div class="O_Uplode">
                                                                    <input type="file" name="store_logo" accept="image/*" id="base-input" class="form-control form-input form-style-base GetUpload">
                                                                    <input type="text" id="fake-input" class="form-control form-input form-style-fake" placeholder="Choose your Image" readonly="" accept="image/jpeg">
                                                                    <span class="glyphicon glyphicon-upload UplodeIcon"></span>
                                                                </div>

                                                                <div class="logo_UploadView">

                                                                    <img class="UploadView" src="<?= base_url()?>assets/uploads/rest_logo/<?= $rest_info->logo ?>" width="100" height="100">
                                                                    <span class="Gp_rmv RemoveUpload" data-placement="top" data-toggle="tooltip" title="Remove Cover pics" data-get="<?= $rest_info->logo ?>"><i class="ti-trash"></i></span>
                                                                    <input type="hidden" name="store_logoimage" class="cart_suball_price" value="<?= $rest_info->logo ?>" readonly="">  
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Activate Restaurant Online</label>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio11" name="store_status" class="custom-control-input" <?php if($rest_info->status==1) echo 'checked';?> value="1" required="">
                                                                <label class="custom-control-label text-success" for="customRadio11">Active</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio22" name="store_status" class="custom-control-input" <?php if($rest_info->status==0) echo 'checked';?> value="0" required="">
                                                                <label class="custom-control-label text-danger" for="customRadio22">In-Active</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Activate Restaurant Table Reservation</label>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio33" name="store_table" class="custom-control-input" <?php if($rest_info->tablereservation==1) echo 'checked';?> value="1" required="">
                                                                <label class="custom-control-label text-success" for="customRadio33">Active</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio44" name="store_table" class="custom-control-input" <?php if($rest_info->tablereservation==0) echo 'checked';?> value="0" required="">
                                                                <label class="custom-control-label text-danger" for="customRadio44">In-Active</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        
                                        <h4 class="card-title m-t-40">Address</h4>
                                        <hr>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
                                                        <label>Street</label>
                                                        <input name="store_add" type="text" class="form-control lat_add" value="<?= $rest_info->address ?>" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <select id="state_div" name="store_state" class="form-control custom-select" data-placeholder="<?= $rest_info->statename ?>" value="<?= $rest_info->stateid ?>" required="">
                                                            
                                                            <?php if(!empty($rest_state)): ?>

                                                                    <?php foreach ($rest_state as $state_list) :?>
                                                                        <?php if($rest_info->stateid == $state_list->id): ?>
                                                                            <option value="<?= $state_list->id ?>" selected="" ><?= $state_list->statename ?></option>
                                                                        <?php else: ?>
                                                                            <option value="<?= $state_list->id ?>" ><?= $state_list->statename ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endforeach;?>
                                                                <?php else: ?>

                                                                    <option value="<?= $rest_info->stateid ?>" ><?= $rest_info->statename ?></option>

                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 location">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <select id="city_div" name="store_city" class="form-control custom-select" data-placeholder="<?= $rest_info->cityname ?>" value="<?= $rest_info->cityid ?>" required="">
                                                            <?php if(!empty($rest_state)): ?>

                                                                    <?php foreach ($rest_city as $city_list) :?>
                                                                        <?php if($rest_info->cityid == $city_list->id): ?>
                                                                            <option value="<?= $city_list->id ?>" selected="" ><?= $city_list->cityname ?></option>
                                                                        <?php else: ?>
                                                                            <option value="<?= $city_list->id ?>" ><?= $city_list->cityname ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endforeach;?>
                                                                <?php else: ?>

                                                                    <option value="<?= $rest_info->cityid ?>" ><?= $rest_info->cityname ?></option>

                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/row-->
                                            <div>
                                                <input type="hidden" name="latitude" id="latitude"  required="" value="<?= $rest_info->latitude ?>"  readonly />
                                                <input type="hidden" name="longitude" id="longitude" required="" value="<?= $rest_info->longitude ?>" readonly />
                                            </div>
                                        </div>

                                        <h4 class="card-title m-t-40">Payment Form</h4>
                                        <hr>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label>Payment Type </label>
                                                        <select id="" name="store_paymenttype" class="form-control custom-select" required="">
                                                            <option value="" >--Select A Payment Option --</option>
                                                            <option value="Day" <?php if($rest_info->paymenttype=='Day') echo 'selected';?> >Daily</option>
                                                            <option value="Week" <?php if($rest_info->paymenttype=='Week') echo 'selected';?> >Weekly</option>
                                                            <option value="Month" <?php if($rest_info->paymenttype=='Month') echo 'selected';?> >Monthly</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label>Bank Name </label>
                                                        <select id="" name="store_bankName" class="form-control custom-select" required="">
                                                            <?php if(!empty($banks)): ?>

                                                                    <option value="" ></option>
                                                                    <?php foreach ($banks['data'] as $bank_list) :?>
                                                                        <?php if($rest_info->bankName == $bank_list['code']): ?>
                                                                            <option value="<?= $bank_list['name']  ?>" selected="" ><?= $bank_list['name']  ?></option>
                                                                        <?php else: ?>
                                                                            <option value="<?= $bank_list['name']  ?>" ><?= $bank_list['name'] ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endforeach;?>

                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Account Number</label>
                                                        <input type="text" id="" name="store_accountNo"  class="cu_phone_js form-control" placeholder="" required="" value="<?= $rest_info->accountNo ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 location">
                                                    <div class="form-group">
                                                        <label>Account Name </label>
                                                        <input type="text" id="" name="store_accountName"  class=" form-control" placeholder="" required="" value="<?= $rest_info->accountName ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <div class="form-actions">
                                            <div class="card-body">
                                                <button type="submit" id="" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>