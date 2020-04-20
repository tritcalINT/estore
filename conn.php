<?php
date_default_timezone_set("Asia/Colombo");
error_reporting(0);
@ini_set('display_errors', 0);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fruit";

$email_username = "info@vcs2u.com";
$email_from_name = "BITCHIPS & Co";

$notification_email_1 = "scgc2722@gmail.com";
$notification_email_2 = "scgc2722@gmail.com";

$website_url = "https://vc-deluke.com/";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$db=new mysqli("$servername","$username","$password");
$db->select_db("$dbname");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>