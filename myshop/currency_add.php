<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/currency_add_data.php';

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
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
			<?php if($cu_id != '') { ?>
			  <h3 class="box-title">Update Currency</h3>
			<?php } else { ?>
              <h3 class="box-title">Add New Currency</h3>
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
                    }
                    
                    ?>
                </div>
              </div>  
            <?php } ?>
			
			<?php
            if($cu_id != ''){ ?>
                <form action="data/update_currency.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_currency">
                <input type="hidden" name="id" value="<?php echo $cu_id; ?>">
            <?php } else { ?>
                <form action="data/register_newcurrency.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="registration_currency">
            <?php } ?>
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Currency :</label>
						<input type="text" class="form-control" id="currency_name" placeholder="Currency" name="currency_name" value="<?php echo $cu_name; ?>">                            
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Decimal :</label>
						<select class="form-control" name="decimal">
							<option value="2" <?php if($cu_decimal == '2'){ echo 'selected'; } ?>>2</option>
							<option value="3" <?php if($cu_decimal == '3'){ echo 'selected'; } ?>>3</option>
							<option value="4" <?php if($cu_decimal == '4'){ echo 'selected'; } ?>>4</option>
							<option value="5" <?php if($cu_decimal == '5'){ echo 'selected'; } ?>>5</option>
							<option value="6" <?php if($cu_decimal == '6'){ echo 'selected'; } ?>>6</option>
							<option value="7" <?php if($cu_decimal == '7'){ echo 'selected'; } ?>>7</option>
							<option value="8" <?php if($cu_decimal == '8'){ echo 'selected'; } ?>>8</option>							
                    </select>                           
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Deposit Exchange Rate :</label>
						<input type="text" class="form-control" id="exchange_rate" placeholder="Deposit Exchange Rate" name="exchange_rate" value="<?php echo $cu_rate; ?>">                       
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Withdraw Exchange Rate :</label>
						<input type="text" class="form-control" id="exchange_rate_withdraw" placeholder="Withdraw Exchange Rate" name="exchange_rate_withdraw" value="<?php echo $cu_withdraw_rate; ?>">                       
					</div>
				</div>
				
				<div class="row form-group">	
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Currency Type :</label>
						<select class="form-control" name="type">
						    <option value="1" <?php if($cu_type == '1'){ echo 'selected'; } ?>>Bank</option>
							<option value="2" <?php if($cu_type == '2'){ echo 'selected'; } ?>>Bitcoin</option>
							<option value="3" <?php if($cu_type == '3'){ echo 'selected'; } ?>>Litecoin</option>						
                    </select>                           
					</div>
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Status :</label>
						<select class="form-control" name="status">
                            <?php
							if($cu_status == '0'){ ?>
								<option value="1">Active</option>
								<option value="0" selected="selected">Inactive</option>
							<?php } else { ?>
								<option value="1" selected="selected">Active</option>
								<option value="0">Inactive</option>
							<?php } ?>
                    </select>                           
					</div>
				</div>
				
				<?php if($_SESSION['supermaster'] != ''){ ?>
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">   
						<label>Under Master :</label>
							<select class="form-control" name="master_by" id="master_by">
							<option value="0">No Master</option>
							<?php while($rowmaster = mysqli_fetch_assoc($resultmaster)) { ?>
									<?php if($a_master_by == $rowmaster['a_id']) { ?>
										<option value="<?= $rowmaster['a_id']; ?>" selected="selected"><?= $rowmaster['a_username']; ?></option>
									<?php } else { ?>
										<option value="<?= $rowmaster['a_id']; ?>"><?= $rowmaster['a_username']; ?></option>
									<?php } ?>
							<?php } ?>
							</select>  
					</div>
				</div>
				<?php } else { ?>
					<input type="hidden" class="form-control" id="master_by" name="master_by" value="<?php echo $master_by; ?>">
				<?php } ?>
				
				
				<div class="row form-group">	
					<div class="col-lg-12 col-md-12 form-group">                  
						<label>Currency Type Details:</label>
						<textarea class="form-control" rows="3" name="type_details" id="type_details"><?= $cu_type_details; ?></textarea>
					</div>
				</div>
				
				<hr />       
               

              <div class="form-group text-left">
				<div class="col-lg-3 col-md-3 form-group"> 
				  <?php if($cu_id != ''){ ?>
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