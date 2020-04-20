<?php

require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/functions.php';
include_once 'data/history_data.php';


if (!empty($_GET['tab'])) {
    $tab = $_GET['tab']; 
} else {
    $tab = '';
}

if (!empty($_GET['renew'])) {
    $modal_title = $lang['MODAL_RENEW_TITLE'];
	$modal_text = $lang['MODAL_RENEW_TEXT'];
} else if (!empty($_GET['upgrade'])) {
    $modal_title = $lang['MODAL_UPGRADE_TITLE'];
	$modal_text = $lang['MODAL_UPGRADE_TEXT']; 
} else if (!empty($_GET['topup'])) {
    $modal_title = $lang['MODAL_TOPUP_TITLE'];
	$modal_text = $lang['MODAL_TOPUP_TEXT']; 
} else if (!empty($_GET['buy'])) {
    $modal_title = $lang['MODAL_BUY_TITLE'];
	$modal_text = $lang['MODAL_BUY_TEXT']; 
} else if (!empty($_GET['withdraw'])) {
    $modal_title = $lang['MODAL_WITHDRAW_SUCCESS_TITLE'];
	$modal_text = $lang['MODAL_WITHDRAW_SUCCESS_TEXT']; 
} else if (!empty($_GET['transfer'])) {
    $modal_title = $lang['MODAL_TRANSFER_TITLE'];
	$modal_text = $lang['MODAL_TRANSFER_TEXT']; 
} else {
    $modal_title = '';
	$modal_text = '';
}




