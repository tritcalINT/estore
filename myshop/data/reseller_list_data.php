<?php

include_once 'functions.php';

if (!empty($_POST['search_date'])) {
	$search_date = $_POST['search_date'];	
	$sql_search_date = " AND DATE(a.a_register_date) = '".$search_date."'";
} else {
	$search_date = '';
	$sql_search_date = '';
}


if (!empty($_POST['search_value'])) {
	$search_value = $_POST['search_value'];
	$sql_search_value = " AND (a.a_username LIKE '%".$search_value."%' OR a.a_name LIKE '%".$search_value."%')";
} else {
	$search_value = '';
	$sql_search_value = '';
}

if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
	$sql = "SELECT a.a_id, a.a_username, a.a_name, DATE_FORMAT(a.a_register_date, '%d/%m/%Y') as register_date, a.a_status, aa.a_username as reg_username, ROUND(SUM(rf.rf_amount), 2) as rf_amount FROM administrators a 
	LEFT JOIN administrators aa ON aa.a_id = a.a_registered_by 
	LEFT OUTER JOIN reseller_fund rf ON rf.rf_reseller_id = a.a_id 
	WHERE a.a_type = 3 ".$sql_search_date.$sql_search_value." GROUP BY a.a_id ORDER BY a.a_id DESC";
} else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
	$master_session = $_SESSION['master'];
	$master_by = getUseridbyUsername($master_session, $conn);
	
	$sql = "SELECT a.a_id, a.a_username, a.a_name, DATE_FORMAT(a.a_register_date, '%d/%m/%Y') as register_date, a.a_status, aa.a_username as reg_username, ROUND(SUM(rf.rf_amount), 2) as rf_amount FROM administrators a 
	LEFT JOIN administrators aa ON aa.a_id = a.a_registered_by 
	LEFT OUTER JOIN reseller_fund rf ON rf.rf_reseller_id = a.a_id 
	WHERE a.a_type = 3 AND a.a_master_by = '".$master_by."' ".$sql_search_date.$sql_search_value." GROUP BY a.a_id ORDER BY a.a_id DESC";
} else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
	$admin_session = $_SESSION['admin'];
	$admin_by = getUseridbyUsername($admin_session, $conn);

	$sql = "SELECT a.a_id, a.a_username, a.a_name, DATE_FORMAT(a.a_register_date, '%d/%m/%Y') as register_date, a.a_status, aa.a_username as reg_username, ROUND(SUM(rf.rf_amount), 2) as rf_amount FROM administrators a 
	LEFT JOIN administrators aa ON aa.a_id = a.a_registered_by 
	LEFT OUTER JOIN reseller_fund rf ON rf.rf_reseller_id = a.a_id 
	WHERE a.a_type = 3 AND a.a_admin_by = '".$admin_by."' ".$sql_search_date.$sql_search_value." GROUP BY a.a_id ORDER BY a.a_id DESC";
}



$result = mysqli_query($conn, $sql);


?>