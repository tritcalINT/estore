<?php
    include_once '../session.php';
    include_once '../../conn.php';
    include_once 'functions.php';
	
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

	//Fetching Values from URL
    $mt_percent = $_POST['tpercent'];
	$mt_status = $_POST['tstatus'];
	$mt_id = $_POST['trade'];
	$mt_interest_amount = 0;
	
	if($mt_percent != ''){
		
		foreach ($mt_id as $ids=>$trade_id) {
			$sqltrade = "SELECT mt_amount, mt_member FROM member_trading WHERE mt_id = '".$trade_id."'";
			$resulttrade = mysqli_query($conn, $sqltrade);
			$row = mysqli_fetch_assoc($resulttrade);
			
			$mt_member = $row['mt_member'];
			$mt_amount = $row['mt_amount'];
	
			$mt_interest_amount = ($mt_amount * $mt_percent)/100;
			
			$sql = "UPDATE member_trading SET mt_status = '".$mt_status."' WHERE mt_id ='".$trade_id."'";
			mysqli_query($conn, $sql);
			
			$sqlinterest = "INSERT INTO member_trading_interest (mti_trading_id, mti_member, mti_amount, mti_interest_percent, mti_interest_amount, mti_created_by) VALUES ('".$trade_id."', '".$mt_member."', '".$mt_amount."', '".$mt_percent."', '".$mt_interest_amount."', '".$approve_by_id."')";
			mysqli_query($conn, $sqlinterest); 
		}
		
	   header('Location: ../trading_on_running.php');
    }
?>