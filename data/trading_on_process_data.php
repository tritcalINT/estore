<?php
include_once 'functions.php';

if (isset($_POST["smember"]) && $_POST["smember"] != '') {
	$search_member = $_POST['smember'];
	$sql_member = " AND m.m_username LIKE '%".$search_member."%'";
} else {
	$search_member = '';
	$sql_member = '';
}

if (isset($_POST["sreseller"]) && $_POST["sreseller"] != '') {
	$search_reseller = $_POST['sreseller'];
	$sql_reseller = " AND a.a_username LIKE '%".$search_reseller."%'";
} else {
	$search_reseller = '';
	$sql_reseller = '';
}

if (isset($_POST["sdate"]) && $_POST["sdate"] != '') {
	$search_date = $_POST['sdate'];
	$sql_date = " AND DATE(mt.mt_date) = '".$search_date."'";
} else {
	$search_date = '';
	$sql_date = '';
}

if (isset($_POST["samount"]) && $_POST["samount"] != '') {
	$search_amount = $_POST['samount'];
	$sql_amt = " AND mt.mt_amount = '".$search_amount."'";
} else {
	$search_amount = '';
	$sql_amt = '';
}

if (isset($_POST["stype"]) && $_POST["stype"] != '') {
	$search_type = $_POST['stype'];
	$sql_typ = " AND mt.mt_type = '".$search_type."'";
} else {
	$search_type = '';
	$sql_typ = '';
}

if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
	
	$sql = "SELECT mt.mt_id, mt.mt_reference, ROUND(mt.mt_amount, 2) as mt_amount, mt.mt_type, m.m_id, m.m_username, tr.tr_name, DATE_FORMAT(mt.mt_date, '%d/%m/%Y %h:%i %p') as trade_date, a.a_username as reseller_user, aa.a_username as admin_user FROM member_trading mt 
			LEFT JOIN members m ON m.m_id = mt.mt_member
			LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
			LEFT JOIN administrators aa ON aa.a_id = m.m_admin_by
			LEFT JOIN trade_settings tr ON tr.tr_id = mt.mt_market
			WHERE mt_status = '0' AND mt_delete = '0' ".$sql_member.$sql_reseller.$sql_date.$sql_amt.$sql_typ." ORDER BY mt_id DESC";
		
} else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
	
	$master_by = getUseridbyUsername($_SESSION['master'], $conn);	
	$sql = "SELECT mt.mt_id, mt.mt_reference, ROUND(mt.mt_amount, 2) as mt_amount, mt.mt_type, m.m_id, m.m_username, tr.tr_name, DATE_FORMAT(mt.mt_date, '%d/%m/%Y %h:%i %p') as trade_date, a.a_username as reseller_user, aa.a_username as admin_user FROM member_trading mt 
			LEFT JOIN members m ON m.m_id = mt.mt_member
			LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
			LEFT JOIN administrators aa ON aa.a_id = m.m_admin_by
			LEFT JOIN trade_settings tr ON tr.tr_id = mt.mt_market
			WHERE m.m_master_by = '".$master_by."' AND mt_status = '0' AND mt_delete = '0' ".$sql_member.$sql_reseller.$sql_date.$sql_amt.$sql_typ." ORDER BY mt_id DESC";
		
} else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
	
	$admin_by = getUseridbyUsername($_SESSION['admin'], $conn);	
	$sql = "SELECT mt.mt_id, mt.mt_reference, ROUND(mt.mt_amount, 2) as mt_amount, mt.mt_type, m.m_id, m.m_username, tr.tr_name, DATE_FORMAT(mt.mt_date, '%d/%m/%Y %h:%i %p') as trade_date, a.a_username FROM member_trading mt 
			LEFT JOIN members m ON m.m_id = mt.mt_member
			LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
			LEFT JOIN trade_settings tr ON tr.tr_id = mt.mt_market
			WHERE m.m_admin_by = '".$admin_by."' AND mt_status = '0' AND mt_delete = '0' ".$sql_member.$sql_reseller.$sql_date.$sql_amt.$sql_typ." ORDER BY mt_id DESC";
		
} else if(isset($_SESSION['reseller']) && $_SESSION['reseller'] != ''){
	
	$reseller_id = getUseridbyUsername($_SESSION['reseller'], $conn);
	$sql = "SELECT mt.mt_id, mt.mt_reference, ROUND(mt.mt_amount, 2) as mt_amount, mt.mt_type, m.m_id, m.m_username, tr.tr_name, DATE_FORMAT(mt.mt_date, '%d/%m/%Y %h:%i %p') as trade_date FROM member_trading mt 
			LEFT JOIN members m ON m.m_id = mt.mt_member
			LEFT JOIN trade_settings tr ON tr.tr_id = mt.mt_market
			WHERE m.m_reseller_by = '".$reseller_id."' AND mt_status = '0' AND mt_delete = '0' ".$sql_member.$sql_date.$sql_amt.$sql_typ." ORDER BY mt_id DESC";
	
}

$result = mysqli_query($conn, $sql);


?>