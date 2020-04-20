<?php
    include_once '../session.php';
    include_once '../../conn.php';
    include_once 'functions.php';

	//Fetching Values from URL
	$mt_id = $_POST['id'];
	$mt_status = $_POST['status'];
    
    if($_SESSION['master'] != ''){
		$approved_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$approved_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$approved_by = $_SESSION['admin'];
	} else {
		$approved_by = $_SESSION['reseller'];
	}
	
	$approve_by_id = getUseridbyUsername($approved_by, $conn);
    
	
	if($mt_id != '' && $mt_status != ''){
        
		$sql = "UPDATE member_trading SET mt_status = '".$mt_status."' WHERE mt_id ='".$mt_id."'";
		mysqli_query($conn, $sql);
		
        $sqlres = mysqli_query($conn, $sql);
		
		echo $sqlres;
	}	
?>