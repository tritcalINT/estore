<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/user_list_data.php';
?>
  <!-- Content Wrapper. Contains page content -->
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> List Of All Users ：</h4>
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

                <b class="white-color">User LIST </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-dark">
                <thead class="white-color">
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Register Date</th>
                  <th>Type</th>
                  <th>Level</th>
		 
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
					if($row['user_status'] == '1'){
						$m_status = 'Active';
					} else{
						$m_status = 'Inactive';
					}
				?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><a href="user_details.php?user_id=<?php echo $row['user_id'];?>"><?php echo $row['user_name']; ?></a></td>
                  <td><?php echo $row['user_fname']; ?></td>
                  <td><?php echo $row['user_register_date']; ?></td>
		  <td><?php echo $row['user_type']; ?></td>
                  <td><?php echo $row['user_level']; ?></td>
                  <td id="tdm<?php echo $row['m_id'];?>"><?php echo $m_status; ?></td> 
				  <?php if($_SESSION['master'] != '' || $_SESSION['supermaster'] != ''){ ?>
				  <td>
				  <?php if($row['user_status'] == '1'){ ?>
				  <form action="data/login_member.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="login_member" target="_blank">
				  <input type="hidden" class="form-control" id="user_name" placeholder="Username" name="user_name" value="<?php echo $row['user_name']; ?>">
				 
				  </form>
				  <?php } ?>
				  </td>
				  <?php } ?>
<!--				  <td>
				  <button type="button" class="btn btn-block btn-info" onclick="location.href='members_details.php?action=details&m=<?php echo $row['user_id']; ?>&r=<?php echo $row['user_member_reference']; ?>';">Details</button>
				  </td>-->
				  <?php if($_SESSION['master'] != '' || $_SESSION['admin'] != '' || $_SESSION['supermaster'] != ''){ ?>
					  
					  <td><?php if($row['user_status'] == '1'){ ?><button type="button" id="btnm<?php echo $row['user_id'];?>" class="btn btn-block btn-danger" onclick="deactivateRecord('<?php echo $row['user_id'];?>', 'user');">Deactivate</button>
                                              
                                              
                                              
                                              <?php }else{?>
                                              
                                              <button type="button" id="btnm<?php echo $row['user_id'];?>" class="btn btn-block btn-success" onclick="activeUser('<?php echo $row['user_id'];?>', 'm');">Activate</button>
                                                  
                                              <?php    
                                              }
                                              
                                              ?>
                                          
                                          </td>   
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
  <!-- /.content-wrapper -->

 <?php

require_once 'footer.php';

?>