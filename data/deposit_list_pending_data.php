<?php
include_once 'functions.php';

if (!empty($_POST['search_date'])) {
	$search_date = $_POST['search_date'];	
	$sql_search_date = " AND DATE(md.md_date) = '".$search_date."'";
} else {
	$search_date = '';
	$sql_search_date = '';
}


if (!empty($_POST['search_value'])) {
	$search_value = $_POST['search_value'];
	$sql_search_value = " AND (md.md_reference LIKE '%".$search_value."%' OR m.m_username LIKE '%".$search_value."%' OR mp.mp_name LIKE '%".$search_value."%' OR md.md_amount LIKE '%".$search_value."%' OR a.a_username LIKE '%".$search_value."%')";
} else {
	$search_value = '';
	$sql_search_value = '';
}

if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
	
	$sql = "SELECT md.md_fund_amount,md.md_id, md.md_reference, md.md_amount, DATE_FORMAT(md.md_date, '%d/%m/%Y') as deposit_date, md.md_slip, md.md_status, md.md_type, md.md_rewards_percent, ROUND(md.md_rewards_amount, 2) as md_rewards_amount, mp.mp_name, ROUND(mp.mp_price_dollar, 2) as mp_price_dollar, cu.cu_name, cu.cu_decimal, m.m_username, mm.m_username as upline_username, a.a_username as master_username FROM member_deposit md
        LEFT JOIN member_package mp ON mp.mp_id = md.md_package
		LEFT JOIN currency cu ON cu.cu_id = md.md_currency
		LEFT JOIN members m ON m.m_id = md.md_member
		LEFT JOIN members mm ON mm.m_id = m.m_upline
		LEFT JOIN administrators a ON a.a_id = m.m_master_by
        WHERE md.md_status = 0 ".$sql_search_date.$sql_search_value." ORDER BY md.md_date DESC";

} else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
	
	$master_by = getUseridbyUsername($_SESSION['master'], $conn);
	$sql = "SELECT md.md_id, md.md_reference, md.md_amount, DATE_FORMAT(md.md_date, '%d/%m/%Y') as deposit_date, md.md_slip, md.md_status, md.md_type, md.md_rewards_percent, ROUND(md.md_rewards_amount, 2) as md_rewards_amount, mp.mp_name, ROUND(mp.mp_price_dollar, 2) as mp_price_dollar, cu.cu_name, cu.cu_decimal, m.m_username, mm.m_username as upline_username FROM member_deposit md
        LEFT JOIN member_package mp ON mp.mp_id = md.md_package
		LEFT JOIN currency cu ON cu.cu_id = md.md_currency
		LEFT JOIN members m ON m.m_id = md.md_member
		LEFT JOIN members mm ON mm.m_id = m.m_upline
        WHERE m.m_master_by = '".$master_by."' AND md.md_status = 0 ".$sql_search_date.$sql_search_value." ORDER BY md.md_date DESC";
		
} else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
	
	$admin_by = getUseridbyUsername($_SESSION['admin'], $conn);
	$sql = "SELECT md.md_id, md.md_reference, md.md_amount, DATE_FORMAT(md.md_date, '%d/%m/%Y') as deposit_date, md.md_slip, md.md_status, md.md_type, md.md_rewards_percent, ROUND(md.md_rewards_amount, 2) as md_rewards_amount, mp.mp_name, ROUND(mp.mp_price_dollar, 2) as mp_price_dollar, cu.cu_name, cu.cu_decimal, m.m_username, mm.m_username as upline_username FROM member_deposit md
        LEFT JOIN member_package mp ON mp.mp_id = md.md_package
		LEFT JOIN currency cu ON cu.cu_id = md.md_currency
		LEFT JOIN members m ON m.m_id = md.md_member
		LEFT JOIN members mm ON mm.m_id = m.m_upline
        WHERE m.m_admin_by = '".$admin_by."' AND md.md_status = 0 ".$sql_search_date.$sql_search_value." ORDER BY md.md_date DESC";
		
} else if(isset($_SESSION['reseller']) && $_SESSION['reseller'] != ''){
	
	$reseller_id = getUseridbyUsername($_SESSION['reseller'], $conn);
	$sql = "SELECT md.md_id, md.md_reference, md.md_amount, DATE_FORMAT(md.md_date, '%d/%m/%Y') as deposit_date, md.md_slip, md.md_status, md.md_type, md.md_rewards_percent, ROUND(md.md_rewards_amount, 2) as md_rewards_amount, mp.mp_name, ROUND(mp.mp_price_dollar, 2) as mp_price_dollar, cu.cu_name, cu.cu_decimal, m.m_username, mm.m_username as upline_username FROM member_deposit md
        LEFT JOIN member_package mp ON mp.mp_id = md.md_package
		LEFT JOIN currency cu ON cu.cu_id = md.md_currency
		LEFT JOIN members m ON m.m_id = md.md_member
		LEFT JOIN members mm ON mm.m_id = m.m_upline
        WHERE m.m_reseller_by = '".$reseller_id."' AND md.md_status = 0 ".$sql_search_date.$sql_search_value." ORDER BY md.md_date DESC";
	
}

$result = mysqli_query($conn, $sql);


?>