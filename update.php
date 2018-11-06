<?php  
ob_start();
session_start();
$conn = new mysqli('localhost','root','','db1');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
else
{

$f_id=$_POST["f_id"];
$sql1="SELECT * FROM flights WHERE f_id=$f_id";
$result = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result) > 0)
	{
      while($row = mysqli_fetch_assoc($result)) {
	  echo "<div class='d'>"."<h2>"."Arline Name: " . $row["airline_name"]."</br>"."</br>". "  Flight ID: " . $row["f_id"]. "</h2>"."<br>"."</div>";
	   $_SESSION['airline2']= $row["airline_name"];
	   $_SESSION['id']=$row["f_id"];
	   
	  }
    }
	else {
    echo "0 results";
}
    
	mysqli_close($conn);
}
?>
<html>
<head>
<style>

input[type=submit]
{
	
	width:30%;
	box-sizing:border-box;
	padding:10px 0;
	margin-top:30px;
	outline:none;
	border:none;
	background:black;
	
	border-radius:20px;
	font-size:20px;
	color:#fff;
}

input[type=submit]:hover
{
	background:#003366;
	
}

.d
{
	
	position:absolute;
	top:50%;
	left:50%;
	transform:translate(-50%,-50%);
	width:400px;
	padding:40px;
	background:rgba(0,0,0,.8);
	box-sizing:border-box;
	box-shadow:0 15px 25px  rgba(0,0,0,.5);
	border-radius:10px;

}
.d h2
{
	margin:0 0 30px;
	padding:0;
	color:#fff;
	text-align:center;
}

body
{
background-image:url(img/bg7.jpg);
background-size:cover;
}
</style>
</head>

 <body>
 <form action="update2.html" method="post"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <center><input type="submit" value="Next"></center>
  </form>
 </body>
</html>