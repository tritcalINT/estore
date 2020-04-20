<?php
	include_once '../session.php';
        include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$pd_id = $_POST['id'];
        $pd_product_code=$_POST['product_code'];
        $pd_name = addslashes($_POST['Product_title']);
        $pd_short_description =addslashes(htmlspecialchars($_POST['product_short_description']));
        $pd_long_des = addslashes(htmlspecialchars($_POST['product_detail_description']));
        $pd_category_id = $_POST['category_id'];
        $pd_Main_img = $_POST['fileToUpload'];
        $pd_image1 = $_POST['image1-Upload'];
        $pd_image2  = $_POST['image2-Upload'];
        $pd_image3 = $_POST['image3-Upload'];
        $pd_image4 = $_POST['image4-Upload'];
        $pd_image5 = $_POST['image5-Upload'];
        $pd_sales_price = $_POST['sales-price'];
        $pd_discounted_price = $_POST['discounted-price'];
        $pd_item_cost = $_POST['item-cost'];
        $pd_video_description = $_POST['video_url'];
        $pd_status = $_POST['status'];
        $pd_start_date = $_POST['start_date'];
        $pd_expire_date = $_POST['expire_date'];
        $pd_in_stock = $_POST['in_stock'];
        $pd_supplier_id=$_POST['$pd_supplier_id'];
        $pd_status=$_POST['status'];
    	
         
         
	if($_SESSION['master'] != ''){
		$updated_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$updated_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$updated_by = $_SESSION['admin'];
	}
	
        
        
	$update_by_id = getUseridbyUsername($updated_by, $conn);
	
    $target_dir = "images/products/";
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
	
	if($pd_name!= ''){
            
            
            
         //$sql_update_product = "UPDATE product SET name = '".$pd_name."', short_description = '".$pd_short_description."', long_des = '".$pd_long_des."', category_id = '".$pd_category_id."', sales_price = '".$pd_sales_price."', discounted_price = '".$pd_discounted_price."', item_cost = '".$pd_item_cost."', video_description = '".$pd_video_description."' , status = '".$pd_status."',start_date = '".$pd_start_date."',expire_date = '".$pd_expire_date."',created_by = '".$update_by_id."',in_stock = '".$pd_in_stock."'   WHERE product_id = '".$pd_id."'";
          $sql_update_product = "UPDATE product SET code= '".$pd_product_code."' , name = '".$pd_name."' , short_description = '".$pd_short_description."' , long_des = '".$pd_long_des."',category_id = '".$pd_category_id."', sales_price = '".$pd_sales_price."',discounted_price = '".$pd_discounted_price."', item_cost = '".$pd_item_cost."', video_description = '".$pd_video_description."',start_date = '".$pd_start_date."',expire_date = '".$pd_expire_date."',updated_by  = '".$update_by_id."'   WHERE product_id = '".$pd_id."'" ;
           
         // echo  $pd_item_cost;
          // exit();
            mysqli_query($conn, $sql_update_product);
            header('Location: ../product_list.php');	
	} else {
		header('Location: ../product_add.php?error=1&action=update&pd='.$pd_id);
	}

?>