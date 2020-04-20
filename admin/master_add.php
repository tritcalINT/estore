<?php
require_once 'session_supermaster.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/master_add_data.php';

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
			<?php if($a_id != '') { ?>
			  <h3 class="box-title">Update Master</h3>
			<?php } else { ?>
              <h3 class="box-title">Add New Master</h3>
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
                       echo "Master Username already registered "; 
                    } else if($error == '3'){
					  echo "Master Username can only be alphabets & numbers "; 
					}
                    
                    ?>
                </div>
              </div>  
            <?php } ?>
			
			<?php
            if($a_id != ''){ ?>
                <form action="data/update_master.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_master">
                <input type="hidden" name="id" value="<?php echo $a_id; ?>">
            <?php } else { ?>
                <form action="data/register_newmaster.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="registration_master">
            <?php } ?>
			
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Master Username :</label>
						<input type="text" class="form-control" id="user_name" placeholder="Master Username" name="user_name" value="<?php echo $a_username; ?>" <?php if($a_id != '') { ?> readonly <?php } ?>>                            
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Master Password :</label>
						<input type="password" class="form-control" id="password" placeholder="Master Password" name="password" >                            
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Full Name :</label>
						<input type="text" class="form-control" id="full_name" placeholder="Full Name" name="full_name" value="<?php echo $a_name; ?>">                            
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Status :</label>
						<select class="form-control" name="status">
                            <?php
							if($a_status == '0'){ ?>
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
				  <?php if($a_id != ''){ ?>
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