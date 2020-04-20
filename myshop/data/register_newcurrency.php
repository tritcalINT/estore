<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$cu_name = $_POST['currency_name'];
    $cu_rate = $_POST['exchange_rate'];
	$cu_withdraw_rate = $_POST['exchange_rate_withdraw'];
	$cu_type = $_POST['type'];
	$cu_type_details = $_POST['type_details'];
	$cu_decimal = $_POST['decimal'];
    $cu_status = $_POST['status'];
	$cu_master_by = $_POST['master_by'];
    
	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		$admin = $_SESSION['master'];
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$admin = $_SESSION['supermaster'];
	}
    
	$admin_id = getUseridbyUsername($admin, $conn);
	
	if($cu_name != '' && $cu_rate != ''){
		
		$sql = "INSERT INTO currency (cu_name, cu_rate, cu_withdraw_rate, cu_type, cu_type_details, cu_decimal, cu_created_by, cu_status, cu_master_by) VALUES ('".$cu_name."', '".$cu_rate."', '".$cu_withdraw_rate."', '".$cu_type."', '".$cu_type_details."', '".$cu_decimal."', '".$admin_id."', '".$cu_status."', '".$cu_master_by."')";
	
		mysqli_query($conn, $sql);
		 
		header('Location: ../currency_list.php');
        	
	} else {
		header('Location: ../currency_add.php?error=1');
	}

?>