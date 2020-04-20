<?php

function getUserDetailsbySession($username, $conn){
	$sql = "SELECT * FROM user where  user_name='".$username."'";
    $result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	
	return $res;
}

 

function getUseridbyUsername($username, $conn){
	
	$sql = "SELECT * FROM user WHERE user_name='".$username."'";
    $result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	
	return $res['user_id'];
}

function getcustomerNamebyId($username, $conn){
	
	$sql = "SELECT * FROM user WHERE user_id='".$username."'";
    $result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	
	return $res['user_name'];
}

function getproductCodeById($item_key, $conn){
	
	$sql = "SELECT * FROM product WHERE product_id='".$item_key."'";
    $result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	
	return $res['code'];
}

function getUseridbyUserTypename($userid, $conn){
	
	$sql = "SELECT * FROM user WHERE user_name='".$userid."'";
    $result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	
	return $res['user_type'];
}

function getUsernamebyUserid($userid, $conn){
	
	$sql = "SELECT a_username FROM administrators WHERE a_id='".$userid."'";
    $result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	
	return $res['a_username'];
}

function getMemberUsernamebyUserid($userid, $conn){
	
	$sql = "SELECT m_username FROM members WHERE m_id='".$userid."'";
    $result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	
	return $res['m_username'];
}

function getMemberUplinePackage($userid, $mlevel, $conn){

	$sql = "SELECT m.m_upline FROM members m WHERE m.m_id='".$userid."'";
	$result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	
	$uplineid = $res['m_upline'];
	$package_details = getMemberpackage($uplineid, $mlevel, $conn);
	
	$bonus['upline'] = $uplineid;
	$bonus['member_package'] = $package_details['mp_id'];
	$bonus['package_percent'] = $package_details['level_percent'];
	
	return $bonus;
}

function getMemberpackage($userid, $level, $conn){
	$main_account = totalMainAccount($userid, false, $conn);
	$member_level = "mp_referal_".$level;
	
	$sql = "SELECT mp_id, ROUND(".$member_level.", 2) as level_percent FROM member_package mp WHERE mp_price_dollar <= '".$main_account."' ORDER BY mp_price_dollar DESC LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$current_package = mysqli_fetch_assoc($result);
	
	return $current_package;
}

function totalMainAccount($userid, $with_expiry, $conn){
	$today = date('Y-m-d');
	// gp deposit
        $sql = "SELECT ROUND(SUM(md.md_actual_amount),2) as total_deposit FROM member_deposit md WHERE md.md_depost_type= '2' and md.md_status = '1' AND md.md_member = '".$userid."'";
	if($with_expiry){
		$sql .= " AND md.md_expiry > '".$today."'";
	}
	$result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	$total_deposit_gp = $res['total_deposit'];
        
        // normal deposit
	$sql = "SELECT ROUND(SUM(md.md_actual_amount),2) as total_deposit FROM member_deposit md WHERE md.md_status = '1' AND md.md_member = '".$userid."'";
	if($with_expiry){
		$sql .= " AND md.md_expiry > '".$today."'";
	}
	$result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	$total_deposit = $res['total_deposit'];
	
	$sqlr = "SELECT ROUND(SUM(md.md_rewards_amount),2) as total_rewards FROM member_deposit md WHERE md.md_status = '1' AND md.md_member = '".$userid."'";
	if($with_expiry){
		$sqlr .= " AND md.md_expiry > '".$today."'";
	}
	$resultr = mysqli_query($conn, $sqlr);
	$resr = mysqli_fetch_assoc($resultr);
	$total_rewards = $resr['total_rewards'];
	
	$main_account = $total_deposit_gp+$total_deposit + $total_rewards;
	
	return $main_account;
}

function totalTopup($userid, $with_expiry, $conn){
	$today = date('Y-m-d');
	
	$sql = "SELECT ROUND(SUM(md.md_actual_amount),2) as total_deposit FROM member_deposit md WHERE md.md_status = '1' AND md.md_type = 'Topup' AND md.md_member = '".$userid."'";
	if($with_expiry){
		$sql .= " AND md.md_expiry > '".$today."'";
	}
	$result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	$total_deposit = $res['total_deposit'];
	
	return $total_deposit;
}

function bonusPaid($member_id, $today, $conn){
	
	$sql = "SELECT SUM(rb_bonus_amount) as bonus_today FROM member_referal_bonus WHERE DATE(rb_date) = '".$today."' AND rb_bonus_paid_to = '".$member_id."'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$bonus_today = $row['bonus_today'];
	
	return $bonus_today;
}

