<?php

	if (!empty($_POST['search_value'])) {
		$search_value = $_POST['search_value'];
		$sql_search_value = " WHERE tr.tr_name LIKE '%".$search_value."%' OR tr.tr_max LIKE '%".$search_value."%'";
	} else {
		$search_value = '';
		$sql_search_value = '';
	}

	$sql = "SELECT tr.tr_id, ROUND(tr.tr_max, 2) as tr_max, tr.tr_name, tr.tr_status FROM trade_settings tr ".$sql_search_value." ORDER BY tr.tr_id DESC";	

	$result = mysqli_query($conn, $sql);

?>