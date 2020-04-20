<?php
date_default_timezone_set("Asia/kuala_Lumpur");
error_reporting(0);
@ini_set('display_errors', 0);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eshop";

$email_username = "mail@bitchipsdirect.com";
$email_from_name = "BITCHIPS & Co";

$notification_email_1 = "scgc2722@gmail.com";
$notification_email_2 = "scgc2722@gmail.com";

$website_url = "http://vcs2u.com/vshopper/";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>