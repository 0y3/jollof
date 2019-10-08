
<style>
    .nopad {
        padding-left: 0;
        padding-right: 0;
    }
    
  .time_div input {
    background-color: inherit;
    border-top: none !important;
    border-right: none !important;
    border-left: none !important;
    border-bottom: 1px dotted #2d344f !important;
    border-radius: 0px;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;
    box-shadow: none !important;
    -webkit-transition: none !important;
    -moz-transition: none !important;
    height: 25px;
}



.chzn-choices {
    background-color: #fff;
    background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, color-stop(1%, #eeeeee), color-stop(15%, #ffffff));
    background-image: -webkit-linear-gradient(top, #eeeeee 1%, #ffffff 15%);
    background-image: -moz-linear-gradient(top, #eeeeee 1%, #ffffff 15%);
    background-image: -o-linear-gradient(top, #eeeeee 1%, #ffffff 15%);
    background-image: -ms-linear-gradient(top, #eeeeee 1%, #ffffff 15%);
    background-image: linear-gradient(top, #eeeeee 1%, #ffffff 15%);
    /*border: 1px solid #aaa;*/
    border: 1px solid #ccc;
    border-radius: 4px;
    margin: 0;
    padding: 2px 5px;
    cursor: text;
    overflow: hidden;
    height: auto !important;
    height: 1%;
    position: relative;
}

 .chzn-choices li {
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    background-color: #e4e4e4;
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f4f4f4', endColorstr='#eeeeee', GradientType=0 );
    background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, color-stop(20%, #f4f4f4), color-stop(50%, #f0f0f0), color-stop(52%, #e8e8e8), color-stop(100%, #eeeeee));
    background-image: -webkit-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
    background-image: -moz-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
    background-image: -o-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
    background-image: -ms-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
    background-image: linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
    -webkit-box-shadow: 0 0 2px #ffffff inset, 0 1px 0 rgba(0,0,0,0.05);
    -moz-box-shadow: 0 0 2px #ffffff inset, 0 1px 0 rgba(0,0,0,0.05);
    box-shadow: 0 0 2px #ffffff inset, 0 1px 0 rgba(0,0,0,0.05);
    color: #333;
    border: 1px solid #aaaaaa;
    line-height: 13px;
    padding: 3px 20px 3px 5px;
    margin: 3px 0 3px 5px;
    position: relative;
    cursor: default;
    display: inline-block;
}
.chzn-choices li {
    float: left;
    list-style: none;
}

.search-choice-close {
    display: block;
    position: absolute;
    right: 3px;
    top: 4px;
    width: 12px;
    height: 13px;
    color: red;
}

</style>
<div class="row">

    <div class="col-sm-6 col-md-4">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-cutlery"></i> <strong>Restaurant</strong> Data</h2>

            </div>

            <form id="rest_data"  action="<?= site_url('restaurant_admin/update_restaurant_data') ?>" method="post" class="prd_form form-horizontal form-bordered" enctype="multipart/form-data">

                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>
                
                <div class="form-group">

                    <label class="col-md-3 control-label" for="r_name">Name</label>

                    <div class="col-md-9">

                        <input type="text" id="product-name" name="r_name" class="form-control" value="<?= $rest_data->companyname ?>"  required="">

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-3 control-label" for="r_desc">Short Description</label>

                    <div class="col-md-9">

                        <textarea id="product-short-description" name="r_desc" class="form-control" rows="2"><?= $rest_data->companydesc ?></textarea>

                    </div>

                </div>

                

                <div class="form-group">

                    <label class="col-md-3 control-label" >Minimum Order</label>

                    <div class="col-md-8">

                        <div class="input-group">

                            <div class="input-group-addon"><i class="fa fa-money"></i></div>

                            <input type="number" id="product-price" min="0" name="r_minorder" class="form-control" placeholder="0,000" value="<?= $rest_data->minorder ?>" >

                        </div>

                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-3 control-label" >Delivery Time</label>

                    <div class="col-md-8">
                        
                        <input type="text" name="del_time" id="" class="form-control del_time" placeholder="Hour : Min" value="<?= $rest_data->deliverytime ?>" >

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-3 control-label" for="product-price">Logo</label>

                    <div class="col-md-8">

                        <div class="O_Uplode">
                            <input type="file" name="r_logo" accept="image/*" onchange="GetUpload(this);" id="base-input" class="form-control form-input form-style-base">
                            <input type="text" id="fake-input" class="form-control form-input form-style-fake" placeholder="Choose your Image" readonly="" accept="image/jpeg">
                            <span class="glyphicon glyphicon-upload UplodeIcon"></span>
                        </div>
                        
                        <div class="logo_UploadView">
                            
                            <img class="UploadView" src="<?= base_url()?>assets/uploads/rest_logo/<?= $rest_data->logo ?>" width="100%" height="100%" />
                            <span class="Gp_rmv" onclick="RemoveUpload();" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><span class="glyphicon glyphicon-trash"></span></span>
                                
                        </div>

                    </div>
                    
                </div>
                
                

                <div class="form-group form-actions">

                    <div class="col-md-9 col-md-offset-3 div_reset">

                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                        
                    </div>

                </div>

            </form>

        </div>

    </div>
    
    <div class="col-sm-6 col-md-4">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-map-marker"></i> <strong>Location</strong> Data</h2>

            </div>

            <form id="loc_data" action="<?= site_url('restaurant_admin/update_location_data') ?>" method="post" class="prd_form form-horizontal form-bordered" enctype="multipart/form-data">

                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>
                
                
                <div class="form-group">

                    <label class="col-md-3 control-label" >Address</label>

                    <div class="col-md-9">

                        <textarea id="product-short-description" name="r_add" class="form-control address_loc" rows="2"><?= $rest_data->address ?></textarea>

                    </div>

                </div>

                
                <div class="form-group">

                    <label class="col-md-3 control-label" >State</label>

                    <div class="col-md-8">

                        
                        <select id="state_div" name="r_state" class="form-control" data-placeholder="<?= $rest_data->statename ?>" value="<?= $rest_data->stateid ?>" style="width: 250px;" required="">
                            <option value="<?= $rest_data->stateid ?>" ><?= $rest_data->statename ?></option>
                            <?php if(!empty($rest_state)): ?>
                                    <option></option>
                                    
                                    <?php foreach ($rest_state as $state_list) :?>
                                        <option value="<?= $state_list->id ?>"><?= $state_list->statename ?></option>
                                    
                                    <?php endforeach;?>
                                <?php else: ?>
                
                                    <option ><?= $rest_data->statename ?></option>

                            <?php endif; ?>
                            
                            
                        </select>

                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-3 control-label" >City</label>

                    <div class="col-md-8" id="city_div">
                        
                        <select id="city_div1" name="r_city" class="form-control" data-placeholder="<?= $rest_data->cityname ?>" value="<?= $rest_data->cityid ?>" style="width: 250px;" required="">
                            <option value="<?= $rest_data->cityid ?>" ><?= $rest_data->cityname ?></option>  
                            <?php if(!empty($rest_city)): ?>
                                    <option></option>
                                    
                                    <?php foreach ($rest_city as $city_list) :?>
                                        <option value="<?= $city_list->id ?>"><?= $city_list->cityname ?></option>
                                    
                                    <?php endforeach;?>
                                <?php else: ?>
                
                                    <option ><?= $rest_data->cityname ?></option>

                            <?php endif; ?>
                                    
                        </select>
                        
                    </div>

                </div>
                
                
                <div class="form-group">

                    <label class="col-md-3 control-label" for="r_email">Email</label>

                    <div class="col-md-9">

                        <input type="email" id="product-name" name="r_email" class="form-control" value="<?= $rest_data->email ?>"  required="">

                    </div>

                </div>
                
                 <div class="form-group">

                    <label class="col-md-3 control-label" for="cell1">Tell</label>

                    <div class="col-md-9">

                        <input type="text" id="product-name" name="cell1" class="form-control cu_phone_js" value="<?= $rest_data->phone ?>"  required="">

                    </div>

                </div>


                <div class="form-group">

                    <label class="col-md-3 control-label" for="cell2">Mobile</label>

                    <div class="col-md-9">

                        <input type="text" id="last_name" name="cell2" class="form-control cu_phone_js" value="<?= $rest_data->phone2 ?>" >
                    </div>

                </div>
                
                <div>
                    <input type="hidden" name="latitude" id="latitude" readonly />
                    <input type="hidden" name="longitude" id="longitude" readonly />
                </div>
                <div class="form-group form-actions">

                    <div class="col-md-9 col-md-offset-3 div_reset">

                        <button id="location_save" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                        
                    </div>

                </div>

            </form>

        </div>

    </div>
    
    
    
    
        <!--Opening Time-->
    <div class="col-sm-6 col-md-4">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-clock-o"></i> <strong>Opening Time</strong> Data</h2>

            </div>

            
            <form id="ope_time" action="<?= site_url('restaurant_admin/update_time_data') ?>" method="post" class="prd_form form-horizontal form-bordered" enctype="multipart/form-data">

                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>
                
                    <!--Monday-->
                <div class="form-group time_div">
                    
                    <?php 
                        $status=NULL; $disabled=null; $open = null; $close = null;
                        
                        if(isset($rest_time))
                          {
                            $open = $rest_time->monopen ;
                            $close= $rest_time->monclose ;
                            
                            if ($rest_time->monstatus == 0)
                              {
                                $status = 'checked' ;
                                $disabled = 'readonly';
                              }
                          }
                    ?>

                    <label class="col-md-3 control-label" for="Monday">Monday</label>

                    <div id="" class="col-md-9 nopad">
                        
                        <div id="" class="col-sm-4 nopad">
                            
                            <input type="text" name="mon_o" id="" class="form-control div_time mon_time start_time" <?=$disabled?> value="<?=$open?>"  placeholder="Opening Hr" >
                        </div>
                        <div class="col-sm-1 nopad" style=" text-align: center;" >
                            to
                        </div>
                        <div id="" class="col-sm-4 nopad">
                            <input type="text" name="mon_c" id="" class="form-control div_time mon_time end" <?=$disabled?> value="<?=$close?>"  placeholder="Closing Hr">
                        </div>
                        <div>
                            
                            <input type="checkbox" name="dayof[]" <?=$status?> value="mon_n" > DayOf
                        </div>
                    </div>

                </div>

                
                    <!--Tuesday-->
                <div class="form-group time_div">
                    
                    <?php 
                        $status=NULL; $disabled=null; $open = null; $close = null;
                        
                        if(isset($rest_time))
                          {
                            $open = $rest_time->tueopen ;
                            $close= $rest_time->tueclose ;
                            
                            if ($rest_time->tuestatus == 0)
                              {
                                $status = 'checked' ;
                                $disabled = 'readonly';
                              }
                          }
                    ?>

                    <label class="col-md-3 control-label" for="Tuesday">Tuesday</label>

                    <div id="" class="col-md-9 nopad">
                        
                        <div id="" class="col-sm-4 nopad">
                            <input type="text" name="tue_o" id="" class="form-control div_time tue_time start_time" <?=$disabled?> value="<?=$open?>" placeholder="Opening Hr" >
                        </div>
                        <div class="col-sm-1 nopad" style=" text-align: center;" >
                            to
                        </div>
                        <div id="" class="col-sm-4 nopad">
                            <input type="text" name="tue_c" id="" class="form-control div_time tue_time end" <?=$disabled?> value="<?=$close?>" placeholder="Closing Hr">
                        </div>
                        <div>
                            <input type="checkbox" name="dayof[]" <?=$status?> value="tue_n"> DayOf
                        </div>
                    </div>

                </div>
                
                
                    <!--Wednesday-->
                <div class="form-group time_div">
                    
                    <?php 
                        $status=NULL; $disabled=null; $open = null; $close = null;
                        
                        if(isset($rest_time))
                          {
                            $open = $rest_time->wedopen ;
                            $close= $rest_time->wedclose ;
                            
                            if ($rest_time->wedstatus == 0)
                              {
                                $status = 'checked' ;
                                $disabled = 'readonly';
                              }
                          }
                    ?>

                    <label class="col-md-3 control-label" for="Wednesday">Wednesday</label>

                    <div id="" class="col-md-9 nopad">
                        
                        <div id="" class="col-sm-4 nopad">
                            <input type="text" name="wed_o" id="" class="form-control div_time wed_time start_time" <?=$disabled?> value="<?=$open?>" placeholder="Opening Hr" >
                        </div>
                        <div class="col-sm-1 nopad" style=" text-align: center;" >
                            to
                        </div>
                        <div id="" class="col-sm-4 nopad">
                            <input type="text" name="wed_c" id="" class="form-control div_time wed_time end" <?=$disabled?> value="<?=$close?>" placeholder="Closing Hr">
                        </div>
                        <div>
                            <input type="checkbox" name="dayof[]"<?=$status?> value="wed_n"> DayOf
                        </div>
                    </div>

                </div>
                
                    
                
                    <!--Thursday-->
                <div class="form-group time_div">
                    
                    <?php 
                        $status=NULL; $disabled=null; $open = null; $close = null;
                        
                        if(isset($rest_time))
                          {
                            $open = $rest_time->thuopen ;
                            $close= $rest_time->thuclose ;
                            
                            if ($rest_time->thustatus == 0)
                              {
                                $status = 'checked' ;
                                $disabled = 'readonly';
                              }
                          }
                    ?>

                    <label class="col-md-3 control-label" for="Thursday">Thursday</label>

                    <div id="" class="col-md-9 nopad">
                        
                        <div id="" class="col-sm-4 nopad">
                            <input type="text" name="thu_o" id="" class="form-control div_time thu_time start_time" <?=$disabled?> value="<?=$open?>" placeholder="Opening Hr " >
                        </div>
                        <div class="col-sm-1 nopad" style=" text-align: center;" >
                            to
                        </div>
                        <div id="" class="col-sm-4 nopad">
                            <input type="text" name="thu_c" id="" class="form-control div_time thu_time end" <?=$disabled?> value="<?=$close?>" placeholder="Closing Hr">
                        </div>
                        <div>
                            <input type="checkbox" name="dayof[]" <?=$status?> value="thu_n"> DayOf
                        </div>
                    </div>

                </div>
                
                    
                
                    <!--Friday-->
                <div class="form-group time_div">
                    
                    <?php 
                        $status=NULL; $disabled=null; $open = null; $close = null;
                        
                        if(isset($rest_time))
                          {
                            $open = $rest_time->friopen ;
                            $close= $rest_time->friclose ;
                            
                            if ($rest_time->fristatus == 0)
                              {
                                $status = 'checked' ;
                                $disabled = 'readonly';
                              }
                          }
                    ?>

                    <label class="col-md-3 control-label" for="Friday">Friday</label>

                    <div id="" class="col-md-9 nopad">
                        
                        <div id="" class="col-sm-4 nopad">
                            <input type="text" name="fri_o" id="" class="form-control div_time fri_time start_time" <?=$disabled?> value="<?=$open?>" placeholder="Opening Hr" >
                        </div>
                        <div class="col-sm-1 nopad" style=" text-align: center;" >
                            to
                        </div>
                        <div id="" class="col-sm-4 nopad">
                            <input type="text" name="fri_c" id="" class="form-control div_time fri_time end" <?=$disabled?> value="<?=$close?>" placeholder="Closing Hr">
                        </div>
                        <div>
                            <input type="checkbox" name="dayof[]" <?=$status?> value="fri_n"> DayOf
                        </div>
                    </div>

                </div>
                
                    
                
                    <!--Saturday-->
                <div class="form-group time_div">
                    
                    <?php 
                        $status=NULL; $disabled=null; $open = null; $close = null;
                        
                        if(isset($rest_time))
                          {
                            $open = $rest_time->satopen ;
                            $close= $rest_time->satclose ;
                            
                            if ($rest_time->satstatus == 0)
                              {
                                $status = 'checked' ;
                                $disabled = 'readonly';
                              }
                          }
                    ?>

                    <label class="col-md-3 control-label" for="Saturday">Saturday</label>

                    <div id="" class="col-md-9 nopad">
                        
                        <div id="" class="col-sm-4 nopad">
                            <input type="text" name="sat_o" id="" class="form-control div_time sat_time start_time" <?=$disabled?> value="<?=$open?>" placeholder="Opening Hr" >
                        </div>
                        <div class="col-sm-1 nopad" style=" text-align: center;" >
                            to
                        </div>
                        <div id="" class="col-sm-4 nopad">
                            <input type="text" name="sat_c" id="" class="form-control div_time sat_time end" <?=$disabled?> value="<?=$close?>" placeholder="Closing Hr">
                        </div>
                        <div>
                            <input type="checkbox" name="dayof[]" <?=$status?> value="sat_n"> DayOf
                        </div>
                    </div>

                </div>
                
                    
                
                    <!--Sunday-->
                <div class="form-group time_div">
                    
                    <?php 
                        $status=NULL; $disabled=null; $open = null; $close = null;
                        
                        if(isset($rest_time))
                          {
                            $open = $rest_time->sunopen ;
                            $close= $rest_time->sunclose ;
                            
                            if ($rest_time->sunstatus == 0)
                              {
                                $status = 'checked' ;
                                $disabled = 'readonly';
                              }
                          }
                    ?>

                    <label class="col-md-3 control-label" for="Sunday">Sunday</label>

                    <div id="" class="col-md-9 nopad">
                        
                        <div id="" class="col-sm-4 nopad">
                            <input type="text" name="sun_o" id="" class="form-control div_time sun_time start_time" <?=$disabled?> value="<?=$open?>" placeholder="Opening Hr" >
                        </div>
                        <div class="col-sm-1 nopad" style=" text-align: center;" >
                            to
                        </div>
                        <div id="" class="col-sm-4 nopad">
                            <input type="text" name="sun_c" id="" class="form-control div_time sun_time end" <?=$disabled?> value="<?=$close?>" placeholder="Closing Hr">
                        </div>
                        <div>
                            <input type="checkbox" name="dayof[]" <?=$status?> value="sun_n"> DayOf
                        </div>
                    </div>

                </div>

                

                
                <div class="form-group form-actions">

                    <div class="col-md-9 col-md-offset-3 div_reset">

                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                        
                    </div>

                </div>

            </form>

        </div>

    </div>
        
        
    <div class="col-sm-12">
        
        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-picture-o"></i> <strong>Restaurant</strong>Category</h2>

            </div>
            
            
            <form id="rest_cate"  action="<?= site_url('restaurant_admin/category_save') ?>" method="post" class="multiplecategory_form form-horizontal form-bordered" enctype="multipart/form-data">

                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>

                <div class="block-section">

                    <div class="form-group">

                       <label class="col-md-12 control-label" style="text-align: left;"> Restaurant Categories List </label>
                       <div class="col-md-12">
                           <?php if(!empty($rest_cusine)): ?>
                            <ul class="chzn-choices">
                                <?php foreach ($rest_cusine as $cusine_list) :?>
                                
                                    <li id="selectError1_chzn_c_1" data-getid="<?= $cusine_list->assigncat_id ?>">
                                        <span> <?= $cusine_list->categoryname ?> </span>
                                        <a href="javascript:void(0)" id="cate_del" data-cat_id="<?= $cusine_list->assigncat_id?>" data-cat_name="<?= $cusine_list->categoryname ?>"  data-toggle="tooltip" data-tooltip="true"  title="Delete" class="jboxtooltipp search-choice-close cate_del" rel="1"> <i class="fa fa-trash-o"></i></a>
                                    </li>

                                <?php endforeach;?>
                            </ul>
                            <?php else: ?>
                
                               No Restaurant Category.....
                               </br>

                            <?php endif; ?>
                               <a href="<?= site_url('restaurant_admin/new_cuisaine_cate') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal_addcate" data-container="modal_addcate" title="" style="background-color:#1bbae1; color: #FFF">
                                    <i class="fa fa-plus-circle"></i>&nbsp;Add Restaurant Category
                                </a>
                       </div>
                       
                    </div>
                    
                </div>
            </form>
        </div>
        
    </div>
        
        
    
    <div class="col-sm-12">
        
        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-picture-o"></i> <strong>Banner</strong>Image</h2>

            </div>
            
            
            <form id="rest_banner"  action="<?= site_url('restaurant_admin/update_restaurant_banner') ?>" method="post" class="prd_form form-horizontal form-bordered" enctype="multipart/form-data">

                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>

                <div class="block-section">

                    <div class="form-group">


                       <div class="col-md-12">

                           <div class="O_Uplode">
                               <input type="file" name="r_banner" accept="image/*" onchange="GetUpload_banner(this);" id="base-input_banner" class="form-control form-input form-style-base" >
                               <input type="text" id="fake-input_banner" class="form-control form-input form-style-fake" placeholder="Choose your Image" readonly="" accept="image/jpeg" >
                               <span class="glyphicon glyphicon-upload UplodeIcon"></span>
                           </div>

                           <div class="banner_UploadView">
                               
                               <?php
                                $img_ban = null;
                                if (!empty($rest_data->banner) )
                                    {
                                        $img_ban = 'uploads/rest_logo/'.$rest_data->banner;
                                    }
                                else
                                    {
                                        $img_ban = 'img/food.png';
                                    }
                               ?>

                               <img class="UploadView_banner" src="<?= base_url()?>assets/<?= $img_ban ?>" width="100%" height="100%" />
                               <span class="Gp_rmv_banner" onclick="RemoveUpload_banner();" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><span class="glyphicon glyphicon-trash"></span></span>

                           </div>

                       </div>

                    </div>



                    <div class="form-group form-actions">

                       <div class="col-md-6 col-md-offset-4 div_reset">

                           <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>

                       </div>

                    </div>

                </div>
            </form>
        </div>
        
    </div>
        
        
        <!--General Data -->
    <div class="col-sm-6 col-md-4">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-pencil"></i> <strong>General</strong> Data</h2>

            </div>

            <form id="gen_data" action="<?= site_url('restaurant_admin/update_general_data') ?>" method="post" class="prd_form form-horizontal form-bordered" enctype="multipart/form-data">

                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>
                
                
                
                <div class="form-group">

                    <label class="col-md-3 control-label" >FirstName</label>

                    <div class="col-md-9">

                        <input type="text" id="product-name" name="g_firstname" class="form-control" value="<?=$rest_gene->firstname?>"  required="">

                    </div>

                </div>


                <div class="form-group">

                    <label class="col-md-3 control-label" >LastName</label>

                    <div class="col-md-9">

                        <input type="text" id="last_name" name="g_lastname" class="form-control" value="<?=$rest_gene->lastname?>" required="">
                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-3 control-label" >Email</label>

                    <div class="col-md-9">

                        <input type="email" id="product-name" name="g_email" class="form-control" value="<?=$rest_gene->email?>" required="" readonly="">

                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-3 control-label" for="r_email">Phone</label>

                    <div class="col-md-9">

                        <input type="text" id="product-name" name="g_cell" class="form-control cu_phone_js" value="<?=$rest_gene->phonenumber?>" required="">

                    </div>

                </div>

                
                <div class="form-group form-actions">

                    <div class="col-md-9 col-md-offset-3 div_reset">

                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                        
                    </div>

                </div>

            </form>

        </div>

    </div>
        
        
        
    <!--General Data -->
    <div class="col-sm-6 col-md-4">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-key"></i> <strong>Change</strong> Password</h2>

            </div>

            <form id="cha_pwd" action="<?= site_url('restaurant_admin/password_change') ?>" method="post" class="pwd_form form-horizontal form-bordered" >
                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>
                
                <div class="form-group">

                    <label class="col-md-4 control-label nopad">Old Password</label>

                    <div class="col-md-8">

                        <input type="password" id="oldpwd" name="oldpwd" class="form-control" placeholder="Enter Old Password"  required="">
                        
                    </div>

                </div>


                <div class="form-group">

                    <label class="col-md-4 control-label nopad">New Password</label>

                    <div class="col-md-8">

                        <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Enter New Password"  required="">
                        <span id='message_c'></span>
                        
                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-4 control-label nopad" >Confirm Password</label>

                    <div class="col-md-8">

                        <input type="password" id="cfmpwd" name="cfmpwd" class="form-control" placeholder="Re-enter Password" required="">
                        <span id='message'></span>
                        
                    </div>

                </div>

                
                <div class="form-group form-actions">

                    <div class="col-md-9 col-md-offset-3 div_reset">

                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                        
                    </div>

                </div>

            </form>

        </div>

    </div>

    
    
    <!--Status -->
    <div class="col-sm-6 col-md-4">
        <div class="panel panel-default col-h">
            <div class="panel-heading">Activate Restaurant Online</div>
            <div class="panel-body">
                <form id="res_status" class="prdedit_form" action="<?= site_url('restaurant_admin/update_restaurant_status') ?>" method="POST" >
                    
                    <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                    
                        <?php
                            $rest_status='';
                            $reststatus= $rest_data->status ;
                            if ($reststatus == 1)
                            {
                                $rest_status='checked';
                            }
                        ?>
                    <label class="switch switch-primary">

                        <input type="checkbox" id="product_status" name="rest_status" <?= $rest_status ?>><span></span>

                    </label>
                    
                    <button class="btn btn-default" value="" type="submit">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <!--Table Reservation -->
    <div class="col-sm-6 col-md-4">
        <div class="panel panel-default col-h">
            <div class="panel-heading">Activate Restaurant Table Reservation</div>
            <div class="panel-body">
                
                <form id="res_table_status" class="prdedit_form" action="<?= site_url('restaurant_admin/update_restaurant_table_status') ?>" method="POST" >
                    
                    <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                        <?php
                            $rest_table='';
                            $tablestatus= $rest_data->tablereservation ;
                            if ($tablestatus == 1)
                            {
                                $rest_table='checked';
                            }
                        ?>
                    <label class="switch switch-primary">
                        
                        <input type="checkbox" id="product_status" name="rest_table_status"  <?= $rest_table ?>><span></span>

                    </label>
                    
                    <button class="btn btn-default" value="" type="submit">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
   

    <!--
     <div class="col-sm-6 col-md-4">
        
        <div class="panel panel-default col-h">
            <div class="panel-heading">Contacts footer</div>
            <div class="panel-body">
                <form method="POST" action="">
                    <div class="form-group" style="position: relative;">
                        <input type="text" style="padding-left:25px;" class="form-control" name="footerContactAddr" value="">
                        <i class="fa fa-map-marker" style="position: absolute;top:10px;left:10px;"></i>
                    </div>
                    <div class="form-group" style="position: relative;">
                        <i class="fa fa-phone" style="position: absolute;top:10px;left:10px;"></i>
                        <input type="text" style="padding-left:25px;" class="form-control" name="footerContactPhone" value="">
                    </div>
                    <div class="form-group" style="position: relative;">
                        <i class="fa fa-envelope" style="position: absolute;top:10px;left:10px;"></i>
                        <input type="text" style="padding-left:25px;" class="form-control" name="footerContactEmail" value="support@shop.dev">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-default" name="footerContacts" value="Update">
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    -->
    
    

</div>

<!-- edit Category Modal -->              
<div class="modal fade" id="modal_addcate" tabindex="-1" role="dialog" aria-labelledby="Add Category" aria-hidden="true" >

</div>
<!--end Modal -->

<!-- Modal confirm Empty Cart -->
<div class="modal" id="empty_confirmModal">
    <div class="modal-dialog">
            <div class="modal-content">

                    <div class="modal-body" >
                        <div class="alert alert-danger" id="empty_confirmMessage"> </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="empty_confirmOk">Ok</button>
                        <button type="button" class="btn btn-success" id="empty_confirmCancel">Cancel</button>
                    </div>

            </div>
    </div>
</div>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCY2buDtbYIot8Llm_FkQXHW36f0Cme6TI&callback=initMap">
</script>
<script type="text/javascript">

function showResult(result) {
    //document.getElementById('latitude').value = result.geometry.location.lat();
    //document.getElementById('longitude').value = result.geometry.location.lng();
    $('#latitude').val(result.geometry.location.lat());
    $('#longitude').val(result.geometry.location.lng());
}

function getLatitudeLongitude(callback, address) {
    // If adress is not supplied, use default value 'Ferrol, Galicia, Spain'
    address = address || '80b, Lafiaji way, Dolphin, Ikoyi';
    // Initialize the Geocoder
    geocoder = new google.maps.Geocoder();
    if (geocoder) {
        geocoder.geocode({
            'address': address
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                callback(results[0]);
            }
        });
    }
}

//var button = document.getElementById('location_save');

//button.addEventListener("click", function () {
    //var address = document.getElementById('address').value;
$("#location_save").click(function(){
    var address = $('.address_loc').val()+','+$('select[name="r_city"] option:selected').text()+','+$('select[name="r_state"] option:selected').text();
    //alert(address);
    getLatitudeLongitude(showResult, address);
});

</script> 

<script>
        $('.div_time').timepicker({
            'showDuration': true,
            'timeFormat': 'g:ia',
        });
        
        $('.del_time').timepicker({ 'timeFormat': 'H:i' });
        
        
        $("input[name$='dayof[]']").change(function() {
        var getval = $(this).val();
        if( getval == 'mon_n')
         {   
            if ( $(this).is(':checked') )
                {
                    var ok = confirm('Are you sure you want to take this day off?');  
                    if(ok) { 
                        $('.mon_time').attr("readonly", true);
                        //$('.mon_time').val('');
                    }
                    else{$(this).prop('checked', false);}
                }
            else 
                {
                     $('.mon_time').prop("readonly", false);
                }
        }
        else if( getval == 'tue_n')
         {   
            if ( $(this).is(':checked') )
                {
                    var ok = confirm('Are you sure you want to take this day off?');  
                    if(ok) { 
                        $('.tue_time').attr("readonly", true);
                    }
                    else{$(this).prop('checked', false);}
                }
            else 
                {
                    
                     $('.tue_time').prop("readonly", false);
                }
        }
        else if( getval == 'wed_n')
         {   
            if ( $(this).is(':checked') )
                {
                    var ok = confirm('Are you sure you want to take this day off?');  
                    if(ok) { 
                        $('.wed_time').attr("readonly", true);
                    }
                    else{$(this).prop('checked', false);}
                }
            else 
                {
                    
                     $('.wed_time').prop("readonly", false); 
                }
        }
        else if( getval == 'thu_n')
         {   
            if ( $(this).is(':checked') )
                {
                    var ok = confirm('Are you sure you want to take this day off?');  
                    if(ok) { 
                        $('.thu_time').attr("readonly", true);
                    }
                    else{$(this).prop('checked', false);}
                }
            else 
                {
                    
                     $('.thu_time').prop("readonly", false);
                }
        }
        else if( getval == 'fri_n')
         {   
            if ( $(this).is(':checked') )
                {
                    var ok = confirm('Are you sure you want to take this day off?');  
                    if(ok) { 
                        $('.fri_time').attr("readonly", true);
                    }
                    else{$(this).prop('checked', false);}
                }
            else 
                {
                    
                     $('.fri_time').prop("readonly", false);
                }
        }
        else if( getval == 'sat_n')
         {   
            if ( $(this).is(':checked') )
                {
                    var ok = confirm('Are you sure you want to take this day off?');  
                    if(ok) { 
                        $('.sat_time').attr("readonly", true);
                    }
                    else{$(this).prop('checked', false);}
                }
            else 
                {
                    
                     $('.sat_time').prop("readonly", false);
                }
        }
        else if( getval == 'sun_n')
         {   
            if ( $(this).is(':checked') )
                {
                    var ok = confirm('Are you sure you want to take this day off?');  
                    if(ok) { 
                        $('.sun_time').attr("readonly", true);
                    }
                    else{$(this).prop('checked', false);}
                }
            else 
                {
                    
                     $('.sun_time').prop("readonly", false);
                }
        }
        else 
        {
             
        }
        
    });
        //$('.start_time').timepicker('setTime', new Date(0,0,0,9,0,0) );

</script>

<script type="text/javascript">
    	
        $('input[id=base-input]').change(function() {
            //$('.logo_UploadView').show();
            $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
        });
    
    var reader; 
    function GetUpload(input) {
        if (input.files && input.files[0]) {
             reader = new FileReader();
            reader.onload = function (e) {
                $('.UploadView')
                        .attr('src', e.target.result)
                        //.width(200)
                        //.height(200)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function RemoveUpload() {
        
        
        $('.UploadView').attr('src', '<?= base_url()?>assets/uploads/rest_logo/<?= $rest_data->logo ?>');
        $('#fake-input').val('Choose your Image');
    }
    
    $('input[id=base-input_banner]').change(function() {
        //$('.logo_UploadView').show();
        $('#fake-input_banner').val($(this).val().replace("C:\\fakepath\\", ""));
    });
     
    function GetUpload_banner(input) {
        if (input.files && input.files[0]) {
            reader = new FileReader();
            reader.onload = function (e) {
                $('.UploadView_banner')
                        .attr('src', e.target.result)
                        //.width(200)
                        //.height(200)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function RemoveUpload_banner() {
        
        
        $('.UploadView_banner').attr('src', '<?= base_url()?>assets/<?= $img_ban ?>');
        $('#fake-input_banner').val('Choose your Image');
    }
   
    $(".prd_form").submit(function (e){
                
                e.preventDefault();
                
                var getid = $(this).attr('id');
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data_save = $(this).serialize();
                
                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:new FormData(this),
                   processData:false,
                   contentType:false,
                   async:false,
                   success: function(data){
                     
                        if(data.status === '1' )
                            {
                                $('#'+getid).find('.msgr_div').removeClass('alert-danger').addClass('alert-success');
                                $('#'+getid).find(".get_error").show("fast");
                                $('#'+getid).find(".get_error").effect("shake");
                                $('#'+getid).find(".error_msgr_lg").text(data.content);
                            }
                            else if(data.status === '0' )
                            {
                                $('#'+getid).find('.msgr_div').removeClass('alert-success').addClass('alert-danger');
                                $('#'+getid).find(".get_error").show("fast");
                                $('#'+getid).find(".get_error").effect("shake");
                                $('#'+getid).find(".error_msgr_lg").text(data.content);
                                $('#'+getid).find(".prd_form")[0].reset();
                            } 
                     
                    }
                   
                });
                 
        });
        
        $(".prdedit_form").submit(function (e){
                
                e.preventDefault();
                
                var getid = $(this).attr('id');
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();

                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:data
                }).done(function(data)
                        {

                            if(data.status === '1' )
                            { 
                                    new jBox('Notice', {
                                        //animation: 'flip',
                                        animation: {
                                          open: 'tada',
                                          close: 'zoomIn'
                                        },
                                        position: {
                                          x: 10,
                                          y: 100
                                        },
                                        attributes: {
                                          x: 'right',
                                          y: 'bottom'
                                        },
                                        color: 'green',
                                        autoClose: Math.random() * 8000 + 2000,
                                        //title: 'Tadaaa! I\'m single',
                                        content: 'Success!  Updated successfull...',
                                        delayOnHover: true,
                                        showCountdown: true,
                                        closeButton: true
                                      });


                            }
                            else if(data.status === '0' )
                            {
                                //alert('error ' + data.status); 
                                $('#'+getid).find(".get_error").show("fast");
                                $('#'+getid).find(".get_error").effect("shake");
                                $('#'+getid).find(".error_msgr_lg").text(data.content);
                                $('#'+getid).find("#oldpwd").focus();
                                $('#'+getid)[0].reset();
                            } 

                        });
                 
        });
	
</script>

<script >
    //$('.c_tray').addClass('active');
    $('.nav_a').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip(); 
    
    $(".cu_phone_js").on("keypress keyup blur",function (event) { 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        
        });
        
    
</script>

<script>
    
    $(".block").on("click","[data-toggle='modal']", function(e){
        
        e.preventDefault();
        
        var url = $(this).attr('href');
        var cat_Id = $(this).data('cat_id');
        
        var container = $(this).attr('data-target');
       
       $.post(url,{ data_id:cat_Id},function(data){
                $(container).html(data).modal();
           }
       );
    });
    
    
    $(document).on('click','#cate_del', function(e){
        var row_id;
        
        row_id = $(this).data("cat_id");
        
        var empty_msg = "Are you sure you want to remove this name " + $(this).data("cat_name");
        //e.stopImmediatePropagation();
        
        e.preventDefault();
        
            confirmDialog(empty_msg, function(){
                    $.ajax({
                     url:"<?= site_url('restaurant_admin/delete_cuisaine_cate') ?>",
                     method:"POST",
                     dataType: "json", // Set the data type so jQuery can parse it for you
                     data:{id_:row_id},
                     success:function(data)
                     {
                        if(data.status === '1' )
                        {//alert("Product removed from Cart");
                            new jBox('Notice', {
                                //animation: 'flip',
                                animation: {
                                  open: 'tada',
                                  close: 'zoomIn'
                                },
                                attributes: {
                                  x: 'right',
                                  y: 'bottom'
                                },
                                color: 'red',
                                autoClose: Math.random() * 8000 + 2000,
                                content: 'Removed! Size Removed',
                                delayOnHover: true,
                                showCountdown: true,
                                closeButton: true
                            });
                        
                            $('.chzn-choices').html(data.html);
                        }
                     }
                    });
                });
        });
        
        function confirmDialog(message, onConfirm){
    	    var fClose = function(){
    			modal.modal("hide");
    	    };
    	    var modal = $("#empty_confirmModal");
    	    modal.modal("show");
    	    $("#empty_confirmMessage").empty().append(message);
    	    //$("#empty_confirmOk").one('click', onConfirm);
    	    //$("#empty_confirmOk").one('click', fClose);
    	    //$("#empty_confirmCancel").one("click", fClose);
            
    	    $("#empty_confirmOk").unbind().one('click', onConfirm).one('click', fClose);
    	    $("#empty_confirmCancel").unbind().one("click", fClose);
        }
        
       


        $('#state_div').on('change',function(){
            var stateID = $(this).val();
            
            if(stateID){
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('restaurant_admin/get_city_byid') ?>',
                    data:'stateid='+stateID,
                    success:function(html){
                        $('#city_div').html(html);
                    }
                }); 
            }else{
                $('#city_div').html('<option value="">Select state first</option>'); 
            }
        });
        
    </script>

    <script type="text/javascript">
        
        var error_p = true;
        var error_c = true;
        
        $('#pwd').on('blur', function(){
            if(this.value.length < 6){ // checks the password value length
               $('#message_c').html('You have entered less than 6 characters for password').css('color', 'red');
               $(this).focus(); // focuses the current field.
               error_c = true; // stops the execution.
            }
            else{ 
                $('#message_c').html('');
                error_c = false;
            }
        });
        
        
        $('#cfmpwd').on('keyup', function () {
            
            if ($('#pwd').val() != $('#cfmpwd').val()) 
                {
                    
                    $('#message').html('Not Matching').css('color', 'red');
                    error_p =true;
                    $('#saveit').attr({disabled:true});
                } 
            else 
                {
                  
                  $('#message').html('');
                  error_p = false;
                  $('#saveit').attr({disabled:false});
                }
          });
          
        
            $(".pwd_form").submit(function (e){
                
                var getid = $(this).attr('id');
                e.preventDefault();
                
                if(error_p == true || (error_c == true) )
                    {
                    }
                else 
                { 
                    var url = $(this).attr('action');
                    var method = $(this).attr('method');
                    var data = $(this).serialize();

                    $.ajax({
                       url:url,
                       type:method,
                       dataType: 'json',
                       data:data
                    }).done(function(data)
                            {

                                if(data.status === '1' )
                                { 
                                        new jBox('Notice', {
                                            //animation: 'flip',
                                            animation: {
                                              open: 'tada',
                                              close: 'zoomIn'
                                            },
                                            position: {
                                              x: 10,
                                              y: 100
                                            },
                                            attributes: {
                                              x: 'right',
                                              y: 'bottom'
                                            },
                                            color: 'green',
                                            autoClose: Math.random() * 8000 + 2000,
                                            //title: 'Tadaaa! I\'m single',
                                            content: 'Success! Password Updated',
                                            delayOnHover: true,
                                            showCountdown: true,
                                            closeButton: true
                                          });
                                          $(".pwd_form")[0].reset();
                                          

                                }
                                else if(data.status === '0' )
                                {
                                    //alert('error ' + data.status); 
                                    $('#'+getid).find(".get_error").show("fast");
                                    $('#'+getid).find(".get_error").effect("shake");
                                    $('#'+getid).find(".error_msgr_lg").text(data.content);
                                    $('#'+getid).find("#oldpwd").focus();
                                    $(".pwd_form")[0].reset();
                                } 

                            });
                }
            });
            
            
    </script>