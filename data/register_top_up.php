<?php
	include_once 'functions.php';
        include_once './../conn.php';

	//Fetching Values from URL
	$user_id = $_POST['user_id'];
        $top_up_type=$_POST['topup'];
        $top_up_amount=$_POST['deposit_amount'];
       // $currency=$_POST['currency'];
        $currency= 'usd';
        $target_dir = "../uploads/deposit/";
        $today=date("Y/m/d");
        if($top_up_type=='1'){
            
         $newfilename=file_upload("fileToUpload",$target_dir);
         
                 
      
            
          if($newfilename!='' && (int)$top_up_amount >0 && $user_id!=''&& $currency!=''){
              
              $sql = "INSERT INTO member_deposit (md_depost_type,md_reference, md_member, md_amount, md_currency, md_slip, md_type, md_actual_amount, md_date, md_expiry,md_fund_amount,md_actual_dp_amount) VALUES (1,'".$ref_no."', '".$user_id."', ".$top_up_amount.", '".$currency."', '".$newfilename."', 'Deposit', '".$top_up_amount."', '".$today."', '".$today."','".$top_up_amount."','".$top_up_amount."')";
 
             mysqli_query($conn, $sql);
            // echo "<script> alert('Send top up for admin appprovel');</script>";
             header('Location: ../myaccount.php?error=0');
             
        }
        
            
        } else {
			
		}
        
	 
function file_upload($file_name,$target_dir){
           
        $target_file = $target_dir . basename($_FILES[$file_name]["name"]);
        $uploadFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if(basename($_FILES[$file_name]["name"]) != ''){
            $newfilename = round(microtime(true)) . '.' . $uploadFileType;
            if($uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" && $uploadFileType != "gif" && $uploadFileType != "JPG" && $uploadFileType != "PNG" && $uploadFileType != "JPEG" && $uploadFileType != "GIF") {
                $fail = "1";
            } else {
                $fail = "0"; 
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename);
            }
        }
        return $newfilename; 
}