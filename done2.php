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
	width:800px;
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
      <form method='post' action='logout.php'>
	
	<div class="box">
	<?php
	ob_start();  
 session_start();
$conn =mysqli_connect('localhost','root','','db1');

if ($conn==false) {
    echo "not connected";
} 
else
{
		 $no=$_SESSION['seats'];
		  $f_id=$_SESSION['f_id'];
         $seats_left=$_SESSION['seats_left'];
         echo "<h2>Your flight has been booked.<br>Thank you to book with GoBirdy</h2>";
		//  $sql="select * from tickets Inner Join payments on tickets.p_id = payments.p_id AND tickets.f_id=payments.f_id";
        //if( mysqli_query($conn,$sql))
        //{
		 $sql1="Update flights set seats_left=$seats_left-$no where f_id=$f_id";
		 mysqli_query($conn,$sql1);
		//}
		
}		
?>


	  <center> <input type="submit" value="Logout"></center>
	   </form>
</div>
   </body>
</html>