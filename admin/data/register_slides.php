<?php

/**
 * Created by PhpStorm.
 * User: Amila Shanaka
 * Date: 5/7/2019
 * Time: 9:13 PM
 */
$sl_id = '';
$sl_title = '';
$sl_1_image_back = '';
$sl_1_image_prmo = '';
$sl_1_slag = '';
$sl_2_image_back = '';
$sl_2_image_promo_1 = '';
$sl_2_image_promo_2 = '';
$sl_2_slag = '';
$sl_3_imge_back = '';
$sl_3_imge_promo_1 = '';
$sl_3_img_promo_2 = '';
$sl_3_img_promo_3 = '';
$sl_3_slag = '';
$sl_updated_by = '';
$sl_created_by = '';
$sl_status = '';
$sl_date = '';



include_once '../session.php';
include_once '../../conn.php';
include_once 'functions.php';

//Fetching common Values from URL
$sl_id = $_POST['sl_id'];
$sl_title = $_POST['sl_title'];
$sl_updated_at = $_POST['sl_updated_at'];
$sl_1_slag = $_POST['sl_desc_long'];
$sl_2_slag = $_POST['sl_desc_short'];
$sl_3_slag = $_POST['sl_desc_short'];
$sl_status = $_POST['sl_status'];
$sl_date = $_POST['sl_date'];

//Asign user 
$sl_created_by = getUseridbyUsername($_SESSION['login'], $conn);

$target_dir = "../../uploads/slides/";

$target_sl_1_image_back = $target_dir . basename($_FILES["sl_1_image_back"]["name"]);
$target_sl_1_image_prmo = $target_dir . basename($_FILES["sl_1_image_prmo"]["name"]);

$target_sl_2_image_back = $target_dir . basename($_FILES["sl_2_image_back"]["name"]);
$target_sl_2_image_promo_1 = $target_dir . basename($_FILES["sl_2_image_promo_1"]["name"]);
$target_sl_2_image_promo_2 = $target_dir . basename($_FILES["sl_2_image_promo_2"]["name"]);

$target_sl_3_image_back = $target_dir . basename($_FILES["sl_3_image_back"]["name"]);
$target_sl_3_image_promo_1 = $target_dir . basename($_FILES["sl_3_image_promo_1"]["name"]);
$target_sl_3_image_promo_2 = $target_dir . basename($_FILES["sl_3_image_promo_2"]["name"]);
$target_sl_3_image_promo_3 = $target_dir . basename($_FILES["sl_3_image_promo_3"]["name"]);

$uploadFileType_sl_1_image_back = pathinfo($target_sl_1_image_back, PATHINFO_EXTENSION);
$uploadFileType_sl_1_image_prmo = pathinfo($target_sl_1_image_prmo, PATHINFO_EXTENSION);

$uploadFileType_sl_2_image_back = pathinfo($target_sl_2_image_back, PATHINFO_EXTENSION);
$uploadFileType_sl_2_image_promo_1 = pathinfo($target_sl_2_image_promo_1, PATHINFO_EXTENSION);
$uploadFileType_sl_2_image_promo_2 = pathinfo($target_sl_2_image_promo_2, PATHINFO_EXTENSION);

$uploadFileType_sl_3_imge_back = pathinfo($target_sl_3_imge_back, PATHINFO_EXTENSION);
$uploadFileType_sl_3_image_promo_1 = pathinfo($target_sl_3_image_promo_1, PATHINFO_EXTENSION);
$uploadFileType_sl_3_image_promo_2 = pathinfo($target_sl_3_image_promo_2, PATHINFO_EXTENSION);
$uploadFileType_sl_3_image_promo_3 = pathinfo($target_sl_3_image_promo_3, PATHINFO_EXTENSION);


