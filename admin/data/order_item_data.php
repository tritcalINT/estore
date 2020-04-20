<?php
session_start();	
    
$order_id=$_GET['order_id']; 

 
 

 $sql = "SELECT ors.order_id,ors.quantity,ors.itmspric,ors.itmcpric, DATE_FORMAT(ors.date, '%d/%m/%Y') as order_date, pp.main_img,pp.name as item_name, usr.user_name as username ,usr.user_id as user_id,ors.supplier_id,ors.status FROM orderitems ors INNER JOIN product pp ON pp.product_id = ors.itmky INNER JOIN user usr ON usr.user_id = ors.customer_id   where ors.order_id ='".$order_id."'";
 
 $sql2="select adr.add1, ors.ordno, ors.total,ors.payment_type,ors.status from delivery_addresses adr INNER JOIN orders ors on ors.delivery_add_id=adr.id  where ors.id ='".$order_id."'";
 
 
// echo $sql;
// exit();
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql);
$addrs_res=mysqli_query($conn, $sql2);
$res = mysqli_fetch_assoc($result2);
$res_addr=mysqli_fetch_assoc($addrs_res);
