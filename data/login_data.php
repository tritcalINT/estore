<?php
session_start();	
    include_once '../conn.php';
     
	//Fetching Values from URL
	$login_pass = $_POST['customer-pass'];
	$login_user = $_POST['customer-id'];
        
       
	
if($login_pass != '' && $login_user != ''){
	   
        $sqlcheck="SELECT * FROM user WHERE user_name='".$login_user."' AND user_status = 1 ";
       $result = mysqli_query($conn, $sqlcheck);
        
       
        if(mysqli_num_rows($result) > 0){
            $res = mysqli_fetch_assoc($result);
            $pw = $res['user_pass'];
            
            if(password_verify($login_pass,$pw))
            {
              
                
                $_SESSION['login'] = $res['user_id'];
                $_SESSION['user_name']= $res['user_name'];
               
            echo "<script>  alert('login sucess...');</script>";
            header('Location: ../myaccount.php');
 
            }       
            else{
                  header('Location: ../login.php?error=2');
                
            }
                
            
            
        } else{
            
              header('Location: ../login.php?error=1');
            
        } 
        
        } 

       
?>