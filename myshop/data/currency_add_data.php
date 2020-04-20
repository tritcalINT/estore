<?php

$currency_id = '';
$cu_id = '';
$cu_name = '';
$cu_rate = '';
$cu_withdraw_rate = '';
$cu_decimal = '';
$cu_type = '';
$cu_type_details = '';
$cu_status = '';

if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
	
	$sqlmaster = "select a_id, a_username, a_name FROM administrators WHERE a_type = 1 ORDER BY a_id";
	$resultmaster = mysqli_query($conn, $sqlmaster);

} else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){

	$master_by = getUseridbyUsername($_SESSION['master'], $conn);
}

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
		if (!empty($_GET['cu'])) {
			$currency_id = $_GET['cu'];
			
			$sql="SELECT * FROM currency WHERE cu_id='".$currency_id."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			
			$cu_id = $row['cu_id'];
			$cu_name = $row['cu_name'];
			$cu_rate = $row['cu_rate'];
			$cu_withdraw_rate = $row['cu_withdraw_rate'];
			$cu_decimal = $row['cu_decimal'];
			$cu_type = $row['cu_type'];
			$cu_type_details = $row['cu_type_details'];
			$cu_status = $row['cu_status'];
		}
	}
}

?>