<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/trade_setting_add_data.php';

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
      <h4> TRADE SETTING：</h4>
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
			<?php if($tr_id != '') { ?>
			  <h3 class="box-title">Update Trade Setting</h3>
			<?php } else { ?>
              <h3 class="box-title">Add New Trade Setting</h3>
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
            if($tr_id != ''){ ?>
                <form action="data/update_trade_setting.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_trade_setting">
                <input type="hidden" name="id" value="<?php echo $tr_id; ?>">
            <?php } else { ?>
                <form action="data/register_trade_setting.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="register_trade_setting">
            <?php } ?>
			
				<div class="row form-group">
					<div class="col-lg-12 col-md-12 form-group">                  
						<label>Market Name :</label>
						<input type="text" class="form-control" id="market_name" placeholder="Market Name" name="market_name" value="<?php echo $tr_name; ?>">                            
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Total Trading($) :</label>
						<input type="text" class="form-control" id="total_trading" placeholder="Total Trading" name="total_trading" value="<?php echo $tr_max; ?>">                           
					</div>
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Status :</label>
						<select class="form-control" name="status">
                            <?php
							if($tr_status == '0'){ ?>
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
				  <?php if($tr_id != ''){ ?>
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