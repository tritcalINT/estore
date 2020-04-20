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
      <h4> COMMISSION PAY ：</h4>
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
            
			<form id="frmgfundpayout" name="frmgfundpayout" class="templatemo-login-form" method="post"  >
            <div class="box-body">
				<div class="box-header">
				  <h3 class="box-title">Pay out daily basis</h3>
				</div>
				<hr />
	

              <div class="form-group text-left">
				<div class="col-lg-4 col-md-4 form-group"> 
                                    <!--<input type="submit" class="btn btn-block btn-success" value="<?php // echo $lang['GFUND_PAYOUT_BUTTON'];?>">-->
                                    <button type="button" class="btn btn-block btn-success" onclick="confirmpostinggpayoutfund();">COMMISSION PAY</button>
				</div>
                                <div class="col-lg-3 col-md-3 form-group"> 
					<button type="button" onclick="location.href = 'admin.php';" class="btn btn-block btn-warning">Close</button>
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