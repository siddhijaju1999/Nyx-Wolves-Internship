<?php  
ob_start();
session_start();
// Create connection
$conn = new mysqli('localhost','root','','db1');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
	
echo "Connected successfully";
$fname=$_SESSION["arline"];
$T=$_POST['Time'];
$S=$_POST['source'];
$D=$_POST['des'];
$dob=$_POST['dob'];
$price=$_POST['price'];

$sql="INSERT into flights (airline_name,time1,source1,destination,date1,seats_left,price) values('$fname','$T','$S','$D','$dob',50,'$price')";

 if(mysqli_query($conn,$sql))
 {
  echo "RECORD Inserted";
  header('location:admin.php');
 }
 else
 {
  echo "Oops someting went wrong please try again";
 }
 
}

?>