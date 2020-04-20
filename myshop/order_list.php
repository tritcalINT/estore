<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/Order_list_data.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> ITEM LIST：</h4>
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

                <b class="white-color">In Basket Item List </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
             <div class="box-tools">
                  <form action="product_list.php" method="post" enctype="multipart/form-data" name="product_list_search">
				
		</form>
              </div>
  
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-dark">
                <thead class="white-color">
                <tr>
                  <th>#</th>
                  <th>Order ID</th>
                  <th>Product Code</th>
                  <th>Order Date</th>
                  <th>Customer</th>
                  <th>Order Status</th>
	 
                </tr>
                </thead>
                <tbody class="white-color">
				 <?php 
				$i=1;
				while($row = mysqli_fetch_assoc($result)) { 
					if($row['status'] == '1'){
						$pd_status = 'Active';
					} else{
						$pd_status = 'Inactive';
					}
				?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['order_id']; ?></td>
                  <td><?php echo getproductCodeById($row['itmky'],$conn); ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><a href="user_details.php?user_id=<?php echo $row['customer_id'];?>"><?php echo getcustomerNamebyId($row['customer_id'],$conn); ?></a></td>
                  	
                  
                  
                  <td id="tdln<?php echo $row['status'];?>"><?php echo $pd_status; ?></td>                 
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