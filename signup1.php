<?php

ob_start(); 
 session_start();
 
?>



<!doctype html>
<html>
<head>
<script type="text/javascript">

function GEEKFORGEEKS()                                    
{ 
	
	
    var fname = document.forms["RegForm"]["fname"]; 
	var lname = document.forms["RegForm"]["lname"];               
    var email = document.forms["RegForm"]["email"];    
    var phone = document.forms["RegForm"]["phone_no"];  
   
    if (fname.value == "")                                  
    { 
        window.alert("Please enter your name."); 
        fname.focus(); 
        return false; 
    } 
   
     
	 
	 
    if (email.value == "")                                   
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
   
    if (email.value.indexOf("@", 0) < 0)                 
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
   
    if (email.value.indexOf(".", 0) < 0)                 
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
   
    if (phone.value == "")                           
    { 
        window.alert("Please enter your telephone number."); 
        phone.focus(); 
        return false; 
    } 
   
    
    return true; 
}





</script>

<title>SIGNUP</title>
<link rel="stylesheet" href="mystyle.css">
</head>
	<body onload="myFunction()">
	<script>
function myFunction() {
    alert("You alreday have an account please login from link below....!!!!!!");
}
</script>

	<div class="wrap">
	<h2>SIGNUP</h2>
	<form  name="RegForm" action="submit3.php"  onsubmit="return GEEKFORGEEKS()" method="post" >
	
		<input type="text" placeholder="First Name *"  name="fname" required  >
		<input type="text" placeholder="Last Name *"  name="lname" required  >
		<input type="text" placeholder="Email *"  name="email" required  >
		<input type="text" placeholder="Contact No" name="phone_no" maxlength="10">
		<input type="password" placeholder="Password *"  name="pass1" required >
		<input type="password" placeholder="Confirm Password *" name="pass" required >
		<input type="submit" value="submit">
	</form>
	 <br>
	 <br>
	 <center>Already have account?  &nbsp; &nbsp;  <a href="login1.php">sign in here</a></center>
	</div>
	</body>
</head>
</html>
			
