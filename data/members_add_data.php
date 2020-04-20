<?php
include_once 'functions.php';

$sqlcountry = "select c_id, c_name, c_code FROM country ORDER BY c_id";
$resultcountry = mysqli_query($conn, $sqlcountry);

$member_id = '';
$m_id = '';
$m_name = '';
$m_username = '';
$m_email = '';
$m_phone_country = '';
$m_phone = '';
$m_dob = '';
$m_status = '';
$m_admin_by = '';
$m_master_by = '';
$m_reseller_by = '';
$m_upline = '';
$m_pic = '';
$m_bank_name = '';
$m_bank_account_no = '';
$m_bank_branch = '';
$m_bitcoin = '';
$m_litecoin = '';
$m_lineid = '';
$m_wechatid = '';
$m_whatsapp = '';
$master_by = '';
$admin_by = '';

if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
	
	$master_by = getUseridbyUsername($_SESSION['master'], $conn);
	$master_by_name = $_SESSION['master'];
	
} else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
	
	$admin_by = getUseridbyUsername($_SESSION['admin'], $conn);
	$admin_by_name = $_SESSION['admin'];
	
} else if(isset($_SESSION['reseller']) && $_SESSION['reseller'] != ''){

	$reseller_id = getUseridbyUsername($_SESSION['reseller'], $conn);
	
	$sqlr = "SELECT a_admin_by FROM administrators WHERE a_id = '".$reseller_id."'";
	$resultr = mysqli_query($conn, $sqlr);
	$rowr = mysqli_fetch_assoc($resultr);
	$admin_by = $rowr['a_admin_by'];
	
	$admin_by_name = getUsernamebyUserid($admin_by, $conn);
	$reseller_name = $_SESSION['reseller'];
}

if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
	
	$sqlmaster = "select a_id, a_username, a_name FROM administrators WHERE a_type = 1 ORDER BY a_id";
	$resultmaster = mysqli_query($conn, $sqlmaster);

} else if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
	
	$sqladmin = "select a_id, a_username, a_name FROM administrators WHERE a_type = 2 AND a_master_by = '".$master_by."' ORDER BY a_id";
	$resultadmin = mysqli_query($conn, $sqladmin);
	
} else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
	
	$sqlresellers = "select a_id, a_username, a_name FROM administrators WHERE a_type = 3 AND a_admin_by = '".$admin_by."' ORDER BY a_id";
	$resultresellers = mysqli_query($conn, $sqlresellers);
	
} else if(isset($_SESSION['reseller']) && $_SESSION['reseller'] != ''){
	
	$sqlmembers = "SELECT m_id, m_username FROM members WHERE m_reseller_by = '".$reseller_id."'";
	$resultmembers = mysqli_query($conn, $sqlmembers);
	
}

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
		if (!empty($_GET['m'])) {
			$member_id = $_GET['m'];
			$member_referal = $_GET['r'];
			
			$sql="SELECT * FROM members WHERE m_id='".$member_id."' AND m_referal = '".$member_referal."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			
			$m_id = $row['m_id'];
			$m_name = $row['m_name'];
			$m_username = $row['m_username'];
			$m_email = $row['m_email'];
			$m_phone_country = $row['m_phone_country'];
			$m_phone = $row['m_phone'];
			$m_dob = $row['m_dob'];
			$m_admin_by = $row['m_admin_by'];
			$m_master_by = $row['m_master_by'];
			$m_reseller_by = $row['m_reseller_by'];
			$m_upline = $row['m_upline'];
			$m_referal = $row['m_referal'];
			$m_status = $row['m_status'];
			$m_pic = $row['m_pic'];
			$m_bank_name = $row['m_bank_name'];
			$m_bank_account_no = $row['m_bank_account_no'];
			$m_bank_branch = $row['m_bank_branch'];
			$m_bitcoin = $row['m_bitcoin'];
			$m_litecoin = $row['m_litecoin'];
			$m_lineid = $row['m_lineid'];
			$m_wechatid = $row['m_wechatid'];
			$m_whatsapp = $row['m_whatsapp'];
		}
	}
}

?>