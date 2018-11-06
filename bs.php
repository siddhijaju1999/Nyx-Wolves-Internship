<?php

session_start();
$conn =mysqli_connect('localhost','root','','db1');

if ($conn==false) {
    echo "not connected";
} 

else{
	
	$_SESSION['Source']=$_POST['Source'];
	$_SESSION['Destination']=$_POST['Destination'];
	//$date=$_POST['Date'];
	$_SESSION['no_s']=$_POST['no'];
	echo $_SESSION['Source'];
	echo $_SESSION['Destination'];
	echo $_SESSION['no_s'];
	header('location:search1.php');
}?>