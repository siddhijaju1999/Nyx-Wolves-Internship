<?php 
ob_start();  
session_start();
$_SESSION['radio']=$_POST['radio'];
header('location:login1.php');
?>