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
	$sql_from_date = " AND DATE(md.md_date) >= '".$from_date."'";
} else {
	$from_date = '';
	$sql_from_date = "";
}

if (!empty($_POST['to_date'])) {
	$to_date = $_POST['to_date'];
	$sql_to_date = " AND DATE(md.md_date) <= '".$to_date."'";
} else {
	$to_date = '';
	$sql_to_date = "";
}

if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
	
	$sql = "SELECT md.md_id, ROUND(md.md_actual_amount, 2) as md_actual_amount, DATE_FORMAT(md.md_date, '%d/%m/%Y %h:%i %p') as deposit_date, md.md_type, m.m_username, m.m_name, a.a_username FROM `member_deposit` md
			LEFT JOIN members m ON m.m_id = md.md_member
			LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
			WHERE md.md_status = '1' ".$sql_filter.$sql_from_date.$sql_to_date." ORDER BY md.md_date DESC";	
			
	$sql_total = "SELECT ROUND(SUM(md.md_actual_amount), 2) as total_deposit FROM `member_deposit` md
				LEFT JOIN members m ON m.m_id = md.md_member
				LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
				WHERE md.md_status = '1' ".$sql_filter.$sql_from_date.$sql_to_date;
    $result_total = mysqli_query($conn, $sql_total);
	$row_total = mysqli_fetch_assoc($result_total);
	$deposit_total = $row_total['total_deposit'];
	
	$sql_resellers = "SELECT a_id, a_username FROM administrators WHERE a_type = '3' AND a_status = '1'";
	$result_resellers = mysqli_query($conn, $sql_resellers);
	
} else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
	
	$master_by = getUseridbyUsername($_SESSION['master'], $conn);
	
	$sql = "SELECT md.md_id, ROUND(md.md_actual_amount, 2) as md_actual_amount, DATE_FORMAT(md.md_date, '%d/%m/%Y %h:%i %p') as deposit_date, md.md_type, m.m_username, m.m_name, a.a_username FROM `member_deposit` md
			LEFT JOIN members m ON m.m_id = md.md_member
			LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
			WHERE md.md_status = '1' AND m.m_master_by = '".$master_by."' ".$sql_filter.$sql_from_date.$sql_to_date." ORDER BY md.md_date DESC";	
			
	$sql_total = "SELECT ROUND(SUM(md.md_actual_amount), 2) as total_deposit FROM `member_deposit` md
				LEFT JOIN members m ON m.m_id = md.md_member
				LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
				WHERE md.md_status = '1' AND m.m_master_by = '".$master_by."' ".$sql_filter.$sql_from_date.$sql_to_date;
    $result_total = mysqli_query($conn, $sql_total);
	$row_total = mysqli_fetch_assoc($result_total);
	$deposit_total = $row_total['total_deposit'];
	
	$sql_resellers = "SELECT a_id, a_username FROM administrators WHERE a_type = '3' AND a_master_by = '".$master_by."' AND a_status = '1'";
	$result_resellers = mysqli_query($conn, $sql_resellers);
		
} else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
	
	$admin_by = getUseridbyUsername($_SESSION['admin'], $conn);
	
	$sql = "SELECT md.md_id, ROUND(md.md_actual_amount, 2) as md_actual_amount, DATE_FORMAT(md.md_date, '%d/%m/%Y %h:%i %p') as deposit_date, md.md_type, m.m_username, m.m_name, a.a_username FROM `member_deposit` md
			LEFT JOIN members m ON m.m_id = md.md_member
			LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
			WHERE md.md_status = '1' AND m.m_admin_by = '".$admin_by."' ".$sql_filter.$sql_from_date.$sql_to_date." ORDER BY md.md_date DESC";	
	
	$sql_total = "SELECT ROUND(SUM(md.md_actual_amount), 2) as total_deposit FROM `member_deposit` md
				LEFT JOIN members m ON m.m_id = md.md_member
				LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
				WHERE md.md_status = '1' AND m.m_admin_by = '".$admin_by."' ".$sql_filter.$sql_from_date.$sql_to_date;
    $result_total = mysqli_query($conn, $sql_total);
	$row_total = mysqli_fetch_assoc($result_total);
	$deposit_total = $row_total['total_deposit'];
	
	
	$sql_resellers = "SELECT a_id, a_username FROM administrators WHERE a_type = '3' AND a_admin_by = '".$admin_by."' AND a_status = '1'";
	$result_resellers = mysqli_query($conn, $sql_resellers);
	
} else if(isset($_SESSION['reseller']) && $_SESSION['reseller'] != ''){
	
	$reseller_id = getUseridbyUsername($_SESSION['reseller'], $conn);
	
	$sql = "SELECT md.md_id, ROUND(md.md_actual_amount, 2) as md_actual_amount, DATE_FORMAT(md.md_date, '%d/%m/%Y %h:%i %p') as deposit_date, md.md_type, m.m_username, m.m_name, a.a_username FROM `member_deposit` md
			LEFT JOIN members m ON m.m_id = md.md_member
			LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
			WHERE md.md_status = '1' AND m.m_reseller_by = '".$reseller_id."' ".$sql_from_date.$sql_to_date." ORDER BY md.md_date DESC";
			
	$sql_total = "SELECT ROUND(SUM(md.md_actual_amount), 2) as total_deposit FROM `member_deposit` md
				LEFT JOIN members m ON m.m_id = md.md_member
				LEFT JOIN administrators a ON a.a_id = m.m_reseller_by
				WHERE md.md_status = '1' AND m.m_reseller_by = '".$reseller_id."' ".$sql_from_date.$sql_to_date;
    $result_total = mysqli_query($conn, $sql_total);
	$row_total = mysqli_fetch_assoc($result_total);
	$deposit_total = $row_total['total_deposit'];
		
}

$result = mysqli_query($conn, $sql);


?>