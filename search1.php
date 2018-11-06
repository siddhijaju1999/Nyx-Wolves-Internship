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
	
input[type=submit]
{
	width:10%;
	box-sizing:border-box;
	padding:10px 0;
	margin-top:30px;
	outline:none;
	border:none;
	background:black;
	opacity:0.9;
	border-radius:20px;
	font-size:20px;
	color:#fff;
}	
input[type=submit]:hover
{
background:purple;
transition:0.5s;
text-transform:uppercase;
}	
	
a
{
	width:10%;
	display:block;
	box-sizing:border-box;
	padding:10px 0;
	margin-top:30px;
	outline:none;
	border:none;
	background:black;
	opacity:0.9;
	border-radius:20px;
	font-size:20px;
	color:#fff;
	text-align:center;
}
a:hover
{
background:purple;
transition:0.5s;
text-transform:uppercase;
}	

</style>

</head>

<body>
<form action="s3.php" method="post">
<select name="sort" id="sort" >

  <option value="ASC" >Low to High</option>
  <option value="DESC">High to Low</option>
</select>&nbsp;
<input type="submit" value="Apply Filter" name="Apply Filter">
</form>



<hr>

<table> 

<tr>
<th>Airways</th>
<th>Source</th>
<th>Destination</th>
<th>Date</th>
<th>Time</th>
<th>Price</th>
<th>Book</th>
</tr>
<form action="pl.php" method="post">
<?php
 ob_start(); 
session_start();
$conn =mysqli_connect('localhost','root','','db1');

if ($conn==false) {
    echo "not connected";
} 

else{
	
	

	$Source=$_SESSION['Source'];
	$Destination=$_SESSION['Destination'];
	//$date=$_POST['Date'];
	$no_s=$_SESSION['no_s'];

	 $sql1="select * from flights where source1='$Source' AND destination='$Destination' Order By Price DESC ";
	  $_SESSION['seats']=$no_s;
      
    $records1=mysqli_query($conn,$sql1);

while($flight=mysqli_fetch_assoc($records1))
{
	if($flight['seats_left']>=$no_s)	
   {
 	echo "<tr>";
	echo "<td>".$flight['airline_name']."</td>";
	echo "<td>".$flight['source1']."</td>";
	echo "<td>".$flight['destination']."</td>";
	echo "<td>".$flight['date1']."</td>";
	echo "<td>".$flight['time1']."</td>";
	echo "<td>".$flight['price']."</td>";
	echo "<td><input type='radio' name='radio' value=".$flight['f_id']." required></td>" ;
	echo"</tr>";
  }
}

}


?>

<br>
</table>
<br>

<center><input type="submit" value="Book" name="submit"><a href="traveller.html">Go Back</a></center>

</form>
</body>
</html>
