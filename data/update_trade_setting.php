<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
    $tr_id = $_POST['id'];
	$tr_name = $_POST['market_name'];
    $tr_max = $_POST['total_trading'];
	$tr_status = $_POST['status'];
    
	if($_SESSION['master'] != ''){
		$admin = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$admin = $_SESSION['supermaster'];
	} else {
		$admin = $_SESSION['admin'];
	}
    
	$admin_id = getUseridbyUsername($admin, $conn);
	
	if($tr_name != '' && $tr_max != ''){
            $sql = "UPDATE trade_settings SET tr_name = '".$tr_name."', tr_max = '".$tr_max."', tr_status = '".$tr_status."', tr_created_by = '".$admin_id."'  WHERE tr_id = '".$tr_id."'";
            mysqli_query($conn, $sql);
            header('Location: ../trade_setting_list.php');	
	} else {
		header('Location: ../trade_setting_add.php?error=2&action=update&tr='.$tr_id);
	}

?>