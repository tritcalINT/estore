<?php

/**
 * Created by PhpStorm.
 * User: pasin
 * Date: 5/7/2019
 * Time: 9:13 PM
 */
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
    $sl_id = $_POST['sl_id'];
    $sl_title = $_POST['sl_title'];
    $sl_updated_at = $_POST['sl_updated_at'];
    $sl_desc_long = $_POST['sl_desc_long'];
    $sl_desc_short = $_POST['sl_desc_short'];
    $sl_status = $_POST['sl_status'];

	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
        $admin = $_SESSION['master'];
    } else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
        $admin = $_SESSION['supermaster'];
    } else {
        $admin = $_SESSION['admin'];
    }

	$admin_id = getUseridbyUsername($admin, $conn);

	$target_dir = "../../uploads/slides/";

    $target_image_main = $target_dir . basename($_FILES["sl_image_main"]["name"]);
    $target_image_sub_1 = $target_dir . basename($_FILES["sl_image_sub_1"]["name"]);
    $target_image_sub_2 = $target_dir . basename($_FILES["sl_image_sub_2"]["name"]);
    $target_image_sub_3 = $target_dir . basename($_FILES["sl_image_sub_3"]["name"]);
    $target_image_sub_4 = $target_dir . basename($_FILES["sl_image_sub_4"]["name"]);

    $uploadFileType_image_main = pathinfo($target_image_main,PATHINFO_EXTENSION);
    $uploadFileType_image_sub_1 = pathinfo($target_image_sub_1,PATHINFO_EXTENSION);
    $uploadFileType_image_sub_2 = pathinfo($target_image_sub_2,PATHINFO_EXTENSION);
    $uploadFileType_image_sub_3 = pathinfo($target_image_sub_3,PATHINFO_EXTENSION);
    $uploadFileType_image_sub_4 = pathinfo($target_image_sub_4,PATHINFO_EXTENSION);

    if(basename($_FILES["sl_image_main"]["name"]) != '' && basename($_FILES["sl_image_sub_1"]["name"]) != '' && basename($_FILES["sl_image_sub_2"]["name"]) != ''){

        $newfilename_image_main = round(microtime(true)) . UniqueRandomNumbersWithinRange(0, 100, 1)[0] . '.' . $uploadFileType_image_main;
        $newfilename_image_sub_1 = round(microtime(true)) . UniqueRandomNumbersWithinRange(101, 200, 1)[0] .'.' . $uploadFileType_image_sub_1;
        $newfilename_image_sub_2 = round(microtime(true)) . UniqueRandomNumbersWithinRange(201, 300, 1)[0] .'.' . $uploadFileType_image_sub_2;
        $newfilename_image_sub_3 = round(microtime(true)) . UniqueRandomNumbersWithinRange(301, 400, 1)[0] .'.' . $uploadFileType_image_sub_3;
        $newfilename_image_sub_4 = round(microtime(true)) . UniqueRandomNumbersWithinRange(401, 500, 1)[0] .'.' . $uploadFileType_image_sub_4;

        if($uploadFileType_image_main != "jpg" && $uploadFileType_image_main != "png" && $uploadFileType_image_main != "jpeg" && $uploadFileType_image_main != "gif" && $uploadFileType_image_main != "JPG" && $uploadFileType_image_main != "PNG" && $uploadFileType_image_main != "JPEG" && $uploadFileType_image_main != "GIF") {
            $fail = "1";
        } else {
            $fail = "0";
        }
        if($uploadFileType_image_sub_1 != "jpg" && $uploadFileType_image_sub_1 != "png" && $uploadFileType_image_sub_1 != "jpeg" && $uploadFileType_image_sub_1 != "gif" && $uploadFileType_image_sub_1 != "JPG" && $uploadFileType_image_sub_1 != "PNG" && $uploadFileType_image_sub_1 != "JPEG" && $uploadFileType_image_sub_1 != "GIF") {
            $fail = "1";
        } else {
            $fail = "0";
        }
        if($uploadFileType_image_sub_2 != "jpg" && $uploadFileType_image_sub_2 != "png" && $uploadFileType_image_sub_2 != "jpeg" && $uploadFileType_image_sub_2 != "gif" && $uploadFileType_image_sub_2 != "JPG" && $uploadFileType_image_sub_2 != "PNG" && $uploadFileType_image_sub_2 != "JPEG" && $uploadFileType_image_sub_2 != "GIF") {
            $fail = "1";
        } else {
            $fail = "0";
        }
        if($uploadFileType_image_sub_3 != "jpg" && $uploadFileType_image_sub_3 != "png" && $uploadFileType_image_sub_3 != "jpeg" && $uploadFileType_image_sub_3 != "gif" && $uploadFileType_image_sub_3 != "JPG" && $uploadFileType_image_sub_3 != "PNG" && $uploadFileType_image_sub_3 != "JPEG" && $uploadFileType_image_sub_3 != "GIF") {
            $fail = "1";
        } else {
            $fail = "0";
        }
        if($uploadFileType_image_sub_4 != "jpg" && $uploadFileType_image_sub_4 != "png" && $uploadFileType_image_sub_4 != "jpeg" && $uploadFileType_image_sub_4 != "gif" && $uploadFileType_image_sub_4 != "JPG" && $uploadFileType_image_sub_4 != "PNG" && $uploadFileType_image_sub_4 != "JPEG" && $uploadFileType_image_sub_4 != "GIF") {
            $fail = "1";
        } else {
            $fail = "0";
        }
    }

	if($fail == "1") {
        header('Location: ../slider_add.php?error=2');
    } else {
        if($sl_title != '' && $sl_updated_at != '' && $sl_desc_long != '' && $sl_desc_short != ''){

            $sql = "INSERT INTO sliders (sl_title, sl_desc_short, sl_desc_long, sl_image_main, sl_image_sub_1, sl_image_sub_2, sl_image_sub_3, sl_image_sub_4, sl_created_by,  sl_status) VALUES ('".$sl_title."', '".$sl_desc_short."', '".$sl_desc_long."', '".$newfilename_image_main."', '".$newfilename_image_sub_1."', '".$newfilename_image_sub_2."', '".$newfilename_image_sub_3."', '".$newfilename_image_sub_4."', '".$admin_id."','".$sl_status."')";

            mysqli_query($conn, $sql);

            move_uploaded_file($_FILES["sl_image_main"]["tmp_name"], $target_dir. $newfilename_image_main);
            move_uploaded_file($_FILES["sl_image_sub_1"]["tmp_name"], $target_dir. $newfilename_image_sub_1);
            move_uploaded_file($_FILES["sl_image_sub_2"]["tmp_name"], $target_dir. $newfilename_image_sub_2);
            move_uploaded_file($_FILES["sl_image_sub_3"]["tmp_name"], $target_dir. $newfilename_image_sub_3);
            move_uploaded_file($_FILES["sl_image_sub_4"]["tmp_name"], $target_dir. $newfilename_image_sub_4);

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