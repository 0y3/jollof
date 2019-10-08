<style>
    /* New User Profile*/
.UP_content-bg {
	position: relative;
}
.UP_content-bg img, .UP_uploadpics_Rec_input, .UP_uploadpics_rec {
	height:300px;
	width: 100%;
}
.UP_uploadpicsdiv {
	width: 100%;
	/*background: rgba(0,0,0,0.7);*/
	position: relative;
}
.UP_img img ,.UP_uploadpics  ,.UP_uploadpics_input{
	width:180px;
	height:180px;
}
.UP_img-circle ,.UP_uploadpics ,.UP_uploadpics_input {
	border-radius: 50%;
}
.UP_uploadpics_rec {
    background: rgba(255,255,255,0.3);
    padding: 80px 0px 0px 80px;
    position: absolute;
	width:90%;
	left:10%;
    top:0px;
}
.UP_camera_rec{
    font-size: 50px;
    color:#333;
	left:40%;
	top:20%;
}
.UP_uploadpics {
    background: rgba(255,255,255,0.3);
    padding: 80px 0px 0px 80px;
    position: absolute;
    /*display:none ;*/
    left:10%;
    top:0px;
}
.UP_camera{
    font-size: 40px;
    color:#333;
}
.UP_uploadpics_input, .UP_uploadpics_Rec_input{
    position: absolute;
    cursor:pointer;
    top: 0px;
    z-index: 999;
    background-color: #000000;
    opacity: 0 !important;
}
#UP_editclick {
	cursor:pointer;
}
.UP_Inputformdiv {
	padding:20px 20px;
	background-color:#FFF;
}
.UP_inputDiv{
	position: relative;
}
.UP_inputIcon{
    position: absolute;
	top:7px;
	left: 10px;
	font-size:18px;
}
.UP_Profile_d {
	/*position: absolute;*/
	padding-left:50px;
	font-size:18px;
}
.UP_Profile_input {
	/*position: absolute;*/
	padding-left:40px;
	width:70%;
	min-width:300px;
	font-size:20px;
}
.UP_Profile_txtbox {
	padding-left:40px;
	font-size:18px;
}
.UP_btnuplode {
	padding-left:50px;
	padding-right:50px;
	font-size:18px;
	width:100%;
}

.UP_Nodisplay {
	display:none;
}

