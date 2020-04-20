<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$ln_id = $_POST['id'];
	$ln_title = $_POST['news_title'];
    $ln_date = $_POST['news_date'];
	$ln_description = $_POST['news_description'];
    $ln_status = $_POST['status'];
    	
	if($_SESSION['master'] != ''){
		$updated_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$updated_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$updated_by = $_SESSION['admin'];
	}
	
	$update_by_id = getUseridbyUsername($updated_by, $conn);
	
	$target_dir = "../../uploads/news/";
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
	
	if($ln_title != '' && $ln_date != '' && $ln_description != ''){
            $sql = "UPDATE latest_news SET ln_title = '".$ln_title."', ln_date = '".$ln_date."', ln_description = '".$ln_description."', ln_status = '".$ln_status."', ln_created_by = '".$update_by_id."' " .$sql_pic." WHERE ln_id = '".$ln_id."'";
            mysqli_query($conn, $sql);
            header('Location: ../news_list.php');	
	} else {
		header('Location: ../news_add.php?error=1&action=update&ln='.$ln_id);
	}

?>