<?php

$active_id = $_GET['id'];
 

include_once '../../conn.php';

if($active_id != ''){
    
    $sql_active = "UPDATE user SET user_status = '1' WHERE user_id = '".$active_id."'";
    
}


if (mysqli_query($conn, $sql_active)){
    echo "1";
     header('Location: ../user_list.php');
}

 header('Location: ../user_list.php');