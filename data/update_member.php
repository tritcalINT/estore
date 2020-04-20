<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
    $m_id = $_POST['id'];
    $m_password = $_POST['password'];
    $m_fullname = $_POST['full_name'];
	$m_email = $_POST['email'];
	$m_phone_country = $_POST['phone_country'];
	$m_phone = $_POST['phone'];
	$m_dob = $_POST['dob'];
	$m_master_by = $_POST['master_by'];
	$m_admin_by = $_POST['admin_by'];
	$m_reseller_by = $_POST['reseller'];
	$m_upline = $_POST['upline'];
	$m_referal = $_POST['referal'];
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
    
    if($m_password != ''){
		$hash_password = password_hash($m_password, PASSWORD_DEFAULT);
        $sql_password = ", m_password = '".$hash_password."'";
    }
	
	if($m_otp != ''){
		$hash_otp = password_hash($m_otp, PASSWORD_DEFAULT);
        $sql_otp = ", m_otp = '".$hash_otp."'";
    }
	
	if($_SESSION['master'] != ''){
		$updated_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$updated_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$updated_by = $_SESSION['admin'];
	} else {
		$updated_by = $_SESSION['reseller'];
	}
	
	$update_by_id = getUseridbyUsername($updated_by, $conn);
	$update_by_type = 'a';
	
	$target_dir = "../../uploads/profile/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(basename($_FILES["fileToUpload"]["name"]) != ''){
        $newfilename = round(microtime(true)) . '.' . $uploadFileType;
        if($uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" && $uploadFileType != "gif" && $uploadFileType != "JPG" && $uploadFileType != "PNG" && $uploadFileType != "JPEG" && $uploadFileType != "GIF") {
            $fail = "1";
        } else {
            $fail = "0"; 
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename);
			$sql_pic = ", m_pic = '".$newfilename."'";
        }
		
    }
	
	if($fail == "1") {
	      header('Location: ../members_add.php?error=4&r='.$m_referal.'&action=update&m='.$m_id);
	   
    } else {
		if($m_fullname != '' && $m_email != ''){
				$sql = "UPDATE members SET m_name = '".$m_fullname."', m_email = '".$m_email."', m_phone_country = '".$m_phone_country."', m_phone = '".$m_phone."', m_dob = '".$m_dob."', m_bank_name = '".$m_bank_name."', m_bank_account_no = '".$m_bank_account_no."', m_bank_branch = '".$m_bank_branch."', m_bitcoin = '".$m_bitcoin."', m_litecoin = '".$m_litecoin."', m_lineid = '".$m_lineid."', m_wechatid = '".$m_wechatid."', m_whatsapp = '".$m_whatsapp."', m_master_by = '".$m_master_by."', m_admin_by = '".$m_admin_by."', m_reseller_by = '".$m_reseller_by."', m_upline = '".$m_upline."', m_status = '".$m_status."', m_updated_by = '".$update_by_id."', m_updated_type = '".$update_by_type."' ".$sql_password.$sql_pic.$sql_otp." WHERE m_id = '".$m_id."'";
				mysqli_query($conn, $sql);
				header('Location: ../members_list.php');	
		} else {
			header('Location: ../members_add.php?error=2&r='.$m_referal.'&action=update&m='.$m_id);
		}
	}

?>