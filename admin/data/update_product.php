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
  
        $pd_sales_price = $_POST['sales-price'];
        $pd_discounted_price = $_POST['discounted-price'];
        $pd_item_cost = $_POST['item-cost'];
        $pd_video_description = $_POST['video_url'];
        $pd_status = $_POST['pd_status'];
        $pd_supplier_id=$_POST['$pd_supplier_id'];
        $pd_start_date = $_POST['start_date'];
        $pd_expire_date = $_POST['expire_date'];
        $pd_in_stock = $_POST['status'];
        $pd_manufacture_commission =$_POST['manufacture_commission'];
        $pd_distributor_commission=$_POST['distributor_commission'];
        $pd_re_sellerr_commission=$_POST['re_sellerr_commission'];
        $pd_shopper_commission=$_POST['shopper_commission'];
        $pd_end_user_commission =$_POST['end_user_commission']; 
        $pd_collection=$_POST['collection'];
        $pd_related='null';
        $pd_size=$_POST['size'];
        $pd_color=$_POST['pd_color'];
        $pd_brand=$_POST['brand_id'];
        $pd_qty=$_POST['product_qty'];
        $target_dir = "uploads/products/";
        
        
        
	if($_SESSION['master'] != ''){
		$updated_by = $_SESSION['master'];
	} else if($_SESSION['supermaster'] != '') {
		$updated_by = $_SESSION['supermaster'];
	} else if($_SESSION['admin'] != '') {
		$updated_by = $_SESSION['admin'];
	}
	
        $update_by_id = getUseridbyUsername($updated_by, $conn);
        
         if($pd_status!= ''){
          $sql_update_product = "UPDATE product SET status= '".$pd_status."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  
     
        
    
//================================================================================================================
  if($pd_name!= ''){
          $sql_update_product = "UPDATE product SET name= '".$pd_name."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  
     
    //===========================================================================================================
   
    //================================================================================================================
  if( $pd_short_description!= ''){
          $sql_update_product = "UPDATE product SET short_description= '".$pd_short_description."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
    if( $pd_long_des!= ''){
          $sql_update_product = "UPDATE product SET long_des= '".$pd_long_des."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
    
    if( $pd_category_id!= ''){
          $sql_update_product = "UPDATE product SET category_id= '".$pd_category_id."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
       
    if( $pd_sales_price!= ''){
          $sql_update_product = "UPDATE product SET  sales_price= '".$pd_sales_price."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
         //===========================================================================================================
       
    if( $pd_discounted_price!= ''){
          $sql_update_product = "UPDATE product SET  discounted_price= '".$pd_discounted_price."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
         
    if( $pd_item_cost!= ''){
          $sql_update_product = "UPDATE product SET  item_cost= '".$pd_item_cost."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
           
    if( $pd_video_description!= ''){
          $sql_update_product = "UPDATE product SET   video_description= '".$pd_video_description."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
       if( $pd_supplier_id!= ''){
          $sql_update_product = "UPDATE product SET   supplier_id= '".$pd_supplier_id."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
        if( $pd_collection!= ''){
          $sql_update_product = "UPDATE product SET   collection= '".$pd_collection."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
         if( $pd_manufacture_commission!= ''){
          $sql_update_product = "UPDATE product SET   manufacture_commission= '".$pd_manufacture_commission."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
          if( $pd_manufacture_commission!= ''){
          $sql_update_product = "UPDATE product SET   manufacture_commission= '".$pd_manufacture_commission."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
             if( $pd_distributor_commission!= ''){
          $sql_update_product = "UPDATE product SET   distributor_commission= '".$pd_distributor_commission."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
                   if( $pd_distributor_commission!= ''){
          $sql_update_product = "UPDATE product SET   distributor_commission= '".$pd_distributor_commission."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
       
        
        
        if( $pd_re_sellerr_commission!= ''){
          $sql_update_product = "UPDATE product SET   re_sellerr_commission= '".$pd_re_sellerr_commission."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
          if( $pd_shopper_commission!= ''){
          $sql_update_product = "UPDATE product SET   shopper_commission= '".$pd_shopper_commission."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
         if( $pd_end_user_commission!= ''){
          $sql_update_product = "UPDATE product SET    end_user_commission= '".$pd_end_user_commission."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
          if( $pd_qty!= ''){
          $sql_update_product = "UPDATE product SET stock_qty= '".$pd_qty."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
                                                                  
        if( $pd_color!= ''){
          $sql_update_product = "UPDATE product SET color= '".$pd_color."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
           if( $pd_size!= ''){
          $sql_update_product = "UPDATE product SET size= '".$pd_size."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
                                         
      if( $pd_brand!= ''){
          $sql_update_product = "UPDATE product SET brand= '".$pd_brand."'   WHERE product_id = '".$pd_id."'" ;
          
            $fail =mysqli_query($conn, $sql_update_product);
           	
	}  

    //===========================================================================================================
       

    if(basename($_FILES["fileToUpload"]["name"]) != ''){
             $pd_Main_img=$target_dir.reSize($_FILES['fileToUpload']['tmp_name'],$_FILES['fileToUpload']['name'],1);  
             $sql_update_Main_img = "UPDATE product SET  main_img= '".$pd_Main_img."' WHERE product_id = '".$pd_id."'" ;
             mysqli_query($conn, $sql_update_Main_img); 
    }
   
            
   //=========================================================================================================== 
  if(basename($_FILES["image1-Upload"]["name"]) != ''){
             $pd_image1=$target_dir.reSize($_FILES['image1-Upload']['tmp_name'],$_FILES['image1-Upload']['name'],10);  
              $sql_update_image1 = "UPDATE product SET  image1= '".$pd_image1."' WHERE product_id = '".$pd_id."'" ;
             mysqli_query($conn,  $sql_update_image1); 
    }
   
  
//=================================================================================================================
    if(basename($_FILES["image2-Upload"]["name"]) != ''){
             $pd_image2=$target_dir.reSize($_FILES['image2-Upload']['tmp_name'],$_FILES['image2-Upload']['name'],20);  
             $sql_update_image2 = "UPDATE product SET  image2= '".$pd_image2."' WHERE product_id = '".$pd_id."'" ;
             mysqli_query($conn, $sql_update_image2); 
    }
  
//=================================================================================================================
     if(basename($_FILES["image3-Upload"]["name"]) != ''){
             $pd_image3=$target_dir.reSize($_FILES['image3-Upload']['tmp_name'],$_FILES['image3-Upload']['name'],30);  
             $sql_update_image3 = "UPDATE product SET  image3= '".$pd_image3."' WHERE product_id = '".$pd_id."'" ;
             mysqli_query($conn, $sql_update_image3); 
    }
    
 //=================================================================================================================
  
     if(basename($_FILES["image4-Upload"]["name"]) != ''){
             $pd_image4=$target_dir.reSize($_FILES['image4-Upload']['tmp_name'],$_FILES['image4-Upload']['name'],40);  
             $sql_update_image4 = "UPDATE product SET  image4= '".$pd_image4."' WHERE product_id = '".$pd_id."'" ;
             mysqli_query($conn, $sql_update_image4); 
    }
    
  
//=================================================================================================================
          if(basename($_FILES["image5-Upload"]["name"]) != ''){
             $pd_image4=$target_dir.reSize($_FILES['image5-Upload']['tmp_name'],$_FILES['image5-Upload']['name'],50);  
             $sql_update_image5 = "UPDATE product SET  image5= '".$pd_image5."' WHERE product_id = '".$pd_id."'" ;
             mysqli_query($conn, $sql_update_image5); 
    }
      
 //=================================================================================================================

    
    
    $fail = FALSE; 
    if($fail == FALSE){
        
         header('Location: ../product_list.php');
    }
    else{
        header('Location: ../product_add.php?error=1&action=update&pd='.$pd_id);
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

        $file_save_as=  $fileNewName.".". $ext;   
        
        
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

 