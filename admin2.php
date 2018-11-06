<!doctype html>
<html>
<head>
<title>Admin Page</title>

<style>

body
{
margin:0px;
border:0px;
}

.header
{
width:100%;
height:120px;
background-color:black;
color:white;
}

#image
{
height:80px;
background-color:white;
border-radius:50px;
}

.main-content
{
display:flex;
}

.sidebar
{
flex:1;
height:530px;
background-color:#C0C0C0;
}

.content
{
flex:3;
height:530px;
background-color:#808080;
font-size:20px;
font-weight:bold;
}

ul li
{
padding:20px;
border-bottom:2px solid grey;
list-style-type:none;
}

ul li:hover
{
background-color:#808080;
color:white;
}

ul li a
{
color:black;
font-size:20px;
}

</style>

</head>

<body>

<?php 
ob_start();
session_start();
?>
<div class="header">

<center>
<img src="img/admin.jpg" alt="adminicon" id="image">
<br>Welcome to Admin Panel!
</center>
</div>

<div class="main-content">
	<div class="sidebar">
	
		<ul>
			<li><a href="add.html">Add a Flight</a></li>
			<li><a href="update1.html">Update a Flight</a></li>
			<li><a href="delete.html">Delete a Flight</a></li>
			<li><a href="view.php">View Details</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	
	<div class="content">
	<center><h3>Hello! <br><br>Successful</h3></center>
	</div>
	
</div>

</body>
</html>
