<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/user_detail_data.php';
include_once 'data/functions.php';
include_once '../include/database.php';

if (!empty($_GET['error'])) {
    $error = $_GET['error']; 
} else {
    $error = '';
}

if($row['user_status'] == '1'){
    $status = 'Active';
} else{
    $status = 'Inactive';
}

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> USER SETTING：</h4>
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
			 
			  <h3 class="box-title">User Detail</h3>
		 

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
 if($user_id != ''){ ?>
                <form action="data/update_user.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                                
            <?php }  ?>
			<div class="row form-group">						
				<div class="col-lg-6 col-md-6 form-group">
					<div class="user_image">
					<?php if($row['user_pic'] == ''){ ?>
                                            <img src="../images/logo/avt.png" class="img-circle profile_image" alt="User Image">
					<?php } else { ?>
                                                <img src="../uploads/profiles/<?= $row['user_pic']; ?>" class="img-circle profile_image" style="width: 100px; height: auto" alt="<?php echo $user_id; ?>">
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
						<input type="text" class="form-control" id="user_name" placeholder="Username" name="user_name" value="<?php echo $row['user_name']; ?>" >                            
					</div>
					
                                        <div class="col-lg-6 col-md-6 form-group">                  
						<label>User Refer By :</label>
<!--                                                <input type="text" class="form-control" id="member_refernce" placeholder="Reference" name="member_refernce" value="<?php echo getallUsernamebyUserid($row['user_member_reference'], $conn) ?>">  -->
                                                <select class="form-control" name="user_member_reference" id="user_member_reference">
                                                   
                                                          <?php
                                                             $database-> loadAllUsers($row['user_member_reference']);
                                                            ?>
                                                     </select>
					</div>
                                    
                                     <div class="col-lg-6 col-md-6 form-group">
                                        <label>User Type</label>
                                         <select class="form-control" name="user_type" id="user_type">
                                                   
                                                          <?php
                                                             $database-> loadAllUsersType($row['user_type']);
                                                            ?>
                                            </select>
						 
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 form-group">                  
						<label>User Level:</label>
						<input type="text" class="form-control" id="user_level" placeholder="User Level" name="user_level" value="<?php echo $row['user_level']; ?>" >                            
					</div>
                                    
                                     <div class="col-lg-6 col-md-6 form-group">                  
						<label>User SCG Reference ID :</label>
						<input type="text" class="form-control" id="scg_ref" placeholder="Scg Ref" name="scg_ref" value="<?php echo $row['scg_ref']; ?>" >                            
					</div>
                                    
                                    <div class="col-lg-6 col-md-6 form-group">
                                        <label>User Currency Type</label>
                                         <select class="form-control" name="currency" id="currency">
                                                   
                                                          <?php
                                                              $database->loadCurrency();
                                                            ?>
                                            </select>
						 
                                    </div>
                                    
				</div>
                                    
                                    <hr>
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>First  Name :</label>
						<input type="text" class="form-control" id="user_fname" placeholder="First Name" name="user_fname" value="<?php echo $row['user_fname'] ; ?>" title="Enter a valid Name">                            
					</div>
                                    <div class="col-lg-6 col-md-6 form-group">                  
						<label>Second  Name :</label>
						<input type="text" class="form-control" id="user_lname" placeholder="First Name" name="user_lname" value="<?php echo $row['user_lname'] ; ?>" title="Enter a valid Name">                            
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Email :</label>
						<input type="text" class="form-control" id="user_email" placeholder="Email" name="user_email" value="<?php echo $row['user_email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter a valid email">                            
					</div>
                                    
                                   <div class="col-lg-6 col-md-6 form-group">                  
						<label>Date of Birth :</label>
						<input type="text" class="form-control" id="user_dob" placeholder="Date of Birth" name="user_dob" value="<?php echo $row['user_dob']; ?>" >                            
					</div>

				</div>
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label >Mobile Number :</label>
						
						<input type="text" class="form-control" id="user_phone" placeholder="Phone" name="user_phone" value="<?php echo $row['user_phone']; ?>"> 						
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Line ID :</label>
						<input type="text" id="user_lineId" autocomplete="off" name="user_lineId" class="form-control" placeholder="Line ID"  value="<?php echo $row['user_lineId']; ?>" >                            
					</div>
                                    <div class="col-lg-6 col-md-6 form-group">
                                                 <label>WhatsApp Number :</label>
						 <input type="text" id="user_whatsapp" name="user_whatsapp"  class="form-control" placeholder="WhatsApp ID" value="<?php echo $row['user_whatsapp'] ?>">
                                     </div>
				</div>
				 
								<hr /> 
				
				<div class="row form-group">
					
				    <div class="col-lg-6 col-md-6 form-group">
                                         <label>Address :</label>
                                          <input type="text"  id="user_address" name="user_address" class="form-control " placeholder="Your Address" value="<?php echo $row['user_address'] ?>">
                                    </div><!-- End .input-group -->
                                    
                                    <div class="col-lg-6 col-md-6 form-group">
                                          <label>City :</label>
                                          <input type="text" id="user_city" name="user_city"  class="form-control " placeholder="Your City" value="<?php echo $row['user_city'] ?>">
                                    </div><!-- End .input-group -->
                                    
                                    <div class="col-lg-6 col-md-6 form-group">
                                         <label>Post Code :</label>
                                         
                                         <input type="text" name="user_postal_code" id="user_postal_code"  class="form-control " placeholder="Your Post Code" value="<?php echo $row['user_postal_code'] ?>">
                                    </div><!-- End .input-group -->
                                    
                                    
                                    <div class="col-lg-6 col-md-6 form-group">
                                        <label>Country :</label>  
                                      <input type="text" name="user_country"  class="form-control " placeholder="Your Country" value="<?php echo $row['user_country'] ?>">
                                                 
                                    
                                    </div><!-- End .input-group -->
                                                
                                     <div class="col-lg-6 col-md-6 form-group">
                                         <label>Region / State :</label> 
                                         <input type="text" name="user_state"  class="form-control " placeholder="Your State" value="<?php echo $row['user_state'] ?>">
                                    </div><!-- End .input-group -->
                                                
				</div>
				

	
				
				<hr />
                                
                                <div class="row form-group">
	
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>Account Status</label>
                                                <input type="text" class="form-control" id="whatsapp" placeholder="WhatsApp" name="whatsapp" disabled value="<?php echo $status ?>">                             
					</div>
				</div>


              <div  class="row form-group">
                <div class="col-lg-3 col-md-3 form-group"> 

                <button type="submit" class="btn btn-block btn-success">Update Now</button>

                </div>
                <div class="col-lg-3 col-md-3 form-group"> 
                        <button type="reset" class="btn btn-block btn-warning">Reset</button>
                </div>
                  
                <div class="col-lg-3 col-md-3 form-group">
                    
               <button type="button" onclick="window.location.href='../pass_update.php?user_id=<?php echo $user_id?>'" class="btn btn-block btn-danger">Update Password</button>
                </div>
              </div>        
			  
        </form>
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