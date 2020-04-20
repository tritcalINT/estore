<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';



$sql = "SELECT * from newsletter";

$result = mysqli_query($conn, $sql);


?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> SUBSCRIBER LIST：</h4>
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

                <b class="white-color">E-mail List </b>

                <div class="box-body">
              <div class="box box-primary">
            
 
            <div class="box-body table-responsive no-padding">
              <table class="table table-dark">
                <thead class="white-color">
                <tr>
                  <th>#</th>
                  <th>E-MAIL</th>
               
<!--	<th colspan="2">Action</th>-->
                </tr>
                </thead>
                <tbody class="white-color">
				 <?php 
				$i=1;
				while($row = mysqli_fetch_assoc($result)) { 
					
				?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  
                  
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