<?php
include_once 'functions.php';
include_once './../conn.php';

    $user_email= $_POST['user_email'];
     
     echo $user_email;
     
     
     $sql = "SELECT * FROM user where user_email='".$user_email."'" ;
     $result = mysqli_query($conn, $sql);
     
       
if(mysqli_num_rows($result) > 0){
            $res = mysqli_fetch_assoc($result);
                $user_status= $res['user_status'];
                $user_id= $res['user_id'];
                 $user_name=$res['user_name'];
   
   if($user_status=='1'){

    if($user_id!=''){
   
         include_once '../phpmailer/reset.php';
                  if($email_send == '1'){
                      header('Location: ../reset_check.php');
                      exit();
                  }
                 else {
                      
                      header('Location: ../pass_reset.php?error=2');
                        exit();
                 }
    }
    else{
         header('Location: ../pass_reset.php?error=4');
         exit();
    }
        
   }
   else{
        header('Location: ../pass_reset.php?error=3');
         exit();
   }

        }else{
            
             header('Location: ../pass_reset.php?error=1');
         exit();
            
        }       
 