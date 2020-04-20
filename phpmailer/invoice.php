<?php
 


date_default_timezone_set('Asia/Kuala_Lumpur');
include_once '../conn.php';

require 'PHPMailerAutoload.php';
$username=$userdetails['user_name'];
$user_email=$userdetails['user_email'];

if($user_email != ''  &&  $username != ''){
    
   
    
    
 
    //Create a new PHPMailer instance
    
    $mail = new PHPMailer;
   
    //Set who the message is to be sent from
    $mail->setFrom($email_username, $email_from_name);
    //Set an alternative reply-to address
    $mail->addReplyTo($email_username, $email_from_name);
    //Set who the message is to be sent to
    $mail->addAddress($user_email, $user_name);
    //Set the subject line
    
    $mail->Subject ='Performa Invoice (Estore)';
    $mail->Body = '<body>
                  <h1>Welcome to Estore</h1>
                  
                  <table cellpadding="0" cellspacing="0">
                  
                  </table>
                  <tr>
                   <td>Invoice Number </td>
                  </tr>
                  
                 <tr>
                  
                  </tr>
		
                  </body>';
    
   
   $mail->AltBody = $lang['PASSWORD_EMAIL_MESSAGE'].' :\n\n '.$website_url.'/password_reset.php?user='.$m_first_name;
    
    //send the message, check for errors
    if (!$mail->send()) {
        $email_send = '0';
    } else {
        $email_send = '1';
    }
}
