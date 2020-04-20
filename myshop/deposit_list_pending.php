<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/deposit_list_pending_data.php';
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

                <b class="white-color">DEPOSIT LIST WAITING FOR APPROVAL </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
              <h3 class="box-title">&nbsp;</h3>
              <div class="box-tools">
					<form action="deposit_list_pending.php" method="post" enctype="multipart/form-data" name="deposit_list_search">
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
				  <th>Upline</th>
                  <th>Package Name</th>
				  <th>Payment Type</th>
				  <th>Payment Method</th>
				  <th>Amount</th>
				  <th>Reward Bonus</th>
				  <th>Pay Slip</th>
				  <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
				 <?php 
				$i=1;
				if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) { 
				?>
                <tr id="tr<?php echo $row['md_id'];?>">
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['deposit_date']; ?></td>
                  <td><?php echo $row['md_reference']; ?></td>
				  <td><?php echo $row['m_username']; ?></td>
				  <?php if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){ ?>
					<td><?php echo $row['master_username']; ?></td>
				  <?php } ?>
				  <td><?php echo $row['upline_username']; ?></td>
				  <td><?php if($row['mp_name'] != '') { echo $row['mp_name'].' ['.$row['mp_price_dollar'].']'; } ?></td>
				  <td><?php echo $row['md_type']; ?></td>
				  <td><?php echo $row['cu_name']; ?></td>
				  <td><?php echo number_format((float)($row['md_amount']+$row['md_fund_amount']), $row['cu_decimal'], '.', ''); ?></td>
				  <td><?php if($row['md_rewards_amount'] != '') { echo $row['md_rewards_amount'].' ('.$row['md_rewards_percent'].'%)'; } ?></td>
				  <td><?php // echo $row['md_slip'] ?><a href="#" onclick="viewImg('<?php echo '../uploads/deposit/'.$row['md_slip'];?>');">View</a></td>
				  <td><button type="button" class="btn btn-block btn-success" onclick="changeStatus('<?php echo $row['md_id'];?>','1','<?php echo $row['md_reference']; ?>','deposit');">Approve</button></td>
				  <td><button type="button" class="btn btn-block btn-danger" onclick="changeStatus('<?php echo $row['md_id'];?>','2','<?php echo $row['md_reference']; ?>','deposit');">Reject</button></td>  			  
                </tr>
				
				<?php } } else { ?>
					<tr>
					   <?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
							<td colspan="10">No Deposits waiting for approval</td>
					   <?php } else { ?>
							<td colspan="9">No Deposits waiting for approval</td>
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