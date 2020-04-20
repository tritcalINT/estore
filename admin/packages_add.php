<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/packages_add_data.php';

if (!empty($_GET['error'])) {
    $error = $_GET['error']; 
} else {
    $error = '';
}

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> PACKAGE SETTING：</h4>
      <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i> <?= date('e'); ?></a></li>
        <li class="active"><?= date('d-m-Y h:i A'); ?></li>
      </ol>
    </section>
    
    
    
    <!-- Main content -->
   
    <!-- /.Tab content -->
 <section class="content">

 <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Package Details </a></li>
              <li><a href="#tab_2" data-toggle="tab">Referral Settings </a></li>
            </ul>
			<div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>Package Details </b>
				
				<div class="box-body">
				<div class="box box-primary">
							  
					<div class="container">
					  <div class="row">
						<div class="col-lg-8 col-md-6">
						
							
							<!-- /.box-header -->
							<!-- form start -->
							<div class="box-header">
							<?php if($mp_id != '') { ?>
							  <h3 class="box-title">Update Package</h3>
							<?php } else { ?>
							  <h3 class="box-title">Add New Package</h3>
							<?php } ?>
							  

							</div>
							<hr>
							<!-- /.box-header -->
					
							<div class="box-body">
							
							<?php if($error != '') { ?>
							<div class="row">
								<div class="col-md-12 col-md-12" id="error_display">
									<?php
									
									if($error == '1'){
										echo "Please fill-in all the required fields";
									} else if($error == '4'){
										echo "Please upload only image file";
									}
									
									?>
								</div>
							  </div>  
							<?php } ?>
							
							<?php
							if($mp_id != ''){ ?>
								<form action="data/update_package.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_package">
								<input type="hidden" name="id" value="<?php echo $mp_id; ?>">
							<?php } else { ?>
								<form action="data/register_package.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="registration_package">
							<?php } ?>
							
								<div class="row form-group">						
									<div class="col-lg-6 col-md-6 form-group">
										<div class="user_image">
										<?php if($mp_pic == ''){ ?>
											<img src="../img/package1.png" class="img-circle profile_image" alt="Package Image">
										<?php } else { ?>
											<img src="../uploads/package/<?= $mp_pic; ?>" class="img-circle profile_image" alt="<?php echo $mp_name; ?>">
										<?php } ?>
										</div>
										<div class="upload_picture">
										<label class="control-label templatemo-block" id="upload_label">Upload Picture :</label> 
										<input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*"> 
										</div>
									</div>
									<div class="col-lg-3 col-md-3 form-group">                  
										<label>Package Showing Order :</label>
										<select class="form-control" name="package_order">
										<?php for($i=$count_mp;$i>0;$i--){ ?>
											<?php if($i == $mp_order){ ?>
												<option value="<?= $i; ?>" selected><?= $i; ?></option>
											<?php } else { ?>
												<option value="<?= $i; ?>"><?= $i; ?></option>
											<?php } ?>
										<?php } ?>
										</select>
									</div>
									<div class="col-lg-3 col-md-3 form-group">                  
										<label>Extra Rewards (%) :</label>
										<input type="text" class="form-control" id="extra_rewards" placeholder="Extra Rewards Percent" name="extra_rewards" value="<?php echo $mp_rewards_percent; ?>">                            
									</div>
									
									<div class="col-lg-3 col-md-3 form-group">                  
										<label>Rewards Start Date :</label>
										<input type="text" class="form-control" id="rewards_start" placeholder="Rewards Start Date" name="rewards_start" value="<?php echo $mp_rewards_start; ?>" readonly>                            
									</div>
									
									<div class="col-lg-3 col-md-3 form-group">                  
										<label>Rewards End Date :</label>
										<input type="text" class="form-control" id="rewards_end" placeholder="Rewards End Date" name="rewards_end" value="<?php echo $mp_rewards_end; ?>" readonly>                            
									</div>
								</div>
							
								<div class="row form-group">
									<div class="col-lg-12 col-md-12 form-group">                  
										<label>Package Name :</label>
										<input type="text" class="form-control" id="package_name" placeholder="Package Name" name="package_name" value="<?php echo $mp_name; ?>">                            
									</div>
								</div>
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 form-group">                  
										<label>Package Price ($) :</label>
										<input type="text" class="form-control" id="package_price" placeholder="Package Price ($)" name="package_price" value="<?php echo $mp_price_dollar; ?>">                           
									</div>
									<div class="col-lg-6 col-md-6 form-group">                  
										<label>Package Price (RC) :</label>
										<input type="text" class="form-control" id="package_rc" placeholder="Package Price (RC)" name="package_rc" value="<?php echo $mp_price_rc; ?>">                            
									</div>
								</div>
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 form-group">                  
										<label>Ratio of BP (%) :</label>
										<input type="text" class="form-control" id="ratio_bp" placeholder="Ratio of BP (%)" name="ratio_bp" value="<?php echo $mp_ratio_bp; ?>">                            
									</div>
									
									<div class="col-lg-6 col-md-6 form-group">                  
										<label>Unfrozen (Days) :</label>
										<input type="text" class="form-control" id="unfrozen" placeholder="Unfrozen" name="unfrozen" value="<?php echo $mp_unfrozen; ?>">                            
									</div>

								</div>
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 form-group">                  
										<label>Robot Trader :</label>
										<select class="form-control" name="robot_trader">
											<?php
											if($mp_robot == '0'){ ?>
												<option value="1">YES</option>
												<option value="0" selected="selected">NA</option>
											<?php } else { ?>
												<option value="1" selected="selected">YES</option>
												<option value="0">NA</option>
											<?php } ?>
										</select>                               
									</div>
									<div class="col-lg-6 col-md-6 form-group">                  
										<label>Closed Account :</label>
										<select class="form-control" name="closed_account">
											<?php
											if($mp_closed_account == '0'){ ?>
												<option value="1">YES</option>
												<option value="0" selected="selected">NA</option>
											<?php } else { ?>
												<option value="1" selected="selected">YES</option>
												<option value="0">NA</option>
											<?php } ?>
										</select>                               
									</div>
								</div>
								
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 form-group">                  
										<label>Referal Bonus Level :</label>
										<select class="form-control" name="bonus_level">
											<?php for($i=1;$i<22;$i++){ ?>
												<?php if($i == $mp_bonus_level){ ?>
													<option value="<?= $i; ?>" selected><?= $i; ?></option>
												<?php } else { ?>
													<option value="<?= $i; ?>"><?= $i; ?></option>
												<?php } ?>
											<?php } ?>
										</select>                           
									</div>
									<div class="col-lg-6 col-md-6 form-group">                  
										<label>Status :</label>
										<select class="form-control" name="status">
											<?php
											if($mp_status == '0'){ ?>
												<option value="1">Active</option>
												<option value="0" selected="selected">Inactive</option>
											<?php } else { ?>
												<option value="1" selected="selected">Active</option>
												<option value="0">Inactive</option>
											<?php } ?>
									</select>                           
									</div>
								</div>
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 form-group">                  
										<label>Expiry (Days) :</label>
										<input type="text" class="form-control" id="expiry" placeholder="Expiry days" name="expiry" value="<?php echo $mp_expiry; ?>">             
									</div>
								</div>
								
								
								<hr />       
							   

							  <div class="form-group text-left">
								<div class="col-lg-3 col-md-3 form-group"> 
								  <?php if($mp_id != ''){ ?>
									<button type="submit" class="btn btn-block btn-success">Update Now</button>
								  <?php } else { ?>
									<button type="submit" class="btn btn-block btn-success">Add Now</button>
								  <?php } ?>
								</div>
								<div class="col-lg-3 col-md-3 form-group"> 
									<button type="reset" class="btn btn-block btn-warning">Reset</button>
								</div>
							  </div>        
							  
							  </form>
							</div>
							<!-- /.box-body -->

						</div>
						
						
						
						 </div>

						   

					 </div>
					 </div>
					 </div>
				</div>
				
				
        <div class="tab-pane" id="tab_2">
            <b>Referral Settings </b>
            <div class="box-body">
              <div class="box box-primary">
				<div class="container">
					 <div class="row">
						<div class="col-lg-8 col-md-6">
							
							<div class="box-header">
							  <h3 class="box-title">Set Referral Rate</h3>
							</div>
							
							<hr>
							<!-- /.box-header -->
					
							<div class="box-body">
								<?php if($mp_id != ''){ ?>
								<form action="data/update_referal.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_referal">
								<input type="hidden" name="id" value="<?php echo $mp_id; ?>">
							
								<div class="row form-group">
									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 1 (%) :</label>
										<input type="text" class="form-control" id="referal_level_1" placeholder="Referral Level 1 Percent" name="referal_level_1" value="<?php echo $mp_referal_1; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 2 (%) :</label>
										<input type="text" class="form-control" id="referal_level_2" placeholder="Referral Level 2 Percent" name="referal_level_2" value="<?php echo $mp_referal_2; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 3 (%) :</label>
										<input type="text" class="form-control" id="referal_level_3" placeholder="Referral Level 3 Percent" name="referal_level_3" value="<?php echo $mp_referal_3; ?>">
									</div>
								</div>
								
								<div class="row form-group">
									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 4 (%) :</label>
										<input type="text" class="form-control" id="referal_level_4" placeholder="Referral Level 4 Percent" name="referal_level_4" value="<?php echo $mp_referal_4; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 5 (%) :</label>
										<input type="text" class="form-control" id="referal_level_5" placeholder="Referral Level 5 Percent" name="referal_level_5" value="<?php echo $mp_referal_5; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 6 (%) :</label>
										<input type="text" class="form-control" id="referal_level_6" placeholder="Referral Level 6 Percent" name="referal_level_6" value="<?php echo $mp_referal_6; ?>">
									</div>
								</div>
								
								<div class="row form-group">
									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 7 (%) :</label>
										<input type="text" class="form-control" id="referal_level_7" placeholder="Referral Level 7 Percent" name="referal_level_7" value="<?php echo $mp_referal_7; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 8 (%) :</label>
										<input type="text" class="form-control" id="referal_level_8" placeholder="Referral Level 8 Percent" name="referal_level_8" value="<?php echo $mp_referal_8; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 9 (%) :</label>
										<input type="text" class="form-control" id="referal_level_9" placeholder="Referral Level 9 Percent" name="referal_level_9" value="<?php echo $mp_referal_9; ?>">
									</div>
								</div>
								
								<div class="row form-group">
									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 10 (%) :</label>
										<input type="text" class="form-control" id="referal_level_10" placeholder="Referral Level 10 Percent" name="referal_level_10" value="<?php echo $mp_referal_10; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 11 (%) :</label>
										<input type="text" class="form-control" id="referal_level_11" placeholder="Referral Level 11 Percent" name="referal_level_11" value="<?php echo $mp_referal_11; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 12 (%) :</label>
										<input type="text" class="form-control" id="referal_level_12" placeholder="Referral Level 12 Percent" name="referal_level_12" value="<?php echo $mp_referal_12; ?>">
									</div>
								</div>
								
								<div class="row form-group">
									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 13 (%) :</label>
										<input type="text" class="form-control" id="referal_level_13" placeholder="Referral Level 13 Percent" name="referal_level_13" value="<?php echo $mp_referal_13; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 14 (%) :</label>
										<input type="text" class="form-control" id="referal_level_14" placeholder="Referral Level 14 Percent" name="referal_level_14" value="<?php echo $mp_referal_14; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 15 (%) :</label>
										<input type="text" class="form-control" id="referal_level_15" placeholder="Referral Level 15 Percent" name="referal_level_15" value="<?php echo $mp_referal_15; ?>">
									</div>
								</div>
								
								<div class="row form-group">
									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 16 (%) :</label>
										<input type="text" class="form-control" id="referal_level_16" placeholder="Referral Level 16 Percent" name="referal_level_16" value="<?php echo $mp_referal_16; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 17 (%) :</label>
										<input type="text" class="form-control" id="referal_level_17" placeholder="Referral Level 17 Percent" name="referal_level_17" value="<?php echo $mp_referal_17; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 18 (%) :</label>
										<input type="text" class="form-control" id="referal_level_18" placeholder="Referral Level 18 Percent" name="referal_level_18" value="<?php echo $mp_referal_18; ?>">
									</div>
								</div>
								
								<div class="row form-group">
									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 19 (%) :</label>
										<input type="text" class="form-control" id="referal_level_19" placeholder="Referral Level 19 Percent" name="referal_level_19" value="<?php echo $mp_referal_19; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 20 (%) :</label>
										<input type="text" class="form-control" id="referal_level_20" placeholder="Referral Level 20 Percent" name="referal_level_20" value="<?php echo $mp_referal_20; ?>">
									</div>

									<div class="col-lg-4 col-md-4 form-group">                  
										<label>Referral Level 21 (%) :</label>
										<input type="text" class="form-control" id="referal_level_21" placeholder="Referral Level 21 Percent" name="referal_level_21" value="<?php echo $mp_referal_21; ?>">
									</div>
								</div>
								
								<hr />       
							   

								  <div class="form-group text-left">
									<div class="col-lg-3 col-md-3 form-group"> 
										<button type="submit" class="btn btn-block btn-success">Set Now</button>
									</div>
									<div class="col-lg-3 col-md-3 form-group"> 
										<button type="reset" class="btn btn-block btn-warning">Reset</button>
									</div>
								  </div>
								  
								</form>
								
							<?php } else { ?>	
							<div class="row">
								<div class="col-md-12 col-md-12" id="error_display">
									Please Register a package and then enter Referal Rates
								</div>
							  </div>
							<?php } ?> 
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
</section>
					  
      
  
  </div>
  <!-- /.content-wrapper -->
 

 <?php

require_once 'footer.php';

?>