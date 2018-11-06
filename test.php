<?php
$to = "urjadmdr97@example.com,pranjalibankar66@gmail.com,siddhijaju1999@gmail.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<h2>Mail from GoBirdy</h2>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>Hello</td>
<td>World</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <rama.kane8@gmail.com>' . "\r\n";
$headers .= 'Cc: rama.kane8@gmail.com' . "\r\n";

if(mail($to,$subject,$message,$headers))
{
	 echo "Mail sent";
}
else
{
	echo "Failed";
}
?>