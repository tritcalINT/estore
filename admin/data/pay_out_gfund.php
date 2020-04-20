<?php
  

    	include_once '../session.php';
        include_once '../../conn.php';
	include_once 'functions.php';
 
 
    $sql_item_detail="select * from orderitems where pay_out='0'";
       $find = mysqli_query($conn, $sql_item_detail);
           
         //=========== find details 
            while($row = mysqli_fetch_assoc($find)){
                
                Pay_out_for_one_item($row['id'], $conn);
                
                $sql="update orderitems set pay_out='1' where id='".$row['id']."'";
                mysqli_query($conn, $sql);
            }
        updatewalletValue($conn);
  //======================================================================
        
        function  pay_out_table($user_id,$value,$conn){
            
            
            
             $sql = "INSERT INTO `member_referal_bonus` ( `rb_deposit_amount`, `rb_deposit_id`, `rb_deposit_by`, `rb_level`, `rb_bonus_amount`, `rb_bonus_message`, `rb_bonus_paid_to`, `rb_percent`, `rb_date`, `rb_status`) VALUES ('".$value."', '".$user_id."', '0', '0', '0', '0', '0', '0', CURRENT_TIMESTAMP, '1')";
             
             
             
             mysqli_query($conn, $sql);
            
            
          
        }
        

   //======================================================================
  
        
  //==============================================================================
 function Pay_out_for_one_item($order_item_id,$conn){
            
            
            $sql_item_detail="select * from orderitems where id='".$order_item_id."'";
            $find = mysqli_query($conn, $sql_item_detail);
            
             
            //=========== find details 
             while($row = mysqli_fetch_assoc($find)){
                 
                    $manufacture_commission=$row['manufacture_commission'];
                    $distributor_commission=$row['distributor_commission'];
                    $re_sellerr_commission =$row['re_sellerr_commission'];
                    $shopper_commission=$row['shopper_commission'];
                    $end_user_commission=$row['end_user_commission'];   
                    $user_id=$row['customer_id'];
                    $user_level=$row['user_level'];
                    $level=(int)$user_level; 
                    
                  
                     
                    
                }
             // end Find details 
                
                do{
                    $uplink="select  user_member_reference,user_level from user where user_id='".$user_id."'";
                    $find = mysqli_query($conn, $uplink);
                    
                    while($row = mysqli_fetch_assoc($find)){
                         $user_id=$row['user_member_reference'];
                         $user_level=$row['user_level'];
                         $level=(int)$user_level; 
                         
                        
                    }
                    
                    
                  //==================================================
                    
                 if($level==7){
                     
                   pay_out_table($user_id,$end_user_commission,$conn);
                 }
                 
                  if($level==6){
                     
                     pay_out_table($user_id,$shopper_commission,$conn);
                 }
                 
                  if($level==5){
                     
                    pay_out_table($user_id,$re_sellerr_commission,$conn);
                 }
                 
                   if($level==4){
                     
                     pay_out_table($user_id,$distributor_commission,$conn);
                 }
                 
                  if($level==3){
                     
                    pay_out_table($user_id,$manufacture_commission,$conn);
                 }
                    
                    
                  //===================================================  
                    
                    
                }while($level>2);

       
 }     
  //============================================================================  
 function updatewalletValue($conn)
 {
    
      $sql_com="select rb_deposit_id, sum(rb_deposit_amount)from member_referal_bonus  group by  rb_deposit_id";
 
      $find = mysqli_query($conn, $sql_com);
       while($row = mysqli_fetch_assoc($find)){
        $user_sum=$row['sum(rb_deposit_amount)'];
        
        $user_id=$row['rb_deposit_id'];  
         $sql_update="update user set commision_balance='".$user_sum."' where user_id='".$user_id."'";
         mysqli_query($conn, $sql_update);
      }

 }

 //=========================================================================

     header('Location: ../g-fundpay_out.php?success=1');	    

