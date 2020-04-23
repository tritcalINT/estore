<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/brand_add_data.php';

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
        <h4> BRANDS SETTING：</h4>
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
                                <?php if ($brand_id != '') { ?>
                                    <h3 class="box-title">Update Brand</h3>
                                <?php } else { ?>
                                    <h3 class="box-title">Add Brand</h3>
                                <?php } ?>


                            </div>
                            <hr>
                            <!-- /.box-header -->

                            <div class="box-body">

                                <?php if ($error != '') { ?>
                                    <div class="row">
                                        <div class="col-md-12 col-md-12" id="error_display">
                                            <?php
                                            if ($error == '1') {
                                                echo "Please fill-in all the required fields";
                                            } else if ($error == '2') {
                                                echo "Please upload only image file";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if ($brand_id != '') { ?>
                                    <form action="data/update_brand.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_brand">
                                        <input type="hidden" name="id" value="<?php echo $brand_id; ?>">
                                    <?php } else { ?>
                                        <form action="data/register_brand.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="registration_brandba">
                                        <?php } ?>

                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-12 form-group">
                                                <label>Brand Name :</label>
                                                <input type="text" class="form-control" id="brand_name" placeholder="Brand Name" name="brand_name" value="<?php echo $brand_name; ?>">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-lg-4 col-md-4 form-group">
                                                <label>Select category</label>
                                                <select class="form-control" name="brand_cat_id" id="brand_cat_id">
                                                    <?php
                                                    $database->loabrandMainCat($catky);
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 form-group">
                                                <label>Status :</label>
                                                <select class="form-control" name="status">
                                                    <?php if ($brand_status == '0') { ?>
                                                        <option value="1">Active</option>
                                                        <option value="0" selected="selected">Inactive</option>
                                                    <?php } else { ?>
                                                        <option value="1" selected="selected">Active</option>
                                                        <option value="0">Inactive</option>
                                                    <?php } ?>
                                                </select>






                                            </div>



                                            <div class="col-lg-4 col-md-4 form-group">
                                                <label>Rank</label>

                                                <select class="form-control" name="rank" id="rank" valur="<?php echo $brand_rank; ?>">

                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>

                                            </div>
                                            <div class="col-lg-4 col-md-4 form-group">
                                                <div class="upload_picture">
                                                    <label class="control-label templatemo-block" id="upload_label">Upload Picture (150x75 only) :</label>
                                                    <input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" accept="image/*">
                                                </div>
                                            </div>



                                        </div>

                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-12 form-group">
                                                <label>Brand Description:</label>
                                                <textarea class="form-control" rows="6" name="brand_description" id="brand_description"><?php echo $brand_description; ?></textarea>
                                            </div>
                                        </div>

                                        <hr />


                                        <div class="form-group text-left">
                                            <div class="col-lg-3 col-md-3 form-group">
                                                <?php if ($brand_id != '') { ?>
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
    $(document).ready(function () {
        tinymce.init({
            selector: 'textarea',
            plugins: "media",
            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment ',

        });
    });
</script>
