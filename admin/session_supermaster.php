<?php 
session_start();

if($_SESSION['supermaster'] == ''){
    header('Location: index.php');
}
?>