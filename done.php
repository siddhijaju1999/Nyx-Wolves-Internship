<?php
  ob_start(); 
 session_start();
$conn =mysqli_connect('localhost','root','','db1');

if ($conn==false) {
    echo "not connected";
	
} 
else{
echo "Connected";

   
	 $CN=$_POST['cardno'];
	 $p_id=$_SESSION['p_id'];
	 $f_id=$_SESSION['f_id'];
	 $price=$_SESSION['price'];
	 $no=$_SESSION['seats'];
	 $amt=$price*$no;
	 $seats_left=$_SESSION['seats_left'];
	 
	  $sql="INSERT into tickets (p_id,f_id,seats_booked,status)   values($p_id,$f_id,$no,'Booked')";

        if(mysqli_query($conn,$sql))
        {
         echo "RECORD Inserted";
	//Insert into ticket table
		
	 $sql2="INSERT into payment values('$p_id','$amt','$CN','$f_id')";
	 echo $sql;
       if(mysqli_query($conn,$sql2))
        {
         echo "RECORD Inserted";
	//Insert into payment table
	     header('location:test2.php');
		} 
    } 
}	
?>
