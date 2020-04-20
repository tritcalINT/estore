<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/withdraw_list_pending_data.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> MEMBER REQUEST</h4>
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

                <b class="white-color">WITHDRAW LIST WAITING FOR APPROVAL </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
              <h3 class="box-title">&nbsp;</h3>
              <div class="box-tools">
					<form action="withdraw_list_pending.php" method="post" enctype="multipart/form-data" name="withdraw_list_search">
						<div class="col-lg-4 col-xs-4">                  
							<input type="text" name="search_date" id="search_date" class="form-control pull-right" placeholder="Date" value="<?= $search_date; ?>">                           
						</div>
						<div class="col-lg-4 col-xs-4">                  
							<input type="text" name="search_value" id="search_value" class="form-control pull-right" placeholder="Value" value="<?= $search_value; ?>">                           
						</div>
						
						<div class="col-lg-4 col-xs-4">                  
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
                  <th>Date</th>
                  <th>Ref No</th>
				  <th>Member Username</th>
				  <?php if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){ ?>
					<th>Under Master</th>
				  <?php } ?>
                  <th>From</th>
				  <th>Method</th>
				  <th>Method Details</th>
				  <th>Actual Amount</th>
				  <th>Amount in Currency</th>
				  <th>Service Charge</th>
				  <th>Amount after Service Charge</th>
				  <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
				 <?php 
				$i=1;
				if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) { 
				
				if($row['mw_type'] == '1'){
					$mw_type = 'THAWED ACCOUNT';
				} else if($row['mw_type'] == '2'){
					$mw_type = 'BONUS';
				}
				
				if($row['cu_type'] == '1'){
					$mw_method = 'Bank';
					$mw_details = $row['m_bank_name']."<br/>Account No: ".$row['m_bank_account_no']."<br/>Branch: ".$row['m_bank_branch'];
				} else if($row['cu_type'] == '2'){
					$mw_method = 'Bitcoin';
					$mw_details = $row['m_bitcoin'];
				} else if($row['cu_type'] == '3'){
					$mw_method = 'Litecoin';
					$mw_details = $row['m_litecoin'];
				}
					
				?>
                <tr id="tr<?php echo $row['mw_id'];?>">
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['withdraw_date']; ?></td>
                  <td><?php echo $row['mw_reference']; ?></td>
				  <td><?php echo $row['m_username']; ?></td>
				  <?php if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){ ?>
					<td><?php echo $row['master_username']; ?></td>
				  <?php } ?>
				  <td><?php echo $mw_type; ?></td>
				  <td><?php echo $mw_method; ?></td>
				  <td><?php echo $mw_details; ?></td>
				  <td><?php echo $row['mw_amount']; ?></td>
				  <td><?php echo '('.$row['cu_name'].') '.$row['mw_amount_currency']; ?></td>
				  <td><?php echo $row['mw_service']; ?>%</td>
				  <td><?php echo '('.$row['cu_name'].') '.$row['mw_actual_amount_currency']; ?></td>
				  <td><button type="button" class="btn btn-block btn-success" onclick="changeStatus('<?php echo $row['mw_id'];?>','1','<?php echo $row['mw_reference']; ?>','withdraw');">Approve</button></td>
				  <td><button type="button" class="btn btn-block btn-danger" onclick="changeStatus('<?php echo $row['mw_id'];?>','2','<?php echo $row['mw_reference']; ?>','withdraw');">Reject</button></td> 

                </tr>
				
				<?php } } else { ?>
					<tr>
					  <?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
						<td colspan="12">No Withdraw waiting for approval</td>
					  <?php } else { ?>
					    <td colspan="11">No Withdraw waiting for approval</td>
					  <?php } ?>
					</tr>
				<?php } ?>
          
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
         </div>
           
		<?php include_once 'mymodal.php'; ?>
		
     </div>
     </div>
     </section>
      
      
 
 
 
 
  </div>
  <!-- /.content-wrapper -->

 <?php

require_once 'footer.php';

?>