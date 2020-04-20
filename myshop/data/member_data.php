<?php

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

	$rc_trader = '0.00';
	$thawed_account_rc = '0.00';
	$bonus = '0.00';

	$member_username = $_SESSION['member'];
	$member_id = getUseridbyUsername($member_username, $conn);

	$main_account = totalMainAccount($member_id, true, $conn);
	if($main_account == ''){
		$main_account = '0.00';
	}

        $gp_main_account = totalGPMainAccount($member_id, true, $conn);
	if($gp_main_account == ''){
		$gp_main_account = '0.00';
	}



        $gpfund_main_account = totalGPFundMainAccount($member_id, true, $conn);
	if($gpfund_main_account == ''){
		$gpfund_main_account = '0.00';
	}



	$rc_trader = totalTrading($member_id, $conn);
	if($rc_trader == ''){
		$rc_trader = '0.00';
	}

	$thawed_account_rc = totalThawed($member_id, $conn);
	if($thawed_account_rc == ''){
		$thawed_account_rc = '0.00';
	}

	$bonus = totalBonusMember($member_id, $conn);
	if($bonus == ''){
		$bonus = '0.00';
	}

	$main_account_package = totalMainAccount($member_id, false, $conn);

	if($main_account_package < 1){
		$sql = "SELECT mp.mp_id, mp.mp_name, ROUND(mp.mp_price_dollar, 2) as mp_price_dollar, ROUND(mp.mp_price_rc, 2) as mp_price_rc,ROUND(mp.mp_price_rc*80/100, 2) as mp_price_rc_80 , ROUND(mp.mp_price_rc*20/100, 2) as mp_price_rc_20, ROUND(mp.mp_ratio_bp, 2) as mp_ratio_bp, mp.mp_unfrozen, mp.mp_robot, mp.mp_closed_account, ROUND(mp.mp_bonus_level, 2) as mp_bonus_level, mp.mp_status, mp.mp_pic, ROUND(mp.mp_rewards_percent, 2) as mp_rewards_percent, mp.mp_rewards_start, mp.mp_rewards_end, 'buy' as member_pack_status
		FROM member_package mp
		WHERE mp.mp_status = '1' ORDER BY mp.mp_order, mp.mp_id";
	} else {
		$sql = "SELECT mp.mp_id, mp.mp_name, ROUND(mp.mp_price_dollar, 2) as mp_price_dollar, ROUND(mp.mp_price_rc, 2) as mp_price_rc, ROUND(mp.mp_price_rc*80/100, 2) as mp_price_rc_80 , ROUND(mp.mp_price_rc*20/100, 2) as mp_price_rc_20 ,ROUND(mp.mp_ratio_bp, 2) as mp_ratio_bp, mp.mp_unfrozen, mp.mp_robot, mp.mp_closed_account, ROUND(mp.mp_bonus_level, 2) as mp_bonus_level, mp.mp_status, mp.mp_pic, 'upgrade' as member_pack_status
		FROM member_package mp
		WHERE mp.mp_status = '1' AND mp.mp_price_dollar > '".$main_account_package."' ORDER BY mp.mp_order, mp.mp_id";
	}

	$result = mysqli_query($conn, $sql);

	$sqlmarket = "SELECT tr_id, tr_name FROM trade_settings WHERE tr_status = '1' ORDER BY tr_id DESC";
	$resultmarket = mysqli_query($conn, $sqlmarket);

	$user_details = getUserDetailsbyId($member_id, $conn);
	$master_id = $user_details['m_master_by'];

	$sqltrading = "SELECT mt.mt_reference, ROUND(mt.mt_amount, 2) as mt_amount, mt.mt_status, m.m_username, tr.tr_name FROM member_trading mt
					LEFT JOIN members m ON m.m_id = mt.mt_member
					LEFT JOIN trade_settings tr ON tr.tr_id = mt.mt_market
					WHERE mt.mt_status IN (0,1) AND mt_delete = '0' AND m.m_master_by = '".$master_id."' ORDER BY (mt.mt_member = '".$member_id."') DESC, mt_id DESC LIMIT 0, 10";
	$resulttrading = mysqli_query($conn, $sqltrading);

	$today = date('Y-m-d');
	$sqllasttrade = "SELECT mt_type FROM member_trading WHERE mt_member = '".$member_id."' AND DATE(mt_date) = '".$today."' AND mt_status = '1' ORDER BY mt_id DESC LIMIT 1";
	$resultlasttrade = mysqli_query($conn, $sqllasttrade);
	$rowlasttrade = mysqli_fetch_assoc($resultlasttrade);
	$last_trade_value = $rowlasttrade['mt_type'];

	$sqlnews = "SELECT ln.ln_id, ln.ln_title, ln.ln_pic, DATE_FORMAT(ln.ln_date, '%d/%m/%Y %h:%i %p') as ln_date, SUBSTRING(ln.ln_description, 1, 150) as ln_description  FROM latest_news ln WHERE ln_status = '1' ORDER BY ln_date DESC";
	$resultnews = mysqli_query($conn, $sqlnews);

        $sqlpromo = "SELECT ln.p_id, ln.p_title, ln.p_pic, DATE_FORMAT(ln.p_date, '%d/%m/%Y %h:%i %p') as p_date, SUBSTRING(ln.p_description, 1, 150) as p_description  FROM promotion ln WHERE p_status = '1' ORDER BY p_date DESC";
	$resultpromo = mysqli_query($conn, $sqlpromo);

	   $sqlmanual=  "SELECT ln.m_id, ln.m_title, ln.m_pic, DATE_FORMAT(ln.m_date, '%d/%m/%Y %h:%i %p') as m_date, SUBSTRING(ln.m_description, 1, 150) as m_description  FROM member_manual ln WHERE m_status = '1' ORDER BY m_date DESC";
  	$resultmanual  = mysqli_query($conn, $sqlmanual);

        $withsql = "SELECT TOP 10 mw.mw_id, mw.mw_reference, ROUND(mw.mw_amount, 2) as mw_amount, mw.mw_type, cu.cu_name, DATE_FORMAT(mw.mw_created_date, '%d/%m/%Y %h:%i %p') as withdraw_date, mw.mw_status, ROUND(mw.mw_service, 2) as mw_service, ROUND(mw.mw_amount_currency, 2) as mw_amount_currency, ROUND(mw.mw_actual_amount_currency, 2) as mw_actual_amount_currency, mw.mw_message FROM member_withdraw mw, currency cu
        WHERE mw.mw_method = cu.cu_id AND mw.mw_member_id <> '07777'  ORDER BY mw.mw_created_date DESC";

	$resultwithdraw = mysqli_query($conn, $sqltrading);
        
        
        $gpfund_main_account = totalGPFundMainAccount($member_id, true, $conn);
	if($gpfund_main_account == ''){
		$gpfund_main_account = '0.00';
	}
        // share unit
        $eshare_unit = totalEShareUnit($member_id, true, $conn);
	if($eshare_unit == ''){
		$eshare_unit = '0.00';
	}
        // share value
        $eshare_value = totalESharevalue($member_id, true, $conn);
	if($eshare_value == ''){
		$eshare_value = '0.00';
	}
        
        $totsharevalue = $eshare_unit*$eshare_value;
        $totsharevalue = number_format((float)$totsharevalue, 2, '.', '');
        if($totsharevalue == ''){
		$totsharevalue = '0.00';
	}
        // divident value
          $eshare_dvdvalue = totaldividentvalue($member_id, true, $conn);
	if($eshare_dvdvalue == ''){
		$eshare_dvdvalue = '0.00';
	}
        
        // reward return
        $today = date('Y-m-d');
	$sqlreward = "SELECT * FROM member_reward WHERE m_id = '".$member_id."' AND DATE(mem_rw_entdt) = '".$today."' ";
        $rowreward = mysqli_query($conn, $sqlreward);

        // reward return
        $today = date('Y-m-d');
	$sqlgf = "SELECT * FROM member_gf_transfer WHERE mgft_member_id = '".$member_id."' AND DATE(mgft_created_date) = '".$today."' ";
        $rowrewardgf = mysqli_query($conn, $sqlgf);
        
?>
