<?php
$tr_id = '';
$tr_name = '';
$tr_max = '';
$tr_status = '';

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
		if (!empty($_GET['tr'])) {
			$trade_id = $_GET['tr'];
			
			$sql="SELECT tr_id, ROUND(tr_max, 2) as tr_max, tr_name, tr_status FROM trade_settings WHERE tr_id='".$trade_id."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			
			$tr_id = $row['tr_id'];
			$tr_name = $row['tr_name'];
			$tr_max = $row['tr_max'];
			$tr_status = $row['tr_status'];
		}
	}
}

?>