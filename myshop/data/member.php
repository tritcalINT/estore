<?php

require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/functions.php';
include_once 'data/member_data.php';

if (!empty($_GET['error'])) {
    $error = $_GET['error']; 
} else {
    $error = '';
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
      <!-- Info boxes -->
      <div class="row">
        <!--// G-PAY-->
        <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box">
            <!--<span class="info-box-icon bg-default"><img src="../img/ing.png" width="60" height="60"></span>-->

            <div class="">
              <span class="info-box-text"><?= $lang['BOX_GPAY']; ?>:</span>
              <span class="info-box-number">$ <?= $gp_main_account; ?></span>
            </div>
            <!-- /.info-box-content -->
            <span class="progress-description">
      <a href="make_g_pay_topup.php"><button type="submit" class="btn btn-block btn-danger"><?= $lang['BOX_MAKE_TOP_UP']; ?></button></a>
    </span>
          </div>
          <!-- /.info-box -->
        </div>  
          
          
        <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box">
            <!--<span class="info-box-icon bg-default"><img src="../img/ing.png" width="60" height="60"></span>-->

            <div class="">
              <span class="info-box-text"><?= $lang['BOX_MAIN_ACCOUNT']; ?>:</span>
              <span class="info-box-number">$ <?= $main_account; ?></span>
            </div>
            <!-- /.info-box-content -->
            <span class="progress-description">
      <a href="make_topup.php"><button type="submit" class="btn btn-block btn-warning"><?= $lang['MAKE_TOP_UP']; ?></button></a>
    </span>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box">
            <!--<span class="info-box-icon bg-default"><img src="../img/ing3.png" width="60" height="60"></span>-->

            <div class="">
              <span class="info-box-text"><?= $lang['BOX_RC_TRADER']; ?>:</span>
              <span class="info-box-number">$ <?= $rc_trader; ?> </span>
            </div>
            <!-- /.info-box-content -->
            <span class="progress-description">
      <a href="data_market.php"><button type="submit" class="btn btn-block btn-warning"><?= $lang['MAKE_CURRENT_SPLITS']; ?></button></a>
    </span>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box">
            <!--<span class="info-box-icon bg-default"><img src="../img/ing5.png" width="60" height="60"></span>-->

            <div class="">
              <span class="info-box-text"><?= $lang['BOX_THAWED_ACCOUNT']; ?>:</span>
              <span class="info-box-number">$ <?= $thawed_account_rc; ?></span>
            </div>
            <!-- /.info-box-content -->
            <span class="progress-description">
      <a href="withdraw.php"><button type="submit" class="btn btn-block btn-success"><?= $lang['MAKE_WITHDRAW']; ?></button></a>
    </span>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box">
            <!--<span class="info-box-icon bg-default"><img src="../img/ing4.png" width="70" height="70"></span>-->

            <div class="">
              <span class="info-box-text"><?= $lang['BOX_BONUS']; ?>:</span>
              <span class="info-box-number">$ <?= $bonus; ?></span>
            </div>
            <!-- /.info-box-content -->
            <span class="progress-description">
      <a href="withdraw.php"><button type="submit" class="btn btn-block btn-success"><?= $lang['MAKE_WITHDRAW_BONUS']; ?></button></a>
    </span>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <!--//g-fundament-->
        <!-- /.col -->
        <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box">
            <!--<span class="info-box-icon bg-default"><img src="../img/ing4.png" width="70" height="70"></span>-->

            <div class="">
              <span class="info-box-text"><?= $lang['G-FUND']; ?>:</span>
              <span class="info-box-number">$ <?= $gpfund_main_account; ?></span>
            </div>
            <!-- /.info-box-content -->
            <span class="progress-description">
      <a href="withdraw.php"><button type="submit" class="btn btn-block btn-danger"><?= $lang['GF-FUND_MAKE_WITHDRAW_BONUS']; ?></button></a>
    </span>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        
        
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $lang['HEADING_CURRENT_RC_GROWTH_RATE']; ?> </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center light-grey-color">
                    <strong><?= $lang['HEADING_CURRENT_SCROLL_UNIT']; ?> : <?= $dv_current_scrolling; ?></strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center light-grey-color">
                    <strong> <?= $lang['HEADING_CURRENT_STATISTICS']; ?> </strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text"><?= $lang['BAR_PARTNER_JOINED']; ?> :</span>
                    <span class="progress-number"><b><?= $dv_partner_joined; ?></b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?= $partner_joined_percent; ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text"><?= $lang['BAR_TRADER_DONE']; ?> :</span>
                    <span class="progress-number"><b><?= $dv_trader_done; ?></b>/<?= $dv_max_trader_done; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?= $trader_done_percent; ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text"><?= $lang['BAR_SCROLL_UNIT']; ?> :</span>
                    <span class="progress-number"><b><?= $dv_scroll_unit_done; ?></b>/<?= $dv_max_scroll_unit_done; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?= $scroll_unit_percent; ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text"><?= $lang['BAR_BONUS_SPLITS']; ?> :</span>
                    <span class="progress-number"><b><?= $dv_bonus_splits; ?></b>/<?= $dv_max_bonus_splits; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?= $bonus_splits_percent; ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage <?= $dv_trader_arrow_color; ?>"><i class="fa <?= $dv_trader_arrow_direction; ?>"></i> <?= $dv_trader_percent; ?>%</span>
                    <h5 class="description-header">$<?= $dv_trader_value; ?></h5>
                    <span class="description-text"><?= $lang['DISPLAY_TOTAL_TRADER_IN']; ?> </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage <?= $dv_rolling_arrow_color; ?>"><i class="fa <?= $dv_rolling_arrow_direction; ?>"></i> <?= $dv_rolling_percent; ?>%</span>
                    <h5 class="description-header">$<?= $dv_rolling_value; ?></h5>
                    <span class="description-text"><?= $lang['DISPLAY_TOTAL_ROLLING']; ?> </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage <?= $dv_partner_arrow_color; ?>"><i class="fa <?= $dv_partner_arrow_direction; ?>"></i> <?= $dv_partner_percent; ?>%</span>
                    <h5 class="description-header">$<?= $dv_partner_value; ?></h5>
                    <span class="description-text"><?= $lang['DISPLAY_TOTAL_PARTNER_JOINED']; ?> </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage <?= $dv_splits_arrow_color; ?>"><i class="fa <?= $dv_splits_arrow_direction; ?>"></i> <?= $dv_splits_percent; ?>%</span>
                    <h5 class="description-header"><?= $dv_splits_value; ?></h5>
                    <span class="description-text"><?= $lang['DISPLAY_TOTAL_NETT_SPLITS']; ?> </span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  
    <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
			<div class="box box-info">
				<div class="box-header with-border">
				  <h3 class="box-title"><?= $lang['TRADING_HEADING']; ?>  :</h3>
				  
				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				  </div>
				</div>
				<div class="box-body">
				<form action="data/member_trading.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="member_trading">
					<div class="row form-group">
						<div class="col-lg-2 col-md-2 form-group">
							<label><?= $lang['TRADING_MARKET']; ?> :</label>
							<select class="form-control input-sm" name="market" id="market" required>
								<option value=""><?= $lang['TRADING_MARKET_SELECT']; ?></option>
								<?php while($rowmarket = mysqli_fetch_assoc($resultmarket)) { ?>
								<option value="<?php echo $rowmarket['tr_id']; ?>"><?php echo $rowmarket['tr_name']; ?></option>
								<?php } ?>
							</select> 
						</div>
						<div class="col-lg-3 col-md-3 form-group">
							<label><?= $lang['TRADING_AMOUNT']; ?>:</label>
							<input type="text" class="form-control" id="trade_amount" placeholder="<?= $lang['TRADING_AMOUNT']; ?>" name="trade_amount"  min="1" step="any" required> 
						</div>
						<div class="col-lg-3 col-md-3 form-group">
							<label><?= $lang['TRADING_SECURITY']; ?>:</label>
							<input type="password" class="form-control" id="otp" placeholder="<?= $lang['TRADING_SECURITY']; ?>" name="otp" required> 
						</div>
						<div class="col-lg-2 col-md-2 form-group">
							<label><?= $lang['TRADING_TYPE']; ?> :</label>
							<select class="form-control input-sm" name="trade_type" id="trade_type" required>
							  <?php if($last_trade_value == '1') { ?>
								<option value="1"><?= $lang['TRADING_TYPE_MANUAL']; ?></option>
							  <?php } else { ?>
								<option value="1"><?= $lang['TRADING_TYPE_MANUAL']; ?></option>
								<option value="2"><?= $lang['TRADING_TYPE_AUTO']; ?></option>
								<option value="3"><?= $lang['TRADING_TYPE_CONTRACT']; ?></option>
							  <?php } ?>
							</select> 
						</div>
						<div class="col-lg-2 col-md-2 form-group">
						<label>&nbsp;</label>
							<button type="submit" class="btn btn-block btn-warning" <?php if($main_account < 1) { ?> disabled <?php } ?>><?= $lang['TRADING_SUBMIT']; ?></button>
						</div>
					</div>
                    <hr /><font color="#FFFFFF"><small><?= $lang['TOOL_1']; ?>
                <br /><?= $lang['TOOL_2']; ?>
                <br /><?= $lang['TOOL_3']; ?></small></font>
				</form>
				</div>
			</div>


          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $lang['HEADING_LATEST_TRADER']; ?>  :</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr class="light-grey-color">
                    <th><small><?= $lang['TRADER_TABLE_REF_NO']; ?></small> </th>
                    <th><small><?= $lang['TRADER_TABLE_MARKET']; ?></small></th>
					<th><small><?= $lang['TRADER_TABLE_AMOUNT']; ?></small></th>
					<th><small><?= $lang['TRADER_TABLE_MEMBER']; ?></small></th>
                    <th><small><?= $lang['TRADER_TABLE_STATUS']; ?> </small></th>
                  </tr>
                  </thead>
                  <tbody class="white-color">
				  <?php 
					while($rowtrading = mysqli_fetch_assoc($resulttrading)) { 
						if($rowtrading['mt_status'] == '1'){
							$mt_status = 'On Running';
							$label = 'label-success';
						} else if($rowtrading['mt_status'] == '0'){
							$mt_status = 'On Process';
							$label = 'label-info';
						}
					?>
                  <tr>
                    <td><a><?= $rowtrading['mt_reference']; ?></a></td>
                    <td><?= $rowtrading['tr_name']; ?></td>
					<td><?= $rowtrading['mt_amount']; ?></td>
					<td><?= $rowtrading['m_username']; ?></td>
                    <td><span class="label <?= $label; ?>"><?= $mt_status; ?></span></td>
                  </tr>
				  <?php } ?>
				  <tr>
					<td colspan="5"><button type="submit" class="btn btn-block btn-warning" onclick="location.href='trading_all.php';"><?= $lang['TRADING_VIEW_ALL']; ?></button></td>
				  </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        

          
          
          </div>
          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS ( post anoncement )-->
          <div class="col-md-4">
          <div class="box box-widget latest-news">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="../img/package1.png" alt="User Image">
                <span class="username white-color"><?= $lang['HEADING_LATEST_NEWS']; ?></span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-responsive pad" src="../img/333.jpg" alt="Photo">
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
			<?php 
				while($rownews = mysqli_fetch_assoc($resultnews)) { 
			?>
              <div class="box-comment">
                <!-- User image -->
				<?php if($rownews['ln_pic'] != '') { ?>
					<img class="img-circle img-sm" src="../uploads/news/<?= $rownews['ln_pic']; ?>" alt="<?= $rownews['ln_title']; ?>">
				<?php } else { ?>
					<img class="img-circle img-sm" src="../img/package1.png" alt="<?= $rownews['ln_title']; ?>">
				<?php } ?>
				<a href="news_details.php?n=<?= $rownews['ln_id']; ?>">
					<div class="comment-text">
						  <span class="username">
							<?= $rownews['ln_title']; ?>
							<span class="text-muted pull-right"><?= $rownews['ln_date']; ?></span>
						  </span><!-- /.username -->
					  <?= $rownews['ln_description']; ?> ..
					</div>
				</a>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
			<?php } ?>
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
		
		
 <div class="row">		
	<div class="col-md-12">
          <!-- /.box -->
          <div class="row">
		  <?php while($row = mysqli_fetch_assoc($result)) { 
					if($row['mp_robot'] == '1'){
						$mp_robot = 'YES';
					} else{
						$mp_robot = 'N/A';
					}
					
					if($row['mp_closed_account'] == '1'){
						$mp_closed_account = 'YES';
					} else{
						$mp_closed_account = 'N/A';
					}
					
					if($row['member_pack_status'] == 'buy'){
						$today = date('Y-m-d');
						$start_date = $row['mp_rewards_start'];
						$end_date = $row['mp_rewards_end'];
						
						if($start_date != '' && $end_date != ''){
							$diff1 = dateDifference($start_date, $today);
							$diff2 = dateDifference($today, $end_date);
						}
					}
				
			?>
				
            <div class="col-md-4">
			  <div class="box box-widget widget-user-2">
				<div class="widget-user-header bg-yellow package-info">
				<div class="package-details-section">
				  <div class="widget-user-image">
					<?php if($row['mp_pic'] == '') { ?>
						<img class="img-circle" src="../img/package1.png" alt="<?= $row['mp_name']; ?>">
					<?php } else { ?>
						<img class="img-circle" src="../uploads/package/<?= $row['mp_pic']; ?>" alt="<?= $row['mp_name']; ?>">
					<?php } ?>
				  </div>
				  <h3 class="widget-user-username"><?= $row['mp_name']; ?></h3>
				  <h5 class="widget-user-desc"><?= $lang['PACKAGE_FAST_START']; ?> </h5>
				  <h4 class="widget-user-desc">$ <?= $row['mp_price_dollar']; ?> <span> <small> <?= $row['mp_price_rc']; ?></small> </span></h4>
				</div>
				
				<div class="rewards-section">
					<?php if($row['member_pack_status'] == 'buy'){ if($start_date != '' && $end_date != ''){ if(($diff1 > -1) && ($diff2 > -1) ){ ?>
						<div class="rewards-offer"><?= $row['mp_rewards_percent']; ?>% <div class="rewards-info">more</div></div>
					<?php } } } ?>
				</div>
				</div>
				<div class="box-footer no-padding">
				  <ul class="nav nav-stacked">
					<li><a>$ <?= $row['mp_price_dollar']; ?> ( <?= $row['mp_price_rc']; ?> RC ) <span class="pull-right badge bg-blue"><?= $lang['PACKAGE_ON_TRADER']; ?> </span></a></li>
					<li><a><?= $lang['PACKAGE_RATIO_BP']; ?> <span class="pull-right badge bg-aqua"><?= $row['mp_ratio_bp']; ?> %</span></a></li>
					<li><a><?= $lang['PACKAGE_UNFROZEN']; ?> <span class="pull-right badge bg-green"><?= $row['mp_unfrozen']; ?> <?= $lang['PACKAGE_DAYS']; ?> </span></a></li>
					<li><a><?= $lang['PACKAGE_ROBOT_TRADER']; ?> <span class="pull-right badge bg-red"><?= $mp_robot; ?></span></a></li>
					<li><a><?= $lang['PACKAGE_CLOSED_ACCOUNT']; ?> <span class="pull-right badge bg-red"><?= $mp_closed_account; ?></span></a></li>
					<li><a><?= $lang['PACKAGE_BONUS_LEVEL']; ?> <span class="pull-right badge bg-red"><?= $row['mp_bonus_level']; ?> <?= $lang['PACKAGE_LEVELS']; ?></span></a></li>
					<?php if($row['member_pack_status'] == 'upgrade') { ?>
						<li><a><button type="button" class="btn btn-block btn-warning btn-sm" onclick="location.href='upgrade_package.php?action=deposit&d=<?php echo $row['mp_id']; ?>';" ><?= $lang['PACKAGE_UPGRADE']; ?> <?= $row['mp_name']; ?> </button></a></li>
					<?php } else { ?>
						<li><a><button type="button" class="btn btn-block btn-warning btn-sm" onclick="location.href='buy_package.php?action=deposit&d=<?php echo $row['mp_id']; ?>';" ><?= $lang['PACKAGE_BUY']; ?> <?= $row['mp_name']; ?> </button></a></li>
					<?php } ?>
				  </ul>
				</div>
			  </div>
			</div>
		  <?php } ?>


          </div>
		</div>
	</div>
        
		<?php if($error != '') { ?>      
			<!-- Modal -->
			<div id="errorTrading" class="modal fade" role="dialog">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><?= $lang['TRADING_ERROR']; ?></h4>
				  </div>
				  <div class="modal-body">
						<?php if($error == '1') { ?>
							<div id="error_display"><?= $lang['TRADING_ERROR_1']; ?></div>
						<?php } else if($error == '2') { ?>
							<div id="error_display"><?= $lang['TRADING_ERROR_2']; ?></div>
						<?php } else if($error == '3') { ?>
							<div id="error_display"><?= $lang['TRADING_ERROR_3']; ?></div>
						<?php } else if($error == '4') { ?>
							<div id="error_display"><?= $lang['TRADING_ERROR_4']; ?></div>
						<?php } else if($error == '5') { ?>
							<div id="error_display"><?= $lang['TRADING_ERROR_5']; ?> [$ <?= $main_account; ?>]</div>
						<?php } ?>
				  </div>
				</div>
			  </div>
			</div>
		<?php } ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

require_once 'footer.php';

?>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#errorTrading').modal('show');
    });
</script>

<!-- AdminLTE for demo purposes -->
<script src="../js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../js/dashboard2.js"></script>
