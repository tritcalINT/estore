<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';
	
	//Fetching Values from URL
        
        $md_currency = 13;//$_POST['currency'];
        
	$mt_type = $_POST['transfer_from'];
	$mt_amount = $_POST['amount'];
	$mt_otp = $_POST['otp'];
    
	$member = $_SESSION['member'];
	$member_id = getUseridbyUsername($member, $conn);
	$today = date('Y-m-d H:i:s');

	if($mt_type != '' && $mt_amount != '' && $mt_otp != ''){
		
		$validOTP = validateOTP($member_id, $mt_otp, $conn);
		
		if($validOTP){
			
				if($mt_type == '1'){
					$fund_account = totalThawed($member_id, $conn);
				} else if($mt_type == '2'){
					$fund_account = totalBonusMember($member_id, $conn);
				} else if($mt_type == '4'){
					$fund_account = totalGPayMember($member_id, $conn);
				}
				
				$epsilon = 0.001;
				
				if((abs($fund_account-$mt_amount) < $epsilon) || ($fund_account > $mt_amount) ) {

					$sqllast = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(mt_id) as id FROM member_transfer"))['id'];
					$ref_no = "TM".sprintf('%06d', ($sqllast+1));
				
                                        if($mt_type==4)
                                        {    
                                          $ref_no = "G-TM".sprintf('%06d', ($sqllast+1));
                                          
                                          $expiry_days = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ts_expiry FROM topup_settings WHERE ts_from_amount <= '".$mt_amount."' AND ts_to_amount >= '".$mt_amount."' AND ts_status = '1' ORDER BY ts_id LIMIT 1"))['ts_expiry'];
					
                                        $today = date('Y-m-d H:i:s');
                                        $expiry_date = date('Y-m-d', strtotime($today. ' + '.$expiry_days.' days'));

                                          
//                                              $sql = "INSERT INTO member_transfer (mt_reference, mt_member_id,"
//                                                    . " mt_type, mt_amount) VALUES ('".$ref_no."', '".$member_id."', '".$mt_type."', '".$mt_amount."')";
                                          
                                          $sql = "INSERT INTO member_deposit (md_depost_type,md_status,md_reference, md_member,"
                                                    . " md_amount, md_currency,  md_type, md_actual_amount, md_date,md_expiry) VALUES (2,1,'".$ref_no."',"
                                                    . " '".$member_id."', ".$mt_amount.", '".$md_currency."',  'GP Topup',"
                                                    . " '".$mt_amount."', '".$today."','".$expiry_date."')";
                                        
                                        }else
                                        {
                                            $ref_no = "TM".sprintf('%06d', ($sqllast+1)); 
                                            $sql = "INSERT INTO member_transfer (mt_reference, mt_member_id, mt_type, mt_amount) VALUES ('".$ref_no."', '".$member_id."', '".$mt_type."', '".$mt_amount."')";  
                                        }    
                                        
                                        
                                        mysqli_query($conn, $sql);
					
                                        if($mt_type==4)
                                        {
                                            $sql_lstrec = "SELECT @@IDENTITY AS recid";
                                            $resultlst = mysqli_query($conn, $sql_lstrec);
                                            $rowlr = mysqli_fetch_assoc($resultlst);
                                            $md_id = $rowlr['recid'];
                                          
                        
                                            if($md_id!=0){

                                                    $sql_deposit = "SELECT md_id, md_member, md_actual_amount, md_rewards_amount, md_type FROM member_deposit WHERE  md_id ='".$md_id."'";
                                                    $result = mysqli_query($conn, $sql_deposit);
                                                    $row = mysqli_fetch_assoc($result);

//                                                    var_dump($sql_deposit);
                                                    if($row['md_member'] != ''){
                                                            $member_1 = $row['md_member'];
                                                            $deposit_amount = $row['md_actual_amount'];
                                                            $deposit_id = $row['md_id'];
                                                            $deposit_type = $row['md_type'];
                                                            $rewards_amount = $row['md_rewards_amount'];
                                                            $total_amount = $deposit_amount + $rewards_amount;
                                                         
                                                            if($deposit_type == 'Renew'){
                                                                    $sqlthawed = "INSERT INTO member_deposit_renew(mdr_desposit_id, mdr_member_id, mdr_amount) VALUES('".$md_id."', '".$member_1."', '".$total_amount."')";
                                                                    mysqli_query($conn, $sqlthawed);
                                                            }


                                                            $member_level_2 = payBonusMember($member_1, $member_1, '1', $deposit_amount, $deposit_id, $conn);

                                                            if($member_level_2 != ''){
                                                                    $member_level_3 = payBonusMember($member_1, $member_level_2, '2', $deposit_amount, $deposit_id, $conn);

                                                                    if($member_level_3 != ''){
                                                                            $member_level_4 = payBonusMember($member_1, $member_level_3, '3', $deposit_amount, $deposit_id, $conn);

                                                                            if($member_level_4 != ''){
                                                                                    $member_level_5 = payBonusMember($member_1, $member_level_4, '4', $deposit_amount, $deposit_id, $conn);

                                                                                    if($member_level_5 != ''){
                                                                                            $member_level_6 = payBonusMember($member_1, $member_level_5, '5', $deposit_amount, $deposit_id, $conn);

                                                                                            if($member_level_6 != ''){
                                                                                                    $member_level_7 = payBonusMember($member_1, $member_level_6, '6', $deposit_amount, $deposit_id, $conn);

                                                                                                    if($member_level_7 != ''){
                                                                                                            $member_level_8 = payBonusMember($member_1, $member_level_7, '7', $deposit_amount, $deposit_id, $conn);

                                                                                                            if($member_level_8 != ''){
                                                                                                                    $member_level_9 = payBonusMember($member_1, $member_level_8, '8', $deposit_amount, $deposit_id, $conn);

                                                                                                                    if($member_level_9 != ''){
                                                                                                                            $member_level_10 = payBonusMember($member_1, $member_level_9, '9', $deposit_amount, $deposit_id, $conn);

                                                                                                                            if($member_level_10 != ''){
                                                                                                                                    $member_level_11 = payBonusMember($member_1, $member_level_10, '10', $deposit_amount, $deposit_id, $conn);

                                                                                                                                    if($member_level_11 != ''){
                                                                                                                                            $member_level_12 = payBonusMember($member_1, $member_level_11, '11', $deposit_amount, $deposit_id, $conn);

                                                                                                                                            if($member_level_12 != ''){
                                                                                                                                                    $member_level_13 = payBonusMember($member_1, $member_level_12, '12', $deposit_amount, $deposit_id, $conn);

                                                                                                                                                    if($member_level_13 != ''){
                                                                                                                                                            $member_level_14 = payBonusMember($member_1, $member_level_13, '13', $deposit_amount, $deposit_id, $conn);

                                                                                                                                                            if($member_level_14 != ''){
                                                                                                                                                                    $member_level_15 = payBonusMember($member_1, $member_level_14, '14', $deposit_amount, $deposit_id, $conn);

                                                                                                                                                                    if($member_level_15 != ''){
                                                                                                                                                                            $member_level_16 = payBonusMember($member_1, $member_level_15, '15', $deposit_amount, $deposit_id, $conn);

                                                                                                                                                                            if($member_level_16 != ''){
                                                                                                                                                                                    $member_level_17 = payBonusMember($member_1, $member_level_16, '16', $deposit_amount, $deposit_id, $conn);

                                                                                                                                                                                    if($member_level_17 != ''){
                                                                                                                                                                                            $member_level_18 = payBonusMember($member_1, $member_level_17, '17', $deposit_amount, $deposit_id, $conn);

                                                                                                                                                                                            if($member_level_18 != ''){
                                                                                                                                                                                                    $member_level_19 = payBonusMember($member_1, $member_level_18, '18', $deposit_amount, $deposit_id, $conn);

                                                                                                                                                                                                    if($member_level_19 != ''){
                                                                                                                                                                                                            $member_level_20 = payBonusMember($member_1, $member_level_19, '19', $deposit_amount, $deposit_id, $conn);

                                                                                                                                                                                                            if($member_level_20 != ''){
                                                                                                                                                                                                                    $member_level_21 = payBonusMember($member_1, $member_level_20, '20', $deposit_amount, $deposit_id, $conn);

                                                                                                                                                                                                                    if($member_level_21 != ''){
                                                                                                                                                                                                                            payBonusMember($member_1, $member_level_21, '21', $deposit_amount, $deposit_id, $conn);
                                                                                                                                                                                                                    }
                                                                                                                                                                                                            }
                                                                                                                                                                                                    }
                                                                                                                                                                                            }
                                                                                                                                                                                    }
                                                                                                                                                                            }
                                                                                                                                                                    }
                                                                                                                                                            }
                                                                                                                                                    }
                                                                                                                                            }
                                                                                                                                    }
                                                                                                                            }
                                                                                                                    }
                                                                                                            }
                                                                                                    }
                                                                                            }
                                                                                    }
                                                                            }
                                                                    }
                                                            }

                                                    }

                                            }
                                            //end referal bonus
                                        }        
                                        
                                        
					header('Location: ../history.php?transfer=1&tab=2');
				} else {
					header('Location: ../transfer.php?error=1'); 
				}

		} else {
			header('Location: ../transfer.php?error=2'); 
		}
		
	} else {
		header('Location: ../transfer.php?error=3'); 
	}