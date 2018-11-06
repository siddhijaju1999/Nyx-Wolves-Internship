<?php
	ob_start();  
 session_start();
$conn =mysqli_connect('localhost','root','','db1');

if ($conn==false) {
    echo "not connected";
} 
else
{
		
		 $t_id=$_SESSION['t_id'];
		 $sql2="select * from tickets where t_id=$t_id";
	       
      
         $r1=mysqli_query($conn,$sql2);
          $tik=mysqli_fetch_assoc($r1);
		 $f_id=$tik['f_id'];
		 $no=$tik['seats_booked'];
		 echo "seats_booked".$no;
		 $p_id=$_SESSION['p_id'];
		 $sql="select  *  from flights where f_id=$f_id";
         $result=mysqli_query($conn,$sql);
		 $flight=mysqli_fetch_assoc($result);
		 $seats_left=$flight['seats_left'];
		 echo "seats_left".$seats_left;
		 echo "f_id:  ".$f_id;
         echo "<h2>Your tickets have been cancelled. 10 % cancelation fees will be applied ,rest of the amount will be refunded to your account </h2>";
		 $sql="Update tickets set status='canceled' where t_id=$t_id";
		 $sql1="Update flights set seats_left=$seats_left+$no where f_id=$f_id";
		 mysqli_query($conn,$sql);
		 mysqli_query($conn,$sql1);
		
		
}		
?> 
<a href="logout.php">logout</a>