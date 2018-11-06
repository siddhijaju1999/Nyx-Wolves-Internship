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



$f_id=$_POST['f_id'];


$sql1="SELECT * FROM flights WHERE f_id=$f_id";
	 $result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
   
   $row = mysqli_fetch_assoc($result);
	 
	if($_SESSION["arline"]==$row["airline_name"])
    {
      
	  
	  
      echo "Arline Name " . $row["airline_name"]. " - Flight ID: " . $row["f_id"]. "<br>";// output data of each row
      
	
	
	  $sql="Delete  FROM `flights` WHERE f_id=$f_id";
		

  
            if(mysqli_query($conn,$sql))
            {
               echo " Record deleted successfully";
  
  
                header('location:admin2.php');
            }
            else
            {
              echo "Wrong Password or User ID";
            }
    } 
else
{
	echo "<center> <p style='color:red';><b>YOU DO NOT HAVE ACCESS TO THIS FLIGHT<br>
          <a href='admin.php'>Go Back</a> </b></p></center>";

}

}
else {
      echo "0 results";
}






}
 ?>
