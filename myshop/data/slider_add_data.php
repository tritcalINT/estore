<?php

/**
 * Created by PhpStorm.
 * User: pasin
 * Date: 5/7/2019
 * Time: 9:08 PM
 */

$sl_id = '';
$sl_title = '';
$sl_update_at = '';
$sl_desc_long = '';
$sl_desc_short = '';
$sl_image_main = '';
$sl_image_sub_1 = '';
$sl_image_sub_2 = '';
$sl_status = '';
$action = '';

if(isset($_GET['action'])) {
    if ($_GET['action'] == 'update') {
        if (!empty($_GET['sl'])) {
            $sl_id = $_GET['sl'];

            $sql="SELECT * FROM sliders WHERE sl_id='".$sl_id."'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $sl_id = $row['sl_id'];
            $sl_title = $row['sl_title'];
            $sl_update_at = $row['sl_updated_at'];
            $sl_desc_long = $row['sl_desc_long'];
            $sl_desc_short = $row['sl_desc_short'];
            $sl_image_main = $row['sl_image_main'];
            $sl_image_sub_1 = $row['sl_image_sub_1'];
            $sl_image_sub_2 = $row['sl_image_sub_2'];
            $sl_image_sub_3 = $row['sl_image_sub_3'];
            $sl_image_sub_4 = $row['sl_image_sub_4'];
            $sl_status = $row['sl_status'];
            $action = $_GET['action'];
        }
    }
}

?>