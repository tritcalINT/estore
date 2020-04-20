<?php
include_once 'functions.php';

if (!empty($_POST['r_id'])) {
	$reseller_id = $_POST['r_id'];	
	$sql_filter = " AND m.m_reseller_by = '".$reseller_id."'";
} else {
	$reseller_id = '';
	$sql_filter = "";
}

if (!empty($_POST['from_date'])) {
	$from_date = $_POST['from_date'];
	$sql_from_date = " AND DATE(mw.mw_created_date) >= '".$from_date."'";
} else {
	$from_date = '';
	$sql_from_date = "";
}

if (!empty($_POST['to_date'])) {
	$to_date = $_POST['to_date'];
	$sql_to_date = " AND DATE(mw.mw_created_date) <= '".$to_date."'";
} else {
	$to_date = '';
	$sql_to_date = "";
}

if(isset($_POST['w_status'])){
	$withdraw_status = $_POST['w_status'];	
	if($withdraw_status != '')
		$sql_status = " AND mw.mw_status = '".$withdraw_status."'";
	else 
		$sql_status = "";
} else {
	$withdraw_status = '';
	$sql_status = "";
}


if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
	
	$sql = "SELECT mw.mw_id, ROUND(mw.mw_amount, 2) as mw_amount, mw.mw_type, DATE_FORMAT(mw.mw_created_date, '%d/%m/%Y %h:%i %p') as withdraw_date, mw.mw_status, m.m_username, m.m_name, m.m_bank_name, m.m_bank_account_no, m.m_bank_branch, m.m_bitcoin, m.m_litecoin, cu.cu_name, cu.cu_type, a.a_username FROM member_withdraw mw 
	LEFT JOIN members m ON m.m_id = mw.mw_member_id
	LEFT JOIN currency cu ON cu.cu_id = mw.mw_method
	LEFT JOIN administrators a ON a.a_id = m.m_reseller_by WHERE 1=1 ".$sql_filter.$sql_from_date.$sql_to_date.$sql_status."
	ORDER BY mw.mw_created_date DESC";
	
	$sql_total = "SELECT mw.mw_id, ROUND(SUM(mw.mw_amount), 2) as withdraw_total FROM member_withdraw mw 
	LEFT JOIN members m ON m.m_id = mw.mw_member_id
	LEFT JOIN currency cu ON cu.cu_id = mw.mw_method
	LEFT JOIN administrators a ON a.a_id = m.m_reseller_by WHERE 1=1 ".$sql_filter.$sql_from_date.$sql_to_date.$sql_status;
	$result_total = mysqli_query($conn, $sql_total);
	$row_total = mysqli_fetch_assoc($result_total);
	$withdraw_total = $row_total['withdraw_total'];
	
	$sql_resellers = "SELECT a_id, a_username FROM administrators WHERE a_type = '3' AND a_status = '1'";
	$result_resellers = mysqli_query($conn, $sql_resellers);

} else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
	
	$master_by = getUseridbyUsername($_SESSION['master'], $conn);
		
	$sql = "SELECT mw.mw_id, ROUND(mw.mw_amount, 2) as mw_amount, mw.mw_type, DATE_FORMAT(mw.mw_created_date, '%d/%m/%Y %h:%i %p') as withdraw_date, mw.mw_status, m.m_username, m.m_name, m.m_bank_name, m.m_bank_account_no, m.m_bank_branch, m.m_bitcoin, m.m_litecoin, cu.cu_name, cu.cu_type, a.a_username FROM member_withdraw mw 
	LEFT JOIN members m ON m.m_id = mw.mw_member_id
	LEFT JOIN currency cu ON cu.cu_id = mw.mw_method
	LEFT JOIN administrators a ON a.a_id = m.m_reseller_by 
	WHERE m.m_master_by = '".$master_by."' ".$sql_filter.$sql_from_date.$sql_to_date.$sql_status."
	ORDER BY mw.mw_created_date DESC";
	
	$sql_total = "SELECT mw.mw_id, ROUND(SUM(mw.mw_amount), 2) as withdraw_total FROM member_withdraw mw 
	LEFT JOIN members m ON m.m_id = mw.mw_member_id
	LEFT JOIN currency cu ON cu.cu_id = mw.mw_method
	LEFT JOIN administrators a ON a.a_id = m.m_reseller_by WHERE m.m_master_by = '".$master_by."' ".$sql_filter.$sql_from_date.$sql_to_date.$sql_status;
	$result_total = mysqli_query($conn, $sql_total);
	$row_total = mysqli_fetch_assoc($result_total);
	$withdraw_total = $row_total['withdraw_total'];
	
	$sql_resellers = "SELECT a_id, a_username FROM administrators WHERE a_type = '3' AND a_master_by = '".$master_by."' AND a_status = '1'";
	$result_resellers = mysqli_query($conn, $sql_resellers);
		
} else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
	
	$admin_by = getUseridbyUsername($_SESSION['admin'], $conn);
	
	$sql = "SELECT mw.mw_id, ROUND(mw.mw_amount, 2) as mw_amount, mw.mw_type, mw.mw_method, DATE_FORMAT(mw.mw_created_date, '%d/%m/%Y %h:%i %p') as withdraw_date, mw.mw_status, m.m_username, m.m_name, m.m_bank_name, m.m_bank_account_no, m.m_bank_branch, m.m_bitcoin, m.m_litecoin, cu.cu_name, cu.cu_type, a.a_username FROM member_withdraw mw 
	LEFT JOIN members m ON m.m_id = mw.mw_member_id
	LEFT JOIN currency cu ON cu.cu_id = mw.mw_method
	LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
	WHERE m.m_admin_by = '".$admin_by."' ".$sql_filter.$sql_from_date.$sql_to_date.$sql_status." ORDER BY mw.mw_created_date DESC";
	
	$sql_total = "SELECT ROUND(SUM(mw.mw_amount), 2) as withdraw_total FROM member_withdraw mw 
	LEFT JOIN members m ON m.m_id = mw.mw_member_id
	LEFT JOIN currency cu ON cu.cu_id = mw.mw_method
	LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
	WHERE m.m_admin_by = '".$admin_by."' ".$sql_filter.$sql_from_date.$sql_to_date.$sql_status;
	$result_total = mysqli_query($conn, $sql_total);
	$row_total = mysqli_fetch_assoc($result_total);
	$withdraw_total = $row_total['withdraw_total'];
	
	$sql_resellers = "SELECT a_id, a_username FROM administrators WHERE a_type = '3' AND a_admin_by = '".$admin_by."' AND a_status = '1'";
	$result_resellers = mysqli_query($conn, $sql_resellers);
		
} else if(isset($_SESSION['reseller']) && $_SESSION['reseller'] != ''){
	
	$reseller_id = getUseridbyUsername($_SESSION['reseller'], $conn);
	
	$sql = "SELECT mw.mw_id, ROUND(mw.mw_amount, 2) as mw_amount, mw.mw_type, mw.mw_method, DATE_FORMAT(mw.mw_created_date, '%d/%m/%Y %h:%i %p') as withdraw_date, mw.mw_status, m.m_username, m.m_name, m.m_bank_name, m.m_bank_account_no, m.m_bank_branch, m.m_bitcoin, m.m_litecoin, cu.cu_name, cu.cu_type, a.a_username FROM member_withdraw mw 
	LEFT JOIN members m ON m.m_id = mw.mw_member_id
	LEFT JOIN currency cu ON cu.cu_id = mw.mw_method
	LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
	WHERE m.m_reseller_by = '".$reseller_id."' ".$sql_filter.$sql_from_date.$sql_to_date.$sql_status." ORDER BY mw.mw_created_date DESC";
	
	$sql_total = "SELECT ROUND(SUM(mw.mw_amount), 2) as withdraw_total FROM member_withdraw mw 
	LEFT JOIN members m ON m.m_id = mw.mw_member_id
	LEFT JOIN currency cu ON cu.cu_id = mw.mw_method
	LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
	WHERE m.m_reseller_by = '".$reseller_id."' ".$sql_filter.$sql_from_date.$sql_to_date.$sql_status;
	$result_total = mysqli_query($conn, $sql_total);
	$row_total = mysqli_fetch_assoc($result_total);
	$withdraw_total = $row_total['withdraw_total'];

}

$result = mysqli_query($conn, $sql);


?>