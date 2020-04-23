<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/user_cat_list_data.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>User Level</h4>
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

                <b class="white-color">User Category List</b>

                <div class="box-body">
                    <div class="box box-primary">

                        <!-- /.box-header -->

                        <div class="box-header">

                            <h3 style="width: 100px"class="box-title">
                                <button type="button" style="width: max-content"class="btn btn-block btn-danger" onclick="location.href = 'user_cat_add.php';">Add User Level</button>
                            </h3>

                            <div class="box-header">
                                <div class="box-tools">
                                    <form action="user_cat_list.php" method="post" enctype="multipart/form-data" name="user_cat_list_search">
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
                                <div class="margin10px">
                                    <br>
                                </div>


                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-dark">
                                <thead class="white-color">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Parent Category</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="white-color">
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['status'] == '1') {
                                            $cat_status = 'Active';
                                        } else {
                                            $cat_status = 'Inactive';
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['cat_name']; ?></td>
                                            <td><?php echo $row['main_cat']; ?></td>

                                            <td><button type="button" class="btn btn-block btn-success" onclick="location.href = 'user_cat_add.php?action=update&id=<?php echo $row['usr_cat_id']; ?>';">Update</button></td>
                                            <td><?php if ($row['status'] == '1') { ?><button type="button" id="btnln<?php echo $row['usr_cat_id']; ?>" class="btn btn-block btn-danger" onclick="deactivateUserCat('<?php echo $row['usr_cat_id']; ?>');">Deactivate</button><?php } ?></td>              
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