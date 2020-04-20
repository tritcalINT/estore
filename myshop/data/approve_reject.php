<?php
    include_once '../session.php';
    include_once '../../conn.php';
    include_once 'functions.php';

	//Fetching Values from URL
	$md_id = $_POST['id'];
	$md_status = $_POST['status'];
    $md_tbl = $_POST['tbl'];
    $md_msg = $_POST['msg'];
    
    if($md_msg == '' || $md_msg == 'undefined'){
        $reject_msg = '';
    } else {
        $reject_msg = $md_msg;
    }
    
    if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		$approved_by = $_SESSION['master'];
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$approved_by = $_SESSION['supermaster'];
	} else if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
		$approved_by = $_SESSION['admin'];
	} else {
		$approved_by = $_SESSION['reseller'];
	}
	
	$approve_by_id = getUseridbyUsername($approved_by, $conn);
    
	
	if($md_id != '' && $md_status != ''){
	    if($md_tbl == 'deposit'){
            $sql = "UPDATE member_deposit SET md_status = '".$md_status."', md_approved_by = '".$approve_by_id."', md_message = '".$reject_msg."' WHERE md_id ='".$md_id."'";
			
			$sqlres = mysqli_query($conn, $sql);
        } 
		
        
		
		if($md_status == '1'){
			
			$sql_deposit = "SELECT md_id, md_member, md_actual_amount, md_rewards_amount, md_type FROM member_deposit WHERE  md_depost_type = 0 and md_id ='".$md_id."'";
			$result = mysqli_query($conn, $sql_deposit);
			$row = mysqli_fetch_assoc($result);
			
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
        
        echo $sqlres;
    }
?>