<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$cd_time = $_POST['ch_date'];
    $cd_value = $_POST['ch_amount'];
    
    if($_SESSION['master'] != ''){
		$register_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$register_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$register_by = $_SESSION['admin'];
	} else {
		$register_by = $_SESSION['reseller'];
	}
	
	$register_by_id = getUseridbyUsername($register_by, $conn);
	
	if($cd_time != '' && $cd_value != ''){
		
		$sql = "INSERT INTO chart_data (cd_value, cd_time, cd_created_by) VALUES ('".$cd_value."', '".$cd_time."', '".$register_by_id."')";	
		mysqli_query($conn, $sql);
				
	}
	
	header('Location: ../admin.php');

?>