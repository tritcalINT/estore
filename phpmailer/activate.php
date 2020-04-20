<?php

date_default_timezone_set('Asia/Kuala_Lumpur');
include_once '../conn.php';

require 'PHPMailerAutoload.php';
 

if($user_email != ''  &&  $username != ''){
    echo 'sas';
   
    
    $m_email=$user_email;
 
    //Create a new PHPMailer instance
    
    $mail = new PHPMailer;
   
    //Set who the message is to be sent from
    $mail->setFrom($email_username, $email_from_name);
    //Set an alternative reply-to address
    $mail->addReplyTo($email_username, $email_from_name);
    //Set who the message is to be sent to
    $mail->addAddress($user_email, $user_name);
    //Set the subject line
    
    $mail->Subject ='Activate Account';
    $mail->Body = '<body>
                        <h1> Welcome To E Store</h1>
		<div><p><strong>Click Here to Activate Account</strong></p></div>
                <p><a href="'.$website_url.'user_activate.php?user='.$user_name.'">'.$website_url.'user_activate.php?user='.$user_name.'&confirm='.$user_password.'</a></p>
    
                </body>';
   $mail->AltBody = $lang['PASSWORD_EMAIL_MESSAGE'].' :\n\n '.$website_url.'/password_reset.php?user='.$m_first_name;
    
    //send the message, check for errors
    if (!$mail->send()) {
        $email_send = '0';
    } else {
        $email_send = '1';
    }
}
