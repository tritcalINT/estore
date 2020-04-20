<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$tr_name = $_POST['market_name'];
    $tr_max = $_POST['total_trading'];
	$tr_status = $_POST['status'];
    
	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		$admin = $_SESSION['master'];
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$admin = $_SESSION['supermaster'];
	} else {
		$admin = $_SESSION['admin'];
	}
    
	$admin_id = getUseridbyUsername($admin, $conn);
	
	
	if($tr_name != '' && $tr_max != ''){

		$sql = "INSERT INTO trade_settings (tr_name, tr_max, tr_status, tr_created_by) VALUES ('".$tr_name."', '".$tr_max."', '".$tr_status."','".$admin_id."')";
	
		mysqli_query($conn, $sql);
		 
		header('Location: ../trade_setting_list.php');
        	
	} else {
		header('Location: ../trade_setting_add.php?error=2');
	}

?>