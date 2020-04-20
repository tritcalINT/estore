<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/product_add_data.php';

include("../include/session.php");
include("../include/constants.php");
if (!empty($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = '';
}

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4> PRODUCT ADD：</h4>
      <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i> <?= date('e'); ?></a></li>
        <li class="active"><?= date('d-m-Y h:i A'); ?></li>
      </ol>
    </section>



    <!-- Main content -->

    <!-- /.Tab content -->
 <section class="content">


<div class="box-body">
<div class="box box-primary">

	<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-6">

            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
             
                
			<?php if($pd_id != '') { ?>
			  <h3 class="box-title">Update Product</h3>
                          
			<?php } else { ?>
              <h3 class="box-title">Add Product</h3>
			<?php }  //echo '<span style="color:#AFA;text-align:center;">Request has been sent. Please wait for my reply!</span>'; ?>


            </div>
            <hr>
            <!-- /.box-header -->

            <div class="box-body">

			<?php if($error != '') { ?>
			<div class="row">
                <div class="col-md-12 col-md-12" id="error_display">
                    <?php

                    if($error == '1'){
                        echo "Please fill-in all the required fields";
                    } else if($error == '2'){
						echo "Please upload only image file";
					}

                    ?>
                </div>
              </div>
            <?php } ?>

			<?php
            if($pd_id != ''){ ?>
                <form action="data/update_product.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_product">
                <input type="hidden" name="id" value="<?php echo $pd_id; ?>">
            <?php } else { ?>
                <form action="data/register_product.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="registration_promo">
            <?php } ?>

				<div class="row form-group">
					<div class="col-lg-12 col-md-12 form-group">
						<label>Product Title :</label>
						<input type="text" class="form-control" id="Product_title" placeholder="Product Title " name="Product_title" value="<?php echo $pd_name; ?>">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-4 col-md-4 form-group">
                         <label>IN Stock Date :</label>
                         <input type="date" class="form-control" id="start_date" placeholder="Product Date" name="start_date" value="<?php echo $pd_start_date; ?>">
					</div>
					<div class="col-lg-4 col-md-4 form-group">
						<label>Expiry Date :</label>
                                                <input type="date" class="form-control" id="expire_date" placeholder="Product Date" name="expire_date" value="<?php echo $pd_expire_date; ?>">
                                                
                                                
                                                
					</div>
                                    

                                    <div class="col-lg-4 col-md-4 form-group">
						<label>Status :</label>
						<select class="form-control" name="status" id="status">
                            <?php
							if($pd_status == '0'){ ?>
								<option value="1">Active</option>
								<option value="0" selected="selected">Inactive</option>
							<?php } else { ?>
								<option value="1" selected="selected">Active</option>
								<option value="0">Inactive</option>
							<?php } ?>
                    </select>
                                                
                                                
                                                
                                                
                                                
					</div>
				
                                
                                   
                                
                                    
				</div>
                                
                                <div class="row form-group">
					<div class="col-lg-4 col-md-4 form-group">
                         <label>Sales Price :</label>
                          <input type="text" class="form-control" placeholder="Sales Price"id="sales-price" name="sales-price" value="<?php echo $pd_sales_price; ?>">
					</div>
					<div class="col-lg-4 col-md-4 form-group">
						<label>Discounted price</label>
						<input type="text" class="form-control" id="discounted-price" name="discounted-price"placeholder="Discounted Price" value="<?php echo $pd_discounted_price; ?>">
                                                
                                                
                                                
					</div>
                                    

                                    <div class="col-lg-4 col-md-4 form-group">
						<label>Item Cost</label>
						<input type="text" class="form-control" id="item-cost"  name="item-cost" placeholder="Item Cost" value="<?php echo $pd_item_cost; ?>">
                                     
					</div>
                                    
                                    	<div class="col-lg-4 col-md-4 form-group">
						<label>Supplier Name</label>
						<input type="text" class="form-control" id="supplier_name"  name="supplier_name"placeholder="Supplier Name" value="<?php echo $pd_supplier_id; ?>">
                                                
					</div>
                                    

                                    <div class="col-lg-4 col-md-4 form-group">
						<label>Product Code</label>
						<input type="text" class="form-control" id="product_code" name="product_code" placeholder="xxx-01" value="<?php echo $pd_product_code; ?>">
                                     
					</div>
                                     <div class="col-lg-4 col-md-4 form-group">
						<label>Select Category </label>
						 <select class="form-control" name="category_id" id="category_id">
                                                            <?php
                                                             $database->loadprodcat($catky);
                                                            ?>
                                               </select>
                                     
					</div>
                                    
					<div class="col-lg-4 col-md-4 form-group">
						<div class="upload_picture">
						<label class="control-label templatemo-block" id="Product_title_lable" value="<?php echo $pd_Main_img; ?>">Upload Main Picture  :</label>
						<input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">
						<label class="control-label templatemo-block" id="upload_labe2" value="<?php echo $pd_image1; ?>">Upload Picture 1  :</label>
                                                <input type="file" name="image1-Upload" id="image1-Upload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">
                                                </div>
                                            
                                            
					</div>
                                    <div class="col-lg-4 col-md-4 form-group">
						<div class="upload_picture">
						<label class="control-label templatemo-block" id="upload_labe3" value="<?php echo $pd_image2; ?>">Upload Picture 2  :</label>
						<input type="file" name="image2-Upload" id="image2-Upload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">
						<label class="control-label templatemo-block" id="upload_labe4">Upload Picture 3  :</label>
                                                <input type="file" name="image3-Upload" id="image3-Upload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">
                                                </div>
					</div>
                                     <div class="col-lg-4 col-md-4 form-group">
						<div class="upload_picture">
						<label class="control-label templatemo-block" id="upload_labe3" value="<?php echo $pd_image3 ?>">Upload Picture 3  :</label>
						<input type="file" name="image4-Upload" id="image4-Upload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">
						<label class="control-label templatemo-block" id="upload_labe4">Upload Picture 3  :</label>
                                                <input type="file" name="image5-Upload" id="image5-Upload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">
                                                </div>
					</div>
                                
                                    
				</div>


				<div class="row form-group">
                                    <div class="col-lg-12 col-md-12 form-group">
						<label>Video Url(Youtube/Vimeo)</label>
						<input type="text" class="form-control" id="video_url" placeholder="https://www.youtube.com/" name="video_url" value="<?php echo $pd_video_description; ?>">
					</div>
					<div class="col-lg-12 col-md-12 form-group">
						<label>Short Description:</label>
						<textarea class="form-control" rows="6" name="product_short_description" id="product_short_description" value="<?php echo $pd_short_description; ?>"><?= $pd_short_description; ?></textarea>
					</div>
                                    
                                    <div class="col-lg-12 col-md-12 form-group">
						<label>Detail Description:</label>
						<textarea class="form-control" rows="6" name="product_detail_description" id="product_detail_description"  value="<?php echo $pd_long_des; ?>"><?= $pd_long_des; ?></textarea>
					</div>
				</div>

				<hr />


              <div class="form-group text-left">
				<div class="col-lg-3 col-md-3 form-group">
				  <?php if($pd_id != ''){ ?>
					<button type="submit" class="btn btn-block btn-success">Update Now</button>
				  <?php } else { ?>
					<button type="submit" class="btn btn-block btn-success">Add Now</button>
				  <?php } ?>
				</div>
				 <div class="col-lg-3 col-md-3 form-group">
					<button type="reset" class="btn btn-block btn-warning">Reset</button>
				</div>
              </div>

			  </form>
            </div>
            <!-- /.box-body -->

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


<script>
$(document).ready(function() {
  tinymce.init({
    selector:'textarea',
    plugins: "media",
    toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment ',


  });
});
</script>
