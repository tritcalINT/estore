<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
    $mp_id = $_POST['id'];
    $mp_referal_1 = $_POST['referal_level_1'];
    $mp_referal_2 = $_POST['referal_level_2'];
    $mp_referal_3 = $_POST['referal_level_3'];
	$mp_referal_4 = $_POST['referal_level_4'];
	$mp_referal_5 = $_POST['referal_level_5'];
	$mp_referal_6 = $_POST['referal_level_6'];
	$mp_referal_7 = $_POST['referal_level_7'];
	$mp_referal_8 = $_POST['referal_level_8'];
    $mp_referal_9 = $_POST['referal_level_9'];
	$mp_referal_10 = $_POST['referal_level_10'];
	$mp_referal_11 = $_POST['referal_level_11'];
	$mp_referal_12 = $_POST['referal_level_12'];
	$mp_referal_13 = $_POST['referal_level_13'];
	$mp_referal_14 = $_POST['referal_level_14'];
	$mp_referal_15 = $_POST['referal_level_15'];
	$mp_referal_16 = $_POST['referal_level_16'];
	$mp_referal_17 = $_POST['referal_level_17'];
	$mp_referal_18 = $_POST['referal_level_18'];
	$mp_referal_19 = $_POST['referal_level_19'];
	$mp_referal_20 = $_POST['referal_level_20'];
	$mp_referal_21 = $_POST['referal_level_21'];
	
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
	
	if($mp_referal_1 != '' && $mp_referal_2 != '' && $mp_referal_3 != '' && $mp_referal_4 != '' && $mp_referal_5 != '' && $mp_referal_6 != '' && $mp_referal_7 != '' && $mp_referal_8 != '' && $mp_referal_9 != '' && $mp_referal_10 != '' && $mp_referal_11 != '' && $mp_referal_12 != '' && $mp_referal_13 != '' && $mp_referal_14 != '' && $mp_referal_15 != '' && $mp_referal_16 != '' && $mp_referal_17 != '' && $mp_referal_18 != '' && $mp_referal_19 != '' && $mp_referal_20 != '' && $mp_referal_21 != ''){
            $sql = "UPDATE member_package SET mp_referal_1 = '".$mp_referal_1."',  mp_referal_2 = '".$mp_referal_2."', mp_referal_3 = '".$mp_referal_3."', mp_referal_4 = '".$mp_referal_4."', mp_referal_5 = '".$mp_referal_5."', mp_referal_6 = '".$mp_referal_6."', mp_referal_7 = '".$mp_referal_7."', mp_referal_8 = '".$mp_referal_8."', mp_referal_9 = '".$mp_referal_9."', mp_referal_10 = '".$mp_referal_10."', mp_referal_11 = '".$mp_referal_11."', mp_referal_12 = '".$mp_referal_12."', mp_referal_13 = '".$mp_referal_13."', mp_referal_14 = '".$mp_referal_14."', mp_referal_15 = '".$mp_referal_15."', mp_referal_16 = '".$mp_referal_16."', mp_referal_17 = '".$mp_referal_17."', mp_referal_18 = '".$mp_referal_18."', mp_referal_19 = '".$mp_referal_19."', mp_referal_20 = '".$mp_referal_20."', mp_referal_21 = '".$mp_referal_21."', mp_referal_registered_by = '".$update_by_id."' WHERE mp_id = '".$mp_id."'";
            mysqli_query($conn, $sql);
            header('Location: ../packages_list.php');	
	} else {
		header('Location: ../packages_add.php?error=1&action=update&mp='.$mp_id);
	}

?>