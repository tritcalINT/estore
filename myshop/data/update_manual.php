<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$p_id = $_POST['m_id'];
	$p_title = $_POST['m_title'];
        $p_date = $_POST['m_date'];
	$p_description = $_POST['m_description'];
         $p_status = $_POST['status'];





	if($_SESSION['master'] != ''){
		$updated_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$updated_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$updated_by = $_SESSION['admin'];
	}

	$update_by_id = getUseridbyUsername($updated_by, $conn);

	$target_dir = "../../uploads/manual/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(basename($_FILES["fileToUpload"]["name"]) != ''){
        $newfilename = round(microtime(true)) . '.' . $uploadFileType;
        if($uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" && $uploadFileType != "gif" && $uploadFileType != "JPG" && $uploadFileType != "PNG" && $uploadFileType != "JPEG" && $uploadFileType != "GIF") {
            $fail = "1";
        } else {
            $fail = "0";
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename);
			$sql_pic = ", ln_pic = '".$newfilename."'";
        }

    }

	if($p_title != '' && $p_date != '' && $p_description != ''){
            $sql = "UPDATE member_manual SET m_title = '".$p_title."', m_date = '".$p_date."',m_description = '".$p_description."', m_status = '".$ln_status."', m_created_by = '".$update_by_id."' " .$sql_pic." WHERE p_id = '".$p_id."'";
       
//
            mysqli_query($conn, $sql);
            header('Location: ../tool_list.php');
	} else {
		header('Location: ../user_manual_add.php?error=1&action=update&ln='.$p_id);
	}

?>
