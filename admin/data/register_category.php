<?php
	include_once '../session.php';
    include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
        $cat_title = $_POST['category_title'];
        $cat_brand = $_POST['brand_id'];
        $cat_description = $_POST['category_description'];
        $cat_status = $_POST['status'];
        $cat_level = $_POST['category-level'];
        $cat_main = $_POST['main-category'];
        $cat_sku = $_POST['categories-sku'];
	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		$admin = $_SESSION['master'];
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$admin = $_SESSION['supermaster'];
	} else {
		$admin = $_SESSION['admin'];
	}
    
	$admin_id = getUseridbyUsername($admin, $conn);
	
	$target_dir = "../../uploads/category/";
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
	      header('Location: ../category_add.php?error=2');	   
    } else {
		if($cat_title != '' ){
			
			$sql_cat = "INSERT INTO categories (sku, level, main_cat, name, brand, logo, status ,description,cat_created_by ) VALUES ('".$cat_sku."', '".$cat_level."', '".$cat_main."', '".$cat_title."', '".$cat_brand."','".$newfilename."','".$cat_status."','".$cat_description."', '".$admin_id."')";
                         
                       // echo $sql_cat;
                        //exit();
			mysqli_query($conn, $sql_cat);
			
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename);
			 
			header('Location: ../category_list.php');
				
		} else {
			header('Location: ../category_add.php?error=1');
		}
	}

?>