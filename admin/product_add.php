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
  <div class="content-wrapper">
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
			<?php } ?>


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
						<select class="form-control" name="pd_status" id="pd_status">
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
						<label>Before price</label>
						<input type="text" class="form-control" id="discounted-price" name="discounted-price"placeholder="Before price" value="<?php echo $pd_discounted_price; ?>">
                                                
                                                
                                                
					</div>
                                    

                                    <div class="col-lg-4 col-md-4 form-group">
						<label>Item Cost</label>
						<input type="text" class="form-control" id="item-cost"  name="item-cost" placeholder="Item Cost" value="<?php echo $pd_item_cost; ?>">
                                     
					</div>
                                    
                                    	<div class="col-lg-4 col-md-4 form-group">
						<label>Supplier Name</label>
						<select class="form-control" name="supplier_id" id="supplier_id">
                                                         <option value="">Select Supplier</option>
                                                          <?php
                                                             $database->loadSupplier($pd_supplier_id);
                                                            ?>
                                                     </select>
					</div>
                                    

                                    <div class="col-lg-4 col-md-4 form-group">
						<label>Product Code*</label>
						<input type="text" class="form-control" id="product_code" name="product_code" placeholder="xxx-01" value="<?php echo $pd_product_code; ?>" >
                                     
					</div>
                                     <div class="col-lg-4 col-md-4 form-group">
						<label>Select Category </label>
                                                <!--<input type="text" class="form-control" id="category_id" placeholder="https://www.youtube.com/" name="category_id" >-->
						
                                                     <select class="form-control" name="category_id" id="category_id" >
                                                         <option value="">Select category</option>
                                                          <?php
                                                                $database->loadprodcat($pd_category_id);
                                                            ?>
                                                     </select>
                                                           
                                              
                                     
					</div>
                                    
                                     <div class="col-lg-4 col-md-4 form-group">
						<label>Select Brand </label>
                                                <select class="form-control" name="brand_id" id="brand_id" >
                                                <option value="">Select Brand</option>
                                                          <?php
                                                                $database->loabrandList($pd_brand);
                                                            ?>
                                                </select>

					</div>
                                        <div class="col-lg-4 col-md-4 form-group">
						<label>Set Available quantity</label>
                                                <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Quntity" value="<?php echo $pd_qty; ?>">
                                     
					</div>
                                        <div class="col-lg-4 col-md-4 form-group">
						<label>Select Collection </label>
                                                
                                                     <select class="form-control" name="collection" id="collection" >
                                                          
                                                          <?php
                                                                $database->loadCollection($pd_collection);
                                                            ?>
                                                     </select>
           
					</div>
                                             <div class="col-lg-4 col-md-4 form-group">
						<label>Select Related Category </label>
                                                <!--<input type="text" class="form-control" id="category_id" placeholder="https://www.youtube.com/" name="category_id" >-->
						
                                                     <select class="form-control" name="related_category_id" id="related_category_id" value="<?php echo $pd_related; ?>">
                                                         <option value="">Select category</option>
                                                          <?php
                                                                $database->loadprodcat($catky);
                                                            ?>
                                                     </select>
					</div>
                                    
                                     <div class="col-lg-4 col-md-4 form-group">
						<label>Select Color </label>
                                                <diV>
                                                   <input id="pd_color" name="pd_color" type="color"  value="<?php echo $pd_color; ?>" style="width: 150px; height: 30px">
                                                    
                                                </diV>
					</div>
                                        <div class="col-lg-4 col-md-4 form-group">
						<label>Set Size </label>
                                                <input type="text" class="form-control" name="size" id="size" value="<?php echo $pd_size; ?>">
					</div>
                                        
					<div class="col-lg-4 col-md-4 form-group">
						<div class="upload_picture">
						<label class="control-label templatemo-block" id="upload_labe" value="<?php echo $pd_Main_img; ?>">Upload Main Picture  :<?php echo $pd_Main_img; ?></label>
						<input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">
                                                
						<label class="control-label templatemo-block" id="upload_labe1" value="<?php echo $pd_image1; ?>">Upload Picture 1  :<?php echo $pd_image1; ?></label>
                                                <input type="file" name="image1-Upload" id="image1-Upload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">
                                                </div>
                                            
                                            
					</div>
                                    <div class="col-lg-4 col-md-4 form-group">
						<div class="upload_picture">
						<label class="control-label templatemo-block" id="upload_labe2" value="<?php echo $pd_image2; ?>">Upload Picture 2  :<?php echo $pd_image2; ?></label>
						<input type="file" name="image2-Upload" id="image2-Upload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">
						
                                                <label class="control-label templatemo-block" id="upload_labe3" value="<?php echo $pd_image3; ?>">Upload Picture 3  :<?php echo $pd_image3; ?></label>
                                                <input type="file" name="image3-Upload" id="image3-Upload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">
                                                </div>
                                                
                                                
                                                
					</div>
                                     <div class="col-lg-4 col-md-4 form-group">
						 <div class="upload_picture">
						<label class="control-label templatemo-block" id="upload_labe4" value="<?php echo $pd_image4; ?>">Upload Picture 4  :<?php echo $pd_image4; ?></label>
						<input type="file" name="image4-Upload" id="image4-Upload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">
						
                                                <label class="control-label templatemo-block" id="upload_labe5" value="<?php echo $pd_image5; ?>">Upload Picture 5  :<?php echo $pd_image5; ?></label>
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
                                
 <div class="row form-group">
     
     <div class="col-lg-4 col-md-4 form-group">
 
                                                           
                                              <label>Set Commission Manufacturer</label>
                          <input type="text" class="form-control" placeholder="Manufacturer Commission"id="manufacture_commission" name="manufacture_commission" value="<?php echo $pd_manufacture_commission; ?>">
					
                                     
					</div>

                                  <div class="col-lg-4 col-md-4 form-group">                
                        <label>Set Commission distributor</label>
                          <input type="text" class="form-control" placeholder="Commission distributor"id="distributor_commission" name="distributor_commission" value="<?php echo $pd_distributor_commission; ?>">
			 </div>
                                
                                  
                      <div class="col-lg-4 col-md-4 form-group">
                         <label>Set Commission re-seller </label>
                          <input type="text" class="form-control" placeholder="Commission re-seller"id="re_sellerr_commission" name="re_sellerr_commission" value="<?php echo $pd_re_sellerr_commission; ?>">
		      </div>
     
     
     
					<div class="col-lg-4 col-md-4 form-group">
						<label>Set Commission Shopper </label>
						 <input type="text" class="form-control" placeholder="Commission Shopper"id="shopper_commission" name="shopper_commission" value="<?php echo $pd_shopper_commission; ?>">
					
					</div>
     
					<div class="col-lg-4 col-md-4 form-group">
						<label>Set Commission End User </label>
						 <input type="text" class="form-control" placeholder="Commission End User"id="end_user_commission" name="end_user_commission" value="<?php echo $pd_end_user_commission; ?>">
					
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
