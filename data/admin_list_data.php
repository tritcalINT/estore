<?php

if (!empty($_POST['search_date'])) {
	$search_date = $_POST['search_date'];	
	$sql_search_date = " AND DATE(a.a_register_date) = '".$search_date."'";
} else {
	$search_date = '';
	$sql_search_date = '';
}


if (!empty($_POST['search_admin_value'])) {
	$search_admin_value = $_POST['search_admin_value'];
	$sql_search_admin_value = " AND (a.a_username LIKE '%".$search_admin_value."%' OR a.a_name LIKE '%".$search_admin_value."%')";
} else {
	$search_admin_value = '';
	$sql_search_admin_value = '';
}

if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
	
	$sql = "SELECT a.a_id, a.a_username, a.a_name, DATE_FORMAT(a.a_register_date, '%d/%m/%Y') as register_date, a.a_status, aa.a_username as reg_username FROM administrators a
			LEFT JOIN administrators aa ON aa.a_id = a.a_registered_by
			WHERE a.a_type = 2 ".$sql_search_date.$sql_search_admin_value." ORDER BY a.a_id DESC";
			
} else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
	
	$master_by = getUseridbyUsername($_SESSION['master'], $conn);
	$sql = "SELECT a.a_id, a.a_username, a.a_name, DATE_FORMAT(a.a_register_date, '%d/%m/%Y') as register_date, a.a_status, aa.a_username as reg_username FROM administrators a
			LEFT JOIN administrators aa ON aa.a_id = a.a_registered_by
			WHERE a.a_master_by = '".$master_by."' AND a.a_type = 2 ".$sql_search_date.$sql_search_admin_value." ORDER BY a.a_id DESC";
}

$result = mysqli_query($conn, $sql);


?>