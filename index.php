<?php
$username="sam";
$password="libmanager";
session_start();
if(isset($_GET['logout']))
session_destroy();

if(isset($_POST['login'])){
	if($_POST['uname']==$username && $_POST['pass']==$password)
	{
		$_SESSION['name']=$_POST['uname'];
	echo "<script>alert('Logged In')</script>";
	header("location: welcome.php");
	}
	else{
	echo "<script>alert('Incorrect username or password. Please try Again')</script>";
	}
}
?>
<html>
<head>
<title>LibManager - Login</title>
<link rel="stylesheet" href="style.css" type="text/css">

</head>

<body>
<Table width="100%" cellpadding="7">
        <tr><td align="center"><img src="lmplogo.png"><br><br><br><br></td></tr>
<form method="post" action="index.php">
       <tbody align="center">
        <tr><td><input type="text" class="tf" placeholder="USERNAME" name="uname"></td></tr>
        <tr><td><input type="password" class="tf" placeholder="PASSWORD" name="pass"></td></tr>
        <tr><td><input type="submit" class="hvr-grow" value="LOGIN" name="login"></td></tr>
	   </tbody>
</form>

</Table>
</body>
</html>
