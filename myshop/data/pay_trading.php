<?php
    include_once '../session.php';
    include_once '../../conn.php';
    include_once 'functions.php';

	//Fetching Values from URL
	$mt_id = $_POST['id'];
    $mt_percent = $_POST['percent'];
	$mt_amt = $_POST['amt'];
	$mt_status = $_POST['stat'];
	$member_id = $_POST['m'];
	
	$mt_interest_amount = ($mt_amt * $mt_percent)/100;
    
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
    
	
	if($mt_id != ''){

		$sql = "UPDATE member_trading SET mt_status = '".$mt_status."' WHERE mt_id ='".$mt_id."'";
		mysqli_query($conn, $sql);
		
		$sqlinterest = "INSERT INTO member_trading_interest (mti_trading_id, mti_member, mti_amount, mti_interest_percent, mti_interest_amount, mti_created_by) VALUES ('".$mt_id."', '".$member_id."', '".$mt_amt."', '".$mt_percent."', '".$mt_interest_amount."', '".$approve_by_id."')";
		$sqlres = mysqli_query($conn, $sqlinterest); 
        
        echo $sqlres;
    }
?>