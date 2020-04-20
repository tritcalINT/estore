<?php
include_once 'functions.php';
include_once './../conn.php';
include_once './../scg_conn.php';

//$user_id                 ='';
//$user_name               ='';
//$user_pass               ='';
//$user_email              ='';
//$user_fname              ='';
//$user_lname              ='';
//$user_dob                ='';
//$user_phone_country      ='';
//$user_phone              ='';
//$user_pic                ='';
//$user_otp                ='';
//$user_bank_name          ='';
//$user_bank_account_no    ='';
//$user_bank_branch        ='';
//$user_member_reference   ='';
//$user_address       ='';
//$user_country            ='';
//$user_state              ='';
//
//$user_postal_code           ='';
//$user_wechatid           ='';
//$user_whatsapp           ='';
//$user_register_date      ='';
//$user_end_date           ='';
//$user_register_by        ='';
//$user_updated_by         ='';
//$user_updated_date       ='';
//$user_status             ='';
//$user_type               ='';
  

     
if ($_POST['action'] == 'update') {
    
        $user_register_date      ='';
        $user_end_date           ='';
        $user_register_by        ='';
        $user_updated_by         ='';
        $user_updated_date       ='';
        $user_status             ='';
        $user_type               ='';
        $user_name               ='';
        $user_pass               ='';
        $user_email              ='';
        $user_pic                ='';
        $user_otp                ='';
        $user_bank_name          ='';
        $user_bank_account_no    ='';
        $user_bank_branch        ='';
        $user_member_reference   ='';
        $user_phone_country     ='';
                
     
	$user_address = $_POST['user_address'];
       
        $user_city              = $_POST['user_city'];
        $user_postal_code       = $_POST['user_postal_code'];
        $user_country           = $_POST['user_country'];
        $user_state             = $_POST['user_state'];
        $user_card_number       = $_POST['card_number'];
        $user_card_type         = $_POST['card_type'];
        $user_card_cvv          = $_POST['cvv'];
        $user_id                =$_POST['user_id'];
        $user_fname             =$_POST['user_fname'];
        $user_lname             =$_POST['user_lname'];
        $user_dob               =$_POST['user_dob'];

        $user_phone              =$_POST['user_phone'];

        
     

       
        
        $user_lineid             =$_POST['user_lineId'];
        $user_wechatid           ='';
        $user_whatsapp           =$_POST['user_whatsapp'];

       
        $target_dir = "../uploads/profiles/";
 
        
 
        
         if(strcmp($password_2 , $password_confoirm_2)){
            
         
             header('Location: ../myaccount.php?error=1');
             exit();
        }
        else{
            
            
            
        }
        
         echo   basename($_FILES["user_image"]["name"]) ;
         
         if(($_FILES["user_image"]["name"])!='')
        {
            echo 'not null';
             $target_user_image = $target_dir . basename($_FILES["user_image"]["name"]);
              $uploadFileType_user_image = pathinfo($target_user_image,PATHINFO_EXTENSION);
                $newfilename_user_image = round(microtime(true)) . UniqueRandomNumbersWithinRange(0, 100, 1)[0] . '.' . $uploadFileType_user_image;

                if(basename($_FILES["user_image"]["name"]) != ''){
                    if($uploadFileType_user_image != "jpg" && $uploadFileType_user_image != "png" && $uploadFileType_user_image != "jpeg" && $uploadFileType_user_image != "gif" && $uploadFileType_user_image != "JPG" && $uploadFileType_user_image != "PNG" && $uploadFileType_user_image != "JPEG" && $uploadFileType_user_image != "GIF") {
                        $fail = "1";
                    } else {
                        $fail = "0";
                    }
                }
            move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_dir. $newfilename_user_image);
            
            $user_pic=$newfilename_user_image;
            
            $sql = "UPDATE user SET user_pic='".$user_pic."' WHERE user_id=".$user_id;
            
            
            if (mysqli_query($conn, $sql)) {
                   $error='0';
                  
                } else {
                     $error='1';
                }
            
            
        }
        
        if($user_fname!=''){
            
             $sql = "UPDATE user SET user_fname='".$user_fname."' WHERE user_id=".$user_id;
             if (mysqli_query($conn, $sql)) {
                   $error='0';
                    
                } else {
                     $error='1';
                }
            
        }
        
          if($user_lname!=''){
            
             $sql = "UPDATE user SET user_lname='".$user_lname."' WHERE user_id=".$user_id;
             if (mysqli_query($conn, $sql)) {
                   $error='0';
                   
                } else {
                     $error='1';
                }
            
        }
        
        if($user_dob!=''){
            
             $sql = "UPDATE user SET user_dob='".$user_dob."' WHERE user_id=".$user_id;
             if (mysqli_query($conn, $sql)) {
                   $error='0';
                    
                } else {
                     $error='1';
                }
            
        }
        
        if($user_phone!=''){
            
             $sql = "UPDATE user SET user_phone='".$user_phone."' WHERE user_id=".$user_id;
             if (mysqli_query($conn, $sql)) {
                   $error='0';
                    
                } else {
                     $error='1';
                }
            
        }
        
           if($user_lineid!=''){
            
             $sql = "UPDATE user SET user_lineId='".$user_lineid."' WHERE user_id=".$user_id;
             if (mysqli_query($conn, $sql)) {
                   $error='0';
                    
                } else {
                     $error='1';
                }
            
        }
        
         if($user_whatsapp!=''){
            
             $sql = "UPDATE user SET user_whatsapp='".$user_whatsapp."' WHERE user_id=".$user_id;
             if (mysqli_query($conn, $sql)) {
                   $error='0';
                    
                } else {
                     $error='1';
                }
            
        }
        
         if($user_address!=''){
            
             $sql = "UPDATE user SET user_address ='".$user_address."' WHERE user_id=".$user_id;
          
             if (mysqli_query($conn, $sql)) {
                   $error='0';
                    
                } else {
                     $error='1';
                }
            
        }
        
          if($user_city!=''){
            
             $sql = "UPDATE user SET user_city='".$user_city."' WHERE user_id=".$user_id;
             if (mysqli_query($conn, $sql)) {
                   $error='0';
                    
                } else {
                     $error='1';
                }
            
        }
        
         if($user_postal_code!=''){
             
             
            
             $sql = "UPDATE user SET user_postal_code='".$user_postal_code."' WHERE user_id=".$user_id;
             
              
             if (mysqli_query($conn, $sql)) {
                   $error='0';
                    
                } else {
                     $error='1';
                }
            
        }
        
                 if($user_country!=''){
             
             
            
             $sql = "UPDATE user SET user_country='".$user_country."' WHERE user_id=".$user_id;
             
              
             if (mysqli_query($conn, $sql)) {
                   $error='0';
                    
                } else {
                     $error='1';
                }
            
        }
        
        
                if($user_state!=''){
             
             
            
             $sql = "UPDATE user SET user_state='".$user_state."' WHERE user_id=".$user_id;
             
              
             if (mysqli_query($conn, $sql)) {
                   $error='0';
                    
                } else {
                     $error='1';
                }
            
        }
        
