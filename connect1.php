<?php

 session_start();
$conn =mysqli_connect('localhost','root','','db1');

if ($conn==false) {
    echo "not connected";
} 
else{
	//echo "connected successfully";

if(isset($_POST['username']))
{
	$email=$_POST['username'];
	$password=$_POST['password'];

	$sql="select * from admin where email='$email' AND password='$password' limit 1";
	$result=mysqli_query($conn,$sql);
	 $row = mysqli_fetch_assoc($result);
	 
	if(mysqli_num_rows($result)==1){
		 $_SESSION["username"]=$email;
         $_SESSION['sucess']="You are now logged in";
		 
          $_SESSION["arline"]=$row["company_name"];
           $_SESSION["id"]=$row["id"];
		  echo $_SESSION["arline"];
        header('location:admin.php');

		}
	else{
		header('location:admin_login1.html');
	}

}
}
?>