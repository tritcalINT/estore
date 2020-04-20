<?php

 include_once 'functions.php';
 
$user_id=$_SESSION['login'];

$sql = "SELECT *  from orderitems where supplier_id='".$user_id."'";



$result = mysqli_query($conn, $sql);


?>