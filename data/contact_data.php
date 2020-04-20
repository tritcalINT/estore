<?php
include_once 'functions.php';
include_once './../conn.php';

$contact_name = $_POST['contact_name'];
$contact_email= $_POST['contact_email'];
$contact_subject = $_POST['contact_subject'];
$contact_message = $_POST['contact_message'];
 
include_once '../phpmailer/contact.php';


                  if($email_send == '1'){
                      header('Location: ../contact_submit.php');
                       mysqli_query($conn, $sql_user);
                  }
                 else {
                      
                      header('Location: ../contact_submit.php?error=1');
                 }

