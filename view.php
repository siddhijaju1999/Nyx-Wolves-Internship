


<html>
<head>
<title>Flight Data</title>

<style>

body
{
background-image:url(img/bg7.jpg);
background-size:cover;
}

table
{
width:100%;
margin:auto;
text-align:center;
table-layout:fixed;
}

table, tr, th, td
{
padding:20px;
color:white;
border:1 px solid #080808;
border-collapse:collapse;
font-size:18px;
font-family:Arial;
background:linear-gradient(top, #3c3c3c 0%, #222222 100%);
background:-webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
}

td:hover
{
background:orange;
}	
	
a
{
	width:100%;

	background:transparent;

	border:none;

	outline:none;

	color:#fff;

	background:#03a9f4;

	padding:10px 20px;

	cursor:pointer;

	border-radius:5px;

}
	
	
	
</style>

</head>
<body>

<table> 

<tr>
<th>Flight ID  </th>
<th>Source </th>
<th>Destination </th>
<th>  Date   </th>
<th>Time </th>
<th>Seats Left</th>
<th>Price </th>
</tr>



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


    $company=$_SESSION['arline'];
    $sql="select * from flights where airline_name='$company' ";
	$result=mysqli_query($conn,$sql);
	
	while($view=mysqli_fetch_assoc($result))
{

	
 	echo "<tr>";
  	
	echo "<td>".$view['f_id']."</td>";
	echo "<td>".$view['source1']."</td>";
	echo "<td>".$view['destination']."</td>";
	echo "<td>".$view['date1']."</td>";
	echo "<td>".$view['time1']."</td>";
	echo "<td>".$view['seats_left']."</td>";
	echo "<td>".$view['price']."</td>";
	echo"</tr>";
  }
}

	
 ?>
</table>
<br>
<center><a href="admin.php">GoBack</a></center>
</body>
</html>



 
