<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/admin_list_data.php';
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

                <b class="white-color">ADMIN LIST </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
              <h3 class="box-title"><button type="button" class="btn btn-block btn-danger" onclick="location.href='admin_add.php';">Add New Admin</button></h3>
              <div class="box-tools">
			  <form action="admin_list.php" method="post" enctype="multipart/form-data" name="admin_list_search">
                <div class="col-lg-4 col-xs-4">                  
					<input type="text" name="search_date" id="search_date" class="form-control pull-right" placeholder="Date" value="<?= $search_date; ?>">                           
				</div>
				<div class="col-lg-4 col-xs-4">                  
					<input type="text" name="search_admin_value" id="search_admin_value" class="form-control pull-right" placeholder="Value" value="<?= $search_admin_value; ?>">                           
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
                  <th>Admin Username</th>
                  <th>Name</th>
                  <th>Register Date</th>
                  <th>Register By</th>
                  <th>Status</th>
				  <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody class="white-color">
				 <?php 
				$i=1;
				while($row = mysqli_fetch_assoc($result)) { 
					if($row['a_status'] == '1'){
						$a_status = 'Active';
					} else{
						$a_status = 'Inactive';
					}
				?>
                <tr>
                  <td><?php echo $i++; ?></td>
				  <td><?php echo $row['a_username']; ?></td>
                  <td><?php echo $row['a_name']; ?></td>
                  <td><?php echo $row['register_date']; ?></td>
				  <td><?php echo $row['reg_username']; ?></td>
                  <td id="tda<?php echo $row['a_id'];?>"><?php echo $a_status; ?></td>                 
                  <td><button type="button" class="btn btn-block btn-success" onclick="location.href='admin_add.php?action=update&a=<?php echo $row['a_id']; ?>';">Update</button></td>
                  <td><?php if($row['a_status'] == '1'){ ?><button type="button" id="btna<?php echo $row['a_id'];?>" class="btn btn-block btn-danger" onclick="deactivateRecord('<?php echo $row['a_id'];?>', 'a');">Deactivate</button><?php } ?></td>              
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