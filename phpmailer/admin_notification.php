<?php

date_default_timezone_set('Asia/Kuala_Lumpur');

require 'PHPMailerAutoload.php';


    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Set who the message is to be sent from
    $mail->setFrom($email_username, $email_from_name);
    //Set an alternative reply-to address
    $mail->addReplyTo($email_username, $email_from_name);
    //Set who the message is to be sent to
    $mail->addAddress($notification_email_1);
    $mail->addCC($notification_email_2);
    //Set the subject line
    $mail->Subject = $mail_subject;
    $mail->Body = '<body>
    			<div><p><strong>'.$mail_body.'</strong></p></div>
                </body>';
    $mail->AltBody = $mail_body;
    
    //send the message, check for errors
    if (!$mail->send()) {
        $email_send = '0';
    } else {
        $email_send = '1';
    }

?>