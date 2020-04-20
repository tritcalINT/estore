<?php

date_default_timezone_set('Asia/Kuala_Lumpur');
include_once '../conn.php';

require 'PHPMailerAutoload.php';
 

if($contact_email != ''  &&  $contact_name != ''){
   
    $user_email="dsa.amilashanaka@gmail.com";
    $user_name='amilashanaka';
    //Create a new PHPMailer instance
    
    
    $mail = new PHPMailer;
   
    //Set who the message is to be sent from
    $mail->setFrom($email_username, $email_from_name);
    //Set an alternative reply-to address
    $mail->addReplyTo($email_username, $email_from_name);
    //Set who the message is to be sent to
    $mail->addAddress($user_email, $user_name);
    //Set the subject line
    
    $mail->Subject ='E-STORE Contact:'.$contact_subject;
    $mail->Body = '<body>
                        <h1>E Store-Contact Us</h1>
		<div><p><strong>Click Here to Activate Account</strong></p></div>
                <h2> Message From:'.$contact_name.' & '.$contact_email.'</h2>
                 <p> Message : '.$contact_message.'</p>
                    
               
                </body>';
   $mail->AltBody = $lang['PASSWORD_EMAIL_MESSAGE'].' :\n\n '.$website_url.'/password_reset.php?user=';
    
    //send the message, check for errors
    if (!$mail->send()) {
        $email_send = '0';
    } else {
        $email_send = '1';
    }
}
