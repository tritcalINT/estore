<?php

require_once 'session_master.php';

include_once 'data/functions.php';

require_once 'header.php';
include_once 'data/order_item_data.php'; 

require_once 'side_menu.php'; 
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> ORDER DETAIL：</h4>
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

                <b class="white-color"> Order Item List : </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
               
                <div class="row">
                    
                    <div class="col-md-3"> 
                         <p><lable style="color:white">Customer Name :  <span><a href="user_details.php?user_id=<?php echo $res['user_id'];?>"><?php echo $res['username']; ?></a></span></lable></p>
                    
                    <button class="danger" ><a href="invoice.php?order_id=<?php echo $order_id;?>" </a> Print Invoice</button>
                    </div>
                    
                     <div class="col-md-3"> 
                         <p><lable style="color:white">Delivery address :<span><?php echo $res_addr['add1']; ?></span></lable></p>
                    </div>
                     <div class="col-md-3"> 
                         <p><lable style="color:white">Total Amount:  <span>$<?php echo $res_addr ['total']; ?></span></lable></p>
                    </div>
                     <div class="col-md-3"> 
                         <p><lable style="color:white">Payment Type:   <span><?php echo $res_addr['payment_type']; ?> <br> Status:     <?php if ($res_addr['status']==0){
                             echo 'Not recevied';
                         }else{
                                 echo 'received';
                             }

                         ?></span></lable></p>
                    </div>
                </div>
       
         
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-dark">
                <thead class="white-color">
                <tr>
                  <th>#</th>
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Sub total</th>
                  <th>Order Date</th>
                  <th>Delivery Status</th>
                  <th>Supplier</th>
	 
                </thead>
                <tbody class="white-color">
				 <?php 
				$i=1;
				while($row = mysqli_fetch_assoc($result)) { 
					if($row['status'] == '1'){
						$pd_status = 'Ready to Deliver ';
					} else{
						$pd_status = 'not Delivered';
                                                
					}
                                        
                                  
				?>
                <tr>
                    
               
                  <td><?php echo $i++; ?></td>
                  <td> <?php echo' <img src="../'.$row['main_img'].'" style="height:50px;width:auto;"/>'; ?></td>
                  <td><?php echo $row['item_name']; ?></td>
                  <td><?php echo $row['quantity']; ?></td>
                  <td><?php echo $row['itmcpric']; ?></td>
                  <td><?php echo $row['order_date']; ?></td>
                  <td><?php echo $pd_status; ?></td>	
                  <td><?php echo $row['supplier_id']; ?></td>	
                  
                  
				
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