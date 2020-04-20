<?php
 session_start();
require_once 'header.php';
require_once 'side_menu.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

	<?php
		include_once 'side_header_wallet.php';
	?>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
        <div class="row">
        <!--// G-PAY-->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><img src="../img/ing7.png" width="60" height="60"></span>

            <div class="">
            
              <span class="info-box-text"><?= $lang['BOX_GPAY'];  ?>:</span>
              <span class="info-box-number">$ <?= $gp_main_account; ?></span>
            </div>
            <!-- /.info-box-content -->
            <span class="progress-description">
                <a href="topup_setting_list.php"><button type="submit" class="btn btn-block btn-danger"><?= $lang['BOX_MAKE_TOP_UP']; ?></button></a>
    </span>
          </div>
          <!-- /.info-box -->
        </div>  
          
          
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
              <span class="info-box-icon bg-default"><img src="../img/ing3.png" width="60" height="60"></span>

            <div class="">
              <span class="info-box-text"><?= $lang['BOX_MAIN_ACCOUNT']; ?>:</span>
              <span class="info-box-number">$ <?= $main_account; ?></span>
            </div>
            <!-- /.info-box-content -->
            <span class="progress-description">
                <a href="#"><button type="submit" class="btn btn-block btn-warning"><?= $lang['MAKE_TOP_UP']; ?></button></a>
    </span>
          </div>
          <!-- /.info-box -->
        </div>
       <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><img src="../img/ing.png" width="60" height="60"></span>

            <div class="">
              <span class="info-box-text">Commission Account:</span>
              <span class="info-box-number">$ <?= $main_account; ?></span>
            </div>
            <!-- /.info-box-content -->
            <span class="progress-description">
                <a href="#"><button type="submit" class="btn btn-block btn-success"><?= $lang['MAKE_TOP_UP']; ?></button></a>
            </span>
          </div>
          <!-- /.info-box -->
        </div>

        </div>

      </div>
    </section>
     
      


