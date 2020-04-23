<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/user_cat_add_data.php';

include("../include/session.php");
include("../include/constants.php");

if (!empty($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = '';
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4> USER LEVEL SETTING：</h4>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-dashboard"></i> <?= date('e'); ?></a></li>
            <li class="active"><?= date('d-m-Y h:i A'); ?></li>
        </ol>
    </section>

    <section class="content">


        <div class="box-body">
            <div class="box box-primary">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">

                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-header">
                                <?php if ($usr_cat_id != '') { ?>
                                    <h3 class="box-title">Update User Level</h3>
                                <?php } else { ?>
                                    <h3 class="box-title">Add User Level</h3>
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
                                    <form action="data/update_user_cat.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_brand">
                                        <input type="text" name="user_cat_id" value="<?php echo $usr_cat_id; ?>" hidden>
                                    <?php } else { ?>
                                        <form action="data/register_user_cat.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="registration_brandba">
                                        <?php } ?>

                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-12 form-group">
                                                <label>User Type :</label>
                                                <input type="text" class="form-control" id="user_cat_name" placeholder="User Level name" name="user_cat_name" value="<?php echo $usr_cat_name; ?>">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-lg-4 col-md-4 form-group">
                                                <label>Select Level</label>
                                                <select class="form-control" name="user_cat_level" id="user_cat_level">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 form-group">
                                                <label>Status :</label>
                                                <select class="form-control" name="status">
                                                    <?php if ($user_cat_status == '0') { ?>
                                                        <option value="1">Active</option>
                                                        <option value="0" selected="selected">Inactive</option>
                                                    <?php } else { ?>
                                                        <option value="1" selected="selected">Active</option>
                                                        <option value="0">Inactive</option>
                                                    <?php } ?>
                                                </select>

                                            </div>


                                            <div class="col-lg-4 col-md-4 form-group">
                                                <label>Commission % :</label>
                                                <input type="text" class="form-control" id="user_cat_ref_per" placeholder="Commission" name="user_cat_ref_per" value="<?php echo $usr_ref_per; ?>">
                                            </div>

                                            <div class="col-lg-4 col-md-4 form-group">
                                                <label>parent User Type :</label>
                                                <input type="text" class="form-control" id="user_cat_main" placeholder="Parent User Type" name="user_cat_main" value="<?php echo $usr_cat_main; ?>">
                                            </div>
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
