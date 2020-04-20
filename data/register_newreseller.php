<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$a_username = $_POST['user_name'];
    $a_password = $_POST['password'];
    $a_fullname = $_POST['full_name'];
	$a_masterby = $_POST['master_by'];
	$a_adminby = $_POST['admin_by'];
    $a_status = $_POST['status'];
	$a_affilate = md5($_POST['user_name']);
	
	if($_SESSION['supermaster'] != ''){
		$supermaster = $_SESSION['supermaster'];
		$supermaster_id = getUseridbyUsername($supermaster, $conn);
		$admin_id = $supermaster_id;
	}
    
	if($_SESSION['master'] != ''){
		$master = $_SESSION['master'];
		$master_id = getUseridbyUsername($master, $conn);
		$admin_id = $master_id;
	}
	
	if($_SESSION['admin'] != ''){
		$admin = $_SESSION['admin'];
		$admin_id = getUseridbyUsername($admin, $conn);
		$a_masterby = getMasterbyAdminid($conn, $admin);
	}

	$hash_password = password_hash($a_password, PASSWORD_DEFAULT);
	
	if($a_adminby != ''){
		$a_admin_by = $a_adminby;
	} else {
		$a_admin_by = $admin_id;
	}
	
	if($a_masterby != ''){
		$a_master_by = $a_masterby;
	} else {
		$a_master_by = $master_id;
	}
	
	if($a_username != '' && $a_password != '' && $a_fullname != ''){
		
		if(preg_match('/[^a-z_\-0-9]/i',$a_username)){
			header('Location: ../reseller_add.php?error=3');
		} else {
	   
		   $sqlcheck="SELECT * FROM administrators WHERE a_username='".$a_username."'";
		   $result = mysqli_query($conn, $sqlcheck);
		   
		   if (mysqli_num_rows($result) > 0) {
				header('Location: ../reseller_add.php?error=1');
		   } else {
				$sql = "INSERT INTO administrators (a_username, a_password, a_name, a_type, a_affilate, a_registered_by, a_master_by, a_admin_by, a_status) VALUES ('".$a_username."', '".$hash_password."', '".$a_fullname."', '3', '".$a_affilate."', '".$admin_id."', '".$a_master_by."', '".$a_admin_by."', '".$a_status."')";
			
				mysqli_query($conn, $sql);
				 
				header('Location: ../reseller_list.php');
				
		   }
		}
        	
	} else {
		header('Location: ../reseller_add.php?error=2');
	}

?>