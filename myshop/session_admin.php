<?php 
session_start();

if($_SESSION['master'] == '' && $_SESSION['admin'] == '' && $_SESSION['supermaster'] == ''){
    header('Location: index.php');
}
?>