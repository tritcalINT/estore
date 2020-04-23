<?php

include_once '../session.php';
include_once '../../conn.php';
include_once 'functions.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
//Fetching Values from URL
$user_cat_name = $_POST['user_cat_name'];
$user_cat_level = $_POST['user_cat_level'];
$user_cat_ref_per = $_POST['user_cat_ref_per'];
$user_cat_main = $_POST['user_cat_main'];
$user_cat_status = $_POST['status'];
$user_cat_id = $_POST["user_cat_id"];
//---------------------------------------- 

if ($user_cat_name != '') {

    $sql_user_cat = "UPDATE user_cat SET cat_name='$user_cat_name',main_cat='$user_cat_main',ref_per=$user_cat_ref_per,cat_level=$user_cat_level,status='$user_cat_status' WHERE usr_cat_id = $user_cat_id ";

    // echo $sql_user_cat;
    // exit();
    if(!mysqli_query($conn, $sql_user_cat)){
        echo mysqli_error($conn);
    }


    header('Location: ../user_cat_list.php');
} else {
    header('Location: ../user_cat_add.php?error=1');
}
