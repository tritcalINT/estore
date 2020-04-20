<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
    $dv_disp = $_POST['disp'];
    $dv_trader_value = $_POST['trader_amount'];
    $dv_trader_percent = $_POST['trader_percent'];
    $dv_trader_arrow = $_POST['trader_direction'];
	
	$dv_rolling_value = $_POST['rolling_amount'];
    $dv_rolling_percent = $_POST['rolling_percent'];
    $dv_rolling_arrow = $_POST['rolling_direction'];
	
	$dv_partner_value = $_POST['partner_amount'];
    $dv_partner_percent = $_POST['partner_percent'];
    $dv_partner_arrow = $_POST['partner_direction'];
	
	$dv_splits_value = $_POST['splits_amount'];
    $dv_splits_percent = $_POST['splits_percent'];
    $dv_splits_arrow = $_POST['splits_direction'];
	
	$dv_current_trading = $_POST['current_trading'];
	$dv_current_scrolling = $_POST['current_scrolling'];
	
	$dv_partner_joined = $_POST['partner_value'];
	$dv_max_partner = $_POST['max_partner_value'];
	$dv_trader_done = $_POST['trader_done'];
	$dv_max_trader_done = $_POST['max_trader_done'];
	$dv_scroll_unit_done = $_POST['scroll_unit'];
	$dv_max_scroll_unit_done = $_POST['max_scroll_unit'];
	$dv_bonus_splits = $_POST['bonus_splits'];
	$dv_max_bonus_splits = $_POST['max_bonus_splits'];
	
	if($_SESSION['master'] != ''){
		$updated_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$updated_by = $_SESSION['supermaster'];
	} else {
		$updated_by = $_SESSION['admin'];
	}
	
	$update_by_id = getUseridbyUsername($updated_by, $conn);
	
	if($dv_disp == '1'){
		if($dv_trader_value != '' && $dv_trader_percent != ''){
				$sql = "UPDATE display_values SET dv_trader_value = '".$dv_trader_value."', dv_trader_percent = '".$dv_trader_percent."', dv_trader_arrow = '".$dv_trader_arrow."', dv_updated_by = '".$update_by_id."' WHERE dv_id = '1'";
				mysqli_query($conn, $sql);        	
		} 
	}
	
	if($dv_disp == '2'){
		if($dv_rolling_value != '' && $dv_rolling_percent != ''){
				$sql = "UPDATE display_values SET dv_rolling_value = '".$dv_rolling_value."', dv_rolling_percent = '".$dv_rolling_percent."', dv_rolling_arrow = '".$dv_rolling_arrow."', dv_updated_by = '".$update_by_id."' WHERE dv_id = '1'";
				mysqli_query($conn, $sql);        	
		} 
	}
	
	if($dv_disp == '3'){
		if($dv_partner_value != '' && $dv_partner_percent != ''){
				$sql = "UPDATE display_values SET dv_partner_value = '".$dv_partner_value."', dv_partner_percent = '".$dv_partner_percent."', dv_partner_arrow = '".$dv_partner_arrow."', dv_updated_by = '".$update_by_id."' WHERE dv_id = '1'";
				mysqli_query($conn, $sql);        	
		} 
	}
	
	if($dv_disp == '4'){
		if($dv_splits_value != '' && $dv_splits_percent != ''){
				$sql = "UPDATE display_values SET dv_splits_value = '".$dv_splits_value."', dv_splits_percent = '".$dv_splits_percent."', dv_splits_arrow = '".$dv_splits_arrow."', dv_updated_by = '".$update_by_id."' WHERE dv_id = '1'";
				mysqli_query($conn, $sql);        	
		} 
	}
	
	if($dv_disp == '5'){
		if($dv_current_trading != ''){
				$sql = "UPDATE display_values SET dv_current_trading = '".$dv_current_trading."', dv_updated_by = '".$update_by_id."' WHERE dv_id = '1'";
				mysqli_query($conn, $sql);        	
		} 
	}
	
	if($dv_disp == '6'){
		if($dv_current_scrolling != ''){
				$sql = "UPDATE display_values SET dv_current_scrolling = '".$dv_current_scrolling."', dv_updated_by = '".$update_by_id."' WHERE dv_id = '1'";
				mysqli_query($conn, $sql);        	
		} 
	}
	
	if($dv_disp == '7'){
		if($dv_partner_joined != '' && $dv_max_partner != '' && $dv_trader_done != '' && $dv_max_trader_done != '' && $dv_scroll_unit_done != '' && $dv_max_scroll_unit_done != '' && $dv_bonus_splits != '' && $dv_max_bonus_splits != ''){
				$sql = "UPDATE display_values SET dv_partner_joined = '".$dv_partner_joined."', dv_max_partner = '".$dv_max_partner."', dv_trader_done = '".$dv_trader_done."', dv_max_trader_done = '".$dv_max_trader_done."', dv_scroll_unit_done = '".$dv_scroll_unit_done."', dv_max_scroll_unit_done = '".$dv_max_scroll_unit_done."', dv_bonus_splits = '".$dv_bonus_splits."', dv_max_bonus_splits = '".$dv_max_bonus_splits."', dv_updated_by = '".$update_by_id."' WHERE dv_id = '1'";
				mysqli_query($conn, $sql);        	
		} 
	}
	
	header('Location: ../admin.php');

?>