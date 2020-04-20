<?php
include_once 'functions.php';

if (!empty($_POST['search_date'])) {
	$search_date = $_POST['search_date'];	
	$sql_search_date = " AND DATE(ms.ms_date) = '".$search_date."'";
} else {
	$search_date = '';
	$sql_search_date = '';
}


if (!empty($_POST['search_value'])) {
	$search_value = $_POST['search_value'];
	$sql_search_value = " AND (ms.ms_reference LIKE '%".$search_value."%' OR m.m_username LIKE '%".$search_value."%' OR m.m_name LIKE '%".$search_value."%' OR ms.ms_subject LIKE '%".$search_value."%')";
} else {
	$search_value = '';
	$sql_search_value = '';
}

if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
	
	$sql = "SELECT ms.ms_id, ms.ms_subject, ms.ms_message, DATE_FORMAT(ms.ms_date, '%d/%m/%Y') as ms_date, ms.ms_reference, m.m_username, m.m_name FROM member_support ms
	        INNER JOIN members m ON m.m_id = ms.ms_member_id
			WHERE 1=1 ".$sql_search_date.$sql_search_value."
			ORDER BY ms.ms_id DESC";
			
} else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
	
	$master_by = getUseridbyUsername($_SESSION['master'], $conn);
	
	$sql = "SELECT ms.ms_id, ms.ms_subject, ms.ms_message, DATE_FORMAT(ms.ms_date, '%d/%m/%Y') as ms_date, ms.ms_reference, m.m_username, m.m_name FROM member_support ms
	        INNER JOIN members m ON m.m_id = ms.ms_member_id
			WHERE m.m_master_by = '".$master_by."' ".$sql_search_date.$sql_search_value."
			ORDER BY ms.ms_id DESC";
		
} else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
	
	$admin_by = getUseridbyUsername($_SESSION['admin'], $conn);
	
	$sql = "SELECT ms.ms_id, ms.ms_subject, ms.ms_message, DATE_FORMAT(ms.ms_date, '%d/%m/%Y') as ms_date, ms.ms_reference, m.m_username, m.m_name FROM member_support ms
	        INNER JOIN members m ON m.m_id = ms.ms_member_id
			WHERE m.m_admin_by = '".$admin_by."' ".$sql_search_date.$sql_search_value." ORDER BY ms.ms_id DESC";
		
} else if(isset($_SESSION['reseller']) && $_SESSION['reseller'] != ''){
	
	$reseller_id = getUseridbyUsername($_SESSION['reseller'], $conn);
	
	$sql = "SELECT ms.ms_id, ms.ms_subject, ms.ms_message, DATE_FORMAT(ms.ms_date, '%d/%m/%Y') as ms_date, ms.ms_reference, m.m_username, m.m_name FROM member_support ms
	        INNER JOIN members m ON m.m_id = ms.ms_member_id
			 WHERE m.m_reseller_by = '".$reseller_id."' ".$sql_search_date.$sql_search_value." ORDER BY ms.ms_id DESC";
		
}

$result = mysqli_query($conn, $sql);


?>