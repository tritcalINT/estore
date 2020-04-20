<?php
include_once 'functions.php';
include_once './../conn.php';

    $user_id= $_POST['user_id'];
    $password_2 = $_POST['new_pass'];
    $password_confoirm_2 = $_POST['new_confoirm_pass'];

  if(strcmp($password_2 , $password_confoirm_2)){
            
         
             header('Location: ../pass_update.php?error=1');
             exit();
        }
        else{

        $hash_pw_2 = password_hash($password_2, PASSWORD_DEFAULT);
        
        
            if( $hash_pw_2!=''){
             
            if($user_id!=''){
            
             $sql = "UPDATE user SET user_pass='".$hash_pw_2."' WHERE user_id=".$user_id;
             

              
             if (mysqli_query($conn, $sql)) {
                   $error='0';
                   
                    
                } else {
                     $error='1';
                      header('Location: ../pass_update?error=2');
                    exit();
                }
            }else{
                  header('Location: ../pass_update?error=2');
                  exit();
            }
        }
 
           
          header('Location: ../pass_change.php');
 
        }  
        
        
 