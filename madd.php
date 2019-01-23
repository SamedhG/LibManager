<?php
include("php/sqlvar.php");

if(isset($_POST['submit'])){
	$a=$_POST['name'];
	$b=$_POST['ph'];
	$c=$_POST['ad'];
	$qry ="INSERT INTO members (`mname`, `mph`,`mad`,`mdoj`) VALUES ('".$a."','".$b."','".$c."','".$date."')";
	mysqli_query($conn, $qry);
	echo "<script>alert('Success')</script>";
}
?>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
<title>LibManager - add a member</title>
</head>

<body>
<table width="100%" >
   <?php include("php/header.php");?>
  <tr>
      <?php include("php/menu.php"); ?>
    <td>
    <h2><center>Enroll a Member</center></h2>
        <table width="100%" cellpadding="13">
        <form action="madd.php" name="add" method="post">
              <tr>
                <td width="35%"><p>Name : </p></td>
                <td width="65%">
                <input name="name" type="text" class="tf" id="name"></td>
              </tr>
              <tr>
                <td><p>Contact Number: </p></td>
                <td>
                <input name="ph" type="text" class="tf" id="ph"></td>
              </tr>
              <tr>
                <td><p>Address: </p></td>
                <td>
                <textarea name="ad"  class="tf" id="ad"></textarea>
                </td>
              </tr>

              <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" class="hvr-grow" value="Enroll"></td>
              </tr>


         </form>
        </table>

    </td>
  </tr>
</table>
</body>
</html>
