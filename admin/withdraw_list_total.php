<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/withdraw_list_total_data.php';
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

                <b class="white-color">MEMBERS WITHDRAW TOTAL</b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form action="withdraw_list_total.php" method="post" enctype="multipart/form-data" name="filter_withdraw">
            <div class="box-header">
              <h3 class="box-title">Withdraw Total: <?= $withdraw_total; ?></h3>
              <div class="box-tools">
			 
			    <div class="col-lg-2 col-md-2">                  
					<input type="text" name="from_date" id="from_date" class="form-control pull-right" placeholder="From Date" value="<?= $from_date; ?>">                           
				</div>
				
				<div class="col-lg-2 col-md-2">                  
					<input type="text" name="to_date" id="to_date" class="form-control pull-right" placeholder="To Date" value="<?= $to_date; ?>">                           
				</div>
				
				<div class="col-lg-2 col-md-2">
					<select class="form-control" name="w_status">
						<option value="" <?php if($withdraw_status == "") { ?> selected <?php } ?>>All Status</option>
						<option value="0" <?php if($withdraw_status == "0") { ?> selected <?php } ?>>Pending</option>
						<option value="1" <?php if($withdraw_status == "1") { ?> selected <?php } ?>>Approved</option>
						<option value="2" <?php if($withdraw_status == "2") { ?> selected <?php } ?>>Rejected</option>
					</select>
				</div>
				
				<?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
					<div class="col-lg-3 col-md-3">
						<select class="form-control" name="r_id">
							<option value="">All Reseller</option>
							<?php while($row_resellers = mysqli_fetch_assoc($result_resellers)) { ?>
							  <?php if($row_resellers['a_id'] == $reseller_id) { ?>
									<option value="<?= $row_resellers['a_id']; ?>" selected="selected"><?= $row_resellers['a_username']; ?></option>
							  <?php } else { ?>
									<option value="<?= $row_resellers['a_id']; ?>"><?= $row_resellers['a_username']; ?></option>
							  <?php }
								} ?>
						</select>
					</div>
				<?php } ?>
				
				<div class="col-lg-2 col-md-2">                  
					<button type="submit" class="btn btn-block btn-info">Filter</button>                           
				</div>
              </div>
            </div>
			</form>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-striped">
                <thead class="white-color">
                <tr>
                  <th>#</th>
				  <th>Username</th>
				  <th>Name</th>
				  <th>Withdraw Date</th>
                  <th>From</th>
				  <th>Method</th>
				  <th>Method Details</th>
				  <th>Actual Amount</th>
				  <th>Reseller</th>
				  <th>Status</th>
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
				
				if($row['mw_status'] == '0'){
					$mw_status = 'Pending';
				} else if($row['mw_status'] == '1'){
					$mw_status = 'Approved';
				} else if($row['mw_status'] == '2'){
					$mw_status = 'Rejected';
				}
					
				?>
                <tr id="tr<?php echo $row['mw_id'];?>">
                  <td><?php echo $i++; ?></td>
				  <td><?php echo $row['m_username']; ?></td>
				  <td><?php echo $row['m_name']; ?></td>
				  <td><?php echo $row['withdraw_date']; ?></td>
				  <td><?php echo $mw_type; ?></td>
				  <td><?php echo $mw_method; ?></td>
				  <td><?php echo $mw_details; ?></td>
				  <td><?php echo $row['mw_amount']; ?></td>
				  <td><?php echo $row['a_username']; ?></td>
				  <td><?php echo $mw_status; ?></td>
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