<?php

$as_topup_limit = '';
$as_withdraw_limit = '';

$sql="SELECT ROUND(as_topup_limit, 2) as as_topup_limit, ROUND(as_withdraw_limit, 2) as as_withdraw_limit, ROUND(as_withdraw_service, 2) as as_withdraw_service, as_trading_min, as_trading_max,as_fund_payout_per,as_gp_expiry_date FROM admin_setting WHERE as_id='1' AND as_status = '1'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$as_topup_limit = $row['as_topup_limit'];
$as_withdraw_limit = $row['as_withdraw_limit'];
$as_withdraw_service = $row['as_withdraw_service'];
$as_trading_min = $row['as_trading_min'];
$as_trading_max = $row['as_trading_max'];
$as_fund_payout_per = $row['as_fund_payout_per'];
$as_gp_expiry_date = $row['as_gp_expiry_date'];


?>