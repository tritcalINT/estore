<?php
   session_start();
    include_once '../conn.php';
    include_once 'functions.php';
    
    
    
?>

<?php


			$user_name=$_POST['user-name'];
                        $user_first_name = $_POST['first-name'];
			$user_last_name = $_POST['last-name'];
			$user_email = $_POST['user-emal'];
                        $user_phone_country = '+60';
			$user_phone = $_POST['use-phone'];
			$user_fax = $_POST['user-fax'];
                        if($_POST['user-pass1']==$_POST['user-pass1']){
                            $user_pass=$_POST['user-pass1'];
                        }
                        else {
                             print "<script>document.write('password miss match');</script>";   
                        }    
			$user_bday = $_POST['user-birth-day'];
			$user_pic = $_POST['fileToUpload'];
			$user_otp= '0000';
			$user_status = '1';
			$user_type = 'normal';
        		$user_registerby = '13';
			$user_bank_name = 'cimb';
                        $user_bank_account_no = '1111111';
			$user_bank_branch = 'kl';
			$user_member_ref = 'abc2345';
			$user_register_date = '2019/1/1';
                        $user_expire_date = '2019/1/1';
			$user_lineid = '678';
			$user_wechatid ='456';
			$user_whatsapp = '678';
                        
                         
                         
                        
                        $sql_user="INSERT INTO `user` ( `user_name`, `user_pass`, `user_email`, `user_fname`, `user_lname`, `user_dob`, `user_phone_country`, `user_phone`, `user_pic`, `user_otp`, `user_bank_name`, `user_bank_account_no`, `user_bank_branch`, `user_member_reference`, `user_lineid`, `user_wechatid`, `user_whatsapp`, `user_register_date`, `user_end_date`, `user_register_by`,`user_status`, `user_type`) VALUES ( '".$user_name."', '".$user_pass."', '".$user_email."', '".$user_first_name."', '".$user_last_name."', '".$user_bday."', '".$user_phone_country."', '".$user_phone."', '".$user_pic."', '".$user_otp."', '".$user_bank_name."', '".$user_bank_account_no."', '".$user_bank_branch."', '".$user_member_ref."', '".$user_lineid."', '".$user_wechatid."', '".$user_whatsapp."', '".$user_register_date."', '".$user_expire_date."', '".$user_registerby."','".$user_status."', '".$user_type."')";
                  
                        
                        if (mysqli_query($conn, $sql_user)){?>
                        
                        <script type="text/javascript">
                        alert("Sucessfully Rgister please login to proceed..");
                       location="../login_sucess.php";
                        </script>
                         
                        <?php
                        }
                        else {
                                echo 'Error :(';
                        }


?>