?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<?php
		include_once 'side_header.php';
	?>

    <!-- Main content -->
    <section class="content">
      
       

		<div class="row">
                   
                    
        <div class="col-md-12">
		 
		<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li <?php if($tab == '' || $tab == '1'){ ?> class="active" <?php } ?>><a href="#tab_1" data-toggle="tab"><?= $lang['MENU_WITHDRAW']; ?> </a></li>
              <li <?php if($tab == '2'){ ?> class="active" <?php } ?>><a href="#tab_2" data-toggle="tab"><?= $lang['MENU_TRANSFER']; ?> </a></li>
              <li <?php if($tab == '3'){ ?> class="active" <?php } ?>><a href="#tab_3" data-toggle="tab"><?= $lang['MENU_DEPOSIT']; ?> </a></li>
              <li <?php if($tab == '4'){ ?> class="active" <?php } ?>><a href="#tab_4" data-toggle="tab"><?= $lang['MENU_GP_DEPOSIT']; ?> </a></li>
              <li <?php if($tab == '5'){ ?> class="active" <?php } ?>><a href="#tab_5" data-toggle="tab"><?= $lang['MENU_GP_BONUS']; ?> </a></li>
              <li <?php if($tab == '6'){ ?> class="active" <?php } ?>><a href="#tab_6" data-toggle="tab"><?= $lang['MENU_GP_PAY_REWARD']; ?> </a></li>
              <li <?php if($tab == '7'){ ?> class="active" <?php } ?>><a href="#tab_7" data-toggle="tab"><?= $lang['MENU_E-SHARE_REWARD']; ?> </a></li>
              <li <?php if($tab == '8'){ ?> class="active" <?php } ?>><a href="#tab_8" data-toggle="tab"><?= $lang['MENU_DIVIDENT_REWARD']; ?> </a></li>
            </ul>
			
			<div class="tab-content">
                            
              <div class="tab-pane <?php if($tab == ''){ ?> active <?php } ?>" id="tab_1">

                <b class="page_heading"><?= $lang['WITHDRAW_YOUR_WITHDRAW']; ?> </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
			<form action="history.php" method="post" enctype="multipart/form-data" name="history_withdraw">
			<h3 class="box-title">
				<div class="col-lg-4 col-xs-4">                  
					<input type="text" name="search_withdraw_date" id="search_withdraw_date" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_DATE']; ?>" value="<?= $search_withdraw_date; ?>">                           
				</div>
				<div class="col-lg-4 col-xs-4">                  
					<input type="text" name="search_withdraw_value" id="search_withdraw_value" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_VALUE']; ?>" value="<?= $search_withdraw_value; ?>">                           
				</div>
				
				<div class="col-lg-4 col-xs-4">                  
					<button type="submit" class="btn btn-block btn-info">Search</button>                           
				</div>
			</h3>
			</form>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-striped">
                <thead class="white-color">
                <tr>
                  <th>#</th>
                  <th><?= $lang['WITHDRAW_TABLE_DATE']; ?></th>
                  <th><?= $lang['WITHDRAW_TABLE_REF']; ?></th>
                  <th><?= $lang['WITHDRAW_TABLE_FROM']; ?></th>
				  <th><?= $lang['WITHDRAW_TABLE_ACTUAL_AMOUNT']; ?></th>	
				  <th><?= $lang['WITHDRAW_TABLE_AMOUNT']; ?></th>				  
				  <th><?= $lang['WITHDRAW_TABLE_SERVICE']; ?></th>		
                  <th><?= $lang['WITHDRAW_TABLE_ACTUAL_AMOUNT_SERVICE']; ?></th>				  
                  <th><?= $lang['WITHDRAW_TABLE_STATUS']; ?></th>
				  <th><?= $lang['WITHDRAW_TABLE_MESSAGE']; ?></th>
                </tr>
                </thead>
                <tbody>
				 <?php 
				$i=1;
				while($row = mysqli_fetch_assoc($result)) { 
				
					if($row['mw_status'] == '1'){
						$mw_status = $lang['STATUS_ACTIVE'];
						$label = 'label-success';
					} else if($row['mw_status'] == '0'){
						$mw_status = $lang['STATUS_PENDING'];
						$label = 'label-warning';
					} else {
						$mw_status = $lang['STATUS_REJECTED'];
						$label = 'label-danger';
					}
					
					if($row['mw_type'] == '1'){
						$mw_type = $lang['BOX_THAWED_ACCOUNT'];
					} else if($row['mw_type'] == '2'){
						$mw_type = $lang['BOX_BONUS'];
					}
					
				?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['withdraw_date']; ?></td>
                  <td><?php echo $row['mw_reference']; ?></td>
				  <td><?php echo $mw_type; ?></td>
				  <td><?php echo $row['mw_amount']; ?></td>
				  <td><?php echo '('.$row['cu_name'].') '.$row['mw_amount_currency']; ?></td>
				  <td><?php echo $row['mw_service']."%"; ?></td>
				  <td><?php echo '('.$row['cu_name'].') '.$row['mw_actual_amount_currency']; ?></td>
                  <td><span class="label <?= $label; ?>"><?php echo $mw_status; ?></span></td> 
				  <td><button type="button" class="btn btn-block btn-info" onclick="viewRejected('<?php echo $row['mw_message']; ?>','withdraw');"><?= $lang['WITHDRAW_VIEW_MESSAGE']; ?></button></td>
                </tr>
				
				<?php } ?>
          
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
			
			
			</div>
         </div>
		</div>
		
		<div class="tab-pane <?php if($tab == '2'){ ?> active <?php } ?>" id="tab_2">

                <b class="page_heading"><?= $lang['TRANSFER_YOUR_TRANSFER']; ?> </b>
				
				<div class="box-body">
				<div class="box box-primary">
				
					<div class="box-header">
						<form action="history.php?tab=2" method="post" enctype="multipart/form-data" name="history_transfer">
						<h3 class="box-title">
							<div class="col-lg-4 col-xs-4">                  
								<input type="text" name="search_transfer_date" id="search_transfer_date" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_DATE']; ?>" value="<?= $search_transfer_date; ?>">                           
							</div>
							<div class="col-lg-4 col-xs-4">                  
								<input type="text" name="search_transfer_value" id="search_transfer_value" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_VALUE']; ?>" value="<?= $search_transfer_value; ?>">                           
							</div>
							
							<div class="col-lg-4 col-xs-4">                  
								<button type="submit" class="btn btn-block btn-info">Search</button>                           
							</div>
						</h3>
						</form>
					</div>
						
						
						<div class="box-body table-responsive no-padding">
						  <table class="table table-bordered table-striped">
							<thead class="white-color">
							<tr>
							  <th>#</th>
							  <th><?= $lang['TRANSFER_TABLE_DATE']; ?></th>
							  <th><?= $lang['TRANSFER_TABLE_REF']; ?></th>
							  <th><?= $lang['TRANSFER_TABLE_FROM']; ?></th>
							  <th><?= $lang['TRANSFER_TABLE_AMOUNT']; ?></th>		
							  <th><?= $lang['TRANSFER_TABLE_DATE_EXPIRE']; ?></th>
							  <th><?= $lang['TRANSFER_TABLE_STATUS']; ?></th>
							</tr>
							</thead>
							<tbody>
							 <?php 
							$i=1;
							while($rowtransfer = mysqli_fetch_assoc($resulttransfer)) { 
							
								if($rowtransfer['mt_status'] == '1'){
									$mt_status = $lang['STATUS_ACTIVE'];
									$label = 'label-success';
								} else if($rowtransfer['mt_status'] == '0'){
									$mt_status = $lang['STATUS_PENDING'];
									$label = 'label-warning';
								} else {
									$mt_status = $lang['STATUS_REJECTED'];
									$label = 'label-danger';
								}
								
								if($rowtransfer['mt_type'] == '1'){
									$mt_type = $lang['BOX_THAWED_ACCOUNT'];
								} else if($rowtransfer['mt_type'] == '2'){
									$mt_type = $lang['BOX_BONUS'];
								}
								
							?>
							<tr>
							  <td><?php echo $i++; ?></td>
							  <td><?php echo $rowtransfer['transfer_date']; ?></td>
							  <td><?php echo $rowtransfer['mt_reference']; ?></td>
							  <td><?php echo $mt_type; ?></td>
							  <td><?php echo $rowtransfer['mt_amount']; ?></td>
							  <td><?php echo $rowtransfer['date_exp']; ?></td>
							  <td><span class="label <?= $label; ?>"><?php echo $mt_status; ?></span></td>                            
							</tr>
							
							<?php } ?>
					  
							</tbody>
							
						  </table>
						</div>
				
				</div>
				</div>
		</div>
		
		<div class="tab-pane <?php if($tab == '3'){ ?> active <?php } ?>" id="tab_3">
		
			<b class="page_heading"><?= $lang['PACKAGE_YOUR_PACKAGE']; ?> </b>
			
			        <div class="box-body">
						  <div class="box box-primary">
						
						<!-- /.box-header -->
						<!-- form start -->
						<div class="box-header">
							<form action="history.php?tab=3" method="post" enctype="multipart/form-data" name="history_package">
							<h3 class="box-title">
								<div class="col-lg-4 col-xs-4">                  
									<input type="text" name="search_package_date" id="search_package_date" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_DATE']; ?>" value="<?= $search_package_date; ?>">                           
								</div>
								<div class="col-lg-4 col-xs-4">                  
									<input type="text" name="search_package_value" id="search_package_value" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_VALUE']; ?>" value="<?= $search_package_value; ?>">                           
								</div>
								
								<div class="col-lg-4 col-xs-4">                  
									<button type="submit" class="btn btn-block btn-info">Search</button>                           
								</div>
							</h3>
							</form>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
						  <table class="table table-bordered table-striped">
							<thead class="white-color">
							<tr>
							  <th>#</th>
							  <th><?= $lang['PACKAGE_TABLE_DATE']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_REF']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_PACKAGE_NAME']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_PAYMENT_METHOD']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_PAYMENT_TYPE']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_AMOUNT']; ?></th>	
							  <th><?= $lang['PACKAGE_TABLE_EXPIRY']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_REWARDS']; ?></th>				  
							  <th><?= $lang['PACKAGE_STATUS']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_ACTION']; ?></th>
							</tr>
							</thead>
							<tbody>
							 <?php 
							$i=1;
							while($rowdeposit = mysqli_fetch_assoc($resultdeposit)) { 
								$diff = 0;
								$today = date('Y-m-d');
								if($rowdeposit['md_expiry'] != '' && $rowdeposit['md_expiry'] != '0000-00-00 00:00:00'){
									$diff = dateDifference($today, $rowdeposit['md_expiry']);
								}
							
								if($diff > 0){
									if($rowdeposit['md_status'] == '1'){
										$md_status = $lang['STATUS_ACTIVE'];
										$label = 'label-success';
										$renewal = false;
									} else if($rowdeposit['md_status'] == '0'){
										$md_status = $lang['STATUS_PENDING'];
										$label = 'label-warning';
										$renewal = false;
									} else {
										$md_status = $lang['STATUS_REJECTED'];
										$label = 'label-danger';
										if($rowdeposit['md_type'] == 'Renew'){
											$renewal = true;
										}else{
											$renewal = false;
										}
									}
								  
								} else {
									$md_status = $lang['STATUS_EXPIRED'];
									$label = 'label-default';
									$renewal = true;
								}
                                                                if($rowdeposit['cu_name']=='')
                                                                {
                                                                    $currency = 'USD ($)';
                                                                }
                                                                else
                                                                {
                                                                    $currency = $rowdeposit['cu_name'];
                                                                }    
                                                                
							?>
							<tr>
							  <td><?php echo $i++; ?></td>
							  <td><?php echo $rowdeposit['deposit_date']; ?></td>
							  <td><?php echo $rowdeposit['md_reference']; ?></td>
							  <td><?php if($rowdeposit['mp_name'] != '') { echo $rowdeposit['mp_name'].' ['.$rowdeposit['mp_price_dollar'].']'; } ?></td>
                                                          <td><?php if($rowdeposit['md_type']=='GP Topup'){echo 'GP Transfer';}else {echo $rowdeposit['md_type'];} ?></td>
							  <td><?php echo $currency; ?></td>
							  <td><?php echo number_format((float)$rowdeposit['md_amount'], $rowdeposit['cu_decimal'], '.', ''); ?></td>
							  <td><?php echo $rowdeposit['expiry_date']; ?></td>
							  <td><?php if($rowdeposit['md_rewards_amount'] != '') { echo $rowdeposit['md_rewards_amount'].' ('.$rowdeposit['md_rewards_percent'].'%)'; } ?></td>
							  <td><span class="label <?= $label; ?>"><?php echo $md_status; ?></span></td>
							  <td>
								<?php if($rowdeposit['md_type'] != 'Topup') { if($renewal) { ?> 
								  <button type="button" class="btn btn-block btn-success" onclick="location.href='renew_package.php?action=renew&d=<?= $rowdeposit['md_id']; ?>';"><?= $lang['PACKAGE_RENEW_EXISTING']; ?>
								  </button> <?php } } ?>
								    <?php if($rowdeposit['md_status'] == '2'){ ?>
									    <button type="button" class="btn btn-block btn-info" onclick="viewRejected('<?php echo $rowdeposit['md_message']; ?>','deposit');"><?= $lang['WITHDRAW_VIEW_MESSAGE']; ?></button>
									<?php } ?>
							  </td>						  
							</tr>
							
							<?php } ?>
					  
							</tbody>
							
						  </table>
						</div>
						<!-- /.box-body -->
					  </div>
					 </div>
		
		</div>
		
                <!--GPAY TRANSCATION-->
                <div class="tab-pane <?php if($tab == 'P'){ ?> active <?php } ?>" id="tab_4">
		
			<b class="page_heading"><?= $lang['PACKAGE_YOUR_PACKAGE']; ?> </b>
			
			        <div class="box-body">
						  <div class="box box-primary">
						
						<!-- /.box-header -->
						<!-- form start -->
						<div class="box-header">
							<form action="history.php?tab=4" method="post" enctype="multipart/form-data" name="history_package">
							<h3 class="box-title">
								<div class="col-lg-4 col-xs-4">                  
									<input type="text" name="search_package_date" id="search_package_date" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_DATE']; ?>" value="<?= $search_package_date; ?>">                           
								</div>
								<div class="col-lg-4 col-xs-4">                  
									<input type="text" name="search_package_value" id="search_package_value" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_VALUE']; ?>" value="<?= $search_package_value; ?>">                           
								</div>
								
								<div class="col-lg-4 col-xs-4">                  
									<button type="submit" class="btn btn-block btn-info">Search</button>                           
								</div>
							</h3>
							</form>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
						  <table class="table table-bordered table-striped">
							<thead class="white-color">
							<tr>
							  <th>#</th>
							  <th><?= $lang['PACKAGE_TABLE_DATE']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_REF']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_PACKAGE_NAME']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_PAYMENT_METHOD']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_PAYMENT_TYPE']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_AMOUNT']; ?></th>	
							  <th><?= $lang['PACKAGE_TABLE_EXPIRY']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_REWARDS']; ?></th>				  
							  <th><?= $lang['PACKAGE_STATUS']; ?></th>
							  <th><?= $lang['PACKAGE_TABLE_ACTION']; ?></th>
							</tr>
							</thead>
							<tbody>
							 <?php 
							$i=1;
							while($rowdeposit = mysqli_fetch_assoc($resultdepositgp)) { 
								$diff = 0;
								$today = date('Y-m-d');
								if($rowdeposit['md_expiry'] != '' && $rowdeposit['md_expiry'] != '0000-00-00 00:00:00'){
									$diff = dateDifference($today, $rowdeposit['md_expiry']);
								}
							
								if($diff > 0){
									if($rowdeposit['md_status'] == '1'){
										$md_status = $lang['STATUS_ACTIVE'];
										$label = 'label-success';
										$renewal = false;
									} else if($rowdeposit['md_status'] == '0'){
										$md_status = $lang['STATUS_PENDING'];
										$label = 'label-warning';
										$renewal = false;
									} else {
										$md_status = $lang['STATUS_REJECTED'];
										$label = 'label-danger';
										if($rowdeposit['md_type'] == 'Renew'){
											$renewal = true;
										}else{
											$renewal = false;
										}
									}
								  
								} else {
									$md_status = $lang['STATUS_EXPIRED'];
									$label = 'label-default';
									$renewal = true;
								}
							?>
							<tr>
							  <td><?php echo $i++; ?></td>
							  <td><?php echo $rowdeposit['deposit_date']; ?></td>
							  <td><?php echo $rowdeposit['md_reference']; ?></td>
							  <td><?php if($rowdeposit['mp_name'] != '') { echo $rowdeposit['mp_name'].' ['.$rowdeposit['mp_price_dollar'].']'; } ?></td>
							  <td><?php echo $rowdeposit['md_type']; ?></td>
							  <td><?php echo $rowdeposit['cu_name']; ?></td>
							  <td><?php echo number_format((float)$rowdeposit['md_amount'], $rowdeposit['cu_decimal'], '.', ''); ?></td>
							  <td><?php echo $rowdeposit['expiry_date']; ?></td>
							  <td><?php if($rowdeposit['md_rewards_amount'] != '') { echo $rowdeposit['md_rewards_amount'].' ('.$rowdeposit['md_rewards_percent'].'%)'; } ?></td>
							  <td><span class="label <?= $label; ?>"><?php echo $md_status; ?></span></td>
							  <td>
								<?php if($rowdeposit['md_type'] != 'Topup') { if($renewal) { ?> 
								  <button type="button" class="btn btn-block btn-success" onclick="location.href='renew_package.php?action=renew&d=<?= $rowdeposit['md_id']; ?>';"><?= $lang['PACKAGE_RENEW_EXISTING']; ?>
								  </button> <?php } } ?>
								    <?php if($rowdeposit['md_status'] == '2'){ ?>
									    <button type="button" class="btn btn-block btn-info" onclick="viewRejected('<?php echo $rowdeposit['md_message']; ?>','deposit');"><?= $lang['WITHDRAW_VIEW_MESSAGE']; ?></button>
									<?php } ?>
							  </td>						  
							</tr>
							
							<?php } ?>
					  
							</tbody>
							
						  </table>
						</div>
						<!-- /.box-body -->
					  </div>
					 </div>
		
		</div>
                            
                <!--gp bouns--> 
                
                <div class="tab-pane <?php if($tab == '5'){ ?> active <?php } ?>" id="tab_5">

                <b class="page_heading"><?= $lang['TRANSFER_YOUR_BONUS_TRANSFER']; ?> </b>
				
				<div class="box-body">
				<div class="box box-primary">
				
					<div class="box-header">
						<form action="history.php?tab=5" method="post" enctype="multipart/form-data" name="history_transfer">
						<h3 class="box-title">
							<div class="col-lg-4 col-xs-4">                  
								<input type="text" name="search_transfer_date" id="search_transfer_date" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_DATE']; ?>" value="<?= $search_transfer_date; ?>">                           
							</div>
							<div class="col-lg-4 col-xs-4">                  
								<input type="text" name="search_transfer_value" id="search_transfer_value" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_VALUE']; ?>" value="<?= $search_transfer_value; ?>">                           
							</div>
							
							<div class="col-lg-4 col-xs-4">                  
								<button type="submit" class="btn btn-block btn-info">Search</button>                           
							</div>
						</h3>
						</form>
					</div>
						
						
						<div class="box-body table-responsive no-padding">
						  <table class="table table-bordered table-striped">
							<thead class="white-color">
							<tr>
							  <th>#</th>
							  <th><?= $lang['TRANSFER_TABLE_DATE']; ?></th>
							  <th><?= $lang['TRANSFER_TABLE_REF']; ?></th>
							  <th><?= $lang['TRANSFER_TABLE_FROM']; ?></th>
							  <th><?= $lang['TRANSFER_TABLE_AMOUNT']; ?></th>					  
							  <th><?= $lang['TRANSFER_TABLE_STATUS']; ?></th>
							</tr>
							</thead>
							<tbody>
							 <?php 
							$i=1;
							while($rowtransfer = mysqli_fetch_assoc($resultgpbouns)) { 
							
								if($rowtransfer['mt_status'] == '1'){
									$mt_status = $lang['STATUS_ACTIVE'];
									$label = 'label-success';
								} else if($rowtransfer['mt_status'] == '0'){
									$mt_status = $lang['STATUS_PENDING'];
									$label = 'label-warning';
								} else {
									$mt_status = $lang['STATUS_REJECTED'];
									$label = 'label-danger';
								}
								
								//if($rowtransfer['mt_type'] == '1'){
									$mt_type = $lang['BOX_GFBONUS_HISTORY'];
								//} else if($rowtransfer['mt_type'] == '2'){
								//	$mt_type = $lang['BOX_BONUS'];
								//}
								
							?>
							<tr>
							  <td><?php echo $i++; ?></td>
							  <td><?php echo $rowtransfer['transfer_date']; ?></td>
							  <td><?php echo $rowtransfer['mt_reference']; ?></td>
							  <td><?php echo $mt_type; ?></td>
							  <td><?php echo $rowtransfer['mt_amount']; ?></td>
							  <td><span class="label <?= $label; ?>"><?php echo $mt_status; ?></span></td>                            
							</tr>
							
							<?php } ?>
					  
							</tbody>
							
						  </table>
						</div>
				
				</div>
				</div>
		</div>
                
                <!--end gpbounus-->
                
                <div class="tab-pane <?php if($tab == 'P'){ ?> active <?php } ?>" id="tab_6">
		
			<b class="page_heading"><?= $lang['G_PAYREWARD_HISTORY']; ?> </b>
			<!--gpay reward-->
			        <div class="box-body">
						  <div class="box box-primary">
						
						<!-- /.box-header -->
						<!-- form start -->
						<div class="box-header">
							<form action="history.php?tab=^" method="post" enctype="multipart/form-data" name="history_package">
							<h3 class="box-title">
								<div class="col-lg-4 col-xs-4">                  
									<input type="text" name="search_package_date" id="search_package_date" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_DATE']; ?>" value="<?= $search_package_date; ?>">                           
								</div>
								<div class="col-lg-4 col-xs-4">                  
									<input type="text" name="search_package_value" id="search_package_value" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_VALUE']; ?>" value="<?= $search_package_value; ?>">                           
								</div>
								
								<div class="col-lg-4 col-xs-4">                  
									<button type="submit" class="btn btn-block btn-info">Search</button>                           
								</div>
							</h3>
							</form>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
						  <table class="table table-bordered table-striped">
							<thead class="white-color">
							<tr>
							  <th>#</th>
							  <th><?= $lang['GRPACKAGE_TABLE_DATE']; ?></th>
							  <th><?= $lang['GRPACKAGE_TABLE_REF']; ?></th>
							  <th><?= $lang['GRPACKAGE_TABLE_PAYMENT_METHOD']; ?></th>
							  <th><?= $lang['GRPACKAGE_TABLE_PAYMENT_TYPE']; ?></th>
							  <th><?= $lang['GRPACKAGE_TABLE_AMOUNT']; ?></th>	
							  <th><?= $lang['GRPACKAGE_TABLE_EXPIRY']; ?></th>
							  <th><?= $lang['GRPACKAGE_TABLE_REMARK']; ?></th>				  
							  <th><?= $lang['GRPACKAGE_STATUS']; ?></th>
							  <th><?= $lang['GRPACKAGE_TABLE_ACTION']; ?></th>
							</tr>
							</thead>
							<tbody>
							 <?php 
							$i=1;
							while($rowdeposit = mysqli_fetch_assoc($resultgpreward)) { 
								$diff = 0;
								$today = date('Y-m-d');
								if($rowdeposit['md_expiry'] != '' && $rowdeposit['md_expiry'] != '0000-00-00 00:00:00'){
									$diff = dateDifference($today, $rowdeposit['md_expiry']);
								}
							
								if($diff > 0){
									if($rowdeposit['md_status'] == '1'){
										$md_status = $lang['STATUS_ACTIVE'];
										$label = 'label-success';
										$renewal = false;
									} else if($rowdeposit['md_status'] == '0'){
										$md_status = $lang['STATUS_PENDING'];
										$label = 'label-warning';
										$renewal = false;
									} else {
										$md_status = $lang['STATUS_REJECTED'];
										$label = 'label-danger';
										if($rowdeposit['md_type'] == 'Renew'){
											$renewal = true;
										}else{
											$renewal = false;
										}
									}
								  
								} else {
									$md_status = $lang['STATUS_EXPIRED'];
									$label = 'label-default';
									$renewal = true;
								}
							?>
							<tr>
							  <td><?php echo $i++; ?></td>
							  <td><?php echo $rowdeposit['deposit_date']; ?></td>
							  <td><?php echo $rowdeposit['md_reference']; ?></td>
							  <td><?php echo $rowdeposit['md_type']; ?></td>
							  <td><?php echo $rowdeposit['cu_name']; ?></td>
							  <td><?php echo number_format((float)$rowdeposit['md_amount'], $rowdeposit['cu_decimal'], '.', ''); ?></td>
							  <td><?php echo $rowdeposit['expiry_date']; ?></td>
							  
                                                          <td><?php echo $rowdeposit['md_message']; ?></td>
							  
                                                          <td><span class="label <?= $label; ?>"><?php echo $md_status; ?></span></td>
							  <td><button type="button" class="btn btn-block btn-info" onclick="viewRejected('<?php echo $rowdeposit['md_message']; ?>','G-Pay Rewards');"><?= $lang['WITHDRAW_VIEW_MESSAGE']; ?></button></td>					  
							</tr>
							
							<?php } ?>
					  
							</tbody>
							
						  </table>
						</div>
						<!-- /.box-body -->
					  </div>
					 </div>
		
		</div>
                
                
                <!--E-Share--> 
                
                <div class="tab-pane <?php if($tab == '7'){ ?> active <?php } ?>" id="tab_7">

                <b class="page_heading"><?= $lang['ESHARE_HISTORY_DETAILS']; ?> </b>
				
				<div class="box-body">
				<div class="box box-primary">
				
					<div class="box-header">
						<form action="history.php?tab=7" method="post" enctype="multipart/form-data" name="history_transfer">
						<h3 class="box-title">
							<div class="col-lg-4 col-xs-4">                  
								<input type="text" name="search_transfer_datees" id="search_transfer_datees" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_DATE']; ?>" value="<?= $search_transfer_date; ?>">                           
							</div>
							<div class="col-lg-4 col-xs-4">                  
								<input type="text" name="search_transfer_valuees" id="search_transfer_valuees" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_VALUE']; ?>" value="<?= $search_transfer_value; ?>">                           
							</div>
							
							<div class="col-lg-4 col-xs-4">                  
								<button type="submit" class="btn btn-block btn-info">Search</button>                           
							</div>
						</h3>
						</form>
					</div>
						
						
						<div class="box-body table-responsive no-padding">
                                                   
						  <table class="table table-bordered table-striped">
							<thead class="white-color">
							<tr>
							  <th>#</th>
							  <th><?= $lang['SHARE_TABLE_DATE']; ?></th>
							  <th><?= $lang['SHARE_TABLE_REF']; ?></th>
							  <th><?= $lang['SHARE_TABLE_FROM']; ?></th>
                                                          <th><?= $lang['SHARE_TABLE_UNIT']; ?></th>
							  <th><?= $lang['SHARE_TABLE_AMOUNT']; ?></th>					  
							  <th><?= $lang['SHARE_TABLE_STATUS']; ?></th>
                                                          <th><?= $lang['SHARE_TABLE_ACTION']; ?></th>
							</tr>
							</thead>
							<tbody>
							 <?php 
							$i=1;
							while($roweshare = mysqli_fetch_assoc($resulteshare)) { 
							
								if($roweshare['mges_status'] == '1'){
									$mt_status = $lang['STATUS_ACTIVE'];
									$label = 'label-success';
								} else if($roweshare['mges_status'] == '0'){
									$mt_status = $lang['STATUS_PENDING'];
									$label = 'label-warning';
								} else {
									$mt_status = $lang['STATUS_REJECTED'];
									$label = 'label-danger';
								}
								
								//if($rowtransfer['mt_type'] == '1'){
//									$mt_type = $lang['BOX_GFBONUS_HISTORY'];
								//} else if($rowtransfer['mt_type'] == '2'){
								//	$mt_type = $lang['BOX_BONUS'];
								//}
								
							?>
							<tr>
							  <td><?php echo $i++; ?></td>
							  <td><?php echo $roweshare['mges_created_date']; ?></td>
							  <td><?php echo $roweshare['mges_reference']; ?></td>
							  <td><?php echo $roweshare['mges_type']; ?></td>
                                                          <td><?php echo $roweshare['mges_unit']; ?></td>
							  <td><?php echo $roweshare['mges_amount']; ?></td>
							  <td><span class="label <?= $label; ?>"><?php echo $mt_status; ?></span></td>  
                                                          <td><button type="button" class="btn btn-block btn-info" onclick="viewRejected('<?php echo $roweshare['mges_message']; ?>','E-Share');"><?= $lang['WITHDRAW_VIEW_MESSAGE']; ?></button></td>
							</tr>
							
							<?php } ?>
					  
							</tbody>
							
						  </table>
						</div>
				
				</div>
				</div>
		</div>
                
                <!--divedent reward-->
                
                <div class="tab-pane <?php if($tab == '8'){ ?> active <?php } ?>" id="tab_8">

                <b class="page_heading"><?= $lang['DIVIDENT_HISTORY_DETAILS']; ?> </b>
				
				<div class="box-body">
				<div class="box box-primary">
				
					<div class="box-header">
						<form action="history.php?tab=5" method="post" enctype="multipart/form-data" name="history_transfer">
						<h3 class="box-title">
							<div class="col-lg-4 col-xs-4">                  
								<input type="text" name="search_transfer_datesd" id="search_transfer_datesd" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_DATE']; ?>" value="<?= $search_transfer_date; ?>">                           
							</div>
							<div class="col-lg-4 col-xs-4">                  
								<input type="text" name="search_transfer_valuesd" id="search_transfer_valuesd" class="form-control pull-right" placeholder="<?= $lang['DATA_MARKET_SEARCH_VALUE']; ?>" value="<?= $search_transfer_value; ?>">                           
							</div>
							
							<div class="col-lg-4 col-xs-4">                  
								<button type="submit" class="btn btn-block btn-info">Search</button>                           
							</div>
						</h3>
						</form>
					</div>
						
						
						<div class="box-body table-responsive no-padding">
						  <table class="table table-bordered table-striped">
							<thead class="white-color">
							<tr>
							  <th>#</th>
							  <th><?= $lang['TRANSFER_TABLE_DATE']; ?></th>
							  <th><?= $lang['TRANSFER_TABLE_REF']; ?></th>
							  <th><?= $lang['TRANSFER_TABLE_FROM']; ?></th>
							  <th><?= $lang['TRANSFER_TABLE_AMOUNT']; ?></th>					  
							  <th><?= $lang['TRANSFER_TABLE_STATUS']; ?></th>
							</tr>
							</thead>
							<tbody>
							 <?php 
							$i=1;
							while($rowsd = mysqli_fetch_assoc($resultdivid)) { 
							
								if($rowsd['msdt_status'] == '1'){
									$mt_status = $lang['STATUS_ACTIVE'];
									$label = 'label-success';
								} else if($rowsd['msdt_status'] == '0'){
									$mt_status = $lang['STATUS_PENDING'];
									$label = 'label-warning';
								} else {
									$mt_status = $lang['STATUS_REJECTED'];
									$label = 'label-danger';
								}
								
								//if($rowtransfer['mt_type'] == '1'){
									$mt_type = $lang['BOX_DIVIDEND_HISTORY'];
								//} else if($rowtransfer['mt_type'] == '2'){
								//	$mt_type = $lang['BOX_BONUS'];
								//}
								
							?>
							<tr>
							  <td><?php echo $i++; ?></td>
							  <td><?php echo $rowsd['msdt_created_date']; ?></td>
							  <td><?php echo $rowsd['msdt_reference']; ?></td>
							  <td><?php echo $mt_type; ?></td>
							  <td><?php echo $rowsd['msdt_amount']; ?></td>
							  <td><span class="label <?= $label; ?>"><?php echo $mt_status; ?></span></td>                            
							</tr>
							
							<?php } ?>
					  
							</tbody>
							
						  </table>
						</div>
				
				</div>
				</div>
		</div>
		</div>
		</div>
			
          </div>
         </div>
		 
		 
		 
		 
		 <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalWithdrawLabel" style="display: none;"><?= $lang['MODAL_WITHDRAW_TITLE']; ?></h4>
            <h4 class="modal-title" id="myModalDepositLabel" style="display: none;"><?= $lang['MODAL_DEPOSIT_TITLE']; ?></h4>
            <h4 class="modal-title" id="myModalDepositLabel1" style="display: none;"><?= $lang['MODAL_GPREWARD_TITLE']; ?></h4>
            <h4 class="modal-title" id="myModalDepositLabel2" style="display: none;"><?= $lang['MODAL_SHARE_TITLE']; ?></h4>
            
            <small id="myModalWithdrawText" style="display: none;"><?= $lang['MODAL_WITHDRAW_TEXT']; ?></small>
            <small id="myModalDepositText" style="display: none;"><?= $lang['MODAL_DEPOSIT_TEXT']; ?></small>
            <small id="myModalDepositText1" style="display: none;"><?= $lang['MODAL_GPREWARD_TEXT']; ?></small>
            <small id="myModalDepositText1" style="display: none;"><?= $lang['MODAL_GPREWARD_TEXT']; ?></small>
            </div>
          <div class="modal-body" id="rejected_message">
          </div>
          <div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->	
	
	<?php if($modal_title != '' && $modal_text != '') { ?>
			 <!-- Modal -->
		  <div class="modal fade" id="myModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title"><?= $modal_title; ?></h4>
				</div>
			  <div class="modal-body"><?= $modal_text; ?>
			  </div>
			  <div>
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->	
	
	<?php } ?>

	 
    </section>
  </div>

<?php

require_once 'footer.php';

?>
