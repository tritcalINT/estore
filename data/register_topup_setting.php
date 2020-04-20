<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$ts_from_amount = $_POST['from_amount'];
    $ts_to_amount = $_POST['to_amount'];
    $ts_expiry = $_POST['expiry'];
	$ts_status = $_POST['status'];
    
	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		$admin = $_SESSION['master'];
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$admin = $_SESSION['supermaster'];
	} else {
		$admin = $_SESSION['admin'];
	}
    
	$admin_id = getUseridbyUsername($admin, $conn);
	
	
	if($ts_from_amount != '' && $ts_to_amount != '' && $ts_expiry != ''){

		$sql = "INSERT INTO topup_settings (ts_from_amount, ts_to_amount, ts_expiry, ts_created_by, ts_status) VALUES ('".$ts_from_amount."', '".$ts_to_amount."', '".$ts_expiry."','".$admin_id."', '".$ts_status."')";
	
		mysqli_query($conn, $sql);
		 
		header('Location: ../topup_setting_list.php');
        	
	} else {
		header('Location: ../topup_setting_add.php?error=2');
	}

?>