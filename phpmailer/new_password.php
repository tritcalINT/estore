<?php

date_default_timezone_set('Asia/Kuala_Lumpur');

require 'PHPMailerAutoload.php';


if($m_email != '' && $m_password != '' && $m_username != ''){
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Set who the message is to be sent from
    $mail->setFrom($email_username, $email_from_name);
    //Set an alternative reply-to address
    $mail->addReplyTo($email_username, $email_from_name);
    //Set who the message is to be sent to
    $mail->addAddress($m_email, $m_first_name);
    //Set the subject line
    $mail->Subject = $lang['PASSWORD_EMAIL_SUBJECT'];
    $mail->Body = '<body>
    			<div><p><strong>'.$lang['PASSWORD_EMAIL_MESSAGE'].'</strong></p></div>
                <p><a href="'.$website_url.'member/password_reset.php?user='.$m_username.'&confirm='.$m_password.'">'.$website_url.'member/password_reset.php?user='.$m_username.'&confirm='.$m_password.'</a></p>
                </body>';
    $mail->AltBody = $lang['PASSWORD_EMAIL_MESSAGE'].' :\n\n '.$website_url.'member/password_reset.php?user='.$m_username.'&confirm='.$m_password;
    
    //send the message, check for errors
    if (!$mail->send()) {
        $email_send = '0';
    } else {
        $email_send = '1';
    }
}

?>