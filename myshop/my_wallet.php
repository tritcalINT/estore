<?php
 
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
 
 
 $balance= totalGPMainAccount($userdetails['scg_ref'], true, $scg_conn);
 
 
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <!--// G-PAY-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <!--<span class="info-box-icon bg-default"><img src="../img/ing.png" width="60" height="60"></span>-->
            <div class="">
            
              <span class="info-box-text"><?= $lang['BOX_GPAY'];  ?>:</span>
              <span class="info-box-number">$ <?= $balance; ?></span>
            </div>
            <!-- /.info-box-content -->
            <span class="progress-description">
<!--      <a href="make_g_pay_topup.php"><button type="submit" class="btn btn-block btn-danger"><?= $lang['BOX_MAKE_TOP_UP']; ?></button></a>-->
    </span>
          </div>
          <!-- /.info-box -->
        </div>  
          
          
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="info-box">
            <!--<span class="info-box-icon bg-default"><img src="../img/ing.png" width="60" height="60"></span>-->

            <div class="">
              <span class="info-box-text">COMMISSION ACCOUNT:</span>
                  <?php if(manufacturer==$userdetails['user_type']){
                  
                  echo' <span class="info-box-number"> $';
                  echo  '0';
                  echo' </span>';
              }
              else{
                  
                  echo' <span class="info-box-number">$';
                  echo  $userdetails['commision_balance'];
                  echo' </span>';
                  
              }
              
                  
              ?>
            </div>
            <!-- /.info-box-content -->
            <span class="progress-description">
<!--      <a href="make_topup.php"><button type="submit" class="btn btn-block btn-warning"><?= $lang['MAKE_TOP_UP']; ?></button></a>-->
    </span>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="info-box">
            <!--<span class="info-box-icon bg-default"><img src="../img/ing3.png" width="60" height="60"></span>-->

            <div class="">
              <span class="info-box-text">SALES ACCOUNT :</span>
              <?php if(manufacturer==$userdetails['user_type']){
                  
                  echo' <span class="info-box-number"> $';
                  echo  $userdetails['commision_balance'];
                  echo' </span>';
              }
              else{
                  
                  echo' <span class="info-box-number"> $';
                  echo  $userdetails['salse_balance'];
                  echo' </span>';
                  
              }
              
                  
              ?>
<!--            <span class="info-box-number">$ <?= $userdetails['salse_balance']; ?></span>-->
            </div>
            <!-- /.info-box-content -->
            <span class="progress-description">
<!--    <a href="make_topup.php"><button type="submit" class="btn btn-block btn-success"><?= $lang['MAKE_TOP_UP']; ?></button></a>-->
    </span>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
 
        
      </div>
      <!-- /.row -->

      
      <!-- /.row -->
	  
   
        <!-- /.col -->
		
 

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
<script src="./js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="./js/dashboard2.js"></script>
