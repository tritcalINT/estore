<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/topup_setting_add_data.php';

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
      <h4> TOP-UP SETTING：</h4>
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
			<?php if($ts_id != '') { ?>
			  <h3 class="box-title">Update Top-up Setting</h3>
			<?php } else { ?>
              <h3 class="box-title">Add New Top-up Setting</h3>
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
                    }
                    
                    ?>
                </div>
            </div>    
            <?php } ?>
			
			
			<?php
            if($ts_id != ''){ ?>
                <form action="data/update_topup_setting.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_topup_setting">
                <input type="hidden" name="id" value="<?php echo $ts_id; ?>">
            <?php } else { ?>
                <form action="data/register_topup_setting.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="register_topup_setting">
            <?php } ?>
			
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>From Amount($) :</label>
						<input type="text" class="form-control" id="from_amount" placeholder="From Amount" name="from_amount" value="<?php echo $ts_from_amount; ?>">                            
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>To Amount($) :</label>
						<input type="text" class="form-control" id="to_amount" placeholder="To Amount" name="to_amount" value="<?php echo $ts_to_amount; ?>">                           
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Expiry (Days) :</label>
						<input type="text" class="form-control" id="expiry" placeholder="Expiry Days" name="expiry" value="<?php echo $ts_expiry; ?>">                            
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Status :</label>
						<select class="form-control" name="status">
                            <?php
							if($ts_status == '0'){ ?>
								<option value="1">Active</option>
								<option value="0" selected="selected">Inactive</option>
							<?php } else { ?>
								<option value="1" selected="selected">Active</option>
								<option value="0">Inactive</option>
							<?php } ?>
                    </select>                           
					</div>
				</div>
				
				<hr />       
               

              <div class="form-group text-left">
				<div class="col-lg-3 col-md-3 form-group"> 
				  <?php if($ts_id != ''){ ?>
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

require_once 'footer.php';

?>