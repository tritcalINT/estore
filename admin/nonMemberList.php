<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/nonMemberList_data.php';
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

                <b class="white-color">MEMBERS LIST </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
              <h3 class="box-title">
			  <?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
			    <button type="button" class="btn btn-block btn-danger" onclick="location.href='members_add.php';">Add New Member</button>
			  <?php } ?>
			</h3>
              <div class="box-tools">
                <form action="members_list.php" method="post" enctype="multipart/form-data" name="members_list_search">
					<div class="col-lg-4 col-xs-4">                  
						<input type="text" name="search_date" id="search_date" class="form-control pull-right" placeholder="Date" value="<?= $search_date; ?>">                           
					</div>
					<div class="col-lg-4 col-xs-4">                  
						<input type="text" name="search_value" id="search_value" class="form-control pull-right" placeholder="Value" value="<?= $search_value; ?>">                           
					</div>
					
					<div class="col-lg-4 col-xs-4">                  
						<button type="submit" class="btn btn-block btn-info">Search</button>                           
					</div>
				</form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-dark">
                <thead class="white-color">
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Register Date</th>
                  <th>Upline</th>
		<th>Reseller</th>
                  <th>Status</th>
				   <?php if($_SESSION['master'] != '' || $_SESSION['supermaster'] != ''){ ?>
				  <th colspan="4">Action</th>
				   <?php } else if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
				   <th colspan="3">Action</th>
				   <?php } else { ?>
				   <th>Action</th>
				   <?php } ?>
                </tr>
                </thead>
                <tbody class="white-color">
				 <?php 
				$i=1;
				while($row = mysqli_fetch_assoc($result)) { 
					if($row['user_state'] == '1'){
						$m_status = 'Active';
					} else{
						$m_status = 'Inactive';
					}
				?>
                <tr>
                  <td><?php echo $i++; ?></td>
		   <td><?php echo $row['user_name']; ?></td>
                  <td><?php echo $row['user_fname']; ?></td>
                  <td><?php echo $row['user_register_date']; ?></td>
				  <td><?php echo $row['upline_username']; ?></td>
				  <td><?php echo $row['a_username']; ?></td>
                  <td id="tdm<?php echo $row['m_id'];?>"><?php echo $m_status; ?></td> 
				  <?php if($_SESSION['master'] != '' || $_SESSION['supermaster'] != ''){ ?>
				  <td>
				  <?php if($row['m_status'] == '1'){ ?>
				  <form action="data/login_member.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="login_member" target="_blank">
				  <input type="hidden" class="form-control" id="user_name" placeholder="Username" name="user_name" value="<?php echo $row['m_username']; ?>">
				 
				  </form>
				  <?php } ?>
				  </td>
				  <?php } ?>
				  <td>
				  <button type="button" class="btn btn-block btn-info" onclick="location.href='members_details.php?action=details&m=<?php echo $row['m_id']; ?>&r=<?php echo $row['m_referal']; ?>';">Details</button>
				  </td>
				  <?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
					  <td><button type="button" class="btn btn-block btn-success" onclick="location.href='members_add.php?action=update&m=<?php echo $row['m_id']; ?>&r=<?php echo $row['m_referal']; ?>';">Update</button></td>
					  <td><?php if($row['m_status'] == '1'){ ?><button type="button" id="btnm<?php echo $row['m_id'];?>" class="btn btn-block btn-danger" onclick="deactivateRecord('<?php echo $row['m_id'];?>', 'm');">Deactivate</button><?php } ?></td>   
                  <?php } ?>				  
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