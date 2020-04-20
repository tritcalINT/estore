<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/category_add_data.php';



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
      <h4> CATEGORY SETTING：</h4>
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
			<?php if($cat_id != '') { ?>
			  <h3 class="box-title">Update Category</h3>
			<?php } else { ?>
              <h3 class="box-title">Add Category</h3>
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
            <?php }  ?>

			<?php
            if($cat_id != ''){  ?>
                <form action="data/update_category.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_category" id="update_category">
                <input type="hidden" name="id" value="<?php echo $cat_id;  ?>">
                
                
            <?php } else { ?>
                <form action="data/register_category.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="registration_categeory" id="registration_categeory">
            <?php } ?>

				<div class="row form-group">
					<div class="col-lg-12 col-md-12 form-group">
						<label>Category Name :</label>
						<input type="text" class="form-control" id="category_title" placeholder="Category Name" name="category_title" value="<?php echo  $cat_title; ?>">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-4 col-md-4 form-group">
                             <label>Select Brand</label>
			      <select class="form-control" name="brand_id" id="brand_id">
                                                            <?php
                                                                $database->loabrandList($catky);
                                                            ?>
                             </select>
					</div>
					<div class="col-lg-4 col-md-4 form-group">
						<label>Status :</label>
						<select class="form-control" name="status">
                            <?php
							if($cat_status == '0'){ ?>
								<option value="1">Active</option>
								<option value="0" selected="selected">Inactive</option>
							<?php } else { ?>
								<option value="1" selected="selected">Active</option>
								<option value="0">Inactive</option>
							<?php } ?>
                    </select>
                                                
                                                
                                                
                                                
                                                
                                                
					</div>
                                    
                                    
                                    
                                      <div class="col-lg-4 col-md-4 form-group">
						<label>Category Level</label>
						<input type="text" class="form-control" id="category-level" name="category-level"placeholder="Category Level" value="<?php echo $cat_level; ?>">

					</div>
                                      <div class="col-lg-4 col-md-4 form-group">
						<label>Main Category</label>
						
                                                <select class="form-control" name="main-category" id="main-category">
                                                            <?php
                                                                $database->loabrandMainCat($catky);
                                                            ?>
                                                </select>
                                                
					</div>
                                    <div class="col-lg-4 col-md-4 form-group">
						<label>SKU</label>
						<input type="text" class="form-control" id="categories-sku" name="categories-sku"placeholder="SKU" value="<?php echo $cat_sku; ?>">
                                                
                                                
                                                
					</div>
					<div class="col-lg-4 col-md-4 form-group">
						<div class="upload_picture">
						<label class="control-label templatemo-block" id="upload_label">Upload Picture :</label>
						<input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">
						</div>
					</div>
                                    
                               
                                    
				</div>

				<div class="row form-group">
					<div class="col-lg-12 col-md-12 form-group">
						<label>Category Description:</label>
						<textarea class="form-control" rows="6" name="category_description" id="category_description"><?= $cat_description; ?></textarea>
					</div>
				</div>

				<hr />


              <div class="form-group text-left">
				<div class="col-lg-3 col-md-3 form-group">
				  <?php if($cat_id != ''){ ?>
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
