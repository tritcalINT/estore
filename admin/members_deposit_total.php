<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/members_deposit_total_data.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> MEMBER SETTING：</h4>
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

                <b class="white-color">MEMBERS DEPOSIT TOTAL </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
			 <form action="members_deposit_total.php" method="post" enctype="multipart/form-data" name="filter_reseller">
            <div class="box-header">
              <h3 class="box-title">Deposit Total: <?= $deposit_total; ?></h3>
              <div class="box-tools">
			 
			    <div class="col-lg-3 col-md-3">                  
					<input type="text" name="from_date" id="from_date" class="form-control pull-right" placeholder="From Date" value="<?= $from_date; ?>">                           
				</div>
				
				<div class="col-lg-3 col-md-3">                  
					<input type="text" name="to_date" id="to_date" class="form-control pull-right" placeholder="To Date" value="<?= $to_date; ?>">                           
				</div>
				<?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
					<div class="col-lg-3 col-md-3">
						<select class="form-control" name="r_id">
							<option value="">Select Reseller</option>
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
				
				<div class="col-lg-3 col-md-3">                  
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
                  <th>Deposit Date</th>
				  <th>Deposit Amount</th>
				  <th>Type</th>
				  <th>Reseller</th>
                </tr>
                </thead>
                <tbody>
				 <?php 
				$i=1;
				while($row = mysqli_fetch_assoc($result)) { 
				?>
                <tr>
                  <td><?php echo $i++; ?></td>
				  <td><?php echo $row['m_username']; ?></td>
                  <td><?php echo $row['m_name']; ?></td>
                  <td><?php echo $row['deposit_date']; ?></td>
				  <td><?php echo $row['md_actual_amount']; ?></td>
				  <td><?php echo $row['md_type']; ?></td>
				  <td><?php echo $row['a_username']; ?></td>	  
                </tr>
				
				<?php } ?>
          
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
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