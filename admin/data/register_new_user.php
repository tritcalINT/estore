<?php
include_once 'functions.php';
include_once './../conn.php';

 
 

$user_id                 ='';
$user_name               ='';
$user_pass               ='';
$user_email              ='';
$user_fname              ='';
$user_lname              ='';
$user_dob                ='';
$user_phone_country      ='';
$user_phone              ='';
$user_pic                ='';
$user_otp                ='';
$user_bank_name          ='';
$user_bank_account_no    ='';
$user_bank_branch        ='';
$user_member_reference   ='';
$user_address       ='';
$user_country            ='';
$user_state              ='';
$user_city               ='';
$user_postal_code          ='';
$user_wechatid           ='';
$user_whatsapp           ='';
$user_register_date      ='';
$user_end_date           ='';
$user_register_by        ='';
$user_updated_by         ='';
$user_updated_date       ='';
$user_status             ='';
$user_type               ='';
  

     
if ($_POST['action'] == 'update') {

	$user_address_1 = $_POST['address_1'];
        $user_address_2 = $_POST['address_2'];
        $user_city = $_POST['city'];
        $user_postal_code = $_POST['postal_code'];
        $user_country = $_POST['country'];
        $user_state = $_POST['state'];
        $user_card_number = $_POST['card_number'];
        $user_card_type = $_POST['card_type'];
        $user_card_cvv = $_POST['cvv'];

	    if($_SESSION['login']){

	        if($user_address_1 != null && $user_address_2 != null && $user_city != null && $user_postal_code != null && $user_country != null &&
                $user_state != null && $user_card_number != null && $user_card_type != null && $user_card_cvv != null){

                $sql = "UPDATE user SET user_address='".$user_address_1."' , '".$user_address_2."', user_city='".$user_postal_code."',
	         user_country='".$user_country."', user_state='".$user_state."', user_card_number='".$user_card_number."', user_card_type='".$user_card_type."',
	         user_cvv='".$user_card_cvv."' WHERE user_name='".$_SESSION['login']."'";

                if (mysqli_query($conn, $sql)) {
                    header('Location: ../myaccount.php?status=1');
                } else {
                    header('Location: ../myaccount.php?status=0');
                }

            }
            else {
                header('Location: ../myaccount.php?status=2');
            }


        }
	    else{
            header('Location: ../index.php');
        }
	}
	// User registration method
    else if ($_POST['action'] == 'register') {

        $target_dir = "../uploads/profiles/";

        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_email = $_POST['email'];
        $user_type=$_POST['user_role'];
        $user_member_reference=$_POST['member_refernce'];
        
        //echo 'ok';//+
       // echo $user_member_reference;
       // exit();
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


        $username_availability_check = "SELECT * FROM user WHERE user_name ='" . $username . "'";
        $data_1 = mysqli_query($conn, $username_availability_check);

        $email_availability_check = "SELECT * FROM user WHERE user_email = '" . $user_email . "'";
        $data_2 = mysqli_query($conn, $email_availability_check);
        
        
        
      $user_level="select user_level from user where user_id='".$user_member_reference."'";
        $user_level_value = mysqli_query($conn, $user_level);
        while($rs = mysqli_fetch_assoc($user_level_value)) {
			$userlvl = $rs['user_level'];
		}
      
      
        if($userlvl>0){
            
            $userlvl=$userlvl+1;
            
        } else {
           $userlvl=-1;
            
        }
        
        
        if (mysqli_num_rows($data_1) == 0 && mysqli_num_rows($data_2) == 0) {

            if($fail == "1") {
                header('Location: ../register-user-account.php?error=2');
            }
            else if($fail == "0"){
                $hash_pw = password_hash($password, PASSWORD_DEFAULT);

                $sql_user = "INSERT INTO user ( user_name, user_pass, user_email, user_type, user_pic,user_register_date,user_status, user_member_reference,user_level) VALUES ('" . $username . "', '" . $hash_pw . "', '" . $user_email . "', '".$user_type."', '".$newfilename_user_image."','". date("Y/m/d/h/m") ."',0,'".$user_member_reference."',$userlvl)";
                
                //echo $sql_user;
                //exit();
                mysqli_query($conn, $sql_user);

                move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_dir. $newfilename_user_image);

                header('Location: ../login.php?status=registered');
            }
        } else if(mysqli_num_rows($data_1) != 0){
            header('Location: ../register-user-account.php?error=1');

        } else if(mysqli_num_rows($data_2) != 0){
            header('Location: ../register-user-account.php?error=2');
        }

    }
    else{
        header('Location: ../register-user-account.php?error=3');
    }

function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}


?>