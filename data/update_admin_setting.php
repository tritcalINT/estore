<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
        $as_topup_limit = $_POST['topup_limit'];
        $as_withdraw_limit = $_POST['withdraw_limit'];
	$as_withdraw_service = $_POST['withdraw_service'];
	$as_trading_min = $_POST['min_chart'];
	$as_trading_max = $_POST['max_chart'];
        
        
        $as_fund_payout_per = $_POST['as_fund_payout_per'];
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
	
	if($as_trading_min != ''){
        $sql_min = ", as_trading_min = '".$as_trading_min."'";
    }
	
	if($as_trading_max != ''){
        $sql_max = ", as_trading_max = '".$as_trading_max."'";
    }

 
            if($as_topup_limit != '' && $as_withdraw_limit != ''){
                            $sql = "UPDATE admin_setting SET as_topup_limit = '".$as_topup_limit."', as_withdraw_limit = '".$as_withdraw_limit."', as_withdraw_service = '".$as_withdraw_service."', as_updated_by = '".$update_by_id."' ".$sql_min.$sql_max." WHERE as_id = '1'";
                            mysqli_query($conn, $sql);
                            header('Location: ../admin_setting.php?success=1');	
            } else {
                    header('Location: ../admin_setting.php?error=1');
            }
        
	
?>