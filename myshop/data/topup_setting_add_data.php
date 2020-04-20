<?php
$ts_id = '';
$ts_from_amount = '';
$ts_to_amount = '';
$ts_expiry = '';
$ts_status = '';

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
		if (!empty($_GET['ts'])) {
			$setting_id = $_GET['ts'];
			
			$sql="SELECT ts_id, ROUND(ts_from_amount, 2) as ts_from_amount, ROUND(ts_to_amount, 2) as ts_to_amount, ts_expiry, ts_status FROM topup_settings WHERE ts_id='".$setting_id."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			
			$ts_id = $row['ts_id'];
			$ts_from_amount = $row['ts_from_amount'];
			$ts_to_amount = $row['ts_to_amount'];
			$ts_status = $row['ts_status'];
			$ts_expiry = $row['ts_expiry'];
		}
	}
}

?>