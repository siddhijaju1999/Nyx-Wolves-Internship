<?php
ob_start();
session_start();
echo $_SESSION["username1"];
echo $_SESSION['email'];
echo $_SESSION['password1'];
 require_once('PHPMailer/PHPMailerAutoload.php');
 
 $mail= new PHPMailer();
 $mail->isSMTP();
 $mail->SMTPAuth=True;
 $mail->SMTPSecure='ssl';
 $mail->Host='smtp.gmail.com';
 $mail->Port='465';
 $mail->isHTML();
 $mail->Username=$_SESSION["username1"]; //Senders email ID
 $mail->Password=$_SESSION['password1']; // Password
 $mail->SetFrom('no-reply@howcode.org');
 $mail->Subject="Hello User";
 $mail->Body="<html>
<head>
<title>HTML email</title>
</head>
<body>
<h2>Mail from GoBirdy</h2>
<h4>Dear user </h4>
<br>
<h4>Your flight has been booked and confirmed . <br> Thank you for booking with go birdy...!!!</h4>
</body>
</html> ";
 $mail->AddAddress($_SESSION['email']);//Receivers email id
 if(!$mail->Send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
//echo "Message has been sent";
echo "Your flight has been booked Thank you to book with GOBirdy";
header('location:done2.php');
}
 ?>
