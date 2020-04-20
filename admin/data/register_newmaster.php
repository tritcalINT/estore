<?php
	include_once '../session_supermaster.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$a_username = $_POST['user_name'];
    $a_password = $_POST['password'];
    $a_fullname = $_POST['full_name'];
    $a_status = $_POST['status'];
    
	if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$admin = $_SESSION['supermaster'];
	}

	$admin_id = getUseridbyUsername($admin, $conn);
	$hash_password = password_hash($a_password, PASSWORD_DEFAULT);
	
	if($a_username != '' && $a_password != '' && $a_fullname != ''){
		
		if(preg_match('/[^a-z_\-0-9]/i',$a_username)){
			header('Location: ../master_add.php?error=3');
		} else {
	   
		   $sqlcheck="SELECT * FROM administrators WHERE a_username='".$a_username."'";
		   $result = mysqli_query($conn, $sqlcheck);
		   
		   if (mysqli_num_rows($result) > 0) {
				header('Location: ../master_add.php?error=1');
		   } else {
				$sql = "INSERT INTO administrators (a_username, a_password, a_name, a_type, a_registered_by, a_status) VALUES ('".$a_username."', '".$hash_password."', '".$a_fullname."', '1', '".$admin_id."', '".$a_status."')";
			
				mysqli_query($conn, $sql);
				 
				header('Location: ../master_list.php');
				
		   }
		}
        	
	} else {
		header('Location: ../master_add.php?error=2');
	}

?>