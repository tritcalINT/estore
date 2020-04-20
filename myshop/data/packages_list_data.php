<?php

	if (!empty($_POST['search_value'])) {
		$search_value = $_POST['search_value'];
		$sql_search_value = " AND (mp.mp_name LIKE '%".$search_value."%' OR mp.mp_price_rc LIKE '%".$search_value."%' OR mp.mp_expiry LIKE '%".$search_value."%')";
	} else {
		$search_value = '';
		$sql_search_value = '';
	}

	$sql = "SELECT mp.mp_id, mp.mp_name, ROUND(mp.mp_price_dollar, 2) as mp_price_dollar, ROUND(mp.mp_price_rc, 2) as mp_price_rc, ROUND(mp.mp_ratio_bp, 2) as mp_ratio_bp, mp.mp_expiry, mp.mp_status, mp.mp_order FROM member_package mp WHERE 1=1 ".$sql_search_value." ORDER BY mp.mp_order, mp.mp_id";	

	$result = mysqli_query($conn, $sql);

?>