<?php

require_once 'header.php';
require_once 'side_menu.php';
require_once 'data/functions.php';
include_once 'data/make_topup_data.php';

if (!empty($_GET['error'])) {
    $error = $_GET['error']; 
} else {
    $error = '';
}
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<?php
		include_once 'side_header.php';
	?>

    <!-- Main content -->
    <section class="content">
	
		<div class="box-body">
			<div class="box box-primary">
						  
				<div class="container">
				  <div class="row">
					<div class="col-lg-8 col-md-6">
						
						<!-- /.box-header -->
						<!-- form start -->
						<div class="box-header">

						  <h3 class="box-title"><?= $lang['MAKE_GPTOPUP']; ?></h3>
						  
						</div>
						<hr>
						<!-- /.box-header -->
						<div class="box-body">
						
						<?php if($error != '') { ?>
						<div class="row">
							<div class="col-md-12 col-md-12" id="error_display">
								<?php
								
								if($error == '1'){
									echo $lang['TOPUP_ERROR_1'];
								} else if($error == '2'){
									echo $lang['PACKAGE_ERROR_2'];
								} else if($error == '3'){
									echo $lang['PACKAGE_ERROR_1'];
								} else if($error == '4'){
									echo $lang['TOPUP_ERROR_2'].$topup_limit;
								}
								
								?>
							</div>
						  </div>  
						<?php } ?>
						<?php if($pending == '') { ?>
						    <?php if(($main_account < 0) || ($main_account != '')) { ?>
								<?php if($otp_set){ ?>
								<form action="data/member_topup_gp.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="member_topup">
								
								<div class="row form-group">
									<div class="col-lg-12 col-md-12 form-group" id="success_display">
									<?= $lang['TOPUP_MINIMUM'].$topup_limit; ?>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-lg-6 col-md-6 form-group">                  
										<label><?= $lang['PACKAGE_ACTUAL_AMOUNT']; ?> :</label>
										<input type="text" class="form-control" id="actual_amount" placeholder="<?= $lang['PACKAGE_ACTUAL_AMOUNT']; ?>" name="actual_amount" onkeyup="changeTopupCurrency();" >                             
									</div>
									
									<div class="col-lg-6 col-md-6 form-group"> 
									<label for="currency"><span class="blink_me">*</span><?= $lang['PACKAGE_PAYMENT_METHOD']; ?>: </label>                 
										<select class="form-control input-sm" name="currency" id="currency" onchange="changeTopupCurrency();">
											<option value=""><?= $lang['PACKAGE_CHOOSE_PAYMENT_METHOD']; ?></option>
											<?php while($rowcurrency = mysqli_fetch_assoc($resultcurrency)) { ?>
											<option value="<?php echo $rowcurrency['cu_id']; ?>"><?php echo $rowcurrency['cu_name']; ?></option>
											<?php } ?>
										</select>                  
									</div>
									
								</div>
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 form-group">
									  <label class="control-label templatemo-block" id="upload_label"><?= $lang['PACKAGE_UPLOAD_SLIP']; ?> :</label> 
									  <input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">            
									</div>
									
									<div class="col-lg-6 col-md-6 form-group">                  
										<label><?= $lang['MEMBER_PROFILE_OTP']; ?> :</label>
										<input type="password" class="form-control" id="otp" placeholder="<?= $lang['MEMBER_PROFILE_OTP']; ?>" name="otp" >                            
									</div>
									
								 </div>
								 
								 <div class="row form-group">
									<div class="col-lg-6 col-md-6 form-group">                  
										<label><?= $lang['PACKAGE_DEPOSIT_AMOUNT']; ?> :</label>
										<input type="text" class="form-control" id="deposit_amount" placeholder="<?= $lang['PACKAGE_DEPOSIT_AMOUNT']; ?>" name="deposit_amount" readonly="readonly" />                           
									</div>
                                    
									<div class="col-lg-6 col-md-6 form-group">
										<label><?= $lang['PACKAGE_DEPOSIT_DETAILS']; ?> : </label>
										<br />    
										<span id="deposit_details"></span>
									</div>
                                        
								</div>
								
								<hr />       
							   

							  <div class="form-group text-left">
								<div class="col-lg-3 col-md-3 form-group"> 
									<button type="submit" class="btn btn-block btn-success"><?= $lang['MAKE_TOPUP']; ?></button>
								</div>
							  </div>        
							  
							  </form>
							  <?php } else { ?>
							
							<div class="row">
								<div class="col-md-12 col-md-12" id="error_display">
									<?php
										echo $lang['PACKAGE_NO_OTP'];
									?>
									
									<div class="form-group text-left">
										<div class="col-lg-3 col-md-3 form-group"> 
											<br/><br/>
											<button type="button" class="btn btn-block btn-success" onclick="location.href='member_profile.php'"><?= $lang['MEMBER_PROFILE']; ?></button>
										</div>
									 </div> 
								</div>
							  </div> 
							
							<?php } ?>
							<?php } else { ?>
							<div class="row">
								<div class="col-md-12 col-md-12" id="error_display">
									<?php
										echo $lang['NO_PACKAGE'];
									?>
									
								</div>
							  </div>
							<?php } ?>
							<?php } else { ?>
							
							  <div class="row">
								<div class="col-md-12 col-md-12" id="error_display">
									<?php
										echo $lang['TOPUP_PENDING'];
									?>
								</div>
							  </div> 
							
							<?php } ?>
							
						</div>
						<!-- /.box-body -->
					</div>
					
					
					
					 </div>

					   

				 </div>
			</div>
		</div>
    </section>
  </div>

<?php

require_once 'footer.php';

?>
