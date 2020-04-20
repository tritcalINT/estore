<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/members_details_data.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> MEMBER DETAILS</h4>
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
			<!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Deposit </a></li>
              <li><a href="#tab_2" data-toggle="tab">Team </a></li>
			  <li><a href="#tab_3" data-toggle="tab">Bonus </a></li>
			  <li><a href="#tab_4" data-toggle="tab">Trading Interest </a></li>
			  <li><a href="#tab_5" data-toggle="tab">Withdraw </a></li>
			  <li><a href="#tab_6" data-toggle="tab">Transfer </a></li>
            </ul>
			<div class="tab-content">
              <div class="tab-pane active" id="tab_1">

                <b>DEPOSIT LIST FOR MEMBER : <?= $member_username; ?></b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
              <h3 class="box-title">&nbsp;</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-striped">
                <thead>
                <tr bgcolor="#0099CC">
                  <th>#</th>
                  <th>Date</th>
                  <th>Ref No</th>
				  <th>Member Username</th>
                  <th>Package Name</th>
				  <th>Payment Type</th>
				  <th>Payment Method</th>
				  <th>Amount</th>
				  <th>Reward Bonus</th>
				  <th>Pay Slip</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
				 <?php 
				$i=1;
				if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) { 
					if($row['md_status'] == '1'){
						$md_status = 'Active';
						$label = 'label-success';
					} else if($row['md_status'] == '0'){
						$md_status = 'Pending';
						$label = 'label-warning';
					} else {
						$md_status = 'Rejected';
						$label = 'label-danger';
					}
				?>
                <tr id="tr<?php echo $row['md_id'];?>">
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['deposit_date']; ?></td>
                  <td><?php echo $row['md_reference']; ?></td>
				  <td><?php echo $row['m_username']; ?></td>
				  <td><?php echo $row['mp_name'].' ['.$row['mp_price_dollar'].']'; ?></td>
				  <td><?php echo $row['md_type']; ?></td>
				  <td><?php echo $row['cu_name']; ?></td>
				  <td><?php echo number_format((float)$row['md_amount'], $row['cu_decimal'], '.', ''); ?></td>
				  <td><?php if($row['md_rewards_amount'] != '') { echo $row['md_rewards_amount'].' ('.$row['md_rewards_percent'].'%)'; } ?></td>
				  <td><a href="#" onclick="viewImg('<?php echo $website_url.'uploads/deposit/'.$row['md_slip'];?>');">View</a></td>
                  <td><span class="label <?= $label; ?>"><?php echo $md_status; ?></span></td>                        
                </tr>
				
				<?php } } else { ?>
					<tr>
						<td colspan="11">No Deposits for this member</td>
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
	 
	 
	 <div class="tab-pane" id="tab_2">

                <b class="page_heading">Team </b>

                <div class="box-body">
              <div class="box box-primary">

			<div class="bs-example">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 1</h4>
							</div>
						</a>
						<div id="collapseOne" class="panel-collapse collapse in">
							<div class="panel-body">
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>	
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(0, $members)) {
									foreach($members[0] as $member_level_1){
									?>
									<tr>
									  <td><?php echo $i++; ?></td>	
									  <td><?php echo $member_level_1['m_name']; ?></td>
									  <td><?php echo $member_level_1['m_username']; ?></td>
									  <td><?php echo $member_level_1['m_register_date']; ?></td>                       
									</tr>
									
									<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 1</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
							</div>
						</div>
					</div>
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 2</h4>
							</div>
						</a>
						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(1, $members)) {
									foreach($members[1] as $member_level_2){
									?>
									<tr>
									  <td><?php echo $i++; ?></td>						  
									  <td><?php echo $member_level_2['m_name']; ?></td>
									  <td><?php echo $member_level_2['m_username']; ?></td>
									  <td><?php echo $member_level_2['m_register_date']; ?></td>                         
									</tr>
									
									<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 2</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->

							</div>
						</div>
					</div>
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 3</h4>
							</div>
						</a>
						<div id="collapseThree" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(2, $members)) {
										foreach($members[2] as $member_level_3){
										?>
									<tr>
									  <td><?php echo $i++; ?></td>						  
									  <td><?php echo $member_level_3['m_name']; ?></td>
									  <td><?php echo $member_level_3['m_username']; ?></td>
									  <td><?php echo $member_level_3['m_register_date']; ?></td>                         
									</tr>
									<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 3</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->

							</div>
						</div>
					</div>
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 4</h4>
							</div>
						</a>
						<div id="collapseFour" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(3, $members)) {
										foreach($members[3] as $member_level_4){
									?>
									<tr>
									  <td><?php echo $i++; ?></td>						  
									  <td><?php echo $member_level_4['m_name']; ?></td>
									  <td><?php echo $member_level_4['m_username']; ?></td>
									  <td><?php echo $member_level_4['m_register_date'];  ?></td>                         
									</tr>
									
									<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 4</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->

							</div>
						</div>
					</div>
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 5</h4>
							</div>
						</a>
						<div id="collapseFive" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(4, $members)) {
										foreach($members[4] as $member_level_5){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_5['m_name']; ?></td>
										  <td><?php echo $member_level_5['m_username']; ?></td>
										  <td><?php echo $member_level_5['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 5</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 6</h4>
							</div>
						</a>
						<div id="collapseSix" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(5, $members)) {
										foreach($members[5] as $member_level_6){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_6['m_name']; ?></td>
										  <td><?php echo $member_level_6['m_username']; ?></td>
										  <td><?php echo $member_level_6['m_register_date'];  ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 6</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>
					
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 7</h4>
							</div>
						</a>
						<div id="collapseSeven" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(6, $members)) {
										foreach($members[6] as $member_level_7){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_7['m_name']; ?></td>
										  <td><?php echo $member_level_7['m_username']; ?></td>
										  <td><?php echo $member_level_7['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 7</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>

					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 8</h4>
							</div>
						</a>
						<div id="collapseEight" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(7, $members)) {
										foreach($members[7] as $member_level_8){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_8['m_name']; ?></td>
										  <td><?php echo $member_level_8['m_username']; ?></td>
										  <td><?php echo $member_level_8['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 8</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>	


					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseNine">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 9</h4>
							</div>
						</a>
						<div id="collapseNine" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(8, $members)) {
										foreach($members[8] as $member_level_9){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_9['m_name']; ?></td>
										  <td><?php echo $member_level_9['m_username']; ?></td>
										  <td><?php echo $member_level_9['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 9</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>	

					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTen">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 10</h4>
							</div>
						</a>
						<div id="collapseTen" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(9, $members)) {
										foreach($members[9] as $member_level_10){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_10['m_name']; ?></td>
										  <td><?php echo $member_level_10['m_username']; ?></td>
										  <td><?php echo $member_level_10['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 10</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>	
					
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 11</h4>
							</div>
						</a>
						<div id="collapseEleven" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(10, $members)) {
										foreach($members[10] as $member_level_11){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_11['m_name']; ?></td>
										  <td><?php echo $member_level_11['m_username']; ?></td>
										  <td><?php echo $member_level_11['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 11</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>

					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 12</h4>
							</div>
						</a>
						<div id="collapseTwelve" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(11, $members)) {
										foreach($members[11] as $member_level_12){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_12['m_name']; ?></td>
										  <td><?php echo $member_level_12['m_username']; ?></td>
										  <td><?php echo $member_level_12['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 12</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>
					
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 13</h4>
							</div>
						</a>
						<div id="collapseThirteen" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(12, $members)) {
										foreach($members[12] as $member_level_13){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_13['m_name']; ?></td>
										  <td><?php echo $member_level_13['m_username']; ?></td>
										  <td><?php echo $member_level_13['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 13</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>
					
					
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseFourteen">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 14</h4>
							</div>
						</a>
						<div id="collapseFourteen" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(13, $members)) {
										foreach($members[13] as $member_level_14){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_14['m_name']; ?></td>
										  <td><?php echo $member_level_14['m_username']; ?></td>
										  <td><?php echo $member_level_14['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 14</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>
					
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseFifteen">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 15</h4>
							</div>
						</a>
						<div id="collapseFifteen" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(14, $members)) {
										foreach($members[14] as $member_level_15){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_15['m_name']; ?></td>
										  <td><?php echo $member_level_15['m_username']; ?></td>
										  <td><?php echo $member_level_15['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 15</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>
					
					
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseSixteen">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 16</h4>
							</div>
						</a>
						<div id="collapseSixteen" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(15, $members)) {
										foreach($members[15] as $member_level_16){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_16['m_name']; ?></td>
										  <td><?php echo $member_level_16['m_username']; ?></td>
										  <td><?php echo $member_level_16['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 16</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>
					
					
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseSeventeen">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 17</h4>
							</div>
						</a>
						<div id="collapseSeventeen" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(16, $members)) {
										foreach($members[16] as $member_level_17){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_17['m_name']; ?></td>
										  <td><?php echo $member_level_17['m_username']; ?></td>
										  <td><?php echo $member_level_17['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 17</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>
					
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseEightteen">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 18</h4>
							</div>
						</a>
						<div id="collapseEightteen" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(17, $members)) {
										foreach($members[17] as $member_level_18){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_18['m_name']; ?></td>
										  <td><?php echo $member_level_18['m_username']; ?></td>
										  <td><?php echo $member_level_18['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 18</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>
					
					
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseNineteen">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 19</h4>
							</div>
						</a>
						<div id="collapseNineteen" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(18, $members)) {
										foreach($members[18] as $member_level_19){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_19['m_name']; ?></td>
										  <td><?php echo $member_level_19['m_username']; ?></td>
										  <td><?php echo $member_level_19['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 19</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>
					
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwenty">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 20</h4>
							</div>
						</a>
						<div id="collapseTwenty" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(19, $members)) {
										foreach($members[19] as $member_level_20){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_20['m_name']; ?></td>
										  <td><?php echo $member_level_20['m_username']; ?></td>
										  <td><?php echo $member_level_20['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 20</td>
										</tr>
									
									<?php } ?>
							  
									</tbody>
									
								  </table>
								</div>
								<!-- /.box-body -->
									
							</div>
						</div>
					</div>
					
					
					<div class="panel panel-default referal-accordian">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwentyOne">
							<div class="panel-heading">
								<h4 class="panel-title referal-title">Level 21</h4>
							</div>
						</a>
						<div id="collapseTwentyOne" class="panel-collapse collapse">
							<div class="panel-body">
							
							<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
								  <table class="table table-bordered table-striped">
									<thead class="white-color">
									<tr>
									  <th>#</th>						  
									  <th>Name</th>
									  <th>Username</th>
									  <th>Register Date</th>
									</tr>
									</thead>
									<tbody>
									 <?php 
									$i=1;
									if (array_key_exists(20, $members)) {
										foreach($members[20] as $member_level_21){
										?>
										<tr>
										  <td><?php echo $i++; ?></td>						  
										  <td><?php echo $member_level_21['m_name']; ?></td>
										  <td><?php echo $member_level_21['m_username']; ?></td>
										  <td><?php echo $member_level_21['m_register_date']; ?></td>                         
										</tr>
										
										<?php } } else { ?>	
										<tr>
											<td colspan="4">No Members in Level 21</td>
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
					

			</div>

          </div>
         </div>
		</div>
		
		
	 	<div class="tab-pane" id="tab_3">

                <b class="page_heading">TOTAL BONUS PAID TO THIS MEMBER : <?= $member_total_bonus; ?> </b>
				
				<div class="box-body">
              <div class="box box-primary">
				
						<div class="bs-example">
							<div class="panel-group" id="bonusaccordion">
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusOne">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 1</h4>
										</div>
									</a>
									<div id="bonusOne" class="panel-collapse collapse in">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php 
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_1) > 0){
													$i=1;
													while($row_bonus_1 = mysqli_fetch_assoc($result_bonus_1)) {
														if($row_bonus_1['rb_bonus_message'] == 'excess bonus today'){
															$bonus_message_1 = $lang['NETWORK_BONUS_EXCEED'];
														} else {
															$bonus_message_1 = '';
														}
													?>
													<tr>
													  <td><?php echo $i++; ?></td>	
													  <td><?php echo $row_bonus_1['rb_date']; ?></td>
													  <td><?php echo $row_bonus_1['m_username']; ?></td>
													  <td><?php echo $row_bonus_1['md_actual_amount']; ?></td>
													  <td><?php echo $row_bonus_1['rb_percent']; ?></td>  
													  <td><?php echo $row_bonus_1['rb_bonus_amount'].'<br/>('.$row_bonus_1['rb_bonus_message'].')'; ?></td>  												  
													</tr>
																									
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusTwo">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 2</h4>
										</div>
									</a>
									<div id="bonusTwo" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php 
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_2) > 0){
												$i=1;
												while($row_bonus_2 = mysqli_fetch_assoc($result_bonus_2)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_2['rb_date']; ?></td>
												  <td><?php echo $row_bonus_2['m_username']; ?></td>
												  <td><?php echo $row_bonus_2['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_2['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_2['rb_bonus_amount'].'<br/>('.$row_bonus_2['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusThree">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 3</h4>
										</div>
									</a>
									<div id="bonusThree" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_3) > 0){
												$i=1;
												while($row_bonus_3 = mysqli_fetch_assoc($result_bonus_3)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_3['rb_date']; ?></td>
												  <td><?php echo $row_bonus_3['m_username']; ?></td>
												  <td><?php echo $row_bonus_3['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_3['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_3['rb_bonus_amount'].'<br/>('.$row_bonus_3['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusFour">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 4</h4>
										</div>
									</a>
									<div id="bonusFour" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php 
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_4) > 0){
												$i=1;
												while($row_bonus_4 = mysqli_fetch_assoc($result_bonus_4)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_4['rb_date']; ?></td>
												  <td><?php echo $row_bonus_4['m_username']; ?></td>
												  <td><?php echo $row_bonus_4['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_4['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_4['rb_bonus_amount'].'<br/>('.$row_bonus_4['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusFive">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 5</h4>
										</div>
									</a>
									<div id="bonusFive" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												<?php
											    if($current_package != '') {
												if(mysqli_num_rows($result_bonus_5) > 0){
												$i=1;
												while($row_bonus_5 = mysqli_fetch_assoc($result_bonus_5)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_5['rb_date']; ?></td>
												  <td><?php echo $row_bonus_5['m_username']; ?></td>
												  <td><?php echo $row_bonus_5['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_5['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_5['rb_bonus_amount'].'<br/>('.$row_bonus_5['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusSix">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 6</h4>
										</div>
									</a>
									<div id="bonusSix" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_6) > 0){
												$i=1;
												while($row_bonus_6 = mysqli_fetch_assoc($result_bonus_6)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_6['rb_date']; ?></td>
												  <td><?php echo $row_bonus_6['m_username']; ?></td>
												  <td><?php echo $row_bonus_6['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_6['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_6['rb_bonus_amount'].'<br/>('.$row_bonus_6['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusSeven">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 7</h4>
										</div>
									</a>
									<div id="bonusSeven" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_7) > 0){
												$i=1;
												while($row_bonus_7 = mysqli_fetch_assoc($result_bonus_7)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_7['rb_date']; ?></td>
												  <td><?php echo $row_bonus_7['m_username']; ?></td>
												  <td><?php echo $row_bonus_7['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_7['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_7['rb_bonus_amount'].'<br/>('.$row_bonus_7['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusEight">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 8</h4>
										</div>
									</a>
									<div id="bonusEight" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_8) > 0){
												$i=1;
												while($row_bonus_8 = mysqli_fetch_assoc($result_bonus_8)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_8['rb_date']; ?></td>
												  <td><?php echo $row_bonus_8['m_username']; ?></td>
												  <td><?php echo $row_bonus_8['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_8['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_8['rb_bonus_amount'].'<br/>('.$row_bonus_8['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusNine">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 9</h4>
										</div>
									</a>
									<div id="bonusNine" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php 
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_9) > 0){
												$i=1;
												while($row_bonus_9 = mysqli_fetch_assoc($result_bonus_9)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_9['rb_date']; ?></td>
												  <td><?php echo $row_bonus_9['m_username']; ?></td>
												  <td><?php echo $row_bonus_9['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_9['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_9['rb_bonus_amount'].'<br/>('.$row_bonus_9['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
						
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusTen">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 10</h4>
										</div>
									</a>
									<div id="bonusTen" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_10) > 0){
												$i=1;
												while($row_bonus_10 = mysqli_fetch_assoc($result_bonus_10)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_10['rb_date']; ?></td>
												  <td><?php echo $row_bonus_10['m_username']; ?></td>
												  <td><?php echo $row_bonus_10['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_10['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_10['rb_bonus_amount'].'<br/>('.$row_bonus_10['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusEleven">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 11</h4>
										</div>
									</a>
									<div id="bonusEleven" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_11) > 0){
												$i=1;
												while($row_bonus_11 = mysqli_fetch_assoc($result_bonus_11)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_11['rb_date']; ?></td>
												  <td><?php echo $row_bonus_11['m_username']; ?></td>
												  <td><?php echo $row_bonus_11['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_11['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_11['rb_bonus_amount'].'<br/>('.$row_bonus_11['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusTwelve">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 12</h4>
										</div>
									</a>
									<div id="bonusTwelve" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_12) > 0){
												$i=1;
												while($row_bonus_12 = mysqli_fetch_assoc($result_bonus_12)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_12['rb_date']; ?></td>
												  <td><?php echo $row_bonus_12['m_username']; ?></td>
												  <td><?php echo $row_bonus_12['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_12['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_12['rb_bonus_amount'].'<br/>('.$row_bonus_12['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusThirteen">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 13</h4>
										</div>
									</a>
									<div id="bonusThirteen" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_13) > 0){
												$i=1;
												while($row_bonus_13 = mysqli_fetch_assoc($result_bonus_13)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_13['rb_date']; ?></td>
												  <td><?php echo $row_bonus_13['m_username']; ?></td>
												  <td><?php echo $row_bonus_13['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_13['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_13['rb_bonus_amount'].'<br/>('.$row_bonus_13['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusFourteen">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 14</h4>
										</div>
									</a>
									<div id="bonusFourteen" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_14) > 0){
												$i=1;
												while($row_bonus_14 = mysqli_fetch_assoc($result_bonus_14)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_14['rb_date']; ?></td>
												  <td><?php echo $row_bonus_14['m_username']; ?></td>
												  <td><?php echo $row_bonus_14['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_14['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_14['rb_bonus_amount'].'<br/>('.$row_bonus_14['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusFifteen">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 15</h4>
										</div>
									</a>
									<div id="bonusFifteen" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_15) > 0){
												$i=1;
												while($row_bonus_15 = mysqli_fetch_assoc($result_bonus_15)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_15['rb_date']; ?></td>
												  <td><?php echo $row_bonus_15['m_username']; ?></td>
												  <td><?php echo $row_bonus_15['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_15['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_15['rb_bonus_amount'].'<br/>('.$row_bonus_15['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusSixteen">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 16</h4>
										</div>
									</a>
									<div id="bonusSixteen" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_16) > 0){
												$i=1;
												while($row_bonus_16 = mysqli_fetch_assoc($result_bonus_16)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_16['rb_date']; ?></td>
												  <td><?php echo $row_bonus_16['m_username']; ?></td>
												  <td><?php echo $row_bonus_16['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_16['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_16['rb_bonus_amount'].'<br/>('.$row_bonus_16['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusSeventeen">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 17</h4>
										</div>
									</a>
									<div id="bonusSeventeen" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_17) > 0){
												$i=1;
												while($row_bonus_17 = mysqli_fetch_assoc($result_bonus_17)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_17['rb_date']; ?></td>
												  <td><?php echo $row_bonus_17['m_username']; ?></td>
												  <td><?php echo $row_bonus_17['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_17['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_17['rb_bonus_amount'].'<br/>('.$row_bonus_17['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusEighteen">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 18</h4>
										</div>
									</a>
									<div id="bonusEighteen" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_18) > 0){
												$i=1;
												while($row_bonus_18 = mysqli_fetch_assoc($result_bonus_18)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_18['rb_date']; ?></td>
												  <td><?php echo $row_bonus_18['m_username']; ?></td>
												  <td><?php echo $row_bonus_18['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_18['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_18['rb_bonus_amount'].'<br/>('.$row_bonus_18['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusNineteen">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 19</h4>
										</div>
									</a>
									<div id="bonusNineteen" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>	
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_19) > 0){
												$i=1;
												while($row_bonus_19 = mysqli_fetch_assoc($result_bonus_19)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_19['rb_date']; ?></td>
												  <td><?php echo $row_bonus_19['m_username']; ?></td>
												  <td><?php echo $row_bonus_19['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_19['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_19['rb_bonus_amount'].'<br/>('.$row_bonus_19['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusTwenty">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 20</h4>
										</div>
									</a>
									<div id="bonusTwenty" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_20) > 0){
												$i=1;
												while($row_bonus_20 = mysqli_fetch_assoc($result_bonus_20)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_20['rb_date']; ?></td>
												  <td><?php echo $row_bonus_20['m_username']; ?></td>
												  <td><?php echo $row_bonus_20['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_20['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_20['rb_bonus_amount'].'<br/>('.$row_bonus_20['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								<div class="panel panel-default referal-accordian">
									<a data-toggle="collapse" data-parent="#bonusaccordion" href="#bonusTwentyone">
										<div class="panel-heading">
											<h4 class="panel-title referal-title">Level 21</h4>
										</div>
									</a>
									<div id="bonusTwentyone" class="panel-collapse collapse">
										<div class="panel-body">
										<!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
											  <table class="table table-bordered table-striped">
												<thead class="white-color">
												<tr>
												  <th>#</th>
												  <th>Date</th>
												  <th>Username</th>
												  <th>Deposit Amount</th>
												  <th>Bonus Percent</th>
												  <th>Bonus Amount</th>
												</tr>
												</thead>
												<tbody>
												 <?php
												if($current_package != '') {
												if(mysqli_num_rows($result_bonus_21) > 0){
												$i=1;
												while($row_bonus_21 = mysqli_fetch_assoc($result_bonus_21)) {
												?>
												<tr>
												  <td><?php echo $i++; ?></td>	
												  <td><?php echo $row_bonus_21['rb_date']; ?></td>
												  <td><?php echo $row_bonus_21['m_username']; ?></td>
												  <td><?php echo $row_bonus_21['md_actual_amount']; ?></td>
												  <td><?php echo $row_bonus_21['rb_percent']; ?></td>  
												  <td><?php echo $row_bonus_21['rb_bonus_amount'].'<br/>('.$row_bonus_21['rb_bonus_message'].')'; ?></td>  												  
												</tr>
																								
												<?php } } else { ?>
													<tr>
													  <td colspan="6">No referal bonus in this level</td>
													</tr>
												<?php } } ?>
										  
												</tbody>
												
											  </table>
											</div>
											<!-- /.box-body -->
										</div>
									</div>
								</div>
								
								
								
							</div>
						</div>
					</div>
					</div>
				
		</div>
		
		<div class="tab-pane" id="tab_4">

                <b class="page_heading">TRADING INTEREST PAID TO: <?= $member_username; ?></b>
				
				<div class="box-body">
					<div class="box box-primary">
						
						<div class="box-header">
						  <h3 class="box-title">&nbsp;</h3>
						  <div class="box-tools">
							<div class="input-group input-group-sm" style="width: 150px;">
							  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

							  <div class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							  </div>
							</div>
						  </div>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
						  <table class="table table-bordered table-striped">
							<thead>
							<tr bgcolor="#0099CC">
							  <th>#</th>
							  <th>Date</th>
							  <th>Ref No</th>
							  <th>Market Name</th>
							  <th>Trading Amount</th>
							  <th>Interest(%)</th>
							  <th>Interest Paid</th>
							</tr>
							</thead>
							<tbody>
							 <?php 
							$i=1;
							if (mysqli_num_rows($result_trade_interest) > 0) {
							while($row_trade_interest = mysqli_fetch_assoc($result_trade_interest)) { 
							?>
							<tr>
							  <td><?php echo $i++; ?></td>
							  <td><?php echo $row_trade_interest['mti_created_date']; ?></td>
							  <td><?php echo $row_trade_interest['mt_reference']; ?></td>
							  <td><?php echo $row_trade_interest['tr_name']; ?></td>
							  <td><?php echo $row_trade_interest['mti_amount']; ?></td>
							  <td><?php echo $row_trade_interest['mti_interest_percent']; ?></td>   
							  <td><?php echo $row_trade_interest['mti_interest_amount']; ?></td>							  
							</tr>
							
							<?php } } else { ?>
								<tr>
									<td colspan="10">No Trading Interest paid to this member</td>
								</tr>
							<?php } ?>
					  
							</tbody>
							
						  </table>
						</div>
						
						
					</div>
				</div>
			  
			  
		</div>
		
		
		
		<div class="tab-pane" id="tab_5">

                <b class="page_heading">WITHDRAW BY: <?= $member_username; ?></b>
				
				<div class="box-body">
					<div class="box box-primary">
						
						<div class="box-header">
						  <h3 class="box-title">&nbsp;</h3>
						  <div class="box-tools">
							<div class="input-group input-group-sm" style="width: 150px;">
							  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

							  <div class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							  </div>
							</div>
						  </div>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
						  <table class="table table-bordered table-striped">
							<thead>
							<tr bgcolor="#0099CC">
							  <th>#</th>
							  <th>Date</th>
							  <th>Ref No</th>
							  <th>From</th>
							  <th>Method</th>
							  <th>Method Details</th>
							  <th>Actual Amount</th>
							  <th>Amount in Currency</th>
							  <th>Service Charge</th>
							  <th>Amount after Service</th>
							  <th>Status</th>
							</tr>
							</thead>
							<tbody>
							 <?php 
							$i=1;
							if (mysqli_num_rows($result_withdraw) > 0) {
							while($row_withdraw = mysqli_fetch_assoc($result_withdraw)) { 
							
							if($row_withdraw['mw_status'] == '1'){
								$mw_status = 'Active';
								$label = 'label-success';
							} else if($row_withdraw['mw_status'] == '0'){
								$mw_status = 'Pending';
								$label = 'label-warning';
							} else {
								$mw_status = 'Rejected';
								$label = 'label-danger';
							}
							
							if($row_withdraw['mw_type'] == '1'){
								$mw_type = 'THAWED ACCOUNT';
							} else if($row_withdraw['mw_type'] == '2'){
								$mw_type = 'BONUS';
							}
							
							if($row_withdraw['cu_type'] == '1'){
								$mw_method = 'Bank';
								$mw_details = $row_withdraw['m_bank_name']."<br/>Account No: ".$row_withdraw['m_bank_account_no']."<br/>Branch: ".$row_withdraw['m_bank_branch'];
							} else if($row_withdraw['cu_type'] == '2'){
								$mw_method = 'Bitcoin';
								$mw_details = $row_withdraw['m_bitcoin'];
							} else if($row_withdraw['cu_type'] == '3'){
								$mw_method = 'Litecoin';
								$mw_details = $row_withdraw['m_litecoin'];
							}
					
							?>
							<tr>
							  <td><?php echo $i++; ?></td>
							  <td><?php echo $row_withdraw['withdraw_date']; ?></td>
							  <td><?php echo $row_withdraw['mw_reference']; ?></td>
							  <td><?php echo $mw_type; ?></td>
							  <td><?php echo $mw_method; ?></td>
							  <td><?php echo $mw_details; ?></td>
							  <td><?php echo $row_withdraw['mw_amount']; ?></td>
							  <td><?php echo $row_withdraw['mw_amount_currency']; ?></td>
							  <td><?php echo $row_withdraw['mw_service']."%"; ?></td>
							  <td><?php echo $row_withdraw['mw_actual_amount_currency']; ?></td>
							  <td><span class="label <?= $label; ?>"><?php echo $mw_status; ?></span></td>							  
							</tr>
							
							<?php } } else { ?>
								<tr>
									<td colspan="11">No Withdraw for this member</td>
								</tr>
							<?php } ?>
					  
							</tbody>
							
						  </table>
						</div>
						
						
					</div>
				</div>
			  
			  
		</div>
		
		
		<div class="tab-pane" id="tab_6">

                <b class="page_heading">TRANSFER BY: <?= $member_username; ?></b>
				
				<div class="box-body">
					<div class="box box-primary">
						
						<div class="box-header">
						  <h3 class="box-title">&nbsp;</h3>
						  <div class="box-tools">
							<div class="input-group input-group-sm" style="width: 150px;">
							  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

							  <div class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							  </div>
							</div>
						  </div>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
						  <table class="table table-bordered table-striped">
							<thead>
							<tr bgcolor="#0099CC">
							  <th>#</th>
							  <th>Date</th>
							  <th>Ref No</th>
							  <th>From</th>
							  <th>Amount</th>
							  <th>Status</th>
							</tr>
							</thead>
							<tbody>
							 <?php 
							$i=1;
							if (mysqli_num_rows($result_transfer) > 0) {
							while($row_transfer = mysqli_fetch_assoc($result_transfer)) { 
							
							if($row_transfer['mt_status'] == '1'){
								$mt_status = 'Active';
								$label = 'label-success';
							} else if($row_transfer['mt_status'] == '0'){
								$mt_status = 'Pending';
								$label = 'label-warning';
							} else {
								$mt_status = 'Rejected';
								$label = 'label-danger';
							}
							
							if($row_transfer['mt_type'] == '1'){
								$mt_type = 'THAWED ACCOUNT';
							} else if($row_transfer['mt_type'] == '2'){
								$mt_type = 'BONUS';
							}
					
							?>
							<tr>
							  <td><?php echo $i++; ?></td>
							  <td><?php echo $row_transfer['transfer_date']; ?></td>
							  <td><?php echo $row_transfer['mt_reference']; ?></td>
							  <td><?php echo $mt_type; ?></td>
							  <td><?php echo $row_transfer['mt_amount']; ?></td>
							  <td><span class="label <?= $label; ?>"><?php echo $mt_status; ?></span></td>							  
							</tr>
							
							<?php } } else { ?>
								<tr>
									<td colspan="10">No Transfer for this member</td>
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
     </section>
      
      
 
 
 
 
  </div>
  <!-- /.content-wrapper -->

 <?php

require_once 'footer.php';

?>