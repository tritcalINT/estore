<?php
	include_once '../session.php';
        include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
        
        $as_fund_payout_per = $_POST['mt_percent'];
	$as_gp_expiry_date = $_POST['expiry_days'];
        
	
	if($_SESSION['master'] != ''){
		$updated_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$updated_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$updated_by = $_SESSION['admin'];
	} else {
		$updated_by = $_SESSION['reseller'];
	}
	
	$update_by_id = getUseridbyUsername($updated_by, $conn);
	

    	if($as_fund_payout_per != '' && $as_gp_expiry_date != ''){
			$sql = "UPDATE admin_setting SET as_gp_expiry_date = '".$as_gp_expiry_date."', as_fund_payout_per = '".$as_fund_payout_per."' WHERE as_id = '1'";
			mysqli_query($conn, $sql);
			header('Location: ../g-fundpay_out_setting.php?success=1');	
	} else {
	
            
                    header('Location: ../g-fundpay_out_setting.php?error=1');
        }
        
	
?>