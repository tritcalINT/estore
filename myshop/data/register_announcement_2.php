<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$a2_title = $_POST['announcement_title'];
	$a2_description = $_POST['announcement_footer'];
    $a2_status = $_POST['status'];
    
	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		$admin = $_SESSION['master'];
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$admin = $_SESSION['supermaster'];
	} else {
		$admin = $_SESSION['admin'];
	}
    
	$admin_id = getUseridbyUsername($admin, $conn);
	
	$target_dir = "../../uploads/announcement2/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(basename($_FILES["fileToUpload"]["name"]) != ''){
        $newfilename = round(microtime(true)) . '.' . $uploadFileType;
        if($uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" && $uploadFileType != "gif" && $uploadFileType != "JPG" && $uploadFileType != "PNG" && $uploadFileType != "JPEG" && $uploadFileType != "GIF") {
            $fail = "1";
        } else {
            $fail = "0"; 
        }
    }
	
	if($fail == "1") {
	      header('Location: ../announcement_2_add.php?error=2');	   
    } else {
		if($a2_title != '' && $a2_description != ''){
			
			$sql = "INSERT INTO announcement_2 (a2_title, a2_description, a2_pic, a2_status, a2_created_by) VALUES ('".$a2_title."', '".$a2_description."', '".$newfilename."', '".$a2_status."', '".$admin_id."')";
		
			mysqli_query($conn, $sql);
			
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename);
			 
			header('Location: ../announcement_2.php');
				
		} else {
			header('Location: ../announcement_2_add.php?error=1');
		}
	}

?>