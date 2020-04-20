<?php
echo 'sdafasdfasdfsdf';


session_start();
$sesid = session_id();
$usrid=$_SESSION["login"];
$delid='';
$paytype=$_POST['pay_method'];
echo $paytype;



echo $usrid;
exit();

$sqlhd = "INSERT INTO orders(customer_id,delivery_add_id,payment_type,date,status,session,total,ordno) 
    VALUES('$usrid','$delid','$paytype','$ptrndt','1','$sesid','$pritot','$ordno')";








   foreach ($_SESSION["cart_item"] as $item){
       
       $sql_order="INSERT INTO `orderitems` ( `order_id`, `itmky`, `quantity`, `hquantity`, `price`, `itmcpric`, `itmspric`, `squantity`) VALUES ('', '', '', '', '', '', '', '')";
       echo $item["id"];
   }
  exit();

  
        $sqldetins = "INSERT INTO orderitems(order_id,itmky,quantity,hquantity,squantity,price,itmcpric,itmspric) VALUES ('$ordid','$itmky','$qtytot','$hqtytot','$sqtytot','$price','$cprice','$sprice')";
        $resultdt = $database->query($sqldetins);
        
        
  
  
 ?>


<script>
    
 writeOrderData();   
</script>