/* End New User Profile*/
</style>
<div class="container">
    
    <div class="row ">
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <form class="" name="Up_userprofileForm" method="post" action="<?= site_url('profile/Update_Profile')?>" enctype="multipart/form-data"> 
       
            
            
        <div class="container-fluid" >
    	
        <div class="col-md-12">
            <?php foreach($allData as $row): ?>
            <div class="text-right" style="padding-top:10px;">
                          
              <span id="UP_editclick">
              
                <span class="glyphicon glyphicon-edit"></span> <span style=" font-size:18px;" >Edit Profile</span>
                
              </span>
              
            </div> 
            
            <div class="col-md-3 ">
                
                    <div class="UP_uploadpicsdiv ">
                    
                         <div class="UP_img">
                             
                             <?php 
                                    if (!empty($row->image))
                                    {

                                            $picloca= $row->image;
                                            echo '<img src="'. base_url().'assets/uploads/profile_pic/'.$picloca.'" class=" UP_img-circle " >' ;
                                    }
                                    else 
                                    { 
                                            echo '<img src="'. base_url().'assets/uploads/profile_pic/noimage.jpg" class=" UP_img-circle " >';
                                    }
                            ?>
			
                            <!--<img src="<?php echo base_url(); ?>assets/img/noimage.jpg" class="bod UP_img-circle " > -->
                            <span class="UP_uploadpics UP_Nodisplay"><span class="glyphicon glyphicon-camera UP_camera "></span></span>
                            
                         </div >
                        
                        <div class="UP_Nodisplay">
                            <input type="file" name="User_pic" accept="image/*" onchange="GetProfilePic(this);" id="base-input" class="UP_uploadpics_input" >
                        </div>
                    
                    </div>
            </div>
            
            <div class="col-md-9">
            	
                <?php 
                    $msg_r =$this->session->flashdata('msg_r');
                    $msg_g =$this->session->flashdata('msg_g');
             	?>
             
                <!-- php Upload Profile error if not properly uploder -->
                <?php if (isset($msg_r)) : ?>
                
                    <div class="alert alert-danger" id="alert_template" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    	<?php echo $this->session->flashdata('msg_r'); ?>
                    </div>    
                
				<?php endif; ?>
                    
                    <!-- php Upload Profile Retune True if properly uploder -->
                <?php if (isset($msg_g)) { ?>
                
                    <div class="alert alert-success" id="alert_template" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $this->session->flashdata('msg_g'); ?>
                    </div>    
                
                <?php }; ?>
                    	
                <div class="UP_Inputformdiv ">
                	
                    <div class="form-group UP_inputDiv " >
                            
                        <span class="UP_Profile_d UP_display" style="font-size:24px;"> <?= $row->firstname; ?>  <?= $row->lastname; ?> </span>
                        
                        
                        <div class="row UP_Nodisplay">
                          
                          <div class="col-xs-6 ">
                            <input type="text" class="form-control UP_Profile_input" style="width:100%" id="UP_Fname" name="Firstname" placeholder="FirstName" value="<?= $row->firstname; ?>">
                          </div>
                          <div class="col-xs-6 ">
                            <input type="text" class="form-control UP_Profile_input" style="width:100%" id="UP_Lname" name="Lastname" placeholder="LastName" value="<?= $row->lastname; ?>">
                          </div>
                          
                        </div>
                        
                        <span class="glyphicon glyphicon-user UP_inputIcon" style="font-size:23px;"></span>
                        
                    </div>
                    
                    
                    <div class="form-group UP_inputDiv UP_display" >
                            
                        <span class="UP_Profile_d UP_display" > <?= $row->email; ?> </span>
                        <!--<input type="email" class="form-control UP_Profile_input " id="UP_Uname" name="Email" placeholder="Email">-->
                        <span class="glyphicon glyphicon-envelope UP_inputIcon"></span>
                        
                    </div>
                    
                     <div class="form-group UP_inputDiv " >
                            
                        <span class="UP_Profile_d UP_display" > <?= $row->phone; ?> </span>
                        <input type="text" class="form-control UP_Profile_input UP_Nodisplay cu_phone_js" id="UP_Uname" name="cell_1" placeholder="Cell Phone" value="<?= $row->phone; ?>  ">
                        <span class="glyphicon glyphicon-earphone UP_inputIcon"></span>
                        
                    </div>
                    
                    <div class="form-group UP_inputDiv " >
                            
                        <span class="UP_Profile_d UP_display" > <?= $row->phone2; ?>  </span>
                        <input type="text" class="form-control UP_Profile_input UP_Nodisplay cu_phone_js" id="UP_Uname" name="cell_2" placeholder="Mobile Phone" value="<?= $row->phone2; ?> ">
                        <span class="glyphicon glyphicon-earphone UP_inputIcon"></span>
                        
                    </div>
                    
                   <?php endforeach; ?>
                    
                    <div class="form-group " >
                        	
                        <div class="row">
                        	
                            <div class="col-sm-4 UP_Nodisplay" style="padding-top:20px;">
                              	
                                <button type="submit" class="btn btn-primary UP_btnuplode"><span class="glyphicon glyphicon-save"></span> Update</button>
                                
                            </div>

                            <div class="col-sm-8 text-right ">
                              	
                                <a href="<?=site_url('profile/password') ?>" data-toggle="modal" data-target="#modal_pwd"> 
                                    <span class="glyphicon glyphicon-edit"></span> <span style=" font-size:14px;" >Change Password</span> 
                                </a>
                            
                            </div>
                        
                        </div>
                        
                    </div>
                    
                    <div class="form-group UP_inputDiv">
                    <!--SHIPPING METHOD-->
                    <div class="col-md-9">
                    <div class=" panel panel-info">
                        <div class="panel-heading">Address</div>
                        
                        <div class="panel-body">
                            
                            
                            <div class="form-group">
                                <div class="col-md-6"><strong>Saved Address:</strong> </div>
                                <div class="col-md-6 text-right ">
                                    <a href="<?=site_url('accounts/address') ?>" data-toggle="modal" data-target="#modal_address" data-popup="#login_popup">
                                        <i class="fa fa-plus-circle" style="color:green" ></i> New Address
                                    </a>
                                </div>
                                <div class="col-md-6 top5 add_drop">
                                    <select id="add_option_profile" name="add_option" class="form-control" required>
                                        <?php if(!empty($add_list)): ?>
                                            

                                            <?php foreach ($add_list as $row) :?>
                                                <option value="<?= $row->id ?>"><?= $row->address ?></option>

                                            <?php endforeach;?>
                                        <?php else: ?>

                                            <option value="">Address not available</option>

                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="">
                                <div class="" id="add_div_profile">
                                    
                                    <?php if(!empty($add_list)): ?>
                                    
                                    
                                    <div class=" panel-primary">
                                        <div class="panel-body">
                                            
                                            <table class="table">
                                                <tbody class="table">
                                                    
                                                    <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-user" aria-hidden="true"></i></td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <span><b><?= $add_list[0]->firstname ?></b></span>
                                                            <span style=" padding-left:10px;"><b><?= $add_list[0]->lastname ?></b></span>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-map-marker"></i> </td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <?= $add_list[0]->address ?>, <br>
                                                            <?= $add_list[0]->cityname ?>,<br>
                                                            <?= $add_list[0]->statename ?>
                                                        </td>
                                                    </tr>
                                                     <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-phone" aria-hidden="true"></i></td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <span><?= $add_list[0]->phone ?></span>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-mobile" aria-hidden="true"></i></td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <span><?= $add_list[0]->phone2 ?></span>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                    
                                <?php endif; ?>
                                    
                            </div>
                            
                        </div>
                    </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    
                </div>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                
            </div>
            
        </div>
            
    	
    
    </div>
    </form>

         
         
    </div>
    
