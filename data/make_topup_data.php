<?php

$dv_current_trading = getDisplayTopHeader($conn);

$member_username = $_SESSION['member'];
$member_id = getUseridbyUsername($member_username, $conn);

$pending = pendingPackage($member_id, 'Topup', $conn);

$otp_set = checkOTPSet($member_id, $conn);

$mp_id = '';
$mp_name = '';
$mp_price_dollar = '';

$user_details = getUserDetailsbyId($member_id, $conn);
$master_id = $user_details['m_master_by']; 

$sqlcurrency = "select cu_id, cu_name, cu_rate FROM currency WHERE cu_status = '1' AND cu_master_by = '".$master_id."' ORDER BY cu_id";
$resultcurrency = mysqli_query($conn, $sqlcurrency);

$admin_setting = adminSettings($conn);
$topup_limit = $admin_setting['as_topup_limit'];

$main_account = totalMainAccount($member_id, true, $conn, false);

?>