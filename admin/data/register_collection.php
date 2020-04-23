<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
include_once '../session.php';
include_once '../../conn.php';
include_once 'functions.php';

//Fetching Values from URL
$brand_name = $_POST['brand_name'];
$brand_cat = $_POST['brand_cat_id'];
$brand_description = $_POST['brand_description'];
$brand_logo = $_POST['fileToUpload'];
$brand_status = $_POST['status'];
$brand_rank = htmlentities($_POST['rank'], ENT_QUOTES, "UTF-8");

if (isset($_SESSION['master']) && $_SESSION['master'] != '') {
    $admin = $_SESSION['master'];
} else if (isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != '') {
    $admin = $_SESSION['supermaster'];
} else {
    $admin = $_SESSION['admin'];
}

$admin_id = getUseridbyUsername($admin, $conn);

$target_dir = "../../uploads/collection/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadFileType = pathinfo($target_file, PATHINFO_EXTENSION);
if (basename($_FILES["fileToUpload"]["name"]) != '') {
    $newfilename = round(microtime(true)) . '.' . $uploadFileType;
    if ($uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" && $uploadFileType != "gif" && $uploadFileType != "JPG" && $uploadFileType != "PNG" && $uploadFileType != "JPEG" && $uploadFileType != "GIF") {
        $fail = "1";
    } else {
        $fail = "0";
    }
}

if ($fail == "1") {
    header('Location: ../collection_add.php?error=2');
} else {
    if ($brand_name != '') {

        $sql_brand = "INSERT INTO collection (name, category, rank,logo, des, status ) VALUES ('" . $brand_name . "', '" . $brand_cat . "', '" . $brand_rank . "', '" . $newfilename . "', '" . $brand_description . "','" . $brand_status . "')";

        //echo $sql_brand;
        // exit();
        mysqli_query($conn, $sql_brand);

        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename);

        header('Location: ../collection_list.php');
    } else {
        header('Location: ../collection_add.php?error=1');
    }
}
?>