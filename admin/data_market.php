<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/data_market_data.php';

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
    <section class="content">
		<div class="row">
        <div class="col-md-12">
		
			<b class="page_heading white-color">Data Market </b>

			<div class="box-body">
			  <div class="box box-primary">
			
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-header">
			<form action="data_market.php" method="post" enctype="multipart/form-data" name="data_market">
			<h3 class="box-title">
				<div class="col-lg-4 col-xs-4">                  
					<input type="text" name="search_date" id="search_date" class="form-control pull-right" placeholder="Date" value="<?= $search_date; ?>">                           
				</div>
				<div class="col-lg-4 col-xs-4">                  
					<input type="text" name="search_amount" id="search_amount" class="form-control pull-right" placeholder="Value" value="<?= $search_amount; ?>">                           
				</div>
				
				<div class="col-lg-4 col-xs-4">                  
					<button type="submit" class="btn btn-block btn-info">Search</button>                           
				</div>
			</h3>
			</form>
			
			  <div class="box-tools">&nbsp;
			  </div>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
			  <table class="table table-bordered table-striped half-table">
				<thead class="white-color">
				<tr>
					<th><small>Date & Time</small> </th>
					<th><small>Value</small></th>
				</tr>
				</thead>
				<tbody>
				 <?php 
				   $i=0;
				   if($num_rows > 0){
					while($rowmarket = mysqli_fetch_assoc($resultmarket)) { 
					?>
				<tr>
					<td><?= $rowmarket['market_time']; ?></td>
					<td><?= $rowmarket['cd_value']; ?></td>
				  </tr>
				  <?php }
				   } else {
				  ?>
				  <tr>
					<td colspan="2">No data available for the chosen date</td>
				  
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

<?php

require_once 'footer.php';

?>
