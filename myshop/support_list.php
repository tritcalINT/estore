<?php
require_once 'session.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/support_list_data.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> MEMBER SUPPORT</h4>
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

                <b class="white-color">SUPPORT MESSAGE LIST </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
              <h3 class="box-title">&nbsp;</h3>
              <div class="box-tools">
					<form action="support_list.php" method="post" enctype="multipart/form-data" name="support_list_search">
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
              <table class="table table-bordered table-striped">
                <thead class="white-color">
                <tr>
                  <th>#</th>
				  <th>Ticket No</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Subject</th>
				  <th>View</th>
                </tr>
                </thead>
                <tbody>
				 <?php 
				$i=1;
				while($row = mysqli_fetch_assoc($result)) { 
				?>
                <tr>
                  <td><?php echo $i++; ?></td>
				  <td><?php echo $row['ms_reference']; ?></td>
				  <td><?php echo $row['m_username']; ?></td>
                  <td><?php echo $row['m_name']; ?></td>
                  <td><?php echo $row['ms_date']; ?></td>
				  <td><?php echo $row['ms_subject']; ?></td>
                  <td><button type="button" class="btn btn-block btn-success" onclick="location.href='support_message.php?action=view&m=<?php echo $row['ms_id']; ?>'">View Message</button></td>           
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