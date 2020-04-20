<?php

/**
 * Created by PhpStorm.
 * User: Amila Shanaka 
 * Date: 5/7/2019
 * Time: 9:14 PM
 */

    include_once '../session.php';
    include_once '../../conn.php';
    include_once 'functions.php';

    //Fetching Values from URL
    //==========================================================================
    
    $sl_id = $_POST['id'];
    $sl_title =$_POST['sl_title'];
    // Images And Information 
    $sl_1_image_back =$_POST['sl_title'];
    $sl_1_image_prmo = $_POST['sl_title'];
    $sl_1_slag = $_POST['sl_title'];
    $sl_2_image_back  = $_POST['sl_title'];
    $sl_2_image_promo_1 =$_POST['sl_title'];
    $sl_2_image_promo_2= $_POST['sl_title'];
    $sl_3_imge_back = $_POST['sl_title'];
    $sl_3_imge_promo_1 = $_POST['sl_title'];
    $sl_3_imge_promo_2 = $_POST['sl_title'];
    // andmin parameters 
    $sl_updated_by  =$_POST['sl_updated_by'];
    $sl_date = $_POST['sl_date'];
    $sl_status = $_POST['sl_status'];
   
    //==========================================================================


//if($_SESSION['master'] != ''){
//        $updated_by = $_SESSION['master'];
//    } else if($_SESSION['supermaster'] != '') {
//        $updated_by = $_SESSION['supermaster'];
//    } else if($_SESSION['admin'] != '') {
//        $updated_by = $_SESSION['admin'];
//    }

	$update_by_id = getUseridbyUsername($updated_by, $conn);

	$target_dir = "../../uploads/slides/";

	if($_FILES["sl_image_main"]["name"] != ""){
        $target_image_main = $target_dir . basename($_FILES["sl_image_main"]["name"]);
        $uploadFileType_image_main = pathinfo($target_image_main,PATHINFO_EXTENSION);

        if(basename($_FILES["sl_image_main"]["name"]) != ''){
            $newfilename_image_main = round(microtime(true)) . UniqueRandomNumbersWithinRange(0, 100, 1)[0] . '.' . $uploadFileType_image_main;

            if($uploadFileType_image_main != "jpg" && $uploadFileType_image_main != "png" && $uploadFileType_image_main != "jpeg" && $uploadFileType_image_main != "gif" && $uploadFileType_image_main != "JPG" && $uploadFileType_image_main != "PNG" && $uploadFileType_image_main != "JPEG" && $uploadFileType_image_main != "GIF") {
                $fail = "1";
            } else {
                $fail = "0";
                unlink('../../uploads/slides/'.$img_main);
                move_uploaded_file($_FILES["sl_image_main"]["tmp_name"], $target_dir. $newfilename_image_main);
                $sl_image_main = ", sl_image_main = '".$newfilename_image_main."'";
            }
        }

	}
	if($_FILES["sl_image_sub_1"]["name"] != ""){
        $target_image_sub_1 = $target_dir . basename($_FILES["sl_image_sub_1"]["name"]);
        $uploadFileType_image_sub_1 = pathinfo($target_image_sub_1,PATHINFO_EXTENSION);

        if($_FILES["sl_image_sub_1"]["name"] != ''){
            $newfilename_image_sub_1 = round(microtime(true)) . UniqueRandomNumbersWithinRange(101, 200, 1)[0] .'.' . $uploadFileType_image_sub_1;

            if($uploadFileType_image_sub_1 != "jpg" && $uploadFileType_image_sub_1 != "png" && $uploadFileType_image_sub_1 != "jpeg" && $uploadFileType_image_sub_1 != "gif" && $uploadFileType_image_sub_1 != "JPG" && $uploadFileType_image_sub_1 != "PNG" && $uploadFileType_image_sub_1 != "JPEG" && $uploadFileType_image_sub_1 != "GIF") {
                $fail = "1";
            } else {
                $fail = "0";
                unlink('../../uploads/slides/'.$img_sub_1);
                move_uploaded_file($_FILES["sl_image_sub_1"]["tmp_name"], $target_dir. $newfilename_image_sub_1);
                $sl_image_sub_1 = ", sl_image_sub_1 = '".$newfilename_image_sub_1."'";
            }
        }

	}
	if($_FILES["sl_image_sub_2"]["name"] != ""){
        $target_image_sub_2 = $target_dir . basename($_FILES["sl_image_sub_2"]["name"]);
        $uploadFileType_image_sub_2 = pathinfo($target_image_sub_2,PATHINFO_EXTENSION);

        if($_FILES["sl_image_sub_2"]["name"] != ''){

            $newfilename_image_sub_2 = round(microtime(true)) . UniqueRandomNumbersWithinRange(201, 300, 1)[0] .'.' . $uploadFileType_image_sub_2;

            if($uploadFileType_image_sub_2 != "jpg" && $uploadFileType_image_sub_2 != "png" && $uploadFileType_image_sub_2 != "jpeg" && $uploadFileType_image_sub_2 != "gif" && $uploadFileType_image_sub_2 != "JPG" && $uploadFileType_image_sub_2 != "PNG" && $uploadFileType_image_sub_2 != "JPEG" && $uploadFileType_image_sub_2 != "GIF") {
                $fail = "1";
            } else {
                $fail = "0";
                unlink('../../uploads/slides/'.$img_sub_2);
                move_uploaded_file($_FILES["sl_image_sub_2"]["tmp_name"], $target_dir. $newfilename_image_sub_2);
                $sl_image_sub_2 = ", sl_image_sub_2 = '".$newfilename_image_sub_2."'";
            }
        }

    }
    if($_FILES["sl_image_sub_3"]["name"] != ""){
        $target_image_sub_3 = $target_dir . basename($_FILES["sl_image_sub_3"]["name"]);
        $uploadFileType_image_sub_3 = pathinfo($target_image_sub_3,PATHINFO_EXTENSION);

        if($_FILES["sl_image_sub_3"]["name"] != ''){

            $newfilename_image_sub_3 = round(microtime(true)) . UniqueRandomNumbersWithinRange(201, 300, 1)[0] .'.' . $uploadFileType_image_sub_3;

            if($uploadFileType_image_sub_3 != "jpg" && $uploadFileType_image_sub_3 != "png" && $uploadFileType_image_sub_3 != "jpeg" && $uploadFileType_image_sub_3 != "gif" && $uploadFileType_image_sub_3 != "JPG" && $uploadFileType_image_sub_3 != "PNG" && $uploadFileType_image_sub_3 != "JPEG" && $uploadFileType_image_sub_3 != "GIF") {
                $fail = "1";
            } else {
                $fail = "0";
                unlink('../../uploads/slides/'.$img_sub_3);
                move_uploaded_file($_FILES["sl_image_sub_3"]["tmp_name"], $target_dir. $newfilename_image_sub_3);
                $sl_image_sub_3 = ", sl_image_sub_3 = '".$newfilename_image_sub_3."'";
            }
        }

    }
    if($_FILES["sl_image_sub_4"]["name"] != ""){
        $target_image_sub_4 = $target_dir . basename($_FILES["sl_image_sub_4"]["name"]);
        $uploadFileType_image_sub_4 = pathinfo($target_image_sub_4,PATHINFO_EXTENSION);

        if($_FILES["sl_image_sub_4"]["name"] != ''){

            $newfilename_image_sub_4 = round(microtime(true)) . UniqueRandomNumbersWithinRange(201, 300, 1)[0] .'.' . $uploadFileType_image_sub_4;

            if($uploadFileType_image_sub_4 != "jpg" && $uploadFileType_image_sub_4 != "png" && $uploadFileType_image_sub_4 != "jpeg" && $uploadFileType_image_sub_4 != "gif" && $uploadFileType_image_sub_4 != "JPG" && $uploadFileType_image_sub_4 != "PNG" && $uploadFileType_image_sub_4 != "JPEG" && $uploadFileType_image_sub_4 != "GIF") {
                $fail = "1";
            } else {
                $fail = "0";
                unlink('../../uploads/slides/'.$img_sub_4);
                move_uploaded_file($_FILES["sl_image_sub_4"]["tmp_name"], $target_dir. $newfilename_image_sub_4);
                $sl_image_sub_4 = ", sl_image_sub_4 = '".$newfilename_image_sub_4."'";
            }
        }

    }

	if($sl_title != '' && $sl_updated_at != '' && $sl_desc_long != ''){

	    $query_1 = "UPDATE sliders SET sl_title = '".$sl_title."', sl_updated_at = '".$sl_updated_at."', sl_desc_long = '".$sl_desc_long."', sl_desc_short = '".$sl_desc_short."',sl_status = '".$sl_status."', sl_created_by = '".$update_by_id."'";

	    if($sl_image_main != ''){
	        $query_1 = $query_1.$sl_image_main;
        }
        if($sl_image_sub_1 != ''){
            $query_1 = $query_1.$sl_image_sub_1;
        }
        if($sl_image_sub_2 != ''){
            $query_1 = $query_1.$sl_image_sub_2;
        }
        if($sl_image_sub_3 != ''){
            $query_1 = $query_1.$sl_image_sub_3;
        }
        if($sl_image_sub_4 != ''){
            $query_1 = $query_1.$sl_image_sub_4;
        }

        $query_2 = "WHERE sl_id = '".$sl_id."'";

        $sql = $query_1.$query_2;

//        $sql = "UPDATE sliders SET sl_title = '".$sl_title."', sl_updated_at = '".$sl_updated_at."', sl_desc_long = '".$sl_desc_long."', sl_desc_short = '".$sl_desc_short."',sl_status = '".$sl_status."', sl_created_by = '".$update_by_id."'" .$sl_image_main.$sl_image_sub_1.$sl_image_sub_2." WHERE sl_id = '".$sl_id."'";

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