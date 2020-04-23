<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/news_add_data.php';

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
                                <?php if ($ln_id != '') { ?>
                                    <h3 class="box-title">Update News</h3>
                                <?php } else { ?>
                                    <h3 class="box-title">Add News</h3>
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

                                <?php if ($ln_id != '') { ?>
                                    <form action="data/update_news.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_news">
                                        <input type="hidden" name="id" value="<?php echo $ln_id; ?>">
                                    <?php } else { ?>
                                        <form action="data/register_news.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="registration_news">
                                        <?php } ?>

                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-12 form-group">
                                                <label>News Title :</label>
                                                <input type="text" class="form-control" id="news_title" placeholder="News Title" name="news_title" value="<?php echo $ln_title; ?>">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-lg-4 col-md-4 form-group">
                                                <label>Date :</label>
                                                <input type="text" class="form-control" id="news_date" placeholder="News Date" name="news_date" value="<?php echo $ln_date; ?>">
                                            </div>
                                            <div class="col-lg-4 col-md-4 form-group">
                                                <label>Status :</label>
                                                <select class="form-control" name="status">
                                                    <?php if ($ln_status == '0') { ?>
                                                        <option value="1">Active</option>
                                                        <option value="0" selected="selected">Inactive</option>
                                                    <?php } else { ?>
                                                        <option value="1" selected="selected">Active</option>
                                                        <option value="0">Inactive</option>
                                                    <?php } ?>
                                                </select>
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
                                                <label>News Description:</label>


                                                <textarea id="summernote" class="form-control" rows="6" name="news_description" id="news_description"><?= $ln_description; ?></textarea>

                                            </div>
                                        </div>

                                        <hr />


                                        <div class="form-group text-left">
                                            <div class="col-lg-3 col-md-3 form-group">
                                                <?php if ($ln_id != '') { ?>
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
