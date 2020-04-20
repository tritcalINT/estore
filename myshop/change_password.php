<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
//include_once 'data/change_password_data.php';

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
      <h4> CHANGE PASSWORD：</h4>
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
			  <h3 class="box-title">Change Password</h3>
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
						echo "New password and Repeat password are not same";
					}
                    
                    ?>
                </div>
              </div>  
            <?php } ?>
			
                <form action="data/change_adminpassword.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="change_adminpassword">
			
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>New Password :</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password" >                            
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Repeat Password :</label>
						<input type="password" class="form-control" id="password_repeat" placeholder="Repeat Password" name="password_repeat" >                            
					</div>
				</div>
				
				
				<hr />       
               

              <div class="form-group text-left">
				<div class="col-lg-3 col-md-3 form-group"> 
					<button type="submit" class="btn btn-block btn-success">Update Password</button>
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