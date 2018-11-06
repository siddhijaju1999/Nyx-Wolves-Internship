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
	




$ID=$_SESSION['id'];
$T=$_POST['Time'];
$S=$_POST['source'];
$D=$_POST['des'];
$dob=$_POST['date'];
$price=$_POST['price'];
if($_SESSION['arline']==$_SESSION['airline2'])
{
$sql="UPDATE flights SET  time1='$T',source1='$S',destination='$D',date1='$dob', price='$price' WHERE f_id=$ID"; 
 echo $sql;
 if(mysqli_query($conn,$sql))
 {
  echo "RECORD Updated";
  header('location:admin2.php');
 }

}

else
{
	 echo "<center> <p style='color:red';><b>YOU DO NOT HAVE ACCESS TO THIS FLIGHT<br>
          <a href='admin.php'>Go Back</a> </b></p></center>";
}

}
?>