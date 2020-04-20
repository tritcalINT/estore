<?php
include_once 'functions.php';



if(isset($_GET['action'])) {
	if ($_GET['action'] == 'details') {
		if (!empty($_GET['m'])) {
			$member_id = $_GET['m'];
			$member_referal = $_GET['r'];
			
			
			
			if($_SESSION['master'] != ''){
				
				$sql = "SELECT md.md_id, md.md_reference, md.md_amount, DATE_FORMAT(md.md_date, '%d/%m/%Y %h:%i %p') as deposit_date, md.md_slip, md.md_status, md.md_type, md.md_rewards_percent, ROUND(md.md_rewards_amount, 2) as md_rewards_amount, mp.mp_name, ROUND(mp.mp_price_dollar, 2) as mp_price_dollar, cu.cu_name, cu.cu_decimal, m.m_username FROM member_deposit md
					LEFT JOIN member_package mp ON mp.mp_id = md.md_package
					LEFT JOIN currency cu ON cu.cu_id = md.md_currency
					LEFT JOIN members m ON m.m_id = md.md_member
					WHERE m.m_id = '".$member_id."' AND m.m_referal = '".$member_referal."' ORDER BY md.md_date DESC";
					
			} else if($_SESSION['admin'] != ''){
				
				$admin_by = getUseridbyUsername($_SESSION['admin'], $conn);
				$sql = "SELECT md.md_id, md.md_reference, md.md_amount, DATE_FORMAT(md.md_date, '%d/%m/%Y %h:%i %p') as deposit_date, md.md_slip, md.md_status, md.md_type, md.md_rewards_percent, ROUND(md.md_rewards_amount, 2) as md_rewards_amount, mp.mp_name, ROUND(mp.mp_price_dollar, 2) as mp_price_dollar, cu.cu_name, cu.cu_decimal, m.m_username FROM member_deposit md
					LEFT JOIN member_package mp ON mp.mp_id = md.md_package
					LEFT JOIN currency cu ON cu.cu_id = md.md_currency
					LEFT JOIN members m ON m.m_id = md.md_member
					WHERE m.m_id = '".$member_id."' AND m.m_referal = '".$member_referal."' AND m.m_admin_by = '".$admin_by."' ORDER BY md.md_date DESC";
					
			} else if($_SESSION['reseller'] != ''){
				
				$reseller_id = getUseridbyUsername($_SESSION['reseller'], $conn);
				$sql = "SELECT md.md_id, md.md_reference, md.md_amount, DATE_FORMAT(md.md_date, '%d/%m/%Y %h:%i %p') as deposit_date, md.md_slip, md.md_status, md.md_type, md.md_rewards_percent, ROUND(md.md_rewards_amount, 2) as md_rewards_amount, mp.mp_name, ROUND(mp.mp_price_dollar, 2) as mp_price_dollar, cu.cu_name, cu.cu_decimal, m.m_username FROM member_deposit md
					LEFT JOIN member_package mp ON mp.mp_id = md.md_package
					LEFT JOIN currency cu ON cu.cu_id = md.md_currency
					LEFT JOIN members m ON m.m_id = md.md_member
					WHERE m.m_id = '".$member_id."' AND m.m_referal = '".$member_referal."' AND m.m_reseller_by = '".$reseller_id."' ORDER BY md.md_date DESC";
				
			}
			
			$result = mysqli_query($conn, $sql);
			$member_username = getMemberUsernamebyUserid($member_id, $conn);
			
			
			
			$member_package = getMemberpackage($member_id, '1', $conn);
			$current_package = $member_package['mp_id'];
			$members = [];
			$member_total_bonus = '0.00';
			$a = 0;
			$b = 0;
			$c = 0;
			$d = 0;
			$e = 0;
			$f = 0;
			$g = 0;
			$h = 0;
			$i = 0;
			$j = 0;
			$k = 0;
			$l = 0;
			$m = 0;
			$n = 0;
			$o = 0;
			$p = 0;
			$q = 0;
			$r = 0;
			$s = 0;
			$t = 0;
			$u = 0;
			if($current_package != '') {

					$sql_level1 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m
							WHERE m.m_upline = '".$member_id."' ORDER BY m.m_register_date DESC";

					$result_level1 = mysqli_query($conn, $sql_level1);
					
					while($row_level1 = mysqli_fetch_assoc($result_level1)) {
						$member_id_level_1 = $row_level1['m_id'];
						$members[0][$a]['m_id'] = $row_level1['m_id'];
						$members[0][$a]['m_register_date'] = $row_level1['m_register_date'];
						$members[0][$a]['m_name'] = $row_level1['m_name'];
						$members[0][$a]['m_username'] = $row_level1['m_username'];
						$a++;
						
						$sql_level2 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m			
							WHERE m.m_upline = '".$member_id_level_1."' ORDER BY m.m_register_date DESC";
						
							$result_level2 = mysqli_query($conn, $sql_level2);
							
							while($row_level2 = mysqli_fetch_assoc($result_level2)) {
								$member_id_level_2 = $row_level2['m_id'];
								$members[1][$b]['m_id'] = $row_level2['m_id'];
								$members[1][$b]['m_register_date'] = $row_level2['m_register_date'];
								$members[1][$b]['m_name'] = $row_level2['m_name'];
								$members[1][$b]['m_username'] = $row_level2['m_username'];
								$b++;
								
								$sql_level3 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m					
									WHERE m.m_upline = '".$member_id_level_2."' ORDER BY m.m_register_date DESC";
										
									$result_level3 = mysqli_query($conn, $sql_level3);
									while($row_level3 = mysqli_fetch_assoc($result_level3)) {
										$member_id_level_3 = $row_level3['m_id'];
										$members[2][$c]['m_id'] = $row_level3['m_id'];
										$members[2][$c]['m_register_date'] = $row_level3['m_register_date'];
										$members[2][$c]['m_name'] = $row_level3['m_name'];
										$members[2][$c]['m_username'] = $row_level3['m_username'];
										$c++;
										
										$sql_level4 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m						
											WHERE m.m_upline = '".$member_id_level_3."' ORDER BY m.m_register_date DESC";
											
										$result_level4 = mysqli_query($conn, $sql_level4);
										while($row_level4 = mysqli_fetch_assoc($result_level4)) {
											$member_id_level_4 = $row_level4['m_id'];
											$members[3][$d]['m_id'] = $row_level4['m_id'];
											$members[3][$d]['m_register_date'] = $row_level4['m_register_date'];
											$members[3][$d]['m_name'] = $row_level4['m_name'];
											$members[3][$d]['m_username'] = $row_level4['m_username'];
											$d++;
											
											$sql_level5 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m								
												WHERE m.m_upline = '".$member_id_level_4."' ORDER BY m.m_register_date DESC";
												
											$result_level5 = mysqli_query($conn, $sql_level5);
											while($row_level5 = mysqli_fetch_assoc($result_level5)) {
												$member_id_level_5 = $row_level5['m_id'];
												$members[4][$e]['m_id'] = $row_level5['m_id'];
												$members[4][$e]['m_register_date'] = $row_level5['m_register_date'];
												$members[4][$e]['m_name'] = $row_level5['m_name'];
												$members[4][$e]['m_username'] = $row_level5['m_username'];
												$e++;
												
												$sql_level6 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m											
													WHERE m.m_upline = '".$member_id_level_5."' ORDER BY m.m_register_date DESC";
													
												$result_level6 = mysqli_query($conn, $sql_level6);
												while($row_level6 = mysqli_fetch_assoc($result_level6)) {
													$member_id_level_6 = $row_level6['m_id'];
													$members[5][$f]['m_id'] = $row_level6['m_id'];
													$members[5][$f]['m_register_date'] = $row_level6['m_register_date'];
													$members[5][$f]['m_name'] = $row_level6['m_name'];
													$members[5][$f]['m_username'] = $row_level6['m_username'];
													$f++;
													
													$sql_level7 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m											
													WHERE m.m_upline = '".$member_id_level_6."' ORDER BY m.m_register_date DESC";
													
													$result_level7 = mysqli_query($conn, $sql_level7);
													while($row_level7 = mysqli_fetch_assoc($result_level7)) {
														$member_id_level_7 = $row_level7['m_id'];
														$members[6][$g]['m_id'] = $row_level7['m_id'];
														$members[6][$g]['m_register_date'] = $row_level7['m_register_date'];
														$members[6][$g]['m_name'] = $row_level7['m_name'];
														$members[6][$g]['m_username'] = $row_level7['m_username'];
														$g++;
														
														$sql_level8 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m												
														WHERE m.m_upline = '".$member_id_level_7."' ORDER BY m.m_register_date DESC";
														
														$result_level8 = mysqli_query($conn, $sql_level8);
														while($row_level8 = mysqli_fetch_assoc($result_level8)) {
															$member_id_level_8 = $row_level8['m_id'];
															$members[7][$h]['m_id'] = $row_level8['m_id'];
															$members[7][$h]['m_register_date'] = $row_level8['m_register_date'];
															$members[7][$h]['m_name'] = $row_level8['m_name'];
															$members[7][$h]['m_username'] = $row_level8['m_username'];
															$h++;
															
															$sql_level9 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m													
															WHERE m.m_upline = '".$member_id_level_8."' ORDER BY m.m_register_date DESC";
															
															$result_level9 = mysqli_query($conn, $sql_level9);
															while($row_level9 = mysqli_fetch_assoc($result_level9)) {
																$member_id_level_9 = $row_level9['m_id'];
																$members[8][$i]['m_id'] = $row_level9['m_id'];
																$members[8][$i]['m_register_date'] = $row_level9['m_register_date'];
																$members[8][$i]['m_name'] = $row_level9['m_name'];
																$members[8][$i]['m_username'] = $row_level9['m_username'];
																$i++;
																
																$sql_level10 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m														
																WHERE m.m_upline = '".$member_id_level_9."' ORDER BY m.m_register_date DESC";
																
																$result_level10 = mysqli_query($conn, $sql_level10);
																while($row_level10 = mysqli_fetch_assoc($result_level10)) {
																	$member_id_level_10 = $row_level10['m_id'];
																	$members[9][$j]['m_id'] = $row_level10['m_id'];
																	$members[9][$j]['m_register_date'] = $row_level10['m_register_date'];
																	$members[9][$j]['m_name'] = $row_level10['m_name'];
																	$members[9][$j]['m_username'] = $row_level10['m_username'];
																	$j++;
																	
																	$sql_level11 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m															
																	WHERE m.m_upline = '".$member_id_level_10."' ORDER BY m.m_register_date DESC";
																	
																	$result_level11 = mysqli_query($conn, $sql_level11);
																	while($row_level11 = mysqli_fetch_assoc($result_level11)) {
																		$member_id_level_11 = $row_level11['m_id'];
																		$members[10][$k]['m_id'] = $row_level11['m_id'];
																		$members[10][$k]['m_register_date'] = $row_level11['m_register_date'];
																		$members[10][$k]['m_name'] = $row_level11['m_name'];
																		$members[10][$k]['m_username'] = $row_level11['m_username'];
																		$k++;
																		
																		$sql_level12 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m																
																		WHERE m.m_upline = '".$member_id_level_11."' ORDER BY m.m_register_date DESC";
																		
																		$result_level12 = mysqli_query($conn, $sql_level12);
																		while($row_level12 = mysqli_fetch_assoc($result_level12)) {
																			$member_id_level_12 = $row_level12['m_id'];
																			$members[11][$l]['m_id'] = $row_level12['m_id'];
																			$members[11][$l]['m_register_date'] = $row_level12['m_register_date'];
																			$members[11][$l]['m_name'] = $row_level12['m_name'];
																			$members[11][$l]['m_username'] = $row_level12['m_username'];
																			$l++;
																			
																			$sql_level13 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m
																			WHERE m.m_upline = '".$member_id_level_12."' ORDER BY m.m_register_date DESC";
																			
																			$result_level13 = mysqli_query($conn, $sql_level13);
																			while($row_level13 = mysqli_fetch_assoc($result_level13)) {
																				$member_id_level_13 = $row_level13['m_id'];
																				$members[12][$m]['m_id'] = $row_level13['m_id'];
																				$members[12][$m]['m_register_date'] = $row_level13['m_register_date'];
																				$members[12][$m]['m_name'] = $row_level13['m_name'];
																				$members[12][$m]['m_username'] = $row_level13['m_username'];
																				$m++;
																				
																				$sql_level14 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m
																				WHERE m.m_upline = '".$member_id_level_13."' ORDER BY m.m_register_date DESC";
																				
																				$result_level14 = mysqli_query($conn, $sql_level14);
																				while($row_level14 = mysqli_fetch_assoc($result_level14)) {
																					$member_id_level_14 = $row_level14['m_id'];
																					$members[13][$n]['m_id'] = $row_level14['m_id'];
																					$members[13][$n]['m_register_date'] = $row_level14['m_register_date'];
																					$members[13][$n]['m_name'] = $row_level14['m_name'];
																					$members[13][$n]['m_username'] = $row_level14['m_username'];
																					$n++;
																					
																					$sql_level15 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m
																					WHERE m.m_upline = '".$member_id_level_14."' ORDER BY m.m_register_date DESC";
																					
																					$result_level15 = mysqli_query($conn, $sql_level15);
																					while($row_level15 = mysqli_fetch_assoc($result_level15)) {
																						$member_id_level_15 = $row_level15['m_id'];
																						$members[14][$o]['m_id'] = $row_level15['m_id'];
																						$members[14][$o]['m_register_date'] = $row_level15['m_register_date'];
																						$members[14][$o]['m_name'] = $row_level15['m_name'];
																						$members[14][$o]['m_username'] = $row_level15['m_username'];
																						$o++;
																						
																						$sql_level16 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m	
																						WHERE m.m_upline = '".$member_id_level_15."' ORDER BY m.m_register_date DESC";
																						
																						$result_level16 = mysqli_query($conn, $sql_level16);
																						while($row_level16 = mysqli_fetch_assoc($result_level16)) {
																							$member_id_level_16 = $row_level16['m_id'];
																							$members[15][$p]['m_id'] = $row_level16['m_id'];
																							$members[15][$p]['m_register_date'] = $row_level16['m_register_date'];
																							$members[15][$p]['m_name'] = $row_level16['m_name'];
																							$members[15][$p]['m_username'] = $row_level16['m_username'];
																							$p++;
																							
																							$sql_level17 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m
																							WHERE m.m_upline = '".$member_id_level_16."' ORDER BY m.m_register_date DESC";
																							
																							$result_level17 = mysqli_query($conn, $sql_level17);
																							while($row_level17 = mysqli_fetch_assoc($result_level17)) {
																								$member_id_level_17 = $row_level17['m_id'];
																								$members[16][$q]['m_id'] = $row_level17['m_id'];
																								$members[16][$q]['m_register_date'] = $row_level17['m_register_date'];
																								$members[16][$q]['m_name'] = $row_level17['m_name'];
																								$members[16][$q]['m_username'] = $row_level17['m_username'];
																								$q++;
																								
																								$sql_level18 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m	
																								WHERE m.m_upline = '".$member_id_level_17."' ORDER BY m.m_register_date DESC";
																								
																								$result_level18 = mysqli_query($conn, $sql_level18);
																								while($row_level18 = mysqli_fetch_assoc($result_level18)) {
																									$member_id_level_18 = $row_level18['m_id'];
																									$members[17][$r]['m_id'] = $row_level18['m_id'];
																									$members[17][$r]['m_register_date'] = $row_level18['m_register_date'];
																									$members[17][$r]['m_name'] = $row_level18['m_name'];
																									$members[17][$r]['m_username'] = $row_level18['m_username'];
																									$r++;
																									
																									$sql_level19 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m	
																									WHERE m.m_upline = '".$member_id_level_18."' ORDER BY m.m_register_date DESC";
																									
																									$result_level19 = mysqli_query($conn, $sql_level19);
																									while($row_level19 = mysqli_fetch_assoc($result_level19)) {
																										$member_id_level_19 = $row_level19['m_id'];
																										$members[18][$s]['m_id'] = $row_level19['m_id'];
																										$members[18][$s]['m_register_date'] = $row_level19['m_register_date'];
																										$members[18][$s]['m_name'] = $row_level19['m_name'];
																										$members[18][$s]['m_username'] = $row_level19['m_username'];
																										$s++;
																										
																										$sql_level20 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m	
																										WHERE m.m_upline = '".$member_id_level_19."' ORDER BY m.m_register_date DESC";
																										
																										$result_level20 = mysqli_query($conn, $sql_level20);
																										while($row_level20 = mysqli_fetch_assoc($result_level20)) {
																											$member_id_level_20 = $row_level20['m_id'];
																											$members[19][$t]['m_id'] = $row_level20['m_id'];
																											$members[19][$t]['m_register_date'] = $row_level20['m_register_date'];
																											$members[19][$t]['m_name'] = $row_level20['m_name'];
																											$members[19][$t]['m_username'] = $row_level20['m_username'];
																											$t++;
																											
																											$sql_level21 = "SELECT m.m_id,  m.m_username, m.m_name, DATE_FORMAT(m.m_register_date, '%d/%m/%Y %h:%i %p') as m_register_date FROM members m
																											WHERE m.m_upline = '".$member_id_level_20."' ORDER BY m.m_register_date DESC";
																											
																											$result_level21 = mysqli_query($conn, $sql_level21);
																											while($row_level21 = mysqli_fetch_assoc($result_level21)) {
																												$member_id_level_21 = $row_level21['m_id'];
																												$members[20][$u]['m_id'] = $row_level21['m_id'];
																												$members[20][$u]['m_register_date'] = $row_level21['m_register_date'];
																												$members[20][$u]['m_name'] = $row_level21['m_name'];
																												$members[20][$u]['m_username'] = $row_level21['m_username'];
																												$u++;
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
					
			$sql_bonus_1 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
				FROM `member_referal_bonus` rb 
				LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
				LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
				WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '1' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_1 = mysqli_query($conn, $sql_bonus_1);


			$sql_bonus_2 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '2' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_2 = mysqli_query($conn, $sql_bonus_2);


			$sql_bonus_3 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '3' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_3 = mysqli_query($conn, $sql_bonus_3);


			$sql_bonus_4 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '4' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_4 = mysqli_query($conn, $sql_bonus_4);


			$sql_bonus_5 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '5' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_5 = mysqli_query($conn, $sql_bonus_5);


			$sql_bonus_6 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '6' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_6 = mysqli_query($conn, $sql_bonus_6);


			$sql_bonus_7 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '7' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_7 = mysqli_query($conn, $sql_bonus_7);					


			$sql_bonus_8 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '8' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_8 = mysqli_query($conn, $sql_bonus_8);


			$sql_bonus_9 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '9' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_9 = mysqli_query($conn, $sql_bonus_9);


			$sql_bonus_10 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '10' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_10 = mysqli_query($conn, $sql_bonus_10);

			$sql_bonus_11 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '11' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_11 = mysqli_query($conn, $sql_bonus_11);

			$sql_bonus_12 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '12' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_12 = mysqli_query($conn, $sql_bonus_12);

			$sql_bonus_13 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '13' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_13 = mysqli_query($conn, $sql_bonus_13);

			$sql_bonus_14 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '14' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_14 = mysqli_query($conn, $sql_bonus_14);

			$sql_bonus_15 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '15' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_15 = mysqli_query($conn, $sql_bonus_15);

			$sql_bonus_16 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '16' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_16 = mysqli_query($conn, $sql_bonus_16);

			$sql_bonus_17 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '17' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_17 = mysqli_query($conn, $sql_bonus_17);

			$sql_bonus_18 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '18' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_18 = mysqli_query($conn, $sql_bonus_18);

			$sql_bonus_19 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '19' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_19 = mysqli_query($conn, $sql_bonus_19);

			$sql_bonus_20 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '20' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_20 = mysqli_query($conn, $sql_bonus_20);

			$sql_bonus_21 = "SELECT ROUND(rb.rb_bonus_amount, 2) as rb_bonus_amount, ROUND(rb.rb_percent, 2) as rb_percent, rb.rb_bonus_message, DATE_FORMAT(rb.rb_date, '%d/%m/%Y %h:%i %p') as rb_date, m.m_username, ROUND(md.md_actual_amount, 2) as md_actual_amount
							FROM `member_referal_bonus` rb 
							LEFT JOIN members m ON rb.rb_deposit_by = m.m_id
							LEFT JOIN member_deposit md ON rb.rb_deposit_id = md.md_id
							WHERE rb.rb_bonus_paid_to ='".$member_id."' AND rb.rb_level = '21' AND rb.rb_status = '1' AND rb.rb_bonus_amount > 0";
			$result_bonus_21 = mysqli_query($conn, $sql_bonus_21);
			
			
			$member_total_bonus = totalBonusMember($member_id, $conn);
			
				
			}
			
		}
		
		
		$sql_trade_interest = "SELECT ROUND(mti.mti_amount, 2) as mti_amount, ROUND(mti.mti_interest_percent, 2) as mti_interest_percent, ROUND(mti.mti_interest_amount, 2) as mti_interest_amount, DATE_FORMAT(mti.mti_created_date, '%d/%m/%Y %h:%i %p') as mti_created_date, mt.mt_reference, ts.tr_name
							   FROM member_trading_interest mti
							   LEFT JOIN member_trading mt ON mt.mt_id = mti.mti_trading_id
							   LEFT JOIN trade_settings ts ON ts.tr_id = mt.mt_market
							   WHERE mti.mti_member = '".$member_id."'";
		$result_trade_interest = mysqli_query($conn, $sql_trade_interest);
		
		$sql_withdraw = "SELECT mw.mw_id, mw.mw_reference, ROUND(mw.mw_amount, 2) as mw_amount, mw.mw_type, m.m_bank_name, m.m_bank_account_no, m.m_bank_branch, m.m_bitcoin, m.m_litecoin, cu.cu_name, cu.cu_type, DATE_FORMAT(mw.mw_created_date, '%d/%m/%Y %h:%i %p') as withdraw_date, mw.mw_status, ROUND(mw.mw_service, 2) as mw_service, ROUND(mw.mw_amount_currency, 2) as mw_amount_currency, ROUND(mw.mw_actual_amount_currency, 2) as mw_actual_amount_currency, mw.mw_message FROM member_withdraw mw, currency cu, members m WHERE mw.mw_method = cu.cu_id AND m.m_id = mw.mw_member_id AND mw.mw_member_id = '".$member_id."' ORDER BY mw.mw_created_date DESC";
		
		$result_withdraw = mysqli_query($conn, $sql_withdraw);
		
		
		$sql_transfer = "SELECT mt.mt_id, mt.mt_reference, ROUND(mt.mt_amount, 2) as mt_amount, mt.mt_type, DATE_FORMAT(mt.mt_created_date, '%d/%m/%Y %h:%i %p') as transfer_date, mt.mt_status FROM member_transfer mt WHERE mt.mt_member_id = '".$member_id."' ORDER BY mt.mt_created_date DESC";
		
		$result_transfer = mysqli_query($conn, $sql_transfer);
		
	}
}



?>