function payBonusMember($rb_deposit_by, $member_id, $rb_level, $rb_deposit_amount, $rb_deposit_id, $conn){
	
	$package_level = getMemberUplinePackage($member_id, $rb_level, $conn);
	
	$rb_bonus_paid_to = $package_level['upline'];
	$rb_percent = $package_level['package_percent'];
	
	$member_mainaccount = totalMainAccount($rb_bonus_paid_to, true, $conn);
	$member_topup = totalTopup($rb_bonus_paid_to, true, $conn);
	$member_total = $member_mainaccount - $member_topup; // Pay Bonus only if the member buy a package and not for top-up
	
	$today = date('Y-m-d H:i:s');
	$bonus_paid_today = bonusPaid($rb_bonus_paid_to, $today, $conn);
	
	/* // Removed based on request on 7th Aug 2018 & new code added below
	if($member_total > 0){
		if($member_mainaccount >= $bonus_paid_today){
			$current_bonus_amount = ($rb_deposit_amount * $rb_percent)/100;
			$bonus_tobe_paid_today = $bonus_paid_today + $current_bonus_amount;
			if($bonus_tobe_paid_today > $member_mainaccount){
				$rb_bonus_amount = $member_mainaccount - $bonus_paid_today;
				$rb_bonus_message = 'excess bonus today';
			} else {
				$rb_bonus_amount = $current_bonus_amount;
				$rb_bonus_message = 'exact bonus';
			}
		} else {
			$rb_bonus_amount = '0.00';
			$rb_bonus_message = 'no bonus';
		}
	} else {
		$rb_bonus_amount = '0.00';
		$rb_bonus_message = 'no package';
	}
	*/
	
	//New code added
	if($member_total > 0){
		$current_bonus_amount = ($rb_deposit_amount * $rb_percent)/100;
		$rb_bonus_amount = $current_bonus_amount;
		$rb_bonus_message = 'exact bonus';
	} else {
		$rb_bonus_amount = '0.00';
		$rb_bonus_message = 'no package';
	}
	
	
	if(($rb_bonus_paid_to > 0) && ($rb_bonus_paid_to != '') ){
		$sql_bonus = "INSERT INTO member_referal_bonus(rb_deposit_amount, rb_deposit_id, rb_deposit_by, rb_level, rb_bonus_amount, rb_bonus_message, rb_bonus_paid_to, rb_percent, rb_date, rb_status) VALUES ('".$rb_deposit_amount."', '".$rb_deposit_id."', '".$rb_deposit_by."', '".$rb_level."', '".$rb_bonus_amount."', '".$rb_bonus_message."', '".$rb_bonus_paid_to."', '".$rb_percent."', '".$today."', '1')"; 
		mysqli_query($conn, $sql_bonus);
		
		return $rb_bonus_paid_to;
	}	
}

function totalBonusMember($member_id, $conn){
	
	$sql = "SELECT ROUND(SUM(rb_bonus_amount), 2) as bonus_amount FROM member_referal_bonus WHERE rb_bonus_paid_to = '".$member_id."'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$bonus_amount = $row['bonus_amount'];
	var_dump($sql);
	return $bonus_amount;
}

function totalBonusAdmin($adminid, $admintype, $conn){
	if($admintype == 'supermaster'){
		$where_condition = "1=1";
	} else if($admintype == 'master'){
		$where_condition = "m.m_master_by = '".$adminid."'";
	} else if($admintype == 'admin'){
		$where_condition = "m.m_admin_by = '".$adminid."'";
	} else if($admintype == 'reseller'){
		$where_condition = "m.m_reseller_by = '".$adminid."'";
	}
	$sql = "SELECT ROUND(SUM(rb.rb_bonus_amount), 2) as bonus_total FROM members m
			INNER JOIN member_referal_bonus rb ON m.m_id = rb.rb_bonus_paid_to
			WHERE ".$where_condition;
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
			
	$bonus_total = $row['bonus_total'];
	
	return $bonus_total;
}

function totalMainAccountReseller($adminid, $conn){
	
	$sql_fund = "SELECT ROUND(SUM(rf_amount), 2) as rf_amount FROM reseller_fund WHERE rf_reseller_id = '".$adminid."'";
	$result_fund = mysqli_query($conn, $sql_fund);
	$row_fund = mysqli_fetch_assoc($result_fund);
	
	$sql_deposit = "SELECT ROUND(SUM(md.md_actual_amount), 2) as  md_actual_amount FROM members m
					INNER JOIN member_deposit md ON md.md_member = m.m_id
					WHERE m.m_reseller_by = '".$adminid."'";
	$result_deposit = mysqli_query($conn, $sql_deposit);
	$row_deposit = mysqli_fetch_assoc($result_deposit);
	
	$reseller_main_account = $row_fund['rf_amount'] - $row_deposit['md_actual_amount'];
	return $reseller_main_account;
}

function dateDifference($fromDt, $toDt){
	
	$fromdate = new DateTime($fromDt);
	$todate = new DateTime($toDt);
	$date1=date_create($fromdate->format('Y-m-d'));
	$date2=date_create($todate->format('Y-m-d'));
	$diff=date_diff($date1,$date2);
	$timeDiff = $diff->format("%R%a");

	return $timeDiff;
}

