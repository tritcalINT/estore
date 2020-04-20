
<?php
	include_once '../include/session.php';
        include_once '../conn.php';
	include_once '../data/functions.php';
       
	
	//Fetching Values from URL
	//$md_currency = $_POST['currency'];
	$md_amount = $_POST['deposit_amount'];
        echo $md_amount;
        exit();
	$md_actual_amount = $_POST['actual_amount'];
	$md_otp = $_POST['otp'];
        $md_card_number = $_POST['card_number'];
        $md_card_type = $_POST['card_type'];
        $md_card_cvv = $_POST['cvv'];
	$member = $_SESSION['member'];
	$member_id = getUseridbyUsername($member, $conn);
	
	$target_dir = "../../uploads/deposit/";
        
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if(basename($_FILES["fileToUpload"]["name"]) != ''){
            $newfilename = round(microtime(true)) . '.' . $uploadFileType;
            if($uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" && $uploadFileType != "gif" && $uploadFileType != "JPG" && $uploadFileType != "PNG" && $uploadFileType != "JPEG" && $uploadFileType != "GIF") {
                $fail = "1";
            } else {
                $fail = "0"; 
            }
        } else {
            $newfilename = '';
            $fail = "0";
        }
	
	if($fail == "1") {
	      header('Location: ../make_g_pay_topup.php?error=1'); 
	   
    } else {
    	if($md_currency != '' && $md_otp != '' && $md_amount != '' && $md_actual_amount != ''){
			
			$validOTP = validateOTP($member_id, $md_otp, $conn);
			
			if($validOTP){
				
				$admin_setting = adminSettings($conn);
				$topup_limit = $admin_setting['as_topup_limit'];
				
				if($topup_limit <= $md_actual_amount){
					$md_actual_dp_amount = $md_actual_amount;
					
					$md_amount_dp = $md_actual_dp_amount* 80/100;
					$fundamt = $md_actual_dp_amount* 20/100;
					
                                        $md_actual_amount =$md_amount_dp;
                                        
					$expiry_days = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ts_expiry FROM topup_settings WHERE ts_from_amount <= '".$md_actual_amount."' AND ts_to_amount >= '".$md_actual_amount."' AND ts_status = '1' ORDER BY ts_id LIMIT 1"))['ts_expiry'];
					
					$today = date('Y-m-d H:i:s');
					$expiry_date = date('Y-m-d', strtotime($today. ' + '.$expiry_days.' days'));
					
					
					$sqllast = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(md_id) as id FROM member_deposit"))['id'];
					$ref_no = "GP".sprintf('%06d', ($sqllast+1));
				
					$sql = "INSERT INTO member_deposit (md_depost_type,md_reference, md_member, md_amount, md_currency, md_slip, md_type, md_actual_amount, md_date, md_expiry,md_fund_amount,md_actual_dp_amount) VALUES (1,'".$ref_no."', '".$member_id."', ".$md_amount.", '".$md_currency."', '".$newfilename."', 'Topup', '".$md_actual_amount."', '".$today."', '".$expiry_date."','".$fundamt."','".$md_actual_dp_amount."')";

                   // echo $sql;

					mysqli_query($conn, $sql);
			
                     //                   exit();
					if($newfilename != ''){
						move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename);
					}
					
					$mail_subject = "Member Top-up Notification";
					$mail_body = "There is a top-up from the member ".$member." on ".$today.". <br/> Kindly login to admin section to approve/reject the deposit.";
					include_once '../../phpmailer/admin_notification.php';
					
					header('Location: ../history.php?topup=1&tab=3');
				} else {
					header('Location: ../make_g_pay_topup.php?error=4'); 
				}
			} else {
				header('Location: ../make_g_pay_topup.php?error=2'); 
			}
			
		} else {
//            header('Location: ../make_g_pay_topup.php?error=3'); 
    	}
	}







