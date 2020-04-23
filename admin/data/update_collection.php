<?php

include_once '../session.php';
include_once '../../conn.php';
include_once 'functions.php';

//Fetching Values from URL
$brand_id = $_POST['id'];
$brand_name = $_POST['brand_name'];
//$brand_logo = $_POST['upload_label'];
$brand_description = $_POST['brand_description'];
$brand_status = $_POST['status'];
$brand_cat = $_POST['brand_cat_id'];
$brand_rank = htmlentities($_POST['rank'], ENT_QUOTES, "UTF-8");



if ($_SESSION['master'] != '') {
    $updated_by = $_SESSION['master'];
} else if ($_SESSION['supermaster'] != '') {
    $updated_by = $_SESSION['supermaster'];
} else if ($_SESSION['admin'] != '') {
    $updated_by = $_SESSION['admin'];
}

$update_by_id = getUseridbyUsername($updated_by, $conn);

$target_dir = "../../uploads/collection/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadFileType = pathinfo($target_file, PATHINFO_EXTENSION);
if (basename($_FILES["fileToUpload"]["name"]) != '') {
    $newfilename = round(microtime(true)) . '.' . $uploadFileType;
    if ($uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" && $uploadFileType != "gif" && $uploadFileType != "JPG" && $uploadFileType != "PNG" && $uploadFileType != "JPEG" && $uploadFileType != "GIF") {
        $fail = "1";
    } else {
        $fail = "0";
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename);
        $sql_pic = ", ln_pic = '" . $newfilename . "'";
    }
}

if ($brand_name != '') {
    if ($newfilename != null) {
        $sql = "UPDATE collection SET name = '" . $brand_name . "', category = '" . $brand_cat . "', rank = '" . $brand_rank . "', logo = '" . $newfilename . "', status = '" . $brand_status . "',des = '" . $brand_description . "' where  id = '" . $brand_id . "'";
    } else {
        $sql = "UPDATE collection SET name = '" . $brand_name . "', category = '" . $brand_cat . "', rank = '" . $brand_rank . "', status = '" . $brand_status . "',des = '" . $brand_description . "' where  id = '" . $brand_id . "'";
    }
    mysqli_query($conn, $sql);
    header('Location: ../collection_list.php');
} else {
    header('Location: ../collection_add.php?error=1&action=update&if=' . $brand_id);
}
?>