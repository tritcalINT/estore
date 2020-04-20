<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$a1_id = $_POST['id'];
	$a1_title = $_POST['announcement_title'];
	$a1_description = $_POST['announcement_footer'];
    $a1_status = $_POST['status'];
    	
	if($_SESSION['master'] != ''){
		$updated_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$updated_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$updated_by = $_SESSION['admin'];
	}
	
	$update_by_id = getUseridbyUsername($updated_by, $conn);
	
	$target_dir = "../../uploads/announcement1/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(basename($_FILES["fileToUpload"]["name"]) != ''){
        $newfilename = round(microtime(true)) . '.' . $uploadFileType;
        if($uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" && $uploadFileType != "gif" && $uploadFileType != "JPG" && $uploadFileType != "PNG" && $uploadFileType != "JPEG" && $uploadFileType != "GIF") {
            $fail = "1";
        } else {
            $fail = "0"; 
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename);
			$sql_pic = ", a1_pic = '".$newfilename."'";
        }
		
    }
	
	if($a1_title != '' && $a1_description != ''){
            $sql = "UPDATE announcement_1 SET a1_title = '".$a1_title."', a1_description = '".$a1_description."', a1_status = '".$a1_status."', a1_created_by = '".$update_by_id."' " .$sql_pic." WHERE a1_id = '".$a1_id."'";
            mysqli_query($conn, $sql);
            header('Location: ../announcement_1.php');	
	} else {
		header('Location: ../announcement_1_add.php?error=1&action=update&a1='.$a1_id);
	}

?>