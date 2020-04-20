<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';



	//Fetching Values from URL
	$ln_title = $_POST['m_title'];
    $ln_date = $_POST['news_date'];
	$ln_description = $_POST['m_description'];
    $ln_status = $_POST['status'];



	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		$admin = $_SESSION['master'];
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$admin = $_SESSION['supermaster'];
	} else {
		$admin = $_SESSION['admin'];
	}

	$admin_id = getUseridbyUsername($admin, $conn);

	$target_dir = "../../uploads/manual/";
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



	      header('Location: ../user_manual_add.php?error=2');
    } else {



		if($ln_title != '' && $ln_date != '' && $ln_description != ''){

			$sql = "INSERT INTO member_manual (m_title, m_date,m_description, m_pic, m_status,m_created_by) VALUES ('".$ln_title."', '".$ln_date."', '".$ln_description."', '".$newfilename."', '".$ln_status."', '".$admin_id."')";




			mysqli_query($conn, $sql);




			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename);

			header('Location: ../tools_list.php');
			

		 exit();
		} else {
			header('Location: ../user_manual_add.php?error=1');
		}
	}

?>
