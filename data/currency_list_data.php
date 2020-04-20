<?php

	if (!empty($_POST['search_value'])) {
		$search_value = $_POST['search_value'];
		$sql_search_value = " AND cu_name LIKE '%".$search_value."%'";
	} else {
		$search_value = '';
		$sql_search_value = '';
	}
	
	if($_SESSION['master'] != ''){
		$master_id = getUseridbyUsername($_SESSION['master'], $conn);
		$sql_master = " AND cu_master_by = '".$master_id."'";
	} else if($_SESSION['supermaster'] != '') {
		$sql_master = '';
	}

$sql = "SELECT cu.cu_id, cu.cu_name, cu.cu_rate, cu.cu_decimal, cu.cu_status, a.a_username FROM currency cu
		LEFT JOIN administrators a  ON a.a_id = cu.cu_master_by  WHERE 1=1 ".$sql_master.$sql_search_value." ORDER BY cu_id DESC";

$result = mysqli_query($conn, $sql);


?>