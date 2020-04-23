<?php
require_once 'session_master.php';
require_once 'header.php';
require_once 'side_menu.php';
include_once 'data/brand_list_data.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Brands</h4>
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

                <b class="white-color">Brand List</b>

                <div class="box-body">
                    <div class="box box-primary">

                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-header">
                            <h3 class="box-title"><button type="button" class="btn btn-block btn-danger" onclick="location.href = 'brand_add.php';">Add Brand</button></h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-dark">
                                <thead class="white-color">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Logo</th>
                                        <th>Main Category</th>

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
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['category']; ?></td>
                                            <td> <?php echo' <img src="../uploads/brands/' . $row['logo'] . '" style="height:50px;width:auto;"/>'; ?></td>

                                            <td><?php echo $row['main_cat']; ?></td>
                                            <td><button type="button" class="btn btn-block btn-success" onclick="location.href = 'brand_add.php?action=update&id=<?php echo $row['id']; ?>';">Update</button></td>
                                            <td><?php if ($row['status'] == '1') { ?><button type="button" id="btnln<?php echo $row['id']; ?>" class="btn btn-block btn-danger" onclick="deactivateBrands('<?php echo $row['id']; ?>');">Deactivate</button><?php } ?></td>              
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