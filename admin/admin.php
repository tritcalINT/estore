
<?php
/**
 * Created by PhpStorm.
 * User: Amila Shanaka
 * Date: 5/7/2019
 * Time: 9:06 PM
 */

require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/functions.php';
include_once 'data/admin_data.php';

?>

<link href="css/admin.css" rel="stylesheet" type="text/css"/>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
		<?php if($_SESSION['reseller'] == '') { ?>
			<form action="data/update_display.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_display">
			<input type="hidden" name="disp" value="5">
		
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

    <div class="margin-top">
        <br></br>
    </div>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><img src="../img/ing.png" width="60" height="60"></span>

            <div class="info-box-content">
              <span class="info-box-text">Daily Sales:</span>
              <span class="info-box-number">$ <?= $main_account_admin; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><img src="../img/ing3.png" width="60" height="60"></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Sales:</span>
              <span class="info-box-number"><?= dash_board_item_sale($conn); ?> <small> Items</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
     
        
<!--         fix for small devices only 
        <div class="clearfix visible-sm-block">
            
            
        </div>-->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><img src="../img/ing5.png" width="60" height="60"></span>
            <div class="info-box-content">
              <span class="info-box-text">Product Count in Stock</span>
              <span class="info-box-number"><?php //echo dash_board_item_count($conn); ?></span>
              <span class="info-box-number"><small><strong></strong><?=  $item_count; ?></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <span class="info-box-icon bg-green"><img src="../img/ing4.png" width="60" height="60"></span>

            <div class="info-box-content">
              <span class="info-box-text">Ready deliver items</span>
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
    
        </div>
        <!-- /.col -->
      </div>


      	<div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
 
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

   


          <!-- /.box -->
        </div>
        
   
      <!-- /.row -->
    </section>
    
    
    <!-- /.content -->
    
     <section class="content">
         <div class="row">
         
         <div class="col-md-12">
              
                                   <?php 
          
               // require_once './tree.php';
          
          ?>
         
          </div>
          
          </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
 
<?php

require_once 'footer.php';

?>

<script src="../js_old/dashboard2.js"></script>
<script src="../js_old/demo.js"></script>
