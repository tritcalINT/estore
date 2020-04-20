<?php 
session_start();

if($_SESSION['login'] == '' && $_SESSION['admin'] == '' && $_SESSION['reseller'] == '' && $_SESSION['supermaster'] == ''){
    header('Location: index.php');
}
?>