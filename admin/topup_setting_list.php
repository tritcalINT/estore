<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/topup_setting_list_data.php';
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
      <div class="row">
        <div class="col-md-12">

                <b class="white-color">TOP-UP SETTING LIST </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
              <h3 class="box-title"><button type="button" class="btn btn-block btn-danger" onclick="location.href='topup_setting_add.php';">Add New Top-up Setting</button></h3>
              <div class="box-tools">
                <form action="topup_setting_list.php" method="post" enctype="multipart/form-data" name="topup_setting_list">
					<div class="col-lg-6 col-xs-6">                  
						<input type="text" name="search_value" id="search_value" class="form-control pull-right" placeholder="Value" value="<?= $search_value; ?>">                           
					</div>
					
					<div class="col-lg-6 col-xs-6">                  
						<button type="submit" class="btn btn-block btn-info">Search</button>                           
					</div>
				</form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-striped">
                <thead class="white-color">
                <tr>
                  <th>#</th>
                  <th>Amount($)</th>
                  <th>Expiry</th>
                  <th>Status</th>
				  <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
				 <?php 
				$i=1;
				while($row = mysqli_fetch_assoc($result)) { 
					if($row['ts_status'] == '1'){
						$ts_status = 'Active';
					} else{
						$ts_status = 'Inactive';
					}
				?>
                <tr>
                  <td><?php echo $i++; ?></td>
				  <td><?php echo $row['ts_from_amount']; ?> - <?php echo $row['ts_to_amount']; ?></td>
				  <td><?php echo $row['ts_expiry'].' days'; ?></td>
                  <td id="tdts<?php echo $row['ts_id'];?>"><?php echo $ts_status; ?></td>                 
                  <td><button type="button" class="btn btn-block btn-success" onclick="location.href='topup_setting_add.php?action=update&ts=<?php echo $row['ts_id']; ?>';">Update</button></td>
                  <td><?php if($row['ts_status'] == '1'){ ?><button type="button" id="btnts<?php echo $row['ts_id'];?>" class="btn btn-block btn-danger" onclick="deactivateRecord('<?php echo $row['ts_id'];?>', 'ts');">Deactivate</button><?php } ?></td>              
                </tr>
				
				<?php } ?>
          
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
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