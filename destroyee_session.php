<?php
session_start();
$_SESSION['USER']="";

if($_SESSION['USER']=="")
{
	header('Location:index');
	session_destroy();
}
?>