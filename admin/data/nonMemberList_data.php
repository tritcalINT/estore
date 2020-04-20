<?php
include_once 'functions.php';

//if (!empty($_POST['search_date'])) {
//	$search_date = $_POST['search_date'];	
//	$sql_search_date = " AND DATE(m.m_register_date) = '".$search_date."'";
//} else {
//	$search_date = '';
//	$sql_search_date = '';
//}
//
//
//if (!empty($_POST['search_value'])) {
//	$search_value = $_POST['search_value'];
//	$sql_search_value = " AND (m.m_username LIKE '%".$search_value."%' OR m.m_name LIKE '%".$search_value."%')";
//} else {
//	$search_value = '';
//	$sql_search_value = '';
//}
//
//if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
//	
//	$sql = "SELECT m.m_id, m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y') as register_date, m.m_status, m.m_referal, mm.m_username as upline_username, a.a_username FROM members m
//        LEFT JOIN members mm ON mm.m_id = m.m_upline
//		LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
//		WHERE 1=1 ".$sql_search_date.$sql_search_value."
//        ORDER BY m.m_id DESC";	
//		
//} else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
//	
//	$master_by = getUseridbyUsername($_SESSION['master'], $conn);
//	$sql = "SELECT m.m_id, m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y') as register_date, m.m_status, m.m_referal, mm.m_username as upline_username, a.a_username FROM members m
//        LEFT JOIN members mm ON mm.m_id = m.m_upline
//		LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
//		WHERE m.m_master_by = '".$master_by."' ".$sql_search_date.$sql_search_value."
//        ORDER BY m.m_id DESC";	
//		
//} else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
//	
//	$admin_by = getUseridbyUsername($_SESSION['admin'], $conn);
//	$sql = "SELECT m.m_id, m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y') as register_date, m.m_status,  m.m_referal, mm.m_username as upline_username, a.a_username FROM members m
//        LEFT JOIN members mm ON mm.m_id = m.m_upline
//		LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
//        WHERE m.m_admin_by = '".$admin_by."' ".$sql_search_date.$sql_search_value." ORDER BY m.m_id DESC";	
//		
//} else if(isset($_SESSION['reseller']) && $_SESSION['reseller'] != ''){
//	
//	$reseller_id = getUseridbyUsername($_SESSION['reseller'], $conn);
//	$sql1 = "SELECT m.m_id, m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y') as register_date, m.m_status,  m.m_referal, mm.m_username as upline_username, a.a_username FROM members m
//        LEFT JOIN members mm ON mm.m_id = m.m_upline
//		LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
//        WHERE m.m_reseller_by = '".$reseller_id."' ".$sql_search_date.$sql_search_value." ORDER BY m.m_id DESC";
//		
//}

$sql="select * from user where user_type='nonmember'";

$result = mysqli_query($conn, $sql);


?>