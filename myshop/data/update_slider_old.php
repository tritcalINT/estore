<?php

/**
 * Created by PhpStorm.
 * User: pasin
 * Date: 5/7/2019
 * Time: 9:14 PM
 */

	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
    $sl_id = $_POST['id'];
    $sl_title = $_POST['sl_title'];
    $sl_updated_at = $_POST['sl_updated_at'];
    $sl_desc_long = $_POST['sl_desc_long'];
    $sl_desc_short = $_POST['sl_desc_short'];
    $sl_status = $_POST['sl_status'];

	if($_SESSION['master'] != ''){
        $updated_by = $_SESSION['master'];
    } else if($_SESSION['supermaster'] != '') {
        $updated_by = $_SESSION['supermaster'];
    } else if($_SESSION['admin'] != '') {
        $updated_by = $_SESSION['admin'];
    }

	$update_by_id = getUseridbyUsername($updated_by, $conn);

	$target_dir = "../../uploads/slides/";

    $target_image_main = $target_dir . basename($_FILES["sl_image_main"]["name"]);
    $target_image_sub_1 = $target_dir . basename($_FILES["sl_image_sub_1"]["name"]);
    $target_image_sub_2 = $target_dir . basename($_FILES["sl_image_sub_2"]["name"]);

    $uploadFileType_image_main = pathinfo($target_image_main,PATHINFO_EXTENSION);
    $uploadFileType_image_sub_1 = pathinfo($target_image_sub_1,PATHINFO_EXTENSION);
    $uploadFileType_image_sub_2 = pathinfo($target_image_sub_2,PATHINFO_EXTENSION);

    if(basename($_FILES["sl_image_main"]["name"]) != '' && basename($_FILES["sl_image_sub_1"]["name"]) != '' && basename($_FILES["sl_image_sub_2"]["name"]) != ''){

        $newfilename_image_main = round(microtime(true)) . UniqueRandomNumbersWithinRange(0, 100, 1)[0] . '.' . $uploadFileType_image_main;
        $newfilename_image_sub_1 = round(microtime(true)) . UniqueRandomNumbersWithinRange(101, 200, 1)[0] .'.' . $uploadFileType_image_sub_1;
        $newfilename_image_sub_2 = round(microtime(true)) . UniqueRandomNumbersWithinRange(201, 300, 1)[0] .'.' . $uploadFileType_image_sub_2;


        if($uploadFileType_image_main != "jpg" && $uploadFileType_image_main != "png" && $uploadFileType_image_main != "jpeg" && $uploadFileType_image_main != "gif" && $uploadFileType_image_main != "JPG" && $uploadFileType_image_main != "PNG" && $uploadFileType_image_main != "JPEG" && $uploadFileType_image_main != "GIF") {
            $fail = "1";
        } else {
            $fail = "0";
            move_uploaded_file($_FILES["sl_image_main"]["tmp_name"], $target_dir. $newfilename_image_main);
            $sl_image_main = ", sl_image_main = '".$newfilename_image_main."'";
        }
        if($uploadFileType_image_sub_1 != "jpg" && $uploadFileType_image_sub_1 != "png" && $uploadFileType_image_sub_1 != "jpeg" && $uploadFileType_image_sub_1 != "gif" && $uploadFileType_image_sub_1 != "JPG" && $uploadFileType_image_sub_1 != "PNG" && $uploadFileType_image_sub_1 != "JPEG" && $uploadFileType_image_sub_1 != "GIF") {
            $fail = "1";
        } else {
            $fail = "0";
            move_uploaded_file($_FILES["sl_image_sub_1"]["tmp_name"], $target_dir. $newfilename_image_sub_1);
            $sl_image_sub_1 = ", sl_image_sub_1 = '".$newfilename_image_sub_1."'";
        }
        if($uploadFileType_image_sub_2 != "jpg" && $uploadFileType_image_sub_2 != "png" && $uploadFileType_image_sub_2 != "jpeg" && $uploadFileType_image_sub_2 != "gif" && $uploadFileType_image_sub_2 != "JPG" && $uploadFileType_image_sub_2 != "PNG" && $uploadFileType_image_sub_2 != "JPEG" && $uploadFileType_image_sub_2 != "GIF") {
            $fail = "1";
        } else {
            $fail = "0";
            move_uploaded_file($_FILES["sl_image_sub_2"]["tmp_name"], $target_dir. $newfilename_image_sub_2);
            $sl_image_sub_2 = ", sl_image_sub_2 = '".$newfilename_image_sub_2."'";
        }
    }


	if($sl_title != '' && $sl_updated_at != '' && $sl_desc_long != ''){
        $sql = "UPDATE sliders SET sl_title = '".$sl_title."', sl_updated_at = '".$sl_updated_at."', sl_desc_long = '".$sl_desc_long."', sl_desc_short = '".$sl_desc_short."',sl_status = '".$sl_status."', sl_created_by = '".$update_by_id."'" .$sl_image_main.$sl_image_sub_1.$sl_image_sub_2." WHERE sl_id = '".$sl_id."'";
        mysqli_query($conn, $sql);
        header('Location: ../slider_list.php');
    } else {
        header('Location: ../slider_add.php?error=1&action=update&sl='.$sl_id);
    }

function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
?>