<?php
	include_once '../session.php';
        include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$cat_id = $_POST['id'];
      
        $cat_title = $_POST['category_title'];
        $cat_brand = $_POST['brand_id'];
        $cat_description = $_POST['category_description'];
        $cat_status = $_POST['status'];
        $cat_level = $_POST['category-level'];
        $cat_main = $_POST['main-category'];
        $cat_sku = $_POST['categories-sku'];     
    	
	if($_SESSION['master'] != ''){
		$updated_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$updated_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$updated_by = $_SESSION['admin'];
	}
	
	$update_by_id = getUseridbyUsername($updated_by, $conn);
	
	$target_dir = "../../uploads/category/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(basename($_FILES["fileToUpload"]["name"]) != ''){
        $newfilename = round(microtime(true)) . '.' . $uploadFileType;
        if($uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" && $uploadFileType != "gif" && $uploadFileType != "JPG" && $uploadFileType != "PNG" && $uploadFileType != "JPEG" && $uploadFileType != "GIF") {
            $fail = "1";
        } else {
            $fail = "0"; 
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename);
			
        }
		
    }
	
	if($cat_title != ''){
            $sql = "UPDATE categories SET sku = '".$cat_sku."', level = '".$cat_level."', main_cat = '".$cat_main."', name = '".$cat_title."', brand = '".$cat_brand."',logo='".$newfilename."'  WHERE  cat_id  = '".$cat_id."'";
            mysqli_query($conn, $sql);
            header('Location: ../category_list.php');	
	} else {
		header('Location: ../category_add.php?error=1&action=update&id='.$cat_id);
	}

?>