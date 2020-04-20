<?php
    include_once '../session.php';
    include_once '../../conn.php';
    include_once 'functions.php';

   
    $pd_code=$_POST['product_code'];
    $pd_name = addslashes($_POST['Product_title']);
    $pd_short_description = addslashes($_POST['product_short_description']);
    $pd_long_des = addslashes($_POST['product_detail_description']);
    $pd_cat_id = $_POST['category_id'];
  
    $pd_sales_price = $_POST['sales-price'];
    $pd_discounted_price = $_POST['discounted-price'];
    $pd_item_cost = $_POST['item-cost'];
    $pd_video_description = $_POST['video_url'];
    $pd_status = '0';
    $pd_start_date = $_POST['start_date'];
    $pd_expire_date = $_POST['expire_date'];

    $pd_supplier_id=$_POST['supplier_id'];
    $pd_manufacture_commission =0;
    $pd_distributor_commission=0;
    $pd_re_sellerr_commission=0;
    $pd_shopper_commission=0;
    $pd_end_user_commission =0; 
    $pd_collection=$_POST['collection'];
    $pd_related=$_POST['related_category_id'];
    $pd_qty=$_POST['product_qty'];
    $pd_color=$_POST['pd_color'];
    
    if ((int)$pd_qty>0){
        
        $pd_in_stock='1';
    }
 
	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		$admin = $_SESSION['master'];
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$admin = $_SESSION['supermaster'];
	} else {
		$admin = $_SESSION['admin'];
	}

	$admin_id = getUseridbyUsername($admin, $conn);
   
        $pd_created_by=getUseridbyUsername($_SESSION['login'], $conn);
    

       
    $target_dir = "uploads/products/";
    if(basename($_FILES["fileToUpload"]["name"]) != ''){
             $pd_Main_img=$target_dir.reSize($_FILES['fileToUpload']['tmp_name'],$_FILES['fileToUpload']['name'],1);  
    }
    else{
        $pd_Main_img='';
    }
   
    if(basename($_FILES["image1-Upload"]["name"]) != ''){

       $pd_image1=$target_dir.reSize($_FILES['image1-Upload']['tmp_name'],$_FILES['image1-Upload']['name'],10); 

    } else{
        $pd_image1='';
    }
     if(basename($_FILES["image2-Upload"]["name"]) != ''){

       $pd_image2=$target_dir.reSize($_FILES['image2-Upload']['tmp_name'],$_FILES['image2-Upload']['name'],20); 

    } else{
        $pd_image2='';
    }
     if(basename($_FILES["image3-Upload"]["name"]) != ''){

       $pd_image3=$target_dir.reSize($_FILES['image3-Upload']['tmp_name'],$_FILES['image3-Upload']['name'],30); 

    } else{
        $pd_image3='';
    }
     if(basename($_FILES["image4-Upload"]["name"]) != ''){

       $pd_image4=$target_dir.reSize($_FILES['image4-Upload']['tmp_name'],$_FILES['image4-Upload']['name'],40); 

    } else{
        $pd_image4='';
    }
     if(basename($_FILES["image5-Upload"]["name"]) != ''){

       $pd_image5=$target_dir.reSize($_FILES['image5-Upload']['tmp_name'],$_FILES['image5-Upload']['name'],50); 

    } else{
        $pd_image5='';
    }
     
    
		if($pd_name != '' ){

		    $sql_product="INSERT INTO `product` ( `code`, `name`, `short_description`, `long_des`, `category_id`, `main_img`, `image1`, `image2`, `image3`, `image4`, `image5`, `sales_price`, `discounted_price`, `item_cost`, `video_description`, `status`, `start_date`, `expire_date`, `created_by`, `updated_by`, `in_stock`, `supplier_id`, `collection`, `releted_cat`, `manufacture_commission`, `distributor_commission`, `re_sellerr_commission`, `shopper_commission`, `end_user_commission`,`stock_qty`,`color`) VALUES ('".$pd_code."','".$pd_name."','".$pd_short_description."','".$pd_long_des."','".$pd_cat_id."','".$pd_Main_img."','".$pd_image1."','".$pd_image2."','".$pd_image3."','".$pd_image4."','".$pd_image5."','".$pd_sales_price."','".$pd_discounted_price."','".$pd_item_cost."','".$pd_video_description."','".$pd_status."','".$pd_start_date."','".$pd_expire_date."','".$pd_created_by."','".'0'."','".$pd_in_stock."','".$pd_supplier_id."','".$pd_collection."','".$pd_related."','".$pd_manufacture_commission."','".$pd_distributor_commission."','".$pd_re_sellerr_commission."','".$pd_shopper_commission."','".$pd_end_user_commission."','".$pd_qty."','".$pd_color."')";
                    mysqli_query($conn, $sql_product);
                    header('Location: ../product_list.php');
                 
		} else {
			header('Location: ../product_add.php?error=1');
		}

function reSize($file,$var_file,$var_name){
    
        $sourceProperties = getimagesize($file);
        $fileNewName = time().$var_name;
        $folderPath = "../../uploads/products/";
        $ext = pathinfo($var_file, PATHINFO_EXTENSION);

        $imageType = $sourceProperties[2];

        switch ($imageType) {


            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$folderPath. $fileNewName.".". $ext);
                break;


            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagegif($targetLayer,$folderPath. $fileNewName.".". $ext);
                break;


            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$folderPath. $fileNewName.".". $ext);
                break;


            default:
                echo "Invalid Image type.";
                exit;
                break;
        }

        $file_save_as=  $fileNewName. ".". $ext;   
        
        
        move_uploaded_file( $folderPath.$file_save_as);
       
        return $file_save_as;     
    
    
}

function imageResize($imageResourceId,$width,$height) {


    $targetWidth =870;
    $targetHeight =1110;


    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


    return $targetLayer;
}
?>
