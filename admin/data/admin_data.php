<?php
	
	$main_account_admin = '0.00';
	$rc_trader_admin = '0';
	$thawed_account_rc_admin = '0';
	$thawed_account_dollar_admin = '0.00';
	$total_bonus_admin = '0.00';
	$chart_random_value = '';
	$chart_date = date("Y-m-d H:i");
	
	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		
		$adminid = getUseridbyUsername($_SESSION['master'], $conn);
		$total_bonus_admin = totalBonusAdmin($adminid, 'master', $conn);
		
	} else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
		
		$adminid = getUseridbyUsername($_SESSION['admin'], $conn);
		$total_bonus_admin = totalBonusAdmin($adminid, 'admin', $conn);
		
	} else if(isset($_SESSION['reseller']) && $_SESSION['reseller'] != ''){
		
		$adminid = getUseridbyUsername($_SESSION['reseller'], $conn);
		$total_bonus_admin = totalBonusAdmin($adminid, 'reseller', $conn);
		$main_account_admin = totalMainAccountReseller($adminid, $conn);
		
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		
		$adminid = getUseridbyUsername($_SESSION['supermaster'], $conn);
		$total_bonus_admin = totalBonusAdmin($adminid, 'supermaster', $conn);
		
	}

	$sql = "SELECT mp.mp_id, mp.mp_name, ROUND(mp.mp_price_dollar, 2) as mp_price_dollar, ROUND(mp.mp_price_rc, 2) as mp_price_rc, ROUND(mp.mp_ratio_bp, 2) as mp_ratio_bp, mp.mp_unfrozen, mp.mp_robot, mp.mp_closed_account, ROUND(mp.mp_bonus_level, 2) as mp_bonus_level, mp.mp_status, mp.mp_pic, ROUND(mp.mp_rewards_percent, 2) as mp_rewards_percent, mp.mp_rewards_start, mp.mp_rewards_end FROM member_package mp WHERE mp.mp_status = '1' ORDER BY mp.mp_order, mp.mp_id";	

	$result = mysqli_query($conn, $sql);
	
	
	$sql_display = "SELECT ROUND(dv_trader_value, 2) as dv_trader_value, ROUND(dv_trader_percent, 2) as dv_trader_percent, dv_trader_arrow, ROUND(dv_rolling_value, 2) as dv_rolling_value, ROUND(dv_rolling_percent, 2) as dv_rolling_percent, dv_rolling_arrow, ROUND(dv_partner_value, 2) as dv_partner_value, ROUND(dv_partner_percent, 2) as dv_partner_percent, dv_partner_arrow, ROUND(dv_splits_value, 4) as dv_splits_value,  ROUND(dv_splits_percent, 2) as dv_splits_percent,  dv_splits_arrow, dv_current_trading, dv_current_scrolling, ROUND(dv_partner_joined, 2) as dv_partner_joined, ROUND(dv_max_partner, 2) as dv_max_partner, ROUND(dv_trader_done, 2) as dv_trader_done, ROUND(dv_max_trader_done, 2) as dv_max_trader_done, ROUND(dv_scroll_unit_done, 2) as dv_scroll_unit_done, ROUND(dv_max_scroll_unit_done, 2) as dv_max_scroll_unit_done, ROUND(dv_bonus_splits, 2) as dv_bonus_splits, ROUND(dv_max_bonus_splits, 2) as dv_max_bonus_splits  FROM display_values WHERE dv_id = '1'";
	$result_display = mysqli_query($conn, $sql_display);
	$row_display = mysqli_fetch_assoc($result_display);
	
	$dv_trader_value = $row_display['dv_trader_value'];
	$dv_trader_percent = $row_display['dv_trader_percent'];
	$dv_trader_arrow = $row_display['dv_trader_arrow'];
	$dv_rolling_value = $row_display['dv_rolling_value'];
	$dv_rolling_percent = $row_display['dv_rolling_percent'];
	$dv_rolling_arrow = $row_display['dv_rolling_arrow'];
	$dv_partner_value = $row_display['dv_partner_value'];
	$dv_partner_percent = $row_display['dv_partner_percent'];
	$dv_partner_arrow = $row_display['dv_partner_arrow'];
	$dv_splits_value = $row_display['dv_splits_value'];
	$dv_splits_percent = $row_display['dv_splits_percent'];
	$dv_splits_arrow = $row_display['dv_splits_arrow'];
	
	$dv_current_trading = $row_display['dv_current_trading'];
	$dv_current_scrolling = $row_display['dv_current_scrolling'];
	
	$dv_partner_joined = $row_display['dv_partner_joined'];
	$dv_max_partner = $row_display['dv_max_partner'];
	$dv_trader_done = $row_display['dv_trader_done'];
	$dv_max_trader_done = $row_display['dv_max_trader_done'];
	$dv_scroll_unit_done = $row_display['dv_scroll_unit_done'];
	$dv_max_scroll_unit_done = $row_display['dv_max_scroll_unit_done'];
	$dv_bonus_splits = $row_display['dv_bonus_splits'];
	$dv_max_bonus_splits = $row_display['dv_max_bonus_splits'];
	
	$partner_joined_percent = number_format((float)(($dv_partner_joined/$dv_max_partner) * 100), 2, '.', '');
	$trader_done_percent = number_format((float)(($dv_trader_done/$dv_max_trader_done) * 100), 2, '.', '') ;
	$scroll_unit_percent = number_format((float)(($dv_scroll_unit_done/$dv_max_scroll_unit_done) * 100), 2, '.', '');
	$bonus_splits_percent = number_format((float)(($dv_bonus_splits/$dv_max_bonus_splits) * 100), 2, '.', '');
	
	if($dv_trader_arrow == '1'){
		$dv_trader_arrow_direction = "fa-caret-up";	
		$dv_trader_arrow_color = "text-green";	
	} else if($dv_trader_arrow == '0'){
		$dv_trader_arrow_direction = "fa-caret-left";	
		$dv_trader_arrow_color = "text-yellow";		
	} else if($dv_trader_arrow == '2'){
		$dv_trader_arrow_direction = "fa-caret-down";	
		$dv_trader_arrow_color = "text-red";
	}
	
	if($dv_rolling_arrow == '1'){
		$dv_rolling_arrow_direction = "fa-caret-up";
		$dv_rolling_arrow_color = "text-green";	
	} else if($dv_rolling_arrow == '0'){
		$dv_rolling_arrow_direction = "fa-caret-left";
		$dv_rolling_arrow_color = "text-yellow";
	} else if($dv_rolling_arrow == '2'){
		$dv_rolling_arrow_direction = "fa-caret-down";	
		$dv_rolling_arrow_color = "text-red";
	}
	
	if($dv_partner_arrow == '1'){
		$dv_partner_arrow_direction = "fa-caret-up";
		$dv_partner_arrow_color = "text-green";
	} else if($dv_partner_arrow == '0'){
		$dv_partner_arrow_direction = "fa-caret-left";	
		$dv_partner_arrow_color = "text-yellow";
	} else if($dv_partner_arrow == '2'){
		$dv_partner_arrow_direction = "fa-caret-down";
		$dv_partner_arrow_color = "text-red";
	}
	
	if($dv_splits_arrow == '1'){
		$dv_splits_arrow_direction = "fa-caret-up";	
		$dv_splits_arrow_color = "text-green";
	} else if($dv_splits_arrow == '0'){
		$dv_splits_arrow_direction = "fa-caret-left";	
		$dv_splits_arrow_color = "text-yellow";
	} else if($dv_splits_arrow == '2'){
		$dv_splits_arrow_direction = "fa-caret-down";		
		$dv_splits_arrow_color = "text-red";
	}
	
	if($_SESSION['master'] != '' || $_SESSION['supermaster'] != ''){
		$sql_admin_setting = "SELECT as_trading_min, as_trading_max FROM admin_setting WHERE as_id = '1' AND as_status = '1'";
		$result_admin_setting = mysqli_query($conn, $sql_admin_setting);
		$row_admin_setting = mysqli_fetch_assoc($result_admin_setting);
		
		$trading_min = $row_admin_setting['as_trading_min'];
		$trading_max = $row_admin_setting['as_trading_max'];

		$chart_random_value = mt_rand ($trading_min*100000, $trading_max*100000) / 100000;
	}

?>