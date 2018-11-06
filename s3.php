<?php
 ob_start(); 
session_start();
$_SESSION['sort']=$_POST['sort'];
header('location:search2.php');
?>