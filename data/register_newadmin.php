<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$a_username = $_POST['user_name'];
    $a_password = $_POST['password'];
    $a_fullname = $_POST['full_name'];
    $a_status = $_POST['status'];
	$a_master_by = $_POST['master_by'];
    
	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		$admin = $_SESSION['master'];
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$admin = $_SESSION['supermaster'];
	}

	$admin_id = getUseridbyUsername($admin, $conn);
	$hash_password = password_hash($a_password, PASSWORD_DEFAULT);
	
	if($a_username != '' && $a_password != '' && $a_fullname != ''){
		
		if(preg_match('/[^a-z_\-0-9]/i',$a_username)){
			header('Location: ../admin_add.php?error=3');
		} else {
	   
		   $sqlcheck="SELECT * FROM administrators WHERE a_username='".$a_username."'";
		   $result = mysqli_query($conn, $sqlcheck);
		   
		   if (mysqli_num_rows($result) > 0) {
				header('Location: ../admin_add.php?error=1');
		   } else {
				$sql = "INSERT INTO administrators (a_username, a_password, a_name, a_type, a_registered_by, a_master_by, a_status) VALUES ('".$a_username."', '".$hash_password."', '".$a_fullname."', '2', '".$admin_id."', '".$a_master_by."', '".$a_status."')";
			
				mysqli_query($conn, $sql);
				 
				header('Location: ../admin_list.php');
				
		   }
		}
        	
	} else {
		header('Location: ../admin_add.php?error=2');
	}

?>