<?php

/* @var $_POST type */
$user_id=$_GET['user_id']; 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'functions.php';
include_once '../../scg_conn.php';

$sql="select * from user where user_id='".$user_id."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 

$scg_ref=$row['scg_ref'];

$scg_ref__get_name="SELECT * FROM members WHERE m_id = '" .$scg_ref . "'";
            $data_3 = mysqli_query($scg_conn, $scg_ref__get_name);
            $scg_res = mysqli_fetch_assoc($data_3);
            $scg_ref_name=$scg_res['m_username'];



