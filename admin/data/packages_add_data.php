<?php
$mp_id = '';
$mp_name = '';
$mp_price_dollar = '';
$mp_price_rc = '';
$mp_ratio_bp = '';
$mp_unfrozen = '';
$mp_robot = '';
$mp_closed_account = '';
$mp_bonus_level = '';
$mp_status = '';
$mp_pic = '';
$mp_expiry = '';
$mp_rewards_percent = '';
$mp_rewards_start = '';
$mp_rewards_end = '';

$mp_referal_1 = '';
$mp_referal_2 = '';
$mp_referal_3 = '';
$mp_referal_4 = '';
$mp_referal_5 = '';
$mp_referal_6 = '';
$mp_referal_7 = '';
$mp_referal_8 = '';
$mp_referal_9 = '';
$mp_referal_10 = '';
$mp_referal_11 = '';
$mp_referal_12 = '';
$mp_referal_13 = '';
$mp_referal_14 = '';
$mp_referal_15 = '';
$mp_referal_16 = '';
$mp_referal_17 = '';
$mp_referal_18 = '';
$mp_referal_19 = '';
$mp_referal_20 = '';
$mp_referal_21 = '';

if(isset($_GET['action'])) {
	if ($_GET['action'] == 'update') {
		if (!empty($_GET['mp'])) {
			$package_id = $_GET['mp'];
			$sql="SELECT mp_id, mp_name, ROUND(mp_price_dollar, 2) as mp_price_dollar, ROUND(mp_price_rc, 2) as mp_price_rc, ROUND(mp_ratio_bp, 2) as mp_ratio_bp, mp_unfrozen, mp_robot, mp_closed_account, mp_bonus_level, mp_status, mp_order, mp_pic, mp_expiry, mp_rewards_percent, mp_rewards_start, mp_rewards_end, ROUND(mp_referal_1, 2) as mp_referal_1, ROUND(mp_referal_2, 2) as mp_referal_2, ROUND(mp_referal_3, 2) as mp_referal_3, ROUND(mp_referal_4, 2) as mp_referal_4, ROUND(mp_referal_5, 2) as mp_referal_5, ROUND(mp_referal_6, 2) as mp_referal_6, ROUND(mp_referal_7, 2) as mp_referal_7, ROUND(mp_referal_8, 2) as mp_referal_8, ROUND(mp_referal_9, 2) as mp_referal_9, ROUND(mp_referal_10, 2) as mp_referal_10, ROUND(mp_referal_11, 2) as mp_referal_11, ROUND(mp_referal_12, 2) as mp_referal_12, ROUND(mp_referal_13, 2) as mp_referal_13, ROUND(mp_referal_14, 2) as mp_referal_14, ROUND(mp_referal_15, 2) as mp_referal_15, ROUND(mp_referal_16, 2) as mp_referal_16, ROUND(mp_referal_17, 2) as mp_referal_17, ROUND(mp_referal_18, 2) as mp_referal_18, ROUND(mp_referal_19, 2) as mp_referal_19, ROUND(mp_referal_20, 2) as mp_referal_20, ROUND(mp_referal_21, 2) as mp_referal_21 FROM member_package WHERE mp_id='".$package_id."'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			
			$mp_id = $row['mp_id'];
			$mp_name = $row['mp_name'];
			$mp_price_dollar = $row['mp_price_dollar'];
			$mp_price_rc = $row['mp_price_rc'];
			$mp_ratio_bp = $row['mp_ratio_bp'];
			$mp_unfrozen = $row['mp_unfrozen'];
			$mp_robot = $row['mp_robot'];
			$mp_closed_account = $row['mp_closed_account'];
			$mp_bonus_level = $row['mp_bonus_level'];
			$mp_status = $row['mp_status'];
			$mp_pic = $row['mp_pic'];
			$mp_expiry = $row['mp_expiry'];
			$mp_order = $row['mp_order'];
			$mp_rewards_percent = $row['mp_rewards_percent'];
			$mp_rewards_start = $row['mp_rewards_start'];
			$mp_rewards_end = $row['mp_rewards_end'];
			
			$mp_referal_1 = $row['mp_referal_1'];
			$mp_referal_2 = $row['mp_referal_2'];
			$mp_referal_3 = $row['mp_referal_3'];
			$mp_referal_4 = $row['mp_referal_4'];
			$mp_referal_5 = $row['mp_referal_5'];
			$mp_referal_6 = $row['mp_referal_6'];
			$mp_referal_7 = $row['mp_referal_7'];
			$mp_referal_8 = $row['mp_referal_8'];
			$mp_referal_9 = $row['mp_referal_9'];
			$mp_referal_10 = $row['mp_referal_10'];
			$mp_referal_11 = $row['mp_referal_11'];
			$mp_referal_12 = $row['mp_referal_12'];
			$mp_referal_13 = $row['mp_referal_13'];
			$mp_referal_14 = $row['mp_referal_14'];
			$mp_referal_15 = $row['mp_referal_15'];
			$mp_referal_16 = $row['mp_referal_16'];
			$mp_referal_17 = $row['mp_referal_17'];
			$mp_referal_18 = $row['mp_referal_18'];
			$mp_referal_19 = $row['mp_referal_19'];
			$mp_referal_20 = $row['mp_referal_20'];
			$mp_referal_21 = $row['mp_referal_21'];
			
			$sql_count = "SELECT COUNT(mp_id) as total_mp FROM member_package";
			$result_count = mysqli_query($conn, $sql_count);
			$count_mp = mysqli_fetch_assoc($result_count)['total_mp'];
		}
	}
} else {
	
	$sql_count = "SELECT COUNT(mp_id) as total_mp FROM member_package";
	$result_count = mysqli_query($conn, $sql_count);
	$total_mp = mysqli_fetch_assoc($result_count)['total_mp'];
	$count_mp = $total_mp + 1;
	
}

?>