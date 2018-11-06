<?php
 ob_start();  
 session_start();
$conn =mysqli_connect('localhost','root','','db1');

if ($conn==false) {
    echo "not connected";
} 
else{
	//echo "connected successfully";

     
     $f_id =  $_SESSION['radio'];
	 $p_id =  $_SESSION['p_id'];
	 $_SESSION['f_id']=$f_id;
	 
    if(isset($_SESSION['radio']))
    {
       

		     $sql1="SELECT * FROM flights WHERE f_id=$f_id";
			 $result = mysqli_query($conn, $sql1);

			if (mysqli_num_rows($result) > 0) {
   
			$row = mysqli_fetch_assoc($result);
			//echo "Arline Name " . $row["airline_name"]. " - Flight ID: " . $row["f_id"]. "<br>";
			$_SESSION['price']=$row['price'];
			$_SESSION['seats_left']=$row['seats_left'];
		
			
			
			
			
			$email=$row["airline_name"];
			$sql2="select * from admin where company_name='$email'";
		    $result1 = mysqli_query($conn, $sql2);
			if(mysqli_num_rows($result1) > 0)
			{
				$row1 = mysqli_fetch_assoc($result1);
			
				$_SESSION["username1"]=$row1["email"];
				$_SESSION["password1"]=$row1["password"];
			}
          
			
			
			
        }
       else
        {
		 echo "Oops someting went wrong please try again";
		}

    }

    }
?>
<html>
<head>
<style>

	body
{
	margin:0;
	padding:0;
	font-family:sans-serif;
	background:url(img/bg7.jpg);
	background-size:cover;
}

.box
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

.box h2
{
	margin:0 0 30px;
	padding:0;
	color:#fff;
	text-align:left;
}

.box h1
{
	margin:0 0 30px;
	padding:0;
	color:orange;
	text-align:center;
}
.box h4
{
	margin:0 0 30px;
	padding:0;
	color:#fff;
	text-align:center;
}

.box input[type="submit"]
{
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
	 <form method="post" action="pay.php">
	<div class="box">
	<br>
	<h1>Flight Details</h1>
	<hr>
	<?php
	
	echo "<br><br><h4>Arline Name: " . $row["airline_name"]. " <br><br>Source:  " . $row["source1"]."<br><br>Destination:  ".  $row["destination"]."<br><br>Date:". $row["date1"]. "<br><br>Time: ".$row["time1"]."<br></h4>";
	$p=$_SESSION['price']*$_SESSION['seats'];
	$t=$_SESSION['seats'];
	echo"<h4>Total Price:  ".$p."<br><br>No Tickets: ".$t."</h4>";
	?>
	<center><input type="submit" value="Confirm and pay"></center>
	</form>
	</div>
  </body>
</html>