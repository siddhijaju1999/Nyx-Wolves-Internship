

<html>
<head>
<style type="text/javascript">

  window.onunload = function () {
    localStorage['refreshing'] = true;
}
<?php ob_start();  
 session_start();
$conn =mysqli_connect('localhost','root','','db1');

if ($conn==false) {
    echo "not connected";
} 
else{
	echo "connected successfully";

if(isset($_POST['username']))
{
	$email=$_POST['username'];

	$password=$_POST['password'];

	$sql="select * from passenger where email_id='$email' AND password='$password' limit 1"; 
	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)==1){
		 $_SESSION['username']=$row['first_name'];
         $_SESSION['sucess']="You are now logged in";
			$_SESSION['p_id']=$row['p_id'];
			$_SESSION['email']=$row['email_id'];
		 echo $_SESSION['p_id'];
         header('location:cancel.php');

		}
		else{
			header('location:login4.html');
		}
		
}
} ?>

</style>
</html>