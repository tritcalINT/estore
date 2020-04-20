<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/support_message_data.php';

if (!empty($_GET['error'])) {
    $error = $_GET['error']; 
} else {
    $error = '';
}

if (!empty($_GET['send'])) {
    $send = $_GET['send']; 
} else {
    $send = '';
}
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> MEMBER SUPPORT：</h4>
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
              <h3 class="box-title">View Message</h3>
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
			
			<?php if($send != '') { ?>
			<div class="row">
                <div class="col-md-12 col-md-12" id="success_display">
                    <?php
                    
                    if($send == '1'){
                        echo "Your message is successfully send to the member";
                    }
                    
                    ?>
                </div>
              </div>  
            <?php } ?>
			
				<div class="row form-group">
					<div class="col-lg-12 col-md-12 form-group">                  
						<label>From User :</label><br/>
						<label  class="text-white"><?= $m_name; ?>(<?= $m_username; ?>)</label>                          
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Date :</label><br/>
						<label  class="text-white"><?= $ms_date; ?></label>                          
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Reference No :</label><br/>
						<label  class="text-white"><?= $ms_reference; ?></label>                          
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Subject:</label><br/>
						<label  class="text-white"><?= $ms_subject; ?></label>                            
					</div>
				</div>
				
				
				
				<div class="row form-group">
					
					<div class="col-lg-12 col-md-12 form-group">                  
						<label>Message :</label><br/>
						<label class="text-white"><?= nl2br($ms_message); ?></label>                            
					</div>
				</div>
				
				
				<hr /> 

				<form action="data/support_reply.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="support_reply">
				<input type="hidden" id="mid" name="mid" value="<?= $ms_id; ?>" />  
				<div class="row form-group">
					
					<div class="col-lg-12 col-md-12 form-group">                  
						<label>Reply :</label><br/>
						<textarea class="form-control" rows="5" id="reply_message" name="reply_message" placeholder="Reply" <?php if($ms_reply != '') { ?> readonly <?php } ?>><?= $ms_reply; ?></textarea>                           
					</div>
				</div>
				<?php if($ms_reply == '') { ?>
					<div class="row form-group">
					<div class="form-group text-left">
						<div class="col-lg-3 col-md-3 form-group"> 
							<button type="submit" class="btn btn-block btn-success">Send</button>
						</div>
					  </div> 
					</div>
				<?php } ?>
				</form>
				  
				  <hr /> 

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