//        
//        $hash_pw_2 = password_hash($password_2, PASSWORD_DEFAULT);
//        
//        
//                if( $hash_pw_2!=''){
//             
//        
//            
//             $sql = "UPDATE user SET user_pass='".$hash_pw_2."' WHERE user_id=".$user_id;
//             
//              
//             if (mysqli_query($conn, $sql)) {
//                   $error='0';
//                    
//                } else {
//                     $error='1';
//                }
//            
//        }
 
        
          header('Location: ../myaccount.php');
	}
        
        
        
        
        //==============================================================================================================
        
        
	// User registration method
    else if ($_POST['action'] == 'register') {

        $target_dir = "../uploads/profiles/";

        $user_name = $_POST['username'];
        $password = $_POST['password'];
        $password_confoirm = $_POST['confirm_password'];
        $user_email = $_POST['email'];
        $user_type               =$_POST['user_role'];
        $user_member_reference   =$_POST['member_refernce'];
        $scg_ref                 =$_POST['scg_ref'];
        $scg_ref_status          =$_POST['scg_ref_status'];
       
            //echo $scg_ref_status;
    //exit();

        if(strcmp($password , $password_confoirm)){
            
             header('Location: ../register-account.php?error=4');
             exit();
            
        }
       
       
        
        if(($_FILES["user_image"]["name"])!='')
        {
            echo 'not null';
             $target_user_image = $target_dir . basename($_FILES["user_image"]["name"]);
              $uploadFileType_user_image = pathinfo($target_user_image,PATHINFO_EXTENSION);
                $newfilename_user_image = round(microtime(true)) . UniqueRandomNumbersWithinRange(0, 100, 1)[0] . '.' . $uploadFileType_user_image;

                if(basename($_FILES["user_image"]["name"]) != ''){
                    if($uploadFileType_user_image != "jpg" && $uploadFileType_user_image != "png" && $uploadFileType_user_image != "jpeg" && $uploadFileType_user_image != "gif" && $uploadFileType_user_image != "JPG" && $uploadFileType_user_image != "PNG" && $uploadFileType_user_image != "JPEG" && $uploadFileType_user_image != "GIF") {
                        $fail = "1";
                    } else {
                        $fail = "0";
                    }
                }
            move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_dir. $newfilename_user_image);
        }
        
       
        $username_availability_check = "SELECT * FROM user WHERE user_name ='" . $user_name . "'";
        $data_1 = mysqli_query($conn, $username_availability_check);

        $email_availability_check = "SELECT * FROM user WHERE user_email = '" . $user_email . "'";
        $data_2 = mysqli_query($conn, $email_availability_check);
        if($scg_ref_status=='on'){
            $scg_ref__availability_check="SELECT * FROM members WHERE m_username = '" .$scg_ref . "'";
            $data_3 = mysqli_query($scg_conn, $scg_ref__availability_check);
            $scg_res = mysqli_fetch_assoc($data_3);
            $scg_ref_id=$scg_res['m_id'];
        }
        else{
            $scg_ref_id='0';
        }

        $user_level="select user_level from user where user_id='".$user_member_reference."'";
        $user_level_value = mysqli_query($conn, $user_level);
        while($rs = mysqli_fetch_assoc($user_level_value)) {
			$userlvl = $rs['user_level'];
		}

        if($userlvl>0){
            
            $userlvl=$userlvl+1;
            
        }elseif($user_type=='User'){
            $userlvl=6;
        }elseif($user_type=='Shopper'){
            $userlvl=5;
        }elseif (strpos($user_type, 'sell')) {
                   $userlvl=4;
         }elseif ($user_type=='Distributor') {
        
            $userlvl=3;
         }elseif ($user_type=='Manufacturer') {
        
            $userlvl=2;
         }else {
           $userlvl=-1;
            
        }

               
        if (mysqli_num_rows($data_1) == 0 && mysqli_num_rows($data_2) == 0 && (mysqli_num_rows($data_3)>0 ||  $scg_ref_id=='0')) {
            
               
                $hash_pw = password_hash($password, PASSWORD_DEFAULT);
           
                
                 if(($_FILES["user_image"]["name"])!=''){
                     
                     $sql_user = "INSERT INTO user ( user_name, user_pass, user_email, user_type, user_pic,user_register_date,user_status, user_member_reference,user_level,scg_ref) VALUES ('" . $user_name . "', '" . $hash_pw . "', '" . $user_email . "', '".$user_type."', '".$newfilename_user_image."','". date("Y/m/d/h/m") ."',0,'".$user_member_reference."','".$userlvl."','".$scg_ref."')";

                 }
                 else{
                       $sql_user = "INSERT INTO user ( user_name, user_pass, user_email, user_type,user_register_date,user_status, user_member_reference,user_level,scg_ref) VALUES ('" . $user_name . "', '" . $hash_pw . "', '" . $user_email . "', '".$user_type."','". date("Y/m/d/h/m") ."',0,'".$user_member_reference."','".$userlvl."','".$scg_ref_id."')";

                 }
                  
                 
                 include_once '../phpmailer/activate.php';
                  if($email_send == '1'){
                      header('Location: ../login_check.php');
                       mysqli_query($conn, $sql_user);
                  }
                 else {
                      
                      header('Location: ../register-account.php?error=5');
                 }

                header('Location: ../login_check.php');
      
        } else if(mysqli_num_rows($data_1) != 0){
            header('Location: ../register-account.php?error=1');

        } else if(mysqli_num_rows($data_2) != 0){
            header('Location: ../register-account.php?error=2');
        }else if(mysqli_num_rows($data_3) == 0){
            header('Location: ../register-account.php?error=6');
        }
        
        
        else{
            
            header('Location: ../register-account.php?error=3');
        }
       
    }
    else{
        header('Location: ../register-account.php?error=4');
    }
    
    
        
        

function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}


?>