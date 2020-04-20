<?php
$admin_id = '';
$a_id = '';
$a_name = '';
$a_username = '';
$a_status = '';

if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
	
	$sqlmaster = "select a_id, a_username, a_name FROM administrators WHERE a_type = 1 ORDER BY a_id";
	$resultmaster = mysqli_query($conn, $sqlmaster);

} else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
	
	$master_by = getUseridbyUsername($_SESSION['master'], $conn);
	$master_by_name = $_SESSION['master'];
	
	$sqladmin = "select a_id, a_username, a_name FROM administrators WHERE a_type = 2 AND a_master_by = '".$master_by."' ORDER BY a_id";
	$resultadmin = mysqli_query($conn, $sqladmin);
	
}

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
		if (!empty($_GET['a'])) {
			$admin_id = $_GET['a'];
			
			$sql="SELECT * FROM administrators WHERE a_id='".$admin_id."' AND a_type = '3'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			
			$a_id = $row['a_id'];
			$a_name = $row['a_name'];
			$a_username = $row['a_username'];
			$a_status = $row['a_status'];
			$a_admin_by = $row['a_admin_by'];
			$a_master_by = $row['a_master_by'];
			$a_referral = $row['a_affilate'];
		}
	}
}

?>