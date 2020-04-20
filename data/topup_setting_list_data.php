<?php

	if (!empty($_POST['search_value'])) {
		$search_value = $_POST['search_value'];
		$sql_search_value = " WHERE ts.ts_to_amount LIKE '%".$search_value."%' OR ts.ts_from_amount LIKE '%".$search_value."%' OR ts.ts_expiry LIKE '%".$search_value."%'";
	} else {
		$search_value = '';
		$sql_search_value = '';
	}

	$sql = "SELECT ts.ts_id, ROUND(ts.ts_to_amount, 2) as ts_to_amount, ROUND(ts.ts_from_amount, 2) as ts_from_amount, ts.ts_expiry, ts.ts_status FROM topup_settings ts ".$sql_search_value." ORDER BY ts.ts_id DESC";	

	$result = mysqli_query($conn, $sql);

?>