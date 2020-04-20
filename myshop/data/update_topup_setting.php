<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
    $ts_id = $_POST['id'];
	$ts_from_amount = $_POST['from_amount'];
    $ts_to_amount = $_POST['to_amount'];
    $ts_expiry = $_POST['expiry'];
	$ts_status = $_POST['status'];
    
	if($_SESSION['master'] != ''){
		$admin = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$admin = $_SESSION['supermaster'];
	} else {
		$admin = $_SESSION['admin'];
	}
    
	$admin_id = getUseridbyUsername($admin, $conn);
	
	if($ts_from_amount != '' && $ts_to_amount != '' && $ts_expiry != ''){
            $sql = "UPDATE topup_settings SET ts_from_amount = '".$ts_from_amount."', ts_to_amount = '".$ts_to_amount."', ts_expiry = '".$ts_expiry."', ts_status = '".$ts_status."', 	ts_created_by = '".$admin_id."'  WHERE ts_id = '".$ts_id."'";
            mysqli_query($conn, $sql);
            header('Location: ../topup_setting_list.php');	
	} else {
		header('Location: ../topup_setting_add.php?error=2&action=update&ts='.$ts_id);
	}

?>