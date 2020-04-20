<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/functions.php';
include_once 'data/admin_data.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
		<?php if($_SESSION['reseller'] == '') { ?>
			<form action="data/update_display.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_display">
			<input type="hidden" name="disp" value="5">
			<div class="col-md-12 current_trading_board">
				<div class="col-md-2">Current Trading Board：</div>
				<div class="col-md-3">
					<small><input class="form-control" type="text" value="<?= $dv_current_trading; ?>" name="current_trading" id="current_trading" /> </small>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-block btn-success">Update Now</button>
				</div>
			</div>
			</form>
		<?php } else { ?>
			Current Trading Board：<?= $dv_current_trading; ?>
		<?php } ?>
      </h4>
      <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i> <?= date('e'); ?></a></li>
        <li class="active"><?= date('d-m-Y h:i A'); ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><img src="../img/ing.png" width="60" height="60"></span>

            <div class="info-box-content">
              <span class="info-box-text">Main Account:</span>
              <span class="info-box-number">$ <?= $main_account_admin; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><img src="../img/ing3.png" width="60" height="60"></span>

            <div class="info-box-content">
              <span class="info-box-text">RC TRADER:</span>
              <span class="info-box-number"><?= $rc_trader_admin; ?> <small>RC</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><img src="../img/ing5.png" width="60" height="60"></span>

            <div class="info-box-content">
              <span class="info-box-text">Thawed account:</span>
              <span class="info-box-number"><?= $thawed_account_rc_admin; ?></span>
              <span class="info-box-number"><small><strong>$</strong><?= $thawed_account_dollar_admin; ?></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">BONUS:</span>
              <span class="info-box-number"><?= $total_bonus_admin; ?></span>
            </div>
            <!-- /.info-box-content -->
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
              <h3 class="box-title">Current RC Growth Rate </h3>

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
					<?php if($_SESSION['reseller'] == '') { ?>
					<form action="data/update_display.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_display">
					<input type="hidden" name="disp" value="6">
					<div class="col-md-12 current_trading_board">
						<div class="col-md-3"><p class="text-center light-grey-color"><strong>Current Scroll Unit :</strong></p></div>
						<div class="col-md-3">
							<input class="form-control" type="text" value="<?= $dv_current_scrolling; ?>" name="current_scrolling" id="current_scrolling" /> </small>
						</div>
						<div class="col-md-2">
							<button type="submit" class="btn btn-block btn-success">Update Now</button>
						</div>
					</div>
					</form>
					<?php } else { ?>
						<p class="text-center light-grey-color"><strong>Current Scroll Unit : <?= $dv_current_scrolling; ?></strong></p>
					<?php } ?>
                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
				<?php if($_SESSION['reseller'] == '') { ?>
                <div class="col-md-4">
                  <p class="text-center light-grey-color">
                    <strong> Add Value to Graph </strong>
                  </p>
				  
				  <form action="data/graph_value_add.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="graph_value">
				  <div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Date :</label>
						<input type="text" class="form-control" id="ch_date" placeholder="Date" name="ch_date" value="<?= $chart_date; ?>">                            
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Amount :</label>
						<input type="text" class="form-control" id="ch_amount" placeholder="Amount" name="ch_amount" value="<?= $chart_random_value; ?>" >                            
					</div>
				  </div>
				  
				  <div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">
						<button type="submit" class="btn btn-block btn-success">Add Now</button>
					</div>
				  </div>
				  </form>
                </div>
                <!-- /.col -->
				<?php } ?>
				
				
				<div class="col-md-4">
                  <p class="text-center light-grey-color">
                    <strong> Current Statistics </strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Partner Joined :</span>
                    <span class="progress-number"><b><?= $dv_partner_joined; ?></b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?= $partner_joined_percent; ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Trader done（Unit） :</span>
                    <span class="progress-number"><b><?= $dv_trader_done; ?></b>/<?= $dv_max_trader_done; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?= $trader_done_percent; ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Scroll Unit Done（$ Mil) :</span>
                    <span class="progress-number"><b><?= $dv_scroll_unit_done; ?></b>/<?= $dv_max_scroll_unit_done; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?= $scroll_unit_percent; ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Bonus Splits Ratio % :</span>
                    <span class="progress-number"><b><?= $dv_bonus_splits; ?></b>/<?= $dv_max_bonus_splits; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?= $bonus_splits_percent; ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
				  
				  <?php if($_SESSION['reseller'] == '') { ?>
						<div class="main_update_button">
							<button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#currentStatistics">Update</button>
						</div>
					<?php } ?>
                </div>
				
				
				
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
                    <span class="description-text">Total Trader In </span>
					<?php if($_SESSION['reseller'] == '') { ?>
						<div class="main_update_button">
							<button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#totalTrader">Update</button>
						</div>
					<?php } ?>

                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage <?= $dv_rolling_arrow_color; ?>"><i class="fa <?= $dv_rolling_arrow_direction; ?>"></i> <?= $dv_rolling_percent; ?>%</span>
                    <h5 class="description-header">$<?= $dv_rolling_value; ?></h5>
                    <span class="description-text">Total Rolling </span>
					<?php if($_SESSION['reseller'] == '') { ?>
						<div class="main_update_button">
							<button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#totalRolling">Update</button>
						</div>
					<?php } ?>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage <?= $dv_partner_arrow_color; ?>"><i class="fa <?= $dv_partner_arrow_direction; ?>"></i> <?= $dv_partner_percent; ?>%</span>
                    <h5 class="description-header">$<?= $dv_partner_value; ?></h5>
                    <span class="description-text">Total Partner Joined</span>
					<?php if($_SESSION['reseller'] == '') { ?>
						<div class="main_update_button">
							<button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#totalPartner">Update</button>
						</div>
					<?php } ?>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage <?= $dv_splits_arrow_color; ?>"><i class="fa <?= $dv_splits_arrow_direction; ?>"></i> <?= $dv_splits_percent; ?>%</span>
                    <h5 class="description-header"><?= $dv_splits_value; ?></h5>
                    <span class="description-text">Nett Splits </span>
					<?php if($_SESSION['reseller'] == '') { ?>
						<div class="main_update_button">
							<button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#nettSplits">Update</button>
						</div>
					<?php } ?>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <hr>

          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  
