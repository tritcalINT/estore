<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';
	
	//Fetching Values from URL
	$ms_reply = $_POST['reply_message'];
    $ms_id = $_POST['mid'];
	
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
	
    	if($ms_reply != '' && $ms_id != ''){
			
				$sql_insert = "UPDATE member_support SET ms_reply = '".$ms_reply."', ms_admin_id = '".$register_by_id."' WHERE ms_id = '".$ms_id."'";
				mysqli_query($conn, $sql_insert);
				
				header('Location: ../support_message.php?send=1&action=view&m='.$ms_id);
			
		} else {
			header('Location: ../support_message.php?error=1&action=view&m='.$ms_id);
		}
		
?>