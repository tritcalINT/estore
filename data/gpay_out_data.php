<?php
include_once 'functions.php';
include_once './../conn.php';
  


      // $balance = $_POST['before_balance'];
	//$pay_out = $_POST['pay_out'];
       
       // $scg_user_id = $_POST['scg_user_id'];
        
      // $new_balance=(int)$balance-(int)$pay_out;
       
        $user_id = $_POST['user_id'];
       // $user_id='49';
      $top_up_amount=$_POST['pay_tot'];
      $new_amount=(-$top_up_amount);
      $cart=  $_POST['cart_val']; 
      
       // $currency=$_POST['currency'];
       
        $today=date("Y/m/d");
   
          
        if(1){
            
             //$sql = "INSERT INTO `eshop_pay_out`(`user_id`, `amount`) VALUES ('".$scg_user_id."','".$pay_out."')";
             
             $sql = "INSERT INTO member_deposit (md_depost_type,md_reference, md_member, md_amount, md_currency, md_slip, md_type, md_actual_amount, md_date, md_expiry,md_status,md_fund_amount,md_actual_dp_amount) VALUES (1,'777', '".$user_id."', '".$new_amount."', '1', 'empty', 'Deposit','".$new_amount."', '".$today."', '".$today."','1','".$new_amount."','".$new_amount."')";
 
             if (mysqli_query($conn, $sql)) {
                   $error='0';
                  
                } else{
                    $error='2';
                }
             
            
        } else if($new_balance<0){
                     $error='1';
              }
        
          header('Location: ../check_out_sucess.php?error='.$error.'&cart='.$cart);
        
 
?>