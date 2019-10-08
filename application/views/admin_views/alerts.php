
              	<?php if($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-ban"></i> Error!</h4>
	                <?=$this->session->flashdata('message')?>
	            </div>
                <?PHP } ?>
                
                <?php if($this->session->flashdata('warning')){ ?>
           		<div class="alert alert-warning alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-warning"></i> Warning!</h4>
	                <?=$this->session->flashdata('message')?>
	            </div>
                <?PHP } ?>
                
                <?php if($this->session->flashdata('info')){ ?>
                <div class="alert alert-info alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-info"></i> Message!</h4>
	                <?=$this->session->flashdata('message')?>
	            </div>
                <?PHP } ?>
                
                <?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Success!</h4>
	                <?=$this->session->flashdata('message')?>
              	</div>
                <?PHP } ?>
                
                <?php if($this->session->flashdata('feedback')){ ?>
                <div class="alert alert-info alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-info"></i> Feedback!</h4>
	                <?=$this->session->flashdata('message')?>
	            </div>
                <?PHP } ?>
                
                
                <?php if(isset($msg_error)){ ?>
                <div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-ban"></i> Error!</h4>
	                <?=$msg_error?>
	            </div>
                <?PHP } ?>
                
                <?php if(isset($msg_flash)){ ?>
                <div class="alert alert-info alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-info"></i> Info!</h4>
	                <?=$msg_flash?>
	            </div>
                <?PHP } ?>