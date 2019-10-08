
              	<?php if($this->session->flashdata('error')){ ?>
              	
	            <div class="alert alert-danger alert-rounded"> 
	            	<?=$this->session->flashdata('message')?>
	            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
	            	<span aria-hidden="true">×</span> </button>
	            </div>
                                        
                <?PHP } ?>
                
                <?php if($this->session->flashdata('warning')){ ?>
           		<div class="alert alert-warning alert-rounded"> 
	            	<?=$this->session->flashdata('message')?>
	            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
	            	<span aria-hidden="true">×</span> </button>
	            </div>
                <?PHP } ?>
                
                <?php if($this->session->flashdata('info')){ ?>
                <div class="alert alert-info alert-rounded"> 
	            	<?=$this->session->flashdata('message')?>
	            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
	            	<span aria-hidden="true">×</span> </button>
	            </div>
                <?PHP } ?>
                
                <?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success alert-rounded"> 
	            	<?=$this->session->flashdata('message')?>
	            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
	            	<span aria-hidden="true">×</span> </button>
	            </div>
                <?PHP } ?>
                
                <?php if($this->session->flashdata('feedback')){ ?>
                <div class="alert alert-info alert-rounded"> 
	            	<?=$this->session->flashdata('message')?>
	            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
	            	<span aria-hidden="true">×</span> </button>
	            </div>
                <?PHP } ?>
                
                
                <?php if(isset($msg_error)){ ?>
                
	                
	                
	            <div class="alert alert-danger alert-rounded"> 
	            	<?=$msg_error?>
	            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
	            	<span aria-hidden="true">×</span> </button>
	            </div>
	            
                <?PHP } ?>
                
                <?php if(isset($msg_flash)){ ?>
	            
	            <div class="alert alert-info alert-rounded"> 
	            	<?=$msg_flash?>
	            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
	            	<span aria-hidden="true">×</span> </button>
	            </div>
	            
                <?PHP } ?>