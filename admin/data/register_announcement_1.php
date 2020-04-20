<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$a1_title = $_POST['announcement_title'];
	$a1_description = $_POST['announcement_footer'];
    $a1_status = $_POST['status'];
    
	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		$admin = $_SESSION['master'];
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$admin = $_SESSION['supermaster'];
	} else {
		$admin = $_SESSION['admin'];
	}
    
	$admin_id = getUseridbyUsername($admin, $conn);
	
	$target_dir = "../../uploads/announcement1/";
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
	      header('Location: ../announcement_1_add.php?error=2');	   
    } else {
		if($a1_title != '' && $a1_description != ''){
			
			$sql = "INSERT INTO announcement_1 (a1_title, a1_description, a1_pic, a1_status, a1_created_by) VALUES ('".$a1_title."', '".$a1_description."', '".$newfilename."', '".$a1_status."', '".$admin_id."')";
		
			mysqli_query($conn, $sql);
			
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename);
			 
			header('Location: ../announcement_1.php');
				
		} else {
			header('Location: ../announcement_1_add.php?error=1');
		}
	}

?>