if (basename($_FILES["sl_1_image_back"]["name"]) != '' && basename($_FILES["sl_1_image_prmo"]["name"]) != '' && basename($_FILES["sl_3_image_back"]["name"]) != '') {

    $newfilename_sl_1_image_back = round(microtime(true)) . UniqueRandomNumbersWithinRange(0, 100, 1)[0] . '.' . $uploadFileType_image_main;
    $newfilename_sl_1_image_prmo = round(microtime(true)) . UniqueRandomNumbersWithinRange(101, 200, 1)[0] . '.' . $uploadFileType_image_sub_1;
    $newfilename_sl_2_image_back = round(microtime(true)) . UniqueRandomNumbersWithinRange(201, 300, 1)[0] . '.' . $uploadFileType_image_sub_2;
    $newfilename_sl_2_image_promo_1 = round(microtime(true)) . UniqueRandomNumbersWithinRange(301, 400, 1)[0] . '.' . $uploadFileType_image_sub_3;
    $newfilename_sl_2_image_promo_1 = round(microtime(true)) . UniqueRandomNumbersWithinRange(401, 500, 1)[0] . '.' . $uploadFileType_image_sub_4;
    $newfilename_sl_3_image_back = round(microtime(true)) . UniqueRandomNumbersWithinRange(401, 500, 1)[0] . '.' . $uploadFileType_image_sub_4;
    $newfilename_sl_3_image_promo_1 = round(microtime(true)) . UniqueRandomNumbersWithinRange(401, 500, 1)[0] . '.' . $uploadFileType_image_sub_4;
    $newfilename_sl_3_image_promo_2 = round(microtime(true)) . UniqueRandomNumbersWithinRange(401, 500, 1)[0] . '.' . $uploadFileType_image_sub_4;
    $newfilename_sl_3_image_promo_3 = round(microtime(true)) . UniqueRandomNumbersWithinRange(401, 500, 1)[0] . '.' . $uploadFileType_image_sub_4;

    if ($uploadFileType_image_main != "jpg" && $uploadFileType_image_main != "png" && $uploadFileType_image_main != "jpeg" && $uploadFileType_image_main != "gif" && $uploadFileType_image_main != "JPG" && $uploadFileType_image_main != "PNG" && $uploadFileType_image_main != "JPEG" && $uploadFileType_image_main != "GIF") {
        $fail = "1";
    } else {
        $fail = "0";
    }
    if ($uploadFileType_image_sub_1 != "jpg" && $uploadFileType_image_sub_1 != "png" && $uploadFileType_image_sub_1 != "jpeg" && $uploadFileType_image_sub_1 != "gif" && $uploadFileType_image_sub_1 != "JPG" && $uploadFileType_image_sub_1 != "PNG" && $uploadFileType_image_sub_1 != "JPEG" && $uploadFileType_image_sub_1 != "GIF") {
        $fail = "1";
    } else {
        $fail = "0";
    }
    if ($uploadFileType_image_sub_2 != "jpg" && $uploadFileType_image_sub_2 != "png" && $uploadFileType_image_sub_2 != "jpeg" && $uploadFileType_image_sub_2 != "gif" && $uploadFileType_image_sub_2 != "JPG" && $uploadFileType_image_sub_2 != "PNG" && $uploadFileType_image_sub_2 != "JPEG" && $uploadFileType_image_sub_2 != "GIF") {
        $fail = "1";
    } else {
        $fail = "0";
    }
    if ($uploadFileType_image_sub_3 != "jpg" && $uploadFileType_image_sub_3 != "png" && $uploadFileType_image_sub_3 != "jpeg" && $uploadFileType_image_sub_3 != "gif" && $uploadFileType_image_sub_3 != "JPG" && $uploadFileType_image_sub_3 != "PNG" && $uploadFileType_image_sub_3 != "JPEG" && $uploadFileType_image_sub_3 != "GIF") {
        $fail = "1";
    } else {
        $fail = "0";
    }
    if ($uploadFileType_image_sub_4 != "jpg" && $uploadFileType_image_sub_4 != "png" && $uploadFileType_image_sub_4 != "jpeg" && $uploadFileType_image_sub_4 != "gif" && $uploadFileType_image_sub_4 != "JPG" && $uploadFileType_image_sub_4 != "PNG" && $uploadFileType_image_sub_4 != "JPEG" && $uploadFileType_image_sub_4 != "GIF") {
        $fail = "1";
    } else {
        $fail = "0";
    }
}

if ($fail == "1") {
    header('Location: ../slider_add.php?error=2');
} else {
    if ($sl_title != '' && $sl_updated_at != '' && $sl_desc_long != '' && $sl_desc_short != '') {

        $sql = "INSERT INTO sliders (sl_title, sl_desc_short, sl_desc_long, sl_image_main, sl_image_sub_1, sl_image_sub_2, sl_image_sub_3, sl_image_sub_4, sl_created_by,  sl_status) VALUES ('" . $sl_title . "', '" . $sl_desc_short . "', '" . $sl_desc_long . "', '" . $newfilename_image_main . "', '" . $newfilename_image_sub_1 . "', '" . $newfilename_image_sub_2 . "', '" . $newfilename_image_sub_3 . "', '" . $newfilename_image_sub_4 . "', '" . $admin_id . "','" . $sl_status . "')";

        mysqli_query($conn, $sql);

        move_uploaded_file($_FILES["sl_image_main"]["tmp_name"], $target_dir . $newfilename_image_main);
        move_uploaded_file($_FILES["sl_image_sub_1"]["tmp_name"], $target_dir . $newfilename_image_sub_1);
        move_uploaded_file($_FILES["sl_image_sub_2"]["tmp_name"], $target_dir . $newfilename_image_sub_2);
        move_uploaded_file($_FILES["sl_image_sub_3"]["tmp_name"], $target_dir . $newfilename_image_sub_3);
        move_uploaded_file($_FILES["sl_image_sub_4"]["tmp_name"], $target_dir . $newfilename_image_sub_4);

        header('Location: ../slider_list.php');
    } else {
        header('Location: ../slider_add.php?error=1');
    }
}

function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

?>