function countPendingDeposit($conn){
	
	$sql_deposit = "SELECT COUNT(md_id) as pending_deposit FROM member_deposit WHERE md_status = '0'";
	$result_deposit = mysqli_query($conn, $sql_deposit);
	$row_deposit = mysqli_fetch_assoc($result_deposit);
	
	return $row_deposit['pending_deposit'];
}

function countPendingWithdraw($conn){
	
	$sql_withdraw = "SELECT COUNT(mw_id) as pending_withdraw FROM member_withdraw WHERE mw_status = '0'";
	$result_withdraw = mysqli_query($conn, $sql_withdraw);
	$row_withdraw = mysqli_fetch_assoc($result_withdraw);
	
	return $row_withdraw['pending_withdraw'];
}

function getMasterbyAdminid($conn, $adminid){
	
	$sqlmaster = "SELECT a_master_by FROM administrators WHERE a_id = '".$adminid."'";
	$resultmaster = mysqli_query($conn, $sqlmaster);
	$rowmaster = mysqli_fetch_assoc($resultmaster);
	
	return $rowmaster['a_master_by'];
}






function totalGPMainAccount($userid, $with_expiry, $conn, $trading = true){
	$today = date('Y-m-d');
	
        $sql = "SELECT ROUND(SUM(md.md_actual_amount),2) as total_deposit FROM member_deposit md WHERE md_depost_type='1' and md.md_status = '1' AND md.md_member = '".$userid."'";
	if($with_expiry){
		$sql .= " AND md.md_expiry > '".$today."'";
	}
	$result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	$total_gp = $res['total_deposit'];
        
        
        $sql1 = "SELECT ROUND(SUM(md.md_actual_amount),2) as total_deposit FROM member_deposit md WHERE md_depost_type='2' and md.md_status = '1' AND md.md_member = '".$userid."'";
	
	$result1 = mysqli_query($conn, $sql1);
	$res1 = mysqli_fetch_assoc($result1);
	$total_gp_dp = $res1['total_deposit'];
        
        
	$sql = "SELECT ROUND(SUM(md.md_actual_amount),2) as total_deposit FROM member_deposit md WHERE md.md_status = '1' AND md.md_member = '".$userid."'";
	if($with_expiry){
		$sql .= " AND md.md_expiry > '".$today."'";
	}
	$result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	$total_deposit = $res['total_deposit'];
	
	$sqlr = "SELECT ROUND(SUM(md.md_rewards_amount),2) as total_rewards FROM member_deposit md WHERE md.md_status = '1' AND md.md_member = '".$userid."'";
	if($with_expiry){
		$sqlr .= " AND md.md_expiry > '".$today."'";
	}
	$resultr = mysqli_query($conn, $sqlr);
	$resr = mysqli_fetch_assoc($resultr);
	$total_rewards = $resr['total_rewards'];
	
	if($with_expiry){
		$total_renew = 0;
	} else {
		$sqlrenew = "SELECT ROUND(SUM(md.md_actual_amount),2) as total_renew FROM member_deposit md WHERE md.md_type = 'Renew' AND md.md_status IN(0,2) AND md.md_member = '".$userid."'";
		$resultrenew = mysqli_query($conn, $sqlrenew);
		$resrenew = mysqli_fetch_assoc($resultrenew);
		$total_renew = $resrenew['total_renew'];
	}
	
	$sqltransfer = "SELECT ROUND(SUM(mt_amount), 2) as transfer_amount FROM member_transfer WHERE mt_member_id = '".$userid."' AND mt_status = '1'";
	$resulttransfer = mysqli_query($conn, $sqltransfer);
	$rowtransfer = mysqli_fetch_assoc($resulttransfer);
	$transfer_amount = $rowtransfer['transfer_amount'];
	
	//Subtract
	if($trading){
		$sqltr = "SELECT ROUND(SUM(mt_amount), 2) as trading_amount FROM member_trading WHERE mt_member = '".$userid."' AND mt_status IN (0,1) AND mt_delete = '0'";
		$resulttr = mysqli_query($conn, $sqltr);
		$rowtr = mysqli_fetch_assoc($resulttr);
		$trading_amount = $rowtr['trading_amount'];
	} else {
		$trading_amount = 0;
	}
	 $sqlgfundbonus = "SELECT (SUM(mgft_amount)) as mgft_amount FROM member_gf_transfer WHERE mgft_member_id = '".$userid."' AND mgft_status = '1'";
	$resultgfb = mysqli_query($conn, $sqlgfundbonus);
	$rowgfb = mysqli_fetch_assoc($resultgfb);
	$gfb_amount = $rowgfb['mgft_amount'];
        
        
	$gp_main_account = ($total_gp+$gfb_amount)-($total_gp_dp);
	
	return number_format((float)$gp_main_account, 2, '.', '');
}
?>