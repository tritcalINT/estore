<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/news_list_data.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> ADMIN SETTING：</h4>
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

                <b class="white-color">Latest News List </b>

                <div class="box-body">
              <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
              <h3 class="box-title"><button type="button" class="btn btn-block btn-danger" onclick="location.href='news_add.php';">Add News</button></h3>
              <div class="box-tools">
                <form action="news_list.php" method="post" enctype="multipart/form-data" name="news_list_search">
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
                  <th>Date</th>
                  <th>News Title</th>
                  <th>Status</th>
				  <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody class="white-color">
				 <?php 
				$i=1;
				while($row = mysqli_fetch_assoc($result)) { 
					if($row['ln_status'] == '1'){
						$ln_status = 'Active';
					} else{
						$ln_status = 'Inactive';
					}
				?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['ln_date']; ?></td>
                  <td><?php echo $row['ln_title']; ?></td>
                  <td id="tdln<?php echo $row['ln_id'];?>"><?php echo $ln_status; ?></td>                 
                  <td><button type="button" class="btn btn-block btn-success" onclick="location.href='news_add.php?action=update&ln=<?php echo $row['ln_id']; ?>';">Update</button></td>
                  <td><?php if($row['ln_status'] == '1'){ ?><button type="button" id="btnln<?php echo $row['ln_id'];?>" class="btn btn-block btn-danger" onclick="deactivateRecord('<?php echo $row['ln_id'];?>', 'ln');">Deactivate</button><?php } ?></td>              
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