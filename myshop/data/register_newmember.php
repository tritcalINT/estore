<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$m_username = $_POST['user_name'];
    $m_password = $_POST['password'];
    $m_fullname = $_POST['full_name'];
	$m_email = $_POST['email'];
	$m_phone_country = $_POST['phone_country'];
	$m_phone = $_POST['phone'];
	$m_dob = $_POST['dob'];
	$m_admin_by = $_POST['admin_by'];
	$m_master_by = $_POST['master_by'];
	$m_reseller_by = $_POST['reseller'];
	$m_upline = $_POST['upline'];
	$m_referal = md5($_POST['user_name']);
    $m_status = $_POST['status'];
	$m_otp = $_POST['otp'];
	$m_bank_name = $_POST['bank_name'];
	$m_bank_account_no = $_POST['bank_account'];
	$m_bank_branch = $_POST['bank_branch'];
	$m_bitcoin = $_POST['bitcoin'];
	$m_litecoin = $_POST['litecoin'];
	$m_lineid = $_POST['line_id'];
	$m_wechatid = $_POST['wechat_id'];
	$m_whatsapp = $_POST['whatsapp'];
    
    if($_SESSION['master'] != ''){
		$register_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$register_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$register_by = $_SESSION['admin'];
	} else {
		$register_by = $_SESSION['reseller'];
	}
	
	$register_by_id = getUseridbyUsername($register_by, $conn);
	$hash_password = password_hash($m_password, PASSWORD_DEFAULT);
	$hash_otp = password_hash($m_otp, PASSWORD_DEFAULT);
	
	$target_dir = "../../uploads/profile/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(basename($_FILES["fileToUpload"]["name"]) != ''){
        $newfilename = round(microtime(true)) . '.' . $uploadFileType;
        if($uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" && $uploadFileType != "gif" && $uploadFileType != "JPG" && $uploadFileType != "PNG" && $uploadFileType != "JPEG" && $uploadFileType != "GIF") {
            $fail = "1";
        } else {
            $fail = "0"; 
        }
    }
	
	if($fail == "1") {
	      header('Location: ../members_add.php?error=4');
	   
    } else {
		if($m_username != '' && $m_password != '' && $m_fullname != '' && $m_email != ''){
			
			if(preg_match('/[^a-z_\-0-9]/i',$m_username)){
				header('Location: ../members_add.php?error=3');
			} else {
		   
			   $sqlcheck="SELECT * FROM members WHERE m_username='".$m_username."'";
			   $result = mysqli_query($conn, $sqlcheck);
			   
			   if (mysqli_num_rows($result) > 0) {
					header('Location: ../members_add.php?error=1');
			   } else {
					$sql = "INSERT INTO members (m_username, m_password, m_name, m_email, m_dob, m_phone_country, m_phone, m_referal, m_master_by, m_admin_by, m_reseller_by, m_upline, m_register_by, m_status, m_pic, m_otp, m_bank_name, m_bank_account_no, m_bank_branch, m_bitcoin, m_litecoin, m_lineid, m_wechatid, m_whatsapp) VALUES ('".$m_username."', '".$hash_password."', '".$m_fullname."', '".$m_email."', '".$m_dob."', '".$m_phone_country."', '".$m_phone."', '".$m_referal."', '".$m_master_by."', '".$m_admin_by."', '".$m_reseller_by."', '".$m_upline."', '".$register_by_id."',  '".$m_status."', '".$newfilename."', '".$hash_otp."', '".$m_bank_name."', '".$m_bank_account_no."', '".$m_bank_branch."', '".$m_bitcoin."', '".$m_litecoin."', '".$m_lineid."', '".$m_wechatid."', '".$m_whatsapp."')";
				
					mysqli_query($conn, $sql);
					
					move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename);
					 
					header('Location: ../members_list.php');
					
			   }
			}
				
		} else {
			header('Location: ../members_add.php?error=2');
		}
	}

?>