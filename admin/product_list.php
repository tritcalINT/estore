<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/product_list_data.php';
include_once 'data/functions.php';
include_once '../../conn.php';

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> PRODUCT SETTING：</h4>
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

                <b class="white-color">Latest Product List </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
               
                <h3 style="width: 100px"class="box-title">
                  <button type="button" class="btn btn-block btn-danger" onclick="location.href='product_add.php';">Add Product</button>
              </h3>
              
                
              
              
         
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-dark">
                <thead class="white-color">
                <tr>
                  <th>#</th>
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Product Category</th>
                  <th>In Stock Date</th>
                  <th>Expire Date</th>
                  <th>ADDED By</th>
	<th colspan="2">Action</th>
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
                                        
                                   $pd_created_by_id=$row['created_by'];
                                   $pd_created_by=getallUsernamebyUserid( $pd_created_by_id,$conn);
				?>
                <tr>
                    
               
                  <td><?php echo $i++; ?></td>
                  <td> <?php echo' <img src="../'.$row['main_img'].'" style="height:50px;width:auto;"/>'; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['category_id']; ?></td>
                  <td><?php echo $row['start_date']; ?></td>
                  <td><?php echo $row['expire_date']; ?></td>
                  	
                  
                  
                  <td id="tdln<?php echo $row['created_by'];?>"><?php echo $pd_created_by; ?></td>                 
                  <td><button type="button" class="btn btn-block btn-success" onclick="location.href='product_add.php?action=update&pd=<?php echo $row['product_id']; ?>';">Update</button></td>
                  <td><?php if($row['status'] == '1'){ ?><button type="button" id="btnln<?php echo $row['product_id'];?>" class="btn btn-block btn-danger" onclick="deactivateProduct('<?php echo $row['product_id'];?>','pd');">Deactivate</button><?php } ?></td>              
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