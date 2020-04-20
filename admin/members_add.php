<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/members_add_data.php';

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
      <h4> MEMBER SETTING：</h4>
      <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i> <?= date('e'); ?></a></li>
        <li class="active"><?= date('d-m-Y h:i A'); ?></li>
      </ol>
    </section>
    
    
    
    <!-- Main content -->
   
    <!-- /.Tab content -->
 <section class="content">


<div class="box-body">
<div class="box box-primary">
			  
	<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-6">
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
			<?php if($m_id != '') { ?>
			  <h3 class="box-title">Update Member</h3>
			<?php } else { ?>
              <h3 class="box-title">Add New Member</h3>
			<?php } ?>
			  

            </div>
            <hr>
            <!-- /.box-header -->
	
            <div class="box-body">
			
			<?php if($error != '') { ?>
			<div class="row">
                <div class="col-md-12 col-md-12" id="error_display">
                    <?php
                    
                    if($error == '2'){
                        echo "Please fill-in all the required fields";
                    } else if($error == '1'){
                       echo "Username already registered "; 
                    } else if($error == '3'){
					  echo "Username can only be alphabets & numbers "; 
					} else if($error == '4'){
					  echo "Please upload only image file";	
					}
                    
                    ?>
                </div>
              </div>  
            <?php } ?>
			
			<?php
            if($m_id != ''){ ?>
                <form action="data/update_member.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                <input type="hidden" name="id" value="<?php echo $m_id; ?>">
				<input type="hidden" name="referal" value="<?php echo $m_referal; ?>">
            <?php } else { ?>
                <form action="data/register_newmember.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="registration_members">
            <?php } ?>
			
			<div class="row form-group">						
				<div class="col-lg-6 col-md-6 form-group">
					<div class="user_image">
					<?php if($m_pic == ''){ ?>
						<img src="../img/user2-160x160.jpg" class="img-circle profile_image" alt="User Image">
					<?php } else { ?>
						<img src="../uploads/profile/<?= $m_pic; ?>" class="img-circle profile_image" alt="<?php echo $m_username; ?>">
					<?php } ?>
					</div>
					<div class="upload_picture">
					<label class="control-label templatemo-block" id="upload_label">Upload Picture :</label> 
					<input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*"> 
					</div>
				</div>
			</div>
			
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Username :</label>
						<input type="text" class="form-control" id="user_name" placeholder="Username" name="user_name" value="<?php echo $m_username; ?>" <?php if($m_id != '') { ?> readonly <?php } else { ?> pattern="[a-zA-Z0-9]+" title="Enter a valid Username" <?php } ?>>                            
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Password :</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password" >                            
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Full Name :</label>
						<input type="text" class="form-control" id="full_name" placeholder="Full Name" name="full_name" value="<?php echo $m_name; ?>" title="Enter a valid Name">                            
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Email :</label>
						<input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $m_email; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter a valid email">                            
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label style="float: left; width: 100%">Phone :</label>
						<select class="form-control" name="phone_country" id="phone_country" style="width: 40%; float: left;">
							<option value="">Select Country</option>
							<?php while($rowcountry = mysqli_fetch_assoc($resultcountry)) { ?>
									<?php if($m_phone_country == $rowcountry['c_id']) { ?>
										<option value="<?= $rowcountry['c_id']; ?>" selected="selected"><?= $rowcountry['c_name']; ?>(<?= $rowcountry['c_code']; ?>)</option>
									<?php } else { ?>
										<option value="<?= $rowcountry['c_id']; ?>"><?= $rowcountry['c_name']; ?>(<?= $rowcountry['c_code']; ?>)</option>
									<?php } ?>
							<?php } ?>
						<input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" style="width: 60%; float: left;" value="<?php echo $m_phone; ?>"> 						
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Date of Birth :</label>
						<input type="text" class="form-control" id="dob" placeholder="Date of Birth" name="dob" value="<?php echo $m_dob; ?>" readonly>                            
					</div>
				</div>
				
				<div class="row form-group">
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Security Password :</label>
						<input type="password" class="form-control" id="otp" placeholder="Security Password" name="otp" >                            
					</div>
				</div>
				
								<hr /> 
				
				<div class="row form-group">
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>Bank Name :</label>
						<input type="text" class="form-control" id="bank_name" placeholder="Bank Name" name="bank_name" 
						value="<?php echo $m_bank_name; ?>">                            
					</div>
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>Account No :</label>
						<input type="text" class="form-control" id="bank_account" placeholder="Account No" name="bank_account" 
						value="<?php echo $m_bank_account_no; ?>">                             
					</div>
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>Bank Branch :</label>
						<input type="text" class="form-control" id="bank_branch" placeholder="Bank Branch" name="bank_branch" 
						value="<?php echo $m_bank_branch; ?>">                             
					</div>
				</div>
				
				<div class="row form-group">
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Bitcoin :</label>
						<input type="text" class="form-control" id="bitcoin" placeholder="Bitcoin" name="bitcoin" 
						value="<?php echo $m_bitcoin; ?>">                            
					</div>
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Litecoin :</label>
						<input type="text" class="form-control" id="litecoin" placeholder="Litecoin" name="litecoin" 
						value="<?php echo $m_litecoin; ?>">                             
					</div>
				</div>
				
				<hr />
				
				<div class="row form-group">
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>Line ID :</label>
						<input type="text" class="form-control" id="line_id" placeholder="Line ID" name="line_id" 
						value="<?php echo $m_lineid; ?>">                            
					</div>
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>WeChat ID :</label>
						<input type="text" class="form-control" id="wechat_id" placeholder="WeChat ID" name="wechat_id" 
						value="<?php echo $m_wechatid; ?>">                             
					</div>
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>WhatsApp :</label>
						<input type="text" class="form-control" id="whatsapp" placeholder="WhatsApp" name="whatsapp" 
						value="<?php echo $m_whatsapp; ?>">                             
					</div>
				</div>
				
				<hr />
				
				
				<div class="row form-group">
						
						<div class="col-lg-6 col-md-6 form-group">                  
							<label>Under Master :</label>
							<?php if($_SESSION['supermaster'] != ''){ ?>
								<select class="form-control" name="master_by" onchange="getAdmin(this.value,0)">
								<option value="">Select Master</option>
								<?php while($rowmaster = mysqli_fetch_assoc($resultmaster)) { ?>
										<?php if($m_master_by == $rowmaster['a_id']) { ?>
											<option value="<?= $rowmaster['a_id']; ?>" selected="selected"><?= $rowmaster['a_username']; ?></option>
										<?php } else { ?>
											<option value="<?= $rowmaster['a_id']; ?>"><?= $rowmaster['a_username']; ?></option>
										<?php } ?>
								<?php } ?>
								</select>    
						<?php } else { ?>
							<input type="hidden" class="form-control" id="master_by" name="master_by" value="<?php echo $master_by; ?>">
							<input type="text" class="form-control" id="master_by_name" name="master_by_name" value="<?php echo $master_by_name; ?>" readonly>
						<?php } ?>
						</div>
						
					
						<div class="col-lg-6 col-md-6 form-group">                  
							<label>Under Admin :</label>
							<?php if($_SESSION['supermaster'] != ''){ ?>
								<select class="form-control" name="admin_by" id="admin_by" onchange="getReseller(this.value,0)">
									<option value="">Choose a Master First</option>
								</select>
							<?php } else if($_SESSION['master'] != ''){ ?>
								<select class="form-control" name="admin_by" id="admin_by" onchange="getReseller(this.value,0)">
								<option value="">Select Admin</option>
								<?php while($rowadmin = mysqli_fetch_assoc($resultadmin)) { ?>
										<?php if($m_admin_by == $rowadmin['a_id']) { ?>
											<option value="<?= $rowadmin['a_id']; ?>" selected="selected"><?= $rowadmin['a_username']; ?></option>
										<?php } else { ?>
											<option value="<?= $rowadmin['a_id']; ?>"><?= $rowadmin['a_username']; ?></option>
										<?php } ?>
								<?php } ?>
								</select>    
						<?php } else { ?>
							<input type="hidden" class="form-control" id="admin_by" name="admin_by" value="<?php echo $admin_by; ?>">
							<input type="text" class="form-control" id="admin_by_name" name="admin_by_name" value="<?php echo $admin_by_name; ?>" readonly>
						<?php } ?>
						</div>
					
					
					<?php if($_SESSION['master'] != '' || $_SESSION['supermaster'] != ''){ ?>
						<div class="col-lg-6 col-md-6 form-group">                  
							<label>Under Reseller :</label>
							<select class="form-control" name="reseller" id="reseller" onchange="getUpline(this.value,0)">
							<option value="">Choose an Admin First</option>
							</select>
						</div>
					<?php } else if($_SESSION['admin'] != '') { ?>
						<div class="col-lg-6 col-md-6 form-group">                  
							<label>Under Reseller :</label>
							<select class="form-control" name="reseller" id="reseller" onchange="getUpline(this.value,0)">
							<option value="">Select Reseller</option>
							<?php while($rowresellers = mysqli_fetch_assoc($resultresellers)) { ?>
									<?php if($m_reseller_by == $rowresellers['a_id']) { ?>
										<option value="<?= $rowresellers['a_id']; ?>" selected="selected"><?= $rowresellers['a_username']; ?></option>
									<?php } else { ?>
										<option value="<?= $rowresellers['a_id']; ?>"><?= $rowresellers['a_username']; ?></option>
									<?php } ?>
							<?php } ?>
							</select>
						</div>
					<?php } else { ?>
					<div class="col-lg-6 col-md-6 form-group">                  
							<label>Under Reseller :</label>
							<input type="hidden" class="form-control" id="reseller" name="reseller" value="<?php echo $reseller_id; ?>">
							<input type="text" class="form-control" id="reseller_name" name="reseller_name" value="<?php echo $reseller_name; ?>" readonly>
					</div>
					<?php } ?>
				</div>
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Upline :</label>
						<?php if(($_SESSION['master'] != '') || ($_SESSION['admin'] != '') || ($_SESSION['supermaster'] != '')){ ?>
							<select class="form-control" name="upline" id="upline">
							<option value="">Choose a Reseller First</option>
							</select>
						<?php } else { ?>
							<select class="form-control" name="upline" id="upline">
							<option value="">Select Upline</option>
							<?php while($rowmembers = mysqli_fetch_assoc($resultmembers)) { ?>
									<?php if($m_upline == $rowmembers['m_id']) { ?>
										<option value="<?= $rowmembers['m_id']; ?>" selected="selected"><?= $rowmembers['m_username']; ?></option>
									<?php } else { ?>
										<option value="<?= $rowmembers['m_id']; ?>"><?= $rowmembers['m_username']; ?></option>
									<?php } ?>
							<?php } ?>
							</select>
						<?php } ?>
					</div>
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Status :</label>
						<select class="form-control" name="status">
                            <?php
							if($m_status == '0'){ ?>
								<option value="1">Active</option>
								<option value="0" selected="selected">Inactive</option>
							<?php } else { ?>
								<option value="1" selected="selected">Active</option>
								<option value="0">Inactive</option>
							<?php } ?>
                    </select>                           
					</div>
					
					<?php if($m_id != '') { ?>
							<div class="col-lg-12 col-md-12 form-group">  
							<label>Referral Link :</label>
							<input type="text" class="form-control" id="referral_link" name="referral_link" value="<?php echo $website_url; ?>member/register_new.php?r=<?php echo $m_referal; ?>" readonly>   
							</div>
					<?php } ?>
				</div>
				
				
				<hr />       
               

              <div class="form-group text-left">
				<div class="col-lg-3 col-md-3 form-group"> 
				  <?php if($m_id != ''){ ?>
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
     </section>
      
      
  
  </div>
  <!-- /.content-wrapper -->
<?php
	if($_SESSION['supermaster'] != ''){
		if($m_id != '') { 
			if($m_master_by != '') {
		?>
			<script type="text/javascript">
			window.onload = function() {
				var m_master_id =  '<?= $m_master_by; ?>';
				var m_admin_id = '<?= $m_admin_by; ?>';
				getAdmin(m_master_id,m_admin_id);
				
				var m_reseller_by = '<?= $m_reseller_by; ?>';
				getReseller(m_admin_id,m_reseller_by);
				
				var m_upline = '<?= $m_upline; ?>';
				getUpline(m_reseller_by,m_upline);
			}
			</script>
		<?php
			}
		}
	} else if($_SESSION['master'] != ''){
		if($m_id != '') { 
			if($m_admin_by != '') {
		?>
			<script type="text/javascript">
			window.onload = function() {
				var m_admin_id =  '<?= $m_admin_by; ?>';
				var m_reseller_by = '<?= $m_reseller_by; ?>';
				getReseller(m_admin_id,m_reseller_by);
				
				var m_upline = '<?= $m_upline; ?>';
				getUpline(m_reseller_by,m_upline);
			}
			</script>
		<?php
			}
		}
	} else if($_SESSION['admin'] != '') { 

		if($m_id != '') { 
				if($m_reseller_by != '') {
			?>
				<script type="text/javascript">
				window.onload = function() {
					var m_res_by = '<?= $m_reseller_by; ?>';
					var m_upline = '<?= $m_upline; ?>';
					getUpline(m_res_by,m_upline);
				}
				</script>
			<?php
			}
		} 
	}
?> 
 

 <?php

require_once 'footer.php';

?>