
<?php
/**
 * Created by PhpStorm.
 * User: Amila Shanaka
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
        <h4> SLIDER SETTING：</h4>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-dashboard"></i> <?= date('e'); ?></a></li>
            <li class="active"><?= date('d-m-Y h:i A'); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <!-- /.Tab content -->
    <section class="content">
        <div class="responsive">
            <div class="box box-primary">
                <div class="container">
                    <section>
                        
                            <div class="row">
                                <div class="col-lg-8 col-md-6">

                                    <section>
                                        <div class="box-header">
                                            <?php if ($sl_id != '') { ?>
                                                <h3 class="box-title">Update Slider</h3>
                                            <?php } else { ?>
                                                <h3 class="box-title">Add Slider</h3>
                                            <?php } ?>
                                        </div>


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
                                            <?php if ($sl_id != '') { ?>
                                                <form action="data/update_slider.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_slider">
                                                    <input type="hidden" name="sl_id" id="sl_id" value="<?php echo $sl_id; ?>"><?php } else { ?>
                                                    <form action="data/register_slides.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="registration_slider">
                                                    <?php } ?>
                                                    </section>    
                                                    <!--                                                    End of The section -->
                                                    <section>
                                                        <div class="row form-group">
                                                            <div class="col-lg-12 col-md-12 form-group">
                                                                <h4 class="white-color">Slider Title :</h4>
                                                                <input type="text" class="form-control" id="sl_title" placeholder="Slider Title" name="sl_title" value="<?php echo $sl_title; ?>">
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <section>
                                                        <div class="row form-group">
                                                            <!--                                    block 1-->
                                                            <div class="col-lg-4 col-md-4 form-group">
                                                                <label class="white-color">Date :</label>
                                                                <input type="date" class="form-control" id="sl_date" placeholder="Register Date" name="sl_date" value="<?php echo $sl_update_at; ?>">
                                                            </div>
                                                            <!--                                    end of block 1-->
                                                            <!--                                    block2-->
                                                            <div class="col-lg-4 col-md-4 form-group">
                                                                <label class="white-color">Status :</label>
                                                                <select class="form-control" name="sl_status">
                                                                    <?php if ($sl_status == '0') { ?>
                                                                        <option value="1">Active</option>
                                                                        <option value="0" selected="selected">Inactive</option>
                                                                    <?php } else { ?>
                                                                        <option value="1" selected="selected">Active</option>
                                                                        <option value="0">Inactive</option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <!--                              end of block 2-->
                                                        </div>
                                                    </section>
                                                    <section> 
                                                        <div class="row form-group">
                                                            <h4 class="white-color">Home Slider Settings</h4>
                                                            <table class="table table-dark">
                                                                <thead class="white-color">
                                                                    <tr>
                                                                        <th>Item No</th>
                                                                        <th>Slider NO</th>
                                                                        <th>Item Name</th>
                                                                        <th>Action </th>
                                                                        <th>Image</th>
                                                                </thead>
                                                                <tbody class="white-color">
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>1</td>
                                                                        <td>Back Ground Image</td>
                                                                        <td>     


                                                                            <div class="input-group">


                                                                                <input type="file" name="sl_1_image_back_file" class="form-control" id="sl_1_image_back_file" placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none" >
                                                                                <input type="button" value="Browse" id="sl_1_image_back_btn" class="btn btn-custom form-control">

                                                                            </div>

                                                                        </td>
                                                                        <td>
                                                                            <div class="responsive">
                                                                                <?php
                                                                                if ($action == 'update') {
                                                                                    echo '<img src="../uploads/slides/' . $sl_1_image_back . '"  id="sl_1_image_back" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';
                                                                                } else {
                                                                                    echo '<img src="../images/no-image.png" name="sl_1_image_back" id="sl_1_image_back" style="height:100px;width: auto">';
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <!--                         end of first image selection -->
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>1</td> 
                                                                        <td>Promotion Image</td>
                                                                        <td>    
                                                                            <div class="input-group">
                                                                                <input type="file" name="sl_1_image_prmo_file" class="form-control " id="sl_1_image_prmo_file" placeholder="Slect Image" aria-describedby="inputGroupPrepend" style="display: none" >
                                                                                <input type="button" value="Browse" id="sl_1_image_prmo_btn" class="btn btn-custom form-control">

                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="responsive">
                                                                                <?php
                                                                                if ($action == 'update') {
                                                                                    echo '<img src="../uploads/slides/' . $sl_1_image_prmo . '"  id="sl_1_image_prmo" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';
                                                                                } else {
                                                                                    echo '<img src="../images/no-image.png" name="sl_1_image_prmo" id="sl_1_image_prmo" style="height:100px;width: auto">';
                                                                                }
                                                                                ?>
                                                                            </div>

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <!--                     raw form group1      -->

                                                        <div class="raw form-group ">

                                                            <h4 class="white-color">Banner 1 Text</h4>
                                                            <input type="text" class="form-control" id="sl_1_slag" placeholder="TEXT for Banner" name="sl_1_slag" value="<?php echo $sl_1_slag; ?>">
                                                        </div>
                                                    </section>
                                                    <section>
                                                        <section> 
                                                            <div class="row form-group">
                                                                <h4 class="white-color">Slider 2 Settings</h4>
                                                                <table class="table table-dark">
                                                                    <thead class="white-color">
                                                                        <tr>
                                                                            <th>Item No</th>
                                                                            <th>Slider NO</th>
                                                                            <th>Item Name</th>
                                                                            <th>Action </th>
                                                                            <th>Image</th>
                                                                    </thead>
                                                                    <tbody class="white-color">
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>1</td>
                                                                            <td>Back Ground Image</td>
                                                                            <td>     


                                                                                <div class="input-group">

                                                                                    <input type="file" name="sl_2_image_back_file" class="form-control" id="sl_2_image_back_file" placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none" >
                                                                                    <input type="button" value="Browse" id="sl_2_image_back_btn" class="btn btn-custom form-control">

                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                <div class="responsive">
                                                                                    <?php
                                                                                    if ($action == 'update') {
                                                                                        echo '<img src="../uploads/slides/' . $sl_2_image_back . '"  id="sl_2_image_back" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';
                                                                                    } else {
                                                                                        echo '<img src="../images/no-image.png" name="sl_2_image_back" id="sl_2_image_back" style="height:100px;width: auto">';
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <!--                                             end of first image selection -->
                                                                        <tr>
                                                                            <td>2</td>
                                                                            <td>1</td> 
                                                                            <td>Promotion Image 1</td>
                                                                            <td>    
                                                                                <div class="input-group">

                                                                                    <input type="file" name="sl_2_image_promo_1_file" class="form-control" id="sl_2_image_promo_1_file" placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none" >
                                                                                    <input type="button" value="Browse" id="sl_2_image_promo_1_btn" class="btn btn-custom form-control">

                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="responsive">
                                                                                    <?php
                                                                                    if ($action == 'update') {
                                                                                        echo '<img src="../uploads/slides/' . $sl_2_image_promo . '"  id="sl_2_image_promo_1" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';
                                                                                    } else {
                                                                                        echo '<img src="../images/no-image.png" name="sl_2_image_promo_1" id="sl_2_image_promo_1" style="height:100px;width: auto">';
                                                                                    }
                                                                                    ?>
                                                                                </div>

                                                                            </td>
                                                                        </tr>
                                                                        <!--                                              prmo image 2 selection-->
                                                                        <tr>
                                                                            <td>3</td>
                                                                            <td>1</td> 
                                                                            <td>Promotion Image 2</td>
                                                                            <td>    
                                                                                <div class="input-group">

                                                                                    <input type="file" name="sl_2_image_promo_2_file" class="form-control" id="sl_2_image_promo_2_file" placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none" >
                                                                                    <input type="button" value="Browse" id="sl_2_image_promo_2_btn" class="btn btn-custom form-control">

                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="responsive">
                                                                                    <?php
                                                                                    if ($action == 'update') {
                                                                                        echo '<img src="../uploads/slides/' . $sl_2_image_promo_1 . '"  id="sl_2_image_promo_2" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';
                                                                                    } else {
                                                                                        echo '<img src="../images/no-image.png" name="sl_2_image_promo_2" id="sl_2_image_promo_2" style="height:100px;width: auto">';
                                                                                    }
                                                                                    ?>
                                                                                </div>

                                                                            </td>
                                                                        </tr>

                                                                        <!--                    ===============================================================================-->

                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <!--                                         raw form group1      -->

                                                            <div class="raw form-group ">

                                                                <h4 class="white-color">Banner 2 Text</h4>
                                                                <input type="text" class="form-control" id="sl_2_image_promo_1_text" placeholder="Slider Title" name="sl_title" value="<?php echo $sl_2_slag; ?>">

                                                            </div>

                                                        </section>
                                                    </section>

                                                    <section> 
                                                        <div class="row form-group">
                                                            <h4 class="white-color">Slider 3 Settings</h4>
                                                            <table class="table table-dark">
                                                                <thead class="white-color">
                                                                    <tr>
                                                                        <th>Item No</th>
                                                                        <th>Slider NO</th>
                                                                        <th>Item Name</th>
                                                                        <th>Action </th>
                                                                        <th>Image</th>
                                                                </thead>
                                                                <tbody class="white-color">
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>1</td>
                                                                        <td>Back Ground Image</td>
                                                                        <td>     


                                                                            <div class="input-group">

                                                                                <input type="file" name="sl_3_image_back_file" class="form-control" id="sl_3_image_back_file" placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none" >
                                                                                <input type="button" value="Browse" id="sl_3_image_back_btn" class="btn btn-custom form-control">

                                                                            </div>

                                                                        </td>
                                                                        <td>
                                                                            <div class="responsive">
                                                                                <?php
                                                                                if ($action == 'update') {
                                                                                    echo '<img src="../uploads/slides/' . $sl_3_image_back . '"  id="sl_3_image_back" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';
                                                                                } else {
                                                                                    echo '<img src="../images/no-image.png" name="sl_3_image_back" id="sl_3_image_back" style="height:100px;width: auto">';
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <!--                                           end of first image selection -->
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>1</td> 
                                                                        <td>Promotion Image 1</td>
                                                                        <td>    
                                                                            <div class="input-group">

                                                                                <input type="file" name="sl_3_image_promo_1_file" class="form-control" id="sl_3_image_promo_1_file" placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none" >
                                                                                <input type="button" value="Browse" id="sl_3_image_promo_1_btn" class="btn btn-custom form-control">

                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="responsive">
                                                                                <?php
                                                                                if ($action == 'update') {
                                                                                    echo '<img src="../uploads/slides/' . $sl_3_image_promo_1 . '"  id="sl_3_image_promo_1" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';
                                                                                } else {
                                                                                    echo '<img src="../images/no-image.png" name="sl_3_image_promo_1" id="sl_3_image_promo_1" style="height:100px;width: auto">';
                                                                                }
                                                                                ?>
                                                                            </div>

                                                                        </td>
                                                                    </tr>
                                                                    <!--                  ================================================================================-->
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>1</td> 
                                                                        <td>Promotion Image 2</td>
                                                                        <td>    
                                                                            <div class="input-group">

                                                                                <input type="file" name="sl_3_image_promo_2_file" class="form-control" id="sl_3_image_promo_2_file" placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none" >
                                                                                <input type="button" value="Browse" id="sl_3_image_promo_2_btn" class="btn btn-custom form-control">

                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="responsive">
                                                                                <?php
                                                                                if ($action == 'update') {
                                                                                    echo '<img src="../uploads/slides/' . $sl_3_img_promo_2 . '"  id="sl_3_image_promo_1" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';
                                                                                } else {
                                                                                    echo '<img src="../images/no-image.png" name="sl_3_image_promo_2" id="sl_3_image_promo_2" style="height:100px;width: auto">';
                                                                                }
                                                                                ?>
                                                                            </div>

                                                                        </td>
                                                                    </tr>

                                                                    <!--                  ================================================================================-->
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>1</td> 
                                                                        <td>Promotion Image 3</td>
                                                                        <td>    
                                                                            <div class="input-group">

                                                                                <input type="file" name="sl_3_image_promo_3_file" class="form-control" id="sl_3_image_promo_3_file" placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none" >
                                                                                <input type="button" value="Browse" id="sl_3_image_promo_3_btn" class="btn btn-custom form-control">

                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="responsive">
                                                                                <?php
                                                                                if ($action == 'update') {
                                                                                    echo '<img src="../uploads/slides/' . $sl_3_image_promo_3 . '"  id="sl_3_image_promo_3" style="height:100px;width: 100px;background-color: #ccc;border: 3px solid white;">';
                                                                                } else {
                                                                                    echo '<img src="../images/no-image.png" name="sl_3_img_promo_3" id="sl_3_image_promo_3" style="height:100px;width: auto">';
                                                                                }
                                                                                ?>
                                                                            </div>

                                                                        </td>
                                                                    </tr>
                                                                    <!--                  ================================================================================-->
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        raw form group1      

                                                        <div class="raw form-group ">

                                                            <h4 class="white-color">Banner 3 Text</h4>
                                                            <input type="text" class="form-control" id="sl_title" placeholder="Slider Title" name="sl_title" value="<?php echo $sl_title; ?>">

                                                        </div>

                                                    </section>

                                                    <div class="form-group text-left">
                                                        <div class="col-lg-3 col-md-3 form-group">
                                                            <?php if ($sl_id != '') { ?>
                                                                <button type="submit" class="btn btn-block btn-success">Update Now</button>
                                                            <?php } else { ?>
                                                                <button type="submit" class="btn btn-block btn-success">Add Now</button>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 form-group">
                                                            <button type="reset" class="btn btn-block btn-warning">Reset</button>
                                                        </div>
                                                    </div>

                                                    </div>




                                                    </div>

                                                    </div>
                                                    </section>

                                                    </div>
                                                    </div>
                                                    </div>
                                                    </section>



                                                    </div>

                                                    <?php
                                                    require_once 'footer.php';
                                                    ?>

                                                    <script>
                                                        $('#sl_1_image_back_btn').on('click', function (e) {
                                                            $('#sl_1_image_back_file').click();
                                                        })
                                                        $('#sl_1_image_back_file').on('change', function (e) {
                                                            var fileInput = this;
                                                            if (fileInput.files[0]) {
                                                                var reader = new FileReader();
                                                                reader.onload = function (e) {
                                                                    $('#sl_1_image_back').attr('src', e.target.result);
                                                                }
                                                                reader.readAsDataURL(fileInput.files[0]);
                                                            }
                                                        })

                                                        $('#sl_1_image_prmo_btn').on('click', function (e) {
                                                            $('#sl_1_image_prmo_file').click();
                                                        })

                                                        $('#sl_1_image_prmo_file').on('change', function (e) {
                                                            var fileInput = this;
                                                            if (fileInput.files[0]) {
                                                                var reader = new FileReader();
                                                                reader.onload = function (e) {
                                                                    $('#sl_1_image_prmo').attr('src', e.target.result);
                                                                }
                                                                reader.readAsDataURL(fileInput.files[0]);
                                                            }
                                                        })




                                                        $('#sl_2_image_back_btn').on('click', function (e) {
                                                            $('#sl_2_image_back_file').click();
                                                        })
                                                        $('#sl_2_image_back_file').on('change', function (e) {
                                                            var fileInput = this;
                                                            if (fileInput.files[0]) {
                                                                var reader = new FileReader();
                                                                reader.onload = function (e) {
                                                                    $('#sl_2_image_back').attr('src', e.target.result);
                                                                }
                                                                reader.readAsDataURL(fileInput.files[0]);
                                                            }
                                                        })



                                                        $('#sl_2_image_promo_1_btn').on('click', function (e) {
                                                            $('#sl_2_image_promo_1_file').click();
                                                        })

                                                        $('#sl_2_image_promo_1_file').on('change', function (e) {
                                                            var fileInput = this;
                                                            if (fileInput.files[0]) {
                                                                var reader = new FileReader();
                                                                reader.onload = function (e) {
                                                                    $('#sl_2_image_promo_1').attr('src', e.target.result);
                                                                }
                                                                reader.readAsDataURL(fileInput.files[0]);
                                                            }
                                                        })


                                                        $('#sl_2_image_promo_2_btn').on('click', function (e) {
                                                            $('#sl_2_image_promo_2_file').click();
                                                        })

                                                        $('#sl_2_image_promo_2_file').on('change', function (e) {
                                                            var fileInput = this;
                                                            if (fileInput.files[0]) {
                                                                var reader = new FileReader();
                                                                reader.onload = function (e) {
                                                                    $('#sl_2_image_promo_2').attr('src', e.target.result);
                                                                }
                                                                reader.readAsDataURL(fileInput.files[0]);
                                                            }
                                                        })


                                                        $('#sl_3_image_back_btn').on('click', function (e) {
                                                            $('#sl_3_image_back_file').click();
                                                        })

                                                        $('#sl_3_image_back_file').on('change', function (e) {
                                                            var fileInput = this;
                                                            if (fileInput.files[0]) {
                                                                var reader = new FileReader();
                                                                reader.onload = function (e) {
                                                                    $('#sl_3_image_back').attr('src', e.target.result);
                                                                }
                                                                reader.readAsDataURL(fileInput.files[0]);
                                                            }
                                                        })

                                                        $('#sl_3_image_promo_1_btn').on('click', function (e) {
                                                            $('#sl_3_image_promo_1_file').click();
                                                        })

                                                        $('#sl_3_image_promo_1_file').on('change', function (e) {
                                                            var fileInput = this;
                                                            if (fileInput.files[0]) {
                                                                var reader = new FileReader();
                                                                reader.onload = function (e) {
                                                                    $('#sl_3_image_promo_1').attr('src', e.target.result);
                                                                }
                                                                reader.readAsDataURL(fileInput.files[0]);
                                                            }
                                                        })

                                                        $('#sl_3_image_promo_2_btn').on('click', function (e) {
                                                            $('#sl_3_image_promo_2_file').click();
                                                        })

                                                        $('#sl_3_image_promo_2_file').on('change', function (e) {
                                                            var fileInput = this;
                                                            if (fileInput.files[0]) {
                                                                var reader = new FileReader();
                                                                reader.onload = function (e) {
                                                                    $('#sl_3_image_promo_2').attr('src', e.target.result);
                                                                }
                                                                reader.readAsDataURL(fileInput.files[0]);
                                                            }
                                                        })

                                                        $('#sl_3_image_promo_3_btn').on('click', function (e) {
                                                            $('#sl_3_image_promo_3_file').click();
                                                        })

                                                        $('#sl_3_image_promo_3_file').on('change', function (e) {
                                                            var fileInput = this;
                                                            if (fileInput.files[0]) {
                                                                var reader = new FileReader();
                                                                reader.onload = function (e) {
                                                                    $('#sl_3_image_promo_3').attr('src', e.target.result);
                                                                }
                                                                reader.readAsDataURL(fileInput.files[0]);
                                                            }
                                                        })


                                                    </script>

                                                    <script>
                                                        $(document).ready(function () {
                                                            tinymce.init({
                                                                selector: 'textarea',
                                                                plugins: "media",
                                                                toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment ',

                                                            });
                                                        });

                                                    </script>
