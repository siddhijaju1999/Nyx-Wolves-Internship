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
	
echo "Connected successfully";
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass'];
$email=$_POST['email'];
$phone_no=$_POST['phone_no'];

if($pass1==$pass2)
{
 // $pass=md5($pass1);
$sql="INSERT into passenger(first_name,last_name,email_id,password,no) values('$fname','$lname','$email','$pass1','$phone_no')";

 if(mysqli_query($conn,$sql))
 {
  $sql1="select * from passenger where email_id='$email' limit 1"; 
	$result=mysqli_query($conn,$sql1);
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)==1){
		 $_SESSION['username']=$row['first_name'];
         $_SESSION['sucess']="You are now logged in";
			$_SESSION['p_id']=$row['p_id'];
			$_SESSION['email']=$row['email_id'];
		 echo $_SESSION['p_id'];
        

		}
 
  header('location:bp.php');
 }
 else
 {
  echo "Oops someting went wrong please try again";
    header('location:signup1.php');
 }
}
}
?>