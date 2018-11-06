<?php 
ob_start();  
session_start();
$_SESSION['t_id']=$_POST['cancel'];
echo $_SESSION['t_id'];
header('location:confirmcancel.php');
?>