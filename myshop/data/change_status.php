<?php
    include_once '../session.php';
    include_once '../../conn.php';
    include_once 'functions.php';

	//Fetching Values from URL
	$id = $_POST['id'];
	$status = $_POST['status'];
    $tbl = $_POST['tbl'];
    $msg = $_POST['msg'];
    
    if($msg == '' || $msg == 'undefined'){
        $reject_msg = '';
    } else {
        $reject_msg = $msg;
    }
    
    if($_SESSION['master'] != ''){
		$approved_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$approved_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$approved_by = $_SESSION['admin'];
	} else {
		$approved_by = $_SESSION['reseller'];
	}
	
	$approve_by_id = getUseridbyUsername($approved_by, $conn);
    
	
	if($id != '' && $status != ''){
	    if($tbl == 'withdraw'){
            $sql = "UPDATE member_withdraw SET mw_status = '".$status."', mw_approved_by = '".$approve_by_id."', mw_message = '".$reject_msg."' WHERE mw_id ='".$id."'";
        } 
		
        $sqlres = mysqli_query($conn, $sql);
        
        echo $sqlres;
    }
?>