<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
    $cu_id = $_POST['id'];
    $cu_name = $_POST['currency_name'];
	$cu_rate = $_POST['exchange_rate'];
	$cu_withdraw_rate = $_POST['exchange_rate_withdraw'];
	$cu_type = $_POST['type'];
	$cu_type_details = $_POST['type_details'];
	$cu_decimal = $_POST['decimal'];
    $cu_status = $_POST['status'];
	$cu_master_by = $_POST['master_by'];
    	
	if($_SESSION['master'] != ''){
		$updated_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$updated_by = $_SESSION['supermaster'];
	}
	
	$update_by_id = getUseridbyUsername($updated_by, $conn);
	
	if($cu_name != '' && $cu_rate != ''){
            $sql = "UPDATE currency SET cu_name = '".$cu_name."', cu_rate = '".$cu_rate."', cu_type_details = '".$cu_type_details."', cu_withdraw_rate = '".$cu_withdraw_rate."', cu_type = '".$cu_type."', cu_decimal = '".$cu_decimal."', cu_status = '".$cu_status."', cu_master_by = '".$cu_master_by."', cu_updated_by = '".$update_by_id."' WHERE cu_id = '".$cu_id."'";
            mysqli_query($conn, $sql);
            header('Location: ../currency_list.php');	
	} else {
		header('Location: ../currency_add.php?error=1&action=update&cu='.$cu_id);
	}

?>