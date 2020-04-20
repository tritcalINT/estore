<?php

$delete_id = $_GET['id'];
 

include_once '../../conn.php';

 

if($delete_id != ''){
    
    $sql_delete = "UPDATE product SET status = '0' WHERE product_id = '".$delete_id."'";
    
    if (mysqli_query($conn, $sql_delete)){
    echo "1";
   
}

    
}

 header('Location: ../product_list.php');
?>