<?php
    include_once '../session.php';
    include_once '../../conn.php';
    include_once 'functions.php';

	//Fetching Values from URL
    /* $pd_name = addslashes($_POST['Product_title']);
    $pd_short_description =  addslashes($_POST['product_short_description']);
    $pd_long_des =  htmlspecialchars($_POST['product_detail_description']);
    $pd_category_id = $_POST['category_id'];
    /*$pd_Main_img = $_POST['Main_image'];
    $pd_image1 = $_POST['image1'];
    $pd_image2  = $_POST['image2'];
    $pd_image3 = $_POST['image3'];
    $pd_image4 = $_POST['image4'];
    $pd_image5 = $_POST['image5']; 
    $pd_sales_price = $_POST['sales-price'];
    $pd_discounted_price = $_POST['discounted-price'];
    $pd_item_cost = $_POST['item-cost'];
    $pd_video_description =  htmlspecialchars($_POST['video_description']);
    $pd_status = $_POST['status'];
    $pd_start_date = $_POST['start_date'];
    $pd_expire_date = $_POST['expire_date']; */
    
    $pd_product_code=$_POST['product_code'];
    $pd_name = addslashes($_POST['Product_title']);
    $pd_short_description = addslashes($_POST['product_short_description']);
    $pd_long_des = addslashes($_POST['product_detail_description']);
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
    $pd_supplier_id=$_POST['supplier_id'];
    $pd_status=$_POST['status'];
    $pd_created_by=getUseridbyUsername($_SESSION['login'],$conn);

    /*
     $pd_name = $_POST['Product_title'];
        $ln_short_description = $_POST['short_description'];
        $ln_long_des = $_POST['product_short_description'];
        $ln_category_id = $_POST['category_id'];
        $ln_Main_img = $_POST['Main_img'];
        $ln_image1 = $_POST['image1'];
        $ln_image2  = $_POST['image2'];
        $ln_image3 = $_POST['image3'];
        $ln_image4 = $_POST['image4'];
        $ln_image5 = $_POST['image5'];
        $ln_image1 = $_POST['image1'];
        $ln_image2  = $_POST['image2'];
        $ln_image3 = $_POST['image3'];
        $ln_image4 = $_POST['image4'];
        $ln_image5 = $_POST['image5'];
        $ln_sales_price = $_POST['sales-price'];
        $ln_discounted_price = $_POST['discounted-price'];
        $ln_itemcost = $_POST['itemcost'];
        $ln_video_description = $_POST['video_description'];
        $ln_status = $_POST['status'];
        $ln_start_date = $_POST['start_date'];
        $ln_expire_date = $_POST['expire_date'];S
     * 
     */
   // $ln_in_stock = $_POST['in_stock'];

	if(isset($_SESSION['master']) && $_SESSION['master'] != ''){
		$admin = $_SESSION['master'];
	} else if(isset($_SESSION['supermaster']) && $_SESSION['supermaster'] != ''){
		$admin = $_SESSION['supermaster'];
	} else {
		$admin = $_SESSION['admin'];
	}

	$admin_id = getUseridbyUsername($admin, $conn);

    $target_dir = "uploads/products/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    $target_img1 = $target_dir . basename($_FILES["image1-Upload"]["name"]);
    $uploadFileType1 = pathinfo($target_img1,PATHINFO_EXTENSION);
    
    $target_img2 = $target_dir . basename($_FILES["image2-Upload"]["name"]);
    $uploadFileType2 = pathinfo($target_img2,PATHINFO_EXTENSION);
    
    $target_img3 = $target_dir . basename($_FILES["image3-Upload"]["name"]);
    $uploadFileType3 = pathinfo($target_img3,PATHINFO_EXTENSION);
    
    $target_img4 = $target_dir . basename($_FILES["image4-Upload"]["name"]);
    $uploadFileType4 = pathinfo($target_img4,PATHINFO_EXTENSION);
    
    $target_img5 = $target_dir . basename($_FILES["image5-Upload"]["name"]);
    $uploadFileType5 = pathinfo($target_img5,PATHINFO_EXTENSION);
 
    if(basename($_FILES["fileToUpload"]["name"]) != ''){
       
        $newfilename = round(microtime(true)) . '.' .$uploadFileType;
       
         
        if($uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" && $uploadFileType != "gif" && $uploadFileType != "JPG" && $uploadFileType != "PNG" && $uploadFileType != "JPEG" && $uploadFileType != "GIF") {
            $fail = "1";
        } else {
            $fail = "0";
        }
    }
   
    if(basename($_FILES["image1-Upload"]["name"]) != ''){
     
        $newfilename1 = round(microtime(true))+10 . '.' .$uploadFileType1;
        $newfilename2 = round(microtime(true))+20 . '.' .$uploadFileType2;
        $newfilename3 = round(microtime(true))+30 . '.' .$uploadFileType3;
        $newfilename4 = round(microtime(true))+40 . '.' .$uploadFileType4;
        $newfilename5 = round(microtime(true))+50 . '.' .$uploadFileType5;

        if($uploadFileType1 != "jpg" && $uploadFileType1 != "png" && $uploadFileType1 != "jpeg" && $uploadFileType1 != "gif" && $uploadFileType1 != "JPG" && $uploadFileType1 != "PNG" && $uploadFileType1 != "JPEG" && $uploadFileType1 != "GIF") {
            $fail = "1";
        } else {
            $fail = "0";
        }
        
   
    }

    if($fail == "1") {
	      header('Location: ../product_add.php?error=2');
    } else {
		if($pd_name != '' ){

			//$sql = "INSERT INTO promotion (p_title, p_date, p_description, p_pic, p_status, p_created_by) VALUES ('".$pd_title."', '".$pd_date."', '".$pd_description."', '".$newfilename."', '".$pd_status."', '".$admin_id."')";
                        //echo $sql;
                        $sql_product="INSERT INTO `product` ( `code`,`name`,`short_description`, `long_des`, `category_id`, `Main_img`, `image1`, `image2`, `image3`, `image4`, `image5`, `sales_price`, `discounted_price`, `item_cost`, `video_description`, `status`,`start_date`, `expire_date`,`created_by`, `in_stock`) VALUES ('".$pd_product_code."','".$pd_name."','".$pd_short_description."', '".$pd_long_des."', '".$pd_category_id."', '".$target_dir.$newfilename."','".$target_dir.$newfilename1."', '".$target_dir.$newfilename2."', '".$target_dir.$newfilename3."', '".$target_dir.$newfilename4."', '".$target_dir.$newfilename5."', '".$pd_sales_price."', '".$pd_discounted_price."', '".$pd_item_cost."', '".$pd_video_description."', '".$pd_status."', '".$pd_start_date."', '".$pd_expire_date."','".$pd_created_by."', '1')";
                        
                       //echo $sql_product;
                      // exit();
                       
                        /* INSERT INTO `product` ( `name`, `short_description`, `long_des`, `category_id`, `Main_img`, `image1`, `image2`, `image3`, `image4`, `image5`, `sales_price`, `discounted_price`, `item_cost`, `video_description`, `status`,`start_date`, `expire_date`,`created_by`, `in_stock`) VALUES ('sddscdswsd', ' scsdcsdcs ', ' sdcdscdscds ', '5', 'images/products/dwqd.jpg','', '', '', '', '', '222.00', '180.00', '50.00', '', '1', '2019-03-09', '2019-03-23','13', '1')*/
			mysqli_query($conn, $sql_product);

			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../".$target_dir. $newfilename);
                        move_uploaded_file($_FILES["image1-Upload"]["tmp_name"],"../../".$target_dir. $newfilename1);
                        move_uploaded_file($_FILES["image2-Upload"]["tmp_name"],"../../".$target_dir. $newfilename2);
                        move_uploaded_file($_FILES["image3-Upload"]["tmp_name"],"../../".$target_dir. $newfilename3);
                        move_uploaded_file($_FILES["image4-Upload"]["tmp_name"],"../../".$target_dir. $newfilename4);
                        move_uploaded_file($_FILES["image5-Upload"]["tmp_name"],"../../".$target_dir. $newfilename5);
                     
			header('Location: ../product_list.php');

		} else {
			header('Location: ../product_add.php?error=1');
		}
	}

?>