</div>
    <!--Address Modal -->              
    <div class="modal fade" id="modal_address" tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >

    </div><!--end Modal -->
    
    <!--Address Modal -->              
    <div class="modal fade" id="modal_pwd" tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >

    </div><!--end Modal -->

    <script type="text/javascript">
    
    var reader; 
    function GetProfilePic(input) {
            if (input.files && input.files[0]) {
                 reader = new FileReader();
                reader.onload = function (e) {
                    $('.UP_img-circle')
                            .attr('src', e.target.result)
                            //.width(200)
                            //.height(200)
                };
                reader.readAsDataURL(input.files[0]);
            }
    }
    
    function GetProfilePicRec(input) {
            if (input.files && input.files[0]) {
                 reader = new FileReader();
                reader.onload = function (e) {
                    $('.UP_img-rec')
                            .attr('src', e.target.result)
                            //.width(100.+'%')
                            //.height(100.+'%')
                };
                reader.readAsDataURL(input.files[0]);
            }
    }
    
    $(document).ready(function(){
            $('#UP_editclick') .click(function() {

                            $('.UP_Nodisplay').show();
                            $('.UP_display').hide();



                    });

    });
    
    </script>

<script type="text/javascript">
    
    $(".cu_phone_js").on("keypress keyup blur",function (event) { 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        
        });
        
    $('#add_option_profile').on('change',function(){
            
            var addID = $(this).val();
            
            if(addID){
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('profile/get_address') ?>',
                    data:'id='+addID,
                    success:function(html){
                        $('#add_div_profile').html(html);
                    }
                }); 
            }else{
                $('#add_option_profile').html('<option value="">Select Address first</option>'); 
            }
        });
</script>
                    
<script>
$("[data-toggle='modal']").click(function(e) {
    /* Prevent Default*/
    e.preventDefault();
                        
    /* Parameters */
    var url = $(this).attr('href');
    var container = $(this).attr('data-target');
                
    /* XHR */
    $.get(url).done(function(data) {
        $(container).html(data).modal();
    }).success(function() { $('input:text:visible:first').focus() });
            
});    
</script>                  

    

    

