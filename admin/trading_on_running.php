<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/trading_on_running_data.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> TRADING</h4>
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

                <b class="white-color">TRADING LIST ON RUNNING </b>

                <div class="box-body">
              <div class="box box-primary">
			  <form action="trading_on_running.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="trading_list" id="trading_list">
				<input type="hidden" name="smember" id="smember">
				<input type="hidden" name="sreseller" id="sreseller">
				<input type="hidden" name="sdate" id="sdate">
				<input type="hidden" name="samount" id="samount">
				<input type="hidden" name="stype" id="stype">
			  </form>
            
            <!-- /.box-header -->
            <!-- form start -->
			<form action="data/pay_trading_selected.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="pay_trading" id="pay_trading">
			<input type="hidden" name="tpercent" id="tpercent">
			<input type="hidden" name="tstatus" id="tstatus">
            
			<div class="box-header trading-search">
              <div class="box-tools">
				<div class="col-lg-2 col-md-2">                  
					<input type="text" name="search_member" id="search_member" class="form-control pull-right" placeholder="Search Member" value="<?= $search_member; ?>">                           
				</div>
				 <?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != '') { ?>
				<div class="col-lg-2 col-md-2">                  
					<input type="text" name="search_reseller" id="search_reseller" class="form-control pull-right" placeholder="Search Reseller" value="<?= $search_reseller; ?>">                           
				</div>
				 <?php } ?>
				<div class="col-lg-2 col-md-2">                  
					<input type="text" name="search_date" id="search_date" class="form-control pull-right" placeholder="Search Date" value="<?= $search_date; ?>">                           
				</div>
				<div class="col-lg-2 col-md-2">                  
					<input type="text" name="search_amount" id="search_amount" class="form-control pull-right" placeholder="Search Amount" value="<?= $search_amount; ?>">                           
				</div>
				<div class="col-lg-2 col-md-2">                  
					<select class="form-control input-sm" name="trade_type" id="trade_type">
					    <option value="">All</option>
						<option value="1" <?php if($search_type == '1'){ echo "selected"; } ?>>Manual</option>
						<option value="2" <?php if($search_type == '2'){ echo "selected"; } ?>>Auto</option>
						<option value="3" <?php if($search_type == '3'){ echo "selected"; } ?>>Contract</option>
					</select>                          
				</div>

				<div class="col-lg-2 col-md-2">                  
					<button type="button" class="btn btn-block btn-info" onclick="searchTrading();">Search</button>                           
				</div>
				
              </div>
			
			
			<?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
				  <h3 class="box-title"><button type="button" class="btn btn-block btn-success" onclick="payTradingSelected('1');">Pay Now</button></h3>
				  <h3 class="box-title"><button type="button" class="btn btn-block btn-success" onclick="payTradingSelected('2');">Pay and Return</button></h3>
			<?php } ?>
			</div>
			
			
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-striped">
                <thead class="white-color">
                <tr>
				  <?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
					<th><input type="checkbox" onClick="toggle(this)" /></th>
				  <?php } ?>
                  <th>#</th>
                  <th>Date</th>
                  <th>Ref No</th>
				  <th>Member</th>
				  <?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != '') { ?>
					<th>Reseller</th>
				  <?php } ?>
				  <?php if($_SESSION['master'] != '' || $_SESSION['supermaster'] != '') { ?>
					<th>Admin</th>
				  <?php } ?>
                  <th>Market Name</th>
				  <th>Amount</th>
				  <th>Type</th>
				  <?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
					<th colspan="2">Action</th>
				  <?php } ?>
                </tr>
                </thead>
                <tbody>
				 <?php 
				$i=1;
				if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) { 
				if($row['mt_type'] == '1'){
					$trading_type = 'Manual';
					$label = 'label-success';
				} elseif($row['mt_type'] == '2'){
					$trading_type = 'Auto';
					$label = 'label-danger';
				} elseif($row['mt_type'] == '3'){
					$trading_type = 'Contract';
					$label = 'label-info';
				} else {
					$trading_type = '';
					$label = '';
				}
				?>
                <tr id="tr<?php echo $row['mt_id'];?>">
				  <?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
					<td><input type="checkbox" name="trade[]" value="<?php echo $row['mt_id'];?>" id="trade<?php echo $row['mt_id'];?>"></td>
				  <?php } ?>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['trade_date']; ?></td>
                  <td><?php echo $row['mt_reference']; ?></td>
				  <td><?php echo $row['m_username']; ?></td>
				  <?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != '') { ?>
					<td><?php echo $row['reseller_user']; ?></td>
				  <?php } ?>
				  <?php if($_SESSION['master'] != '' || $_SESSION['supermaster'] != '') { ?>
					<td><?php echo $row['admin_user']; ?></td>
				  <?php } ?>
				  <td><?php echo $row['tr_name']; ?></td>
				  <td><?php echo $row['mt_amount']; ?></td>
				  <td><span class="label <?= $label; ?>"><?= $trading_type; ?></span></td>
				  <?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
					  <td><button type="button" class="btn btn-block btn-success" onclick="payTrading('<?php echo $row['mt_id'];?>','1','<?php echo $row['mt_reference']; ?>','<?php echo $row['mt_amount']; ?>','<?php echo $row['m_id']; ?>');">Pay Now</button></td>    
					  <td><button type="button" class="btn btn-block btn-success" onclick="payTrading('<?php echo $row['mt_id'];?>','2','<?php echo $row['mt_reference']; ?>','<?php echo $row['mt_amount']; ?>','<?php echo $row['m_id']; ?>');">Pay and Return</button></td>
				  <?php } ?>
                </tr>
				
				<?php } } else { ?>
					<tr>
					   <?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
							<td colspan="11">No Trading list on running</td>
					   <?php } else { ?>
						    <td colspan="9">No Trading list on running</td>
					   <?php } ?>
					</tr>
				<?php } ?>
          
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
			</form>
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