<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$rf_amount = $_POST['fund_amount'];
    $rf_reseller_id = $_POST['reseller_id'];
    
	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		$admin = $_SESSION['master'];
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$admin = $_SESSION['supermaster'];
	} else {
		$admin = $_SESSION['admin'];
	}
    
	$rf_created_by = getUseridbyUsername($admin, $conn);
	
	if($rf_amount != ''){
		
		$sql = "INSERT INTO reseller_fund (rf_amount, rf_reseller_id, rf_created_by) VALUES ('".$rf_amount."', '".$rf_reseller_id."', '".$rf_created_by."')";	
		mysqli_query($conn, $sql);	     	
	}
header('Location: ../reseller_list.php');  
?>