<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.csss">
<style>
 .hide 
 {
  display: none;
 }
 .modal-dialog 
 {
  margin: 150px auto;
 }
</style>
       
        <div class="breadcrumb-area ptb-75 hm-4-padding gray-bg">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2>my account</h2>
                </div>
            </div>
        </div>
  <!-- my account start -->
        <div id="profileinfo" class="pb-50 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="ml-auto mr-auto col-lg-9">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">

                                    <div class="">
                                      <?php $this->load->view('oye_mainpage_v/alerts'); ; ?>
                                    </div>

                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                                    </div>
                                    <div id="my-account-1" class="my-account-1 panel-collapse collapse show">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>My Account Information</h4>
                                                    <h5>Your Personal Details</h5>
                                                </div>
                                              <form class="" name="account_details" method="post" action="<?= site_url('accounts/Profileedit')?>">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>First Name</label>
                                                            <input type="text" name="fname" class="details form-control" readonly="" required="" value="<?= $accounts['firstname']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Last Name</label>
                                                            <input type="text" name="lname" class="details form-control" readonly="" required="" value="<?= $accounts['lastname']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Email Address</label>
                                                            <input type="email" name="" class="form-control" readonly="" required="" value="<?= $accounts['email']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Gender</label>
                                                            <select name="gender" id="slider_type" class="details form-control" required="" disabled="">
                                                                 <option value="">Choose Gender Type..</option>
                                                                 <option value="male" <?php if($accounts['gender']=='male' ) echo 'selected' ?>>Male</option>
                                                                 <option value="female" <?php if($accounts['gender']=='female' ) echo 'selected' ?>>Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>J Point</label>
                                                            <div><b>J <?= number_format($accounts['point']) ?></b></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Moble</label>
                                                            <input type="number" name="phone" class="details form-control" readonly="" required="" value="<?= $accounts['phone']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Telephone</label>
                                                            <input type="text" name="phone2" class="details form-control" readonly="" value="<?= $accounts['phone2']?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                      <a href="javascript:void(0)" class="btn_detailsedit btn btn-secondary">Edit</a>
                                                        <button class="btn_detailssave hide" type="submit">Update</button>
                                                    </div>
                                                </div>
                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                                    </div>
                                    <div id="my-account-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div id="WaitMe_pwd" class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>Change Password</h4>
                                                    <h5>Your Password</h5>
                                                </div>
                                                <form id="formpwd" class="" name="account_details" method="post" action="<?= site_url('accounts/passwordchange')?>">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Old Password</label>
                                                            <input type="password" class="oldpwd form-control" name="oldpwd" placeholder="Enter Old Password" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Password</label>
                                                            <input type="password" class="newpwd form-control" id="pwd" name="newpwd" placeholder="Enter New Password" required="">
                                                            <span id='message_c'></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Password Confirm</label>
                                                            <input type="password" class="cnfpwd form-control" id="cfnpwd" name="cnfpwd" placeholder="Re-enter New Password"  required="">
                                                            <span id='message'></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button id="btn_pwdsave" class="btn_pwdsave" type="submit">Update</button>
                                                    </div>
                                                </div>
                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Modify your address book entries   </a></h5>
                                    </div>
                                    <div id="my-account-3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>Address Book Entries</h4>
                                                </div>
                                                <?php foreach ($address as $row) :?>
                                                <div class="entries-wrapper">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                            <div class="entries-info text-center">
                                                                <p><small><i class="fa fa-user" aria-hidden="true"></i> </small><?=$row['firstname']?> <?=$row['lastname']?>.</p>
                                                                <p><small><i class="fa fa-map-marker" aria-hidden="true"></i></small> <?= $row['address'] ?>, </p>
                                                                <p> <?= $row['cityname'] ?>,</p>
                                                                <p> <?= $row['statename'] ?>. </p>
                                                                <p><small><i class="fa fa-phone" aria-hidden="true"></i></small> <?= $row['phone'] ?>  </p>
                                                                <p><small><i class="fa fa-mobile" aria-hidden="true"></i></small> <?= $row['phone2'] ?>  </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                            <div class="entries-edit-delete text-center">
                                                                <a  href="javascript:void(0);" class="edit ajaxbook_form fancybox.ajax" data-fancybox data-type="ajax" data-src="<?=site_url('accounts/addressedit/').$row['id'] ?>" >Edit</a>
                                                                <a href="javascript:void(0);" data-get="<?=$row['id'] ?>"class="deleteadd" >Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach;?>
                                                
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                      <a  href="javascript:void(0);" class="ajaxbook_form fancybox.ajax btn btn-secondary" data-fancybox data-type="ajax" data-src="<?=site_url('accounts/address') ?>" >
                                                          <i class="fa fa-plus-circle" style="color:#fff" ></i> New Address
                                                      </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- Modal confirm order  -->
    <div class="modal " id="empty_confirmModal2" style="display: ; ">
            <div class="modal-dialog" style="max-width: 420px;">
                    <div class="modal-content">
                        
                            <div class="modal-body" >
                                <div class="col-sm-12  alert alert-danger" id="empty_confirmMessage2"> </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="empty_confirmOk2">Ok</button>
                                <button type="button" class="btn btn-success" id="empty_confirmCancel2">Cancel</button>
                            </div>
                        
                    </div>
            </div>
    </div>


