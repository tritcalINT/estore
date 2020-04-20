<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/admin_setting_data.php';

if (!empty($_GET['error'])) {
    $error = $_GET['error']; 
} else {
    $error = '';
}

if (!empty($_GET['success'])) {
    $success = $_GET['success']; 
} else {
    $success = '';
}

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> ADMIN SETTING：</h4>
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
		
			<?php if($error != '') { ?>
			  <div class="row">
                <div class="col-md-12 col-md-12" id="error_display">
                    <?php
                    
                    if($error == '1'){
                        echo "Please fill-in all the required fields";
                    }
                    
                    ?>
                </div>
              </div>  
            <?php } ?>
			
			<?php if($success != '') { ?>
			<div class="row">
                <div class="col-md-12 col-md-12" id="success_display">
                    <?php
                    
                    if($success == '1'){
                        echo "Settings has been updated";
                    }
                    
                    ?>
                </div>
              </div>  
            <?php } ?>
            
			<form action="data/update_admin_setting.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_admin_setting">
            <div class="box-body">
				<div class="box-header">
				  <h3 class="box-title">Top-up setting</h3>
				</div>
				<hr />
			
                

				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Minimum Top-up Limit ($) :</label>
						<input type="text" class="form-control" id="topup_limit" placeholder="Minimum Top-up Limit" name="topup_limit" value="<?php echo $as_topup_limit; ?>">                            
					</div>
				</div>
				
				<div class="box-header">
				  <h3 class="box-title">Withdraw setting</h3>
				</div>
				<hr />
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Minimum Withdraw Limit ($) :</label>
						<input type="text" class="form-control" id="withdraw_limit" placeholder="Minimum Withdraw Limit" name="withdraw_limit" value="<?php echo $as_withdraw_limit; ?>" >                            
					</div>
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Withdraw Service Charge (%) :</label>
						<input type="text" class="form-control" id="withdraw_service" placeholder="Withdraw Service Charge" name="withdraw_service" value="<?php echo $as_withdraw_service; ?>" >                            
					</div>
				</div>
				
				
				<div class="box-header">
				  <h3 class="box-title">Chart setting</h3>
				</div>
				<hr />
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Minimum Value ($) :</label>
						<input type="text" class="form-control" id="min_chart" placeholder="Minimum Chart Value" name="min_chart" value="<?php echo $as_trading_min; ?>" >                            
					</div>
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Maximum Value ($) :</label>
						<input type="text" class="form-control" id="max_chart" placeholder="Maximum Chart Value" name="max_chart" value="<?php echo $as_trading_max; ?>" >                            
					</div>
				</div>
				
				
				<hr />       
               

              <div class="form-group text-left">
				<div class="col-lg-3 col-md-3 form-group"> 
					<button type="submit" class="btn btn-block btn-success">Update Now</button>
				</div>
              </div>        
			  
			  
            </div>
            <!-- /.box-body -->
			</form>

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