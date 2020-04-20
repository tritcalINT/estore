<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
    $a_id = $_POST['id'];
    $a_name = $_POST['full_name'];
    $a_status = $_POST['status'];
    $a_password = $_POST['password'];
	$a_master_by = $_POST['master_by'];
    
    if($a_password != ''){
		$hash_password = password_hash($a_password, PASSWORD_DEFAULT);
        $sql_password = ", a_password = '".$hash_password."'";
    }
	
	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		$updated_by = $_SESSION['master'];
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$updated_by = $_SESSION['supermaster'];
	} else {
		$updated_by = $_SESSION['admin'];
	}
	
	$update_by_id = getUseridbyUsername($updated_by, $conn);
	
	if($a_name != '' && $a_status != ''){
            $sql = "UPDATE administrators SET a_name = '".$a_name."', a_status = '".$a_status."', a_master_by = '".$a_master_by."', a_updated_by = '".$update_by_id."' ".$sql_password." WHERE a_id = '".$a_id."'";
            mysqli_query($conn, $sql);
            header('Location: ../admin_list.php');	
	} else {
		header('Location: ../admin_add.php?error=2&action=update&a='.$a_id);
	}

?>