<?php if($_SESSION['reseller'] == '') { ?>      
<!-- Modal -->
<div id="totalTrader" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Total Trader In</h4>
      </div>
      <div class="modal-body">
		<div class="row form-group">
			<form action="data/update_display.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_display">
				<input type="hidden" name="disp" value="1">
				<div class="col-lg-3 col-md-3 form-group">                  
					<label>Amount ($) :</label>
					<input type="text" class="form-control" id="trader_amount" placeholder="Amount" name="trader_amount" value="<?php echo $dv_trader_value; ?>">                            
				</div>
				<div class="col-lg-3 col-md-3 form-group">                  
					<label>Change (%) :</label>
					<input type="text" class="form-control" id="trader_percent" placeholder="Change Percent" name="trader_percent" value="<?php echo $dv_trader_percent; ?>">                            
				</div>
				<div class="col-lg-3 col-md-3 form-group">                  
					<label>Direction :</label>
					<select class="form-control" name="trader_direction">
						<?php if($dv_trader_arrow == '1'){ ?>
							<option value="1" selected="selected">Up</option>
							<option value="0">Equal</option>
							<option value="2">Down</option>
						<?php } else if($dv_trader_arrow == '0'){ ?>
							<option value="1">Up</option>
							<option value="0" selected="selected">Equal</option>
							<option value="2">Down</option>
						<?php } else { ?>
							<option value="1">Up</option>
							<option value="0">Equal</option>
							<option value="2" selected="selected">Down</option>
						<?php } ?>
					</select>                           
				</div>
				<div class="col-lg-3 col-md-3 form-group">
					<div class="display_update_button">
						<button type="submit" class="btn btn-block btn-success">Update Now</button>
					</div>
				</div>
			</form>
		</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="totalRolling" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Total Rolling</h4>
      </div>
      <div class="modal-body">
		<div class="row form-group">
			<form action="data/update_display.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_display">
				<input type="hidden" name="disp" value="2">
				<div class="col-lg-3 col-md-3 form-group">                  
					<label>Amount ($) :</label>
					<input type="text" class="form-control" id="rolling_amount" placeholder="Amount" name="rolling_amount" value="<?php echo $dv_rolling_value; ?>">                            
				</div>
				<div class="col-lg-3 col-md-3 form-group">                  
					<label>Change (%) :</label>
					<input type="text" class="form-control" id="rolling_percent" placeholder="Change Percent" name="rolling_percent" value="<?php echo $dv_rolling_percent; ?>">                            
				</div>
				<div class="col-lg-3 col-md-3 form-group">                  
					<label>Direction :</label>
					<select class="form-control" name="rolling_direction">
						<?php if($dv_rolling_arrow == '1'){ ?>
							<option value="1" selected="selected">Up</option>
							<option value="0">Equal</option>
							<option value="2">Down</option>
						<?php } else if($dv_rolling_arrow == '0'){ ?>
							<option value="1">Up</option>
							<option value="0" selected="selected">Equal</option>
							<option value="2">Down</option>
						<?php } else { ?>
							<option value="1">Up</option>
							<option value="0">Equal</option>
							<option value="2" selected="selected">Down</option>
						<?php } ?>
					</select>                           
				</div>
				<div class="col-lg-3 col-md-3 form-group">
					<div class="display_update_button">
						<button type="submit" class="btn btn-block btn-success">Update Now</button>
					</div>
				</div>
			</form>
		</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="totalPartner" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Total Partner Joined</h4>
      </div>
      <div class="modal-body">
			<div class="row form-group">
				<form action="data/update_display.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_display">
					<input type="hidden" name="disp" value="3">
					<div class="col-lg-3 col-md-3 form-group">                  
						<label>Amount ($) :</label>
						<input type="text" class="form-control" id="partner_amount" placeholder="Amount" name="partner_amount" value="<?php echo $dv_partner_value; ?>">                            
					</div>
					<div class="col-lg-3 col-md-3 form-group">                  
						<label>Change (%) :</label>
						<input type="text" class="form-control" id="partner_percent" placeholder="Change Percent" name="partner_percent" value="<?php echo $dv_partner_percent; ?>">                            
					</div>
					<div class="col-lg-3 col-md-3 form-group">                  
						<label>Direction :</label>
						<select class="form-control" name="partner_direction">
							<?php if($dv_partner_arrow == '1'){ ?>
								<option value="1" selected="selected">Up</option>
								<option value="0">Equal</option>
								<option value="2">Down</option>
							<?php } else if($dv_rolling_arrow == '0'){ ?>
								<option value="1">Up</option>
								<option value="0" selected="selected">Equal</option>
								<option value="2">Down</option>
							<?php } else { ?>
								<option value="1">Up</option>
								<option value="0">Equal</option>
								<option value="2" selected="selected">Down</option>
							<?php } ?>
						</select>                           
					</div>
					<div class="col-lg-3 col-md-3 form-group">
						<div class="display_update_button">
							<button type="submit" class="btn btn-block btn-success">Update Now</button>
						</div>
					</div>
				</form>
			</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="nettSplits" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nett Splits</h4>
      </div>
      <div class="modal-body">
			<div class="row form-group">
				<form action="data/update_display.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_display">
					<input type="hidden" name="disp" value="4">
					<div class="col-lg-3 col-md-3 form-group">                  
						<label>Amount ($) :</label>
						<input type="text" class="form-control" id="splits_amount" placeholder="Amount" name="splits_amount" value="<?php echo $dv_splits_value; ?>">                            
					</div>
					<div class="col-lg-3 col-md-3 form-group">                  
						<label>Change (%) :</label>
						<input type="text" class="form-control" id="splits_percent" placeholder="Change Percent" name="splits_percent" value="<?php echo $dv_splits_percent; ?>">                            
					</div>
					<div class="col-lg-3 col-md-3 form-group">                  
						<label>Direction :</label>
						<select class="form-control" name="splits_direction">
							<?php if($dv_splits_arrow == '1'){ ?>
								<option value="1" selected="selected">Up</option>
								<option value="0">Equal</option>
								<option value="2">Down</option>
							<?php } else if($dv_rolling_arrow == '0'){ ?>
								<option value="1">Up</option>
								<option value="0" selected="selected">Equal</option>
								<option value="2">Down</option>
							<?php } else { ?>
								<option value="1">Up</option>
								<option value="0">Equal</option>
								<option value="2" selected="selected">Down</option>
							<?php } ?>
						</select>                           
					</div>
					<div class="col-lg-3 col-md-3 form-group">
						<div class="display_update_button">
							<button type="submit" class="btn btn-block btn-success">Update Now</button>
						</div>
					</div>
				</form>
			</div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div id="currentStatistics" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Current Statistics</h4>
      </div>
      <div class="modal-body">
			<div class="row form-group">
				<form action="data/update_display.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_display">
					<input type="hidden" name="disp" value="7">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Partner Joined Value :</label>
						<input type="text" class="form-control" id="partner_value" placeholder="Partner Joined Value" name="partner_value" value="<?php echo $dv_partner_joined; ?>">  
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Max Partner Joined :</label>
						<input type="text" class="form-control" id="max_partner_value" placeholder="Max Partner Joined" name="max_partner_value" value="<?php echo $dv_max_partner; ?>">  
					</div>
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Trader done Value :</label>
						<input type="text" class="form-control" id="trader_done" placeholder="Trader done Value" name="trader_done" value="<?php echo $dv_trader_done; ?>">
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Max Trader done :</label>
						<input type="text" class="form-control" id="max_trader_done" placeholder="Max Trader done" name="max_trader_done" value="<?php echo $dv_max_trader_done; ?>">  
					</div>
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Scroll Unit Value :</label>
						<input type="text" class="form-control" id="scroll_unit" placeholder="Scroll Unit Value" name="scroll_unit" value="<?php echo $dv_scroll_unit_done; ?>">                            
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Max Scroll Unit :</label>
						<input type="text" class="form-control" id="max_scroll_unit" placeholder="Max Scroll Unit" name="max_scroll_unit" value="<?php echo $dv_max_scroll_unit_done; ?>">  
					</div>
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Bonus Splits Ratio Value :</label>
						<input type="text" class="form-control" id="bonus_splits" placeholder="Bonus Splits Ratio Value" name="bonus_splits" value="<?php echo $dv_bonus_splits; ?>">                            
					</div>
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Max Bonus Splits Ratio :</label>
						<input type="text" class="form-control" id="max_bonus_splits" placeholder="Max Bonus Splits Ratio" name="max_bonus_splits" value="<?php echo $dv_max_bonus_splits; ?>">  
					</div>
					
					<div class="col-lg-3 col-md-3 form-group">
						<div class="display_update_button">
							<button type="submit" class="btn btn-block btn-success">Update Now</button>
						</div>
					</div>
				</form>
			</div>
      </div>
    </div>
  </div>
</div>
<?php } ?>      

 
         <!-- /.col -->
          <!-- /.box -->
          
      
      <!-- ========* End Admin Setting Data of [ Latest Trader (unit) Slipts Bonus Pay ] Panel *====== -->
      
      
      
      <!-- ========* Start Admin Setting member Package Panel *====== -->
      
      	<div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">MEMBER PACKAGE :<small>Admin Setting Member Package</small></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="row">
				<!-- /.col -->
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
					
					$today = date('Y-m-d');
					$start_date = $row['mp_rewards_start'];
					$end_date = $row['mp_rewards_end'];
					
					if($start_date != '' && $end_date != ''){
						$diff1 = dateDifference($start_date, $today);
						$diff2 = dateDifference($today, $end_date);
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
					  <h5 class="widget-user-desc">FAST START </h5>
					  <h4 class="widget-user-desc">$ <?= $row['mp_price_dollar']; ?> <span> <small><?= $row['mp_price_rc']; ?> RC</small> </span></h4>
					</div>
					<div class="rewards-section">
						<?php if($start_date != '' && $end_date != ''){ if(($diff1 > -1) && ($diff2 > -1) ){ ?>
							<div class="rewards-offer"><?= $row['mp_rewards_percent']; ?>% <div class="rewards-info">more</div></div>
						<?php } } ?>
					</div>
					</div>
					<div class="box-footer no-padding">
					  <ul class="nav nav-stacked">
						<li><a>$ <?= $row['mp_price_dollar']; ?> ( <?= $row['mp_price_rc']; ?> RC ) <span class="pull-right badge bg-blue">On Trader </span></a></li>
						<li><a>Ratio of BP <span class="pull-right badge bg-aqua"><?= $row['mp_ratio_bp']; ?> %</span></a></li>
						<li><a>Un Frozen <span class="pull-right badge bg-green"><?= $row['mp_unfrozen']; ?> Days </span></a></li>
						<li><a>Robot Trader <span class="pull-right badge bg-red"><?= $mp_robot; ?></span></a></li>
						<li><a>Closed Account <span class="pull-right badge bg-red"><?= $mp_closed_account; ?></span></a></li>
						<li><a>Referal Bonus <span class="pull-right badge bg-red"><?= $row['mp_bonus_level']; ?> Levels</span></a></li>
						<li><a><button type="button" onclick="location.href='packages_add.php?action=update&mp=<?php echo $row['mp_id']; ?>';" class="btn btn-block btn-danger btn-sm">UPDATE </button></a></li>
					  </ul>
					</div>
				  </div>
				</div>
				<?php } ?>
           
          </div>
            
            </div>
            
      
      
      <!-- ========* End Admin Setting member Package Panel *====== -->
      
          
          
          
          
          
          </div>
          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS ( post anoncement )-->
          <div class="col-md-4">
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="../img/package1.png" alt="User Image">
                <span class="username white-color">Today Latest News</span>
                <span class="description">Shared publicly - 7:30 PM Today</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-responsive pad" src="../img/33.jpg" alt="Photo">

              <p>I took this photo this morning. What do you guys think?</p>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
              <span class="pull-right text-muted">127 likes - 3 comments</span>
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../img/package1.png" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        Trade Department
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                  好消息!! 亲爱的合作伙伴们，本公司将24小时开放交易市场让合作伙伴可以无限制24小时在 <b>SCGC</b> 交易板上挂卖比特代币..
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../img/package1.png" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        Luna Stark
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
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

        
        <!-- /.col -->
     
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

require_once 'footer.php';

?>

<script src="../js/dashboard2.js"></script>
<script src="../js/demo.js"></script>