


<?php

/**
 * Created by PhpStorm.
 * User: pasin
 * Date: 5/7/2019
 * Time: 9:06 PM
 */

require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/slider_add_data.php';

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
      <h4> ADMIN SETTING：</h4>
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
			<?php if($sl_id != '') { ?>
			  <h3 class="box-title">Update Slider</h3>
			<?php } else { ?>
              <h3 class="box-title">Add Slider</h3>
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
            if($sl_id != ''){ ?>
                <form action="data/update_slider.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_slider">
                <input type="hidden" name="id" value="<?php echo $sl_id; ?>">
            <?php } else { ?>
                <form action="data/register_slides.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="registration_slider">
            <?php } ?>

				<div class="row form-group">
					<div class="col-lg-12 col-md-12 form-group">
						<label>Slider Name</label>
						<input type="text" class="form-control" id="news_title" placeholder="News Title" name="sl_title" value="<?php echo $sl_title; ?>">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-lg-4 col-md-4 form-group">
                         <label>Date :</label>
						<input type="text" class="form-control" id="news_date" placeholder="News Date" name="sl_updated_at" value="<?php echo $sl_update_at; ?>">
					</div>
					<div class="col-lg-4 col-md-4 form-group">
						<label>Status :</label>
						<select class="form-control" name="sl_status">
                            <?php
							if($sl_status == '0'){ ?>
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
                    <div class="col-md-4">
                        <div class="upload_picture">
                            <label class="control-label templatemo-block" id="upload_label">Upload Picture :</label>

                            <?php
                                if($action == 'update'){
                                    echo '<img src="../uploads/slides/'.$sl_image_main.'"  id="img_main" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';
                                }
                                else{
                                    echo '<img src="../images/no-image.png" name="sl_image_main" id="img_main" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';

                                }
                            ?>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">

                                    <div class="input-group">


                                        <input type="file" name="sl_image_main" class="form-control" id="image_main" placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none" >
                                        <input type="button" value="Browse" id="browse_image_main" class="btn btn-info form-control">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="upload_picture">
                            <label class="control-label templatemo-block" id="upload_label">Upload Picture :</label>
                            <?php
                            if($action == 'update'){
                                echo '<img src="../uploads/slides/'.$sl_image_sub_1.'" id="img_sub_1" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';
                            }
                            else{
                                echo '<img src="../images/no-image.png" id="img_sub_1" name="sl_image_sub_1" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';

                            }
                            ?>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">

                                    <div class="input-group">


                                        <input type="file" name="sl_image_sub_1" class="form-control" id="image_sub_1" placeholder="Username" aria-describedby="inputGroupPrepend" value="{{old('image')}}" style="display: none" >
                                        <input type="button" value="Browse" id="browse_image_sub_1" class="btn btn-info form-control">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="upload_picture">
                            <label class="control-label templatemo-block" id="upload_label">Upload Picture :</label>
                            <?php
                            if($action == 'update'){
                                echo '<img src="../uploads/slides/'.$sl_image_sub_2.'" name="sl_image_sub_2" id="img_sub_2" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';

                            }
                            else{
                                echo '<img src="../images/no-image.png" name="sl_image_sub_2" id="img_sub_2" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';
                            }
                            ?>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">

                                    <div class="input-group">


                                        <input type="file" name="sl_image_sub_2" class="form-control" id="image_sub_2" placeholder="Username" aria-describedby="inputGroupPrepend" value="{{old('image')}}" style="display: none" >
                                        <input type="button" value="Browse" id="browse_image_sub_2" class="btn btn-info form-control">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
				<div class="row form-group">
					<div class="col-lg-12 col-md-12 form-group">
						<label>Slide Description Long:</label>


						<textarea id="summernote" class="form-control" rows="6" name="sl_desc_long" id="news_description"><?= $sl_desc_long; ?></textarea>

					</div>
				</div>

                    <div class="row form-group">
                        <div class="col-lg-12 col-md-12 form-group">
                            <label>News Description Short:</label>


                            <textarea id="summernote" class="form-control" rows="6" name="sl_desc_short" id="news_description"><?= $sl_desc_long; ?></textarea>

                        </div>
                    </div>

				<hr />


              <div class="form-group text-left">
				<div class="col-lg-3 col-md-3 form-group">
				  <?php if($sl_id != ''){ ?>
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

$('#browse_image_main').on('click', function(e){
    $('#image_main').click();
})
$('#image_main').on('change', function(e){
    var fileInput = this;
    if(fileInput.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#img_main').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
})

$('#browse_image_sub_1').on('click', function(e){
    $('#image_sub_1').click();
})
$('#image_sub_1').on('change', function(e){
    var fileInput = this;
    if(fileInput.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#img_sub_1').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
})

$('#browse_image_sub_2').on('click', function(e){
    $('#image_sub_2').click();
})
$('#image_sub_2').on('change', function(e){
    var fileInput = this;
    if(fileInput.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#img_sub_2').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
})
</script>
