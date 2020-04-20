<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$a_password = $_POST['password'];
	$a_repeat = $_POST['password_repeat'];
    	
	if($_SESSION['master'] != ''){
		$admin_username = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$admin_username = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$admin_username = $_SESSION['admin'];
	} else {
		$admin_username = $_SESSION['reseller'];
	}
	
	$admin_id = getUseridbyUsername($admin_username, $conn);
	
	if($a_password != '' && $a_repeat != ''){
		if($a_password == $a_repeat){
			$hash_password = password_hash($a_password, PASSWORD_DEFAULT);
			$sql = "UPDATE administrators SET a_password = '".$hash_password."' WHERE a_id = '".$admin_id."'";
            mysqli_query($conn, $sql);
			header('Location: ../admin.php');
		} else {
			header('Location: ../change_password.php?error=1');
		}
	} else {
		header('Location: ../change_password.php?error=2');
	}

?>