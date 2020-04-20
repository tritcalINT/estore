<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
    $mp_id = $_POST['id'];
    $mp_name = $_POST['package_name'];
    $mp_price_dollar = $_POST['package_price'];
    $mp_price_rc = $_POST['package_rc'];
	$mp_ratio_bp = $_POST['ratio_bp'];
	$mp_unfrozen = $_POST['unfrozen'];
	$mp_robot = $_POST['robot_trader'];
	$mp_closed_account = $_POST['closed_account'];
	$mp_bonus_level = $_POST['bonus_level'];
    $mp_status = $_POST['status'];
	$mp_order = $_POST['package_order'];
	$mp_rewards_percent = $_POST['extra_rewards'];
	$mp_rewards_start = $_POST['rewards_start'];
	$mp_rewards_end = $_POST['rewards_end'];
	$mp_expiry = $_POST['expiry'];
	
	$target_dir = "../../uploads/package/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(basename($_FILES["fileToUpload"]["name"]) != ''){
        $newfilename = round(microtime(true)) . '.' . $uploadFileType;
        if($uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" && $uploadFileType != "gif" && $uploadFileType != "JPG" && $uploadFileType != "PNG" && $uploadFileType != "JPEG" && $uploadFileType != "GIF") {
            $fail = "1";
        } else {
            $fail = "0"; 
        }
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename);
		$sql_pic = ", mp_pic = '".$newfilename."'";
    }
	
	if($_SESSION['master'] != ''){
		$updated_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$updated_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$updated_by = $_SESSION['admin'];
	} else {
		$updated_by = $_SESSION['reseller'];
	}
	
	$update_by_id = getUseridbyUsername($updated_by, $conn);
	
	if($fail == "1") {
	      header('Location: ../packages_add.php?error=4&action=update&mp='.$mp_id);
	   
    } else {
		if($mp_name != '' && $mp_price_dollar != '' && $mp_price_rc != '' && $mp_ratio_bp != '' && $mp_unfrozen != '' && $mp_bonus_level != '' && $mp_expiry != ''){
				$sql = "UPDATE member_package SET mp_name = '".$mp_name."', mp_price_dollar = '".$mp_price_dollar."', mp_price_rc = '".$mp_price_rc."', mp_ratio_bp = '".$mp_ratio_bp."', mp_unfrozen = '".$mp_unfrozen."', mp_robot = '".$mp_robot."', mp_closed_account = '".$mp_closed_account."', mp_bonus_level = '".$mp_bonus_level."', mp_status = '".$mp_status."', mp_order = '".$mp_order."', mp_rewards_percent = '".$mp_rewards_percent."', mp_rewards_start = '".$mp_rewards_start."', mp_rewards_end = '".$mp_rewards_end."', mp_expiry = '".$mp_expiry."', mp_updated_by = '".$update_by_id."' ".$sql_pic." WHERE mp_id = '".$mp_id."'";
				mysqli_query($conn, $sql);
				header('Location: ../packages_list.php');	
		} else {
			header('Location: ../packages_add.php?error=1&action=update&mp='.$mp_id);
		}
	}
?>