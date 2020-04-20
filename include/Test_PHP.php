<?php
include 'database.php';

$db = new MySQLDB();
$to = 'rsasinthiran@gmail.com';
$subject = 'TEST SUBJECT';
$body = 'BODY';
$html = '<h1>KAVINDA INUSHA</h1>';
//echo $html;
$db->sendEmail($to, $subject, $body, $html);


?>