<script type="text/javascript">
 $('.header-cart').hide();

 $(".btn_detailsedit").on("click", function (e) {
    $('.details').attr("disabled", false);
    $('.details').attr("readonly", false);
    $(this).addClass("hide");
    $('.btn_detailssave').removeClass("hide");
});

$(".btn_detailssave").on("click", function (e) {
    $(this).attr("disabled", true);
    run_waitMe($('#my-account-1'), 1, 'orbit'); 
    $(this).closest("form").submit()
});

  //  the status process button
    var empty_msg = "Are you sure you want to Delete this Address?";
    var row_id =null;

    $("#profileinfo").on("click",".deleteadd", function(e){
        e.preventDefault();
        row_id = $(this).data('get'); // gets value
        
        confirmDialogg(empty_msg, function(){
            $.ajax({
                type:'POST',
                url:'<?= site_url('accounts/deleteaddress/')?>'+row_id,
                success:function(html){
                
                    if(html.status == '1')
                    {
                        //location.reload();
                    }
                    else{  }
                    location.reload();
                }

            });
        
        }); 
        
    }); 
    
    function confirmDialogg(message, onConfirm){
          var fClose = function(){
          modal.modal("hide");
          };
          var modal = $("#empty_confirmModal2");
          modal.modal("show");
          $("#empty_confirmMessage2").empty().append(message);
          $("#empty_confirmOk2").one('click', onConfirm);
          $("#empty_confirmOk2").one('click', fClose);
          $("#empty_confirmCancel2").one("click", fClose);
        }
</script>

<script type="text/javascript">
        
        var error_p = true;
        var error_c = true;
        
        $("#pwd").on("click", function (e) {
          $('#cfnpwd').val('');
          $('#message').html('');
        });

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
        
        
        $('#cfnpwd').on('keyup', function () {
            
            if ($('#pwd').val() != $('#cfnpwd').val()) 
                {
                    
                    $('#message').html('Not Matching').css('color', 'red');
                    error_p =true;
                    $('#btn_pwdsave').attr({disabled:true});
                } 
            else 
                {
                  
                  $('#message').html('');
                  error_p = false;
                  $('#btn_pwdsave').attr({disabled:false});
                }
          });
          
        
            $("#btn_pwdsave").on("click", function (e) {
                
                if(error_p == true || (error_c == true) )
                {}
                else 
                { 
                  $(this).attr("disabled", true);
                  run_waitMe($('#my-account-2'), 1, 'orbit'); 
                  $(this).closest("form").submit()
                }
            });
            
            
    </script>