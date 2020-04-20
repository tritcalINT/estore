<?php
	include_once '../session.php';
        include_once '../../conn.php';
	 

	//Fetching Values from URL
        $user_id            = $_POST['id'];
	$user_email         = $_POST['user_email'];
	$user_phone         = $_POST['phone'];
	$user_dob           = $_POST['dob'];
	$user_otp               = $_POST['otp'];
	$user_bank_name          = $_POST['bank_name'];
	$user_bank_account_no   = $_POST['bank_account'];
	$user_bank_branch           = $_POST['bank_branch'];
	$user_bitcoin           = $_POST['bitcoin'];
	$user_litecoin          = $_POST['litecoin'];
	$user_lineId              = $_POST['user_lineId'];
	$user_wechatid            = $_POST['wechat_id'];
	$user_whatsapp           = $_POST['whatsapp'];
        $user_name               =$_POST['user_name'];
        $user_pass               =$_POST['user_pass'];
        $user_fname              =$_POST['user_fname'];
        $user_lname              =$_POST['user_lname'];
        $user_pic                =$_POST['user_pic'];
        $user_member_reference   =$_POST['user_member_reference'];
        $user_gpay_balance      =$_POST['gpay_balance'];
        $user_country            =$_POST['user_country'];
        $user_state              =$_POST['user_state'];
        $user_city               =$_POST['user_city'];
        $user_postal_code          =$_POST['user_postal_code'];
        $user_register_date      =$_POST['user_register_date'];
        $user_end_date           =$_POST['user_end_date'];
        $user_register_by        =$_POST['user_register_by'];
        $user_updated_by         =$_POST['user_updated_by'];
        $user_updated_date       =$_POST['user_updated_date'];
        $user_type               =$_POST['user_type'];
        $user_level =$_POST['user_level'];
        $user_address = $_POST['user_address'];
        $scg_ref=$_POST['scg_ref'];
        $user_currency=$_POST['currency'];
//===================================================================================================
    

     if($user_currency != ''){
		 
        $sql = "update user set currency='".$user_currency."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
      if($user_name != ''){
		 
        $sql = "update user set user_name='".$user_name."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
    
     if($user_member_reference != ''){
		 
        $sql = "update user set  user_member_reference='".$user_member_reference."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    } 
    
    if($scg_ref != ''){
		 
        $sql = "update user set  scg_ref='".$scg_ref."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
        
     if($user_type != ''){
		 
        $sql = "update user set user_type='".$user_type."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
    
      if($user_level != ''){
		 
        $sql = "update user set user_level='".$user_level."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
    
      if($user_fname != ''){
		 
        $sql = "update user set user_fname='".$user_fname."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
      if($user_lname != ''){
		 
        $sql = "update user set user_lname='".$user_lname."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
      if($user_email != ''){
		 
        $sql = "update user set user_email='".$user_email."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
      if($user_email != ''){
		 
        $sql = "update user set user_email='".$user_email."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
      if($user_dob != ''){
		 
        $sql = "update user set user_dob='".$user_dob."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
      if($user_phone != ''){
		 
        $sql = "update user set user_phone='".$user_phone."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
      if($user_lineId != ''){
		 
        $sql = "update user set user_lineId='".$user_lineId."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
      if($user_whatsapp != ''){
		 
        $sql = "update user user_whatsapp='".$user_whatsapp."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
      if($user_address != ''){
		 
        $sql = "update user set user_address='".$user_address."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
      if($user_city != ''){
		 
        $sql = "update user set user_city='".$user_city."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
      if($user_postal_code != ''){
		 
        $sql = "update user set user_postal_code='".$user_postal_code."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
      if($user_country != ''){
		 
        $sql = "update user set user_country='".$user_country."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
      if($user_state != ''){
		 
        $sql = "update user set user_state='".$user_state."'where user_id='".$user_id."'";
         mysqli_query($conn, $sql);
        
           
    }
   
    
     
          
        
    if($user_pic==''){
        
     $target_dir = "uploads/profiles/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(basename($_FILES["fileToUpload"]["name"]) != ''){
        $newfilename = round(microtime(true)) . '.' . $uploadFileType;
        if($uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" && $uploadFileType != "gif" && $uploadFileType != "JPG" && $uploadFileType != "PNG" && $uploadFileType != "JPEG" && $uploadFileType != "GIF") {
            $fail = "1";
        } else {
            $fail = "0"; 
			  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../".$target_dir. $newfilename);
                           $sql_pic = ", m_pic = '".$newfilename."'";
                          $sql_pic = "update user set user_pic='".$newfilename."'where user_id='".$user_id."'";
                          mysqli_query($conn,  $sql_pic);
        }
         
		
    }
       
    
    }
 
    header('Location: ../user_details.php?user_id='.$user_id);
?>