<?php

if (!empty($_POST['search_date'])) {
	$search_date = $_POST['search_date'];	
	$sql_search_date = " AND DATE(a.a_register_date) = '".$search_date."'";
} else {
	$search_date = '';
	$sql_search_date = '';
}


if (!empty($_POST['search_master_value'])) {
	$search_master_value = $_POST['search_master_value'];
	$sql_search_master_value = " AND (a.a_username LIKE '%".$search_master_value."%' OR a.a_name LIKE '%".$search_master_value."%')";
} else {
	$search_master_value = '';
	$sql_search_master_value = '';
}
	
	$sql = "SELECT a.a_id, a.a_username, a.a_name, DATE_FORMAT(a.a_register_date, '%d/%m/%Y') as register_date, a.a_status, aa.a_username as reg_username FROM administrators a
			LEFT JOIN administrators aa ON aa.a_id = a.a_registered_by
			WHERE a.a_type = 1 ".$sql_search_date.$sql_search_master_value." ORDER BY a.a_id DESC";

	$result = mysqli_query($conn, $sql);


?>