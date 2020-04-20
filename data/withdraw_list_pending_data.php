<?php
include_once 'functions.php';

if (!empty($_POST['search_date'])) {
	$search_date = $_POST['search_date'];	
	$sql_search_date = " AND DATE(mw.mw_created_date) = '".$search_date."'";
} else {
	$search_date = '';
	$sql_search_date = '';
}


if (!empty($_POST['search_value'])) {
	$search_value = $_POST['search_value'];
	$sql_search_value = " AND (mw.mw_reference LIKE '%".$search_value."%' OR m.m_username LIKE '%".$search_value."%' OR mw.mw_amount LIKE '%".$search_value."%' OR a.a_username LIKE '%".$search_value."%')";
} else {
	$search_value = '';
	$sql_search_value = '';
}

if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
	
	$sql = "SELECT mw.mw_id, mw.mw_reference, ROUND(mw.mw_amount, 2) as mw_amount, mw.mw_type, DATE_FORMAT(mw.mw_created_date, '%d/%m/%Y') as withdraw_date, mw.mw_status, ROUND(mw.mw_service, 2) as mw_service, ROUND(mw.mw_amount_currency, 2) as mw_amount_currency, ROUND(mw.mw_actual_amount_currency, 2) as mw_actual_amount_currency, m.m_username, m.m_bank_name, m.m_bank_account_no, m.m_bank_branch, m.m_bitcoin, m.m_litecoin, cu.cu_name, cu.cu_type, a.a_username as master_username FROM member_withdraw mw 
	LEFT JOIN members m ON m.m_id = mw.mw_member_id
	LEFT JOIN currency cu ON cu.cu_id = mw.mw_method
	LEFT JOIN administrators a ON a.a_id = m.m_master_by
	WHERE mw.mw_status = 0 ".$sql_search_date.$sql_search_value." ORDER BY mw.mw_created_date DESC";
		
} else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
	
	$master_by = getUseridbyUsername($_SESSION['master'], $conn);
	
	$sql = "SELECT mw.mw_id, mw.mw_reference, ROUND(mw.mw_amount, 2) as mw_amount, mw.mw_type, DATE_FORMAT(mw.mw_created_date, '%d/%m/%Y') as withdraw_date, mw.mw_status, ROUND(mw.mw_service, 2) as mw_service, ROUND(mw.mw_amount_currency, 2) as mw_amount_currency, ROUND(mw.mw_actual_amount_currency, 2) as mw_actual_amount_currency, m.m_username, m.m_bank_name, m.m_bank_account_no, m.m_bank_branch, m.m_bitcoin, m.m_litecoin, cu.cu_name, cu.cu_type FROM member_withdraw mw 
	LEFT JOIN members m ON m.m_id = mw.mw_member_id
	LEFT JOIN currency cu ON cu.cu_id = mw.mw_method
	WHERE m.m_master_by = '".$master_by."' AND mw.mw_status = 0 ".$sql_search_date.$sql_search_value." ORDER BY mw.mw_created_date DESC";
		
} else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
	
	$admin_by = getUseridbyUsername($_SESSION['admin'], $conn);
	
	$sql = "SELECT mw.mw_id, mw.mw_reference, ROUND(mw.mw_amount, 2) as mw_amount, mw.mw_type, mw.mw_method, DATE_FORMAT(mw.mw_created_date, '%d/%m/%Y') as withdraw_date, mw.mw_status, ROUND(mw.mw_service, 2) as mw_service, ROUND(mw.mw_amount_currency, 2) as mw_amount_currency, ROUND(mw.mw_actual_amount_currency, 2) as mw_actual_amount_currency, m.m_username, m.m_bank_name, m.m_bank_account_no, m.m_bank_branch, m.m_bitcoin, m.m_litecoin, cu.cu_name, cu.cu_type FROM member_withdraw mw 
	LEFT JOIN members m ON m.m_id = mw.mw_member_id
	LEFT JOIN currency cu ON cu.cu_id = mw.mw_method
	WHERE m.m_admin_by = '".$admin_by."' AND mw.mw_status = 0 ".$sql_search_date.$sql_search_value." ORDER BY mw.mw_created_date DESC";
		
} else if(isset($_SESSION['reseller']) && $_SESSION['reseller'] != ''){
	
	$reseller_id = getUseridbyUsername($_SESSION['reseller'], $conn);
	
	$sql = "SELECT mw.mw_id, mw.mw_reference, ROUND(mw.mw_amount, 2) as mw_amount, mw.mw_type, mw.mw_method, DATE_FORMAT(mw.mw_created_date, '%d/%m/%Y') as withdraw_date, mw.mw_status, ROUND(mw.mw_service, 2) as mw_service, ROUND(mw.mw_amount_currency, 2) as mw_amount_currency, ROUND(mw.mw_actual_amount_currency, 2) as mw_actual_amount_currency, m.m_username, m.m_bank_name, m.m_bank_account_no, m.m_bank_branch, m.m_bitcoin, m.m_litecoin, cu.cu_name, cu.cu_type FROM member_withdraw mw 
	LEFT JOIN members m ON m.m_id = mw.mw_member_id
	LEFT JOIN currency cu ON cu.cu_id = mw.mw_method
	WHERE m.m_reseller_by = '".$reseller_id."' AND mw.mw_status = 0 ".$sql_search_date.$sql_search_value." ORDER BY mw.mw_created_date DESC";

}

$result = mysqli_query($conn, $sql);


?>