<html>
<head>
<style>
body
{
background:white;
}

table
{
width:100%;
margin:auto;
text-align:center;
table-layout:fixed;
}

table, tr, td
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

table th
{
padding:20px;
color:orange;
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
</style>
</head>
<body>


<table> 

<tr>
<th>Airways</th>
<th>Source</th>
<th>Destination</th>
<th>Date</th>
<th>Time</th>
<th>Price</th>
<th>Amount</th>
<th>Seats Booked</th>
<th>cancel</th>


</tr>
<form action="pc.php" method="post">
<?php
 

ob_start();  
 session_start();
$conn =mysqli_connect('localhost','root','','db1');

if ($conn==false) 
{
    echo "not connected";
} 
else
{
	 $email=  $_SESSION['email'];
	 $p_id=$_SESSION['p_id'];
	

	
    $sql1="select * from payment where p_id=$p_id";
	$sql2="select * from tickets where p_id=$p_id";
	$sql3="select * from flights where f_id in (select f_id from payment where p_id=$p_id)";
	
	$record1=mysqli_query($conn,$sql1) ;
	$record2=mysqli_query($conn,$sql2);
	$record3=mysqli_query($conn,$sql3);
	
	
	
	while($ticket1=mysqli_fetch_assoc($record1) AND $ticket2=mysqli_fetch_assoc($record2) AND $ticket3=mysqli_fetch_assoc($record3))
	{
		if($ticket2['status']='Booked')
		{
		 echo "<tr>";
		 echo "<td>".$ticket3['airline_name']."</td>";
		 echo "<td>".$ticket3['source1']."</td>";
	     echo "<td>".$ticket3['destination']."</td>";
	     echo "<td>".$ticket3['date1']."</td>";
	     echo "<td>".$ticket3['time1']."</td>";
	     echo "<td>".$ticket3['price']."</td>";
		 echo "<td>".$ticket1['amt']."</td>";
		 echo "<td>".$ticket2['seats_booked']."</td>";
		 echo "<td><input type='radio' name='cancel' value=".$ticket2['t_id']." required></td>";
		 echo "</tr>";
		}
	}
}
?>
</table>
<center><input type="submit" value="Cancel Booking" name="submit">
<a href="logout.php">Logout</a></center>

</body>
</html>
