<?php
include("php/sqlvar.php");

$all=mysqli_query($conn, $qrybk);
if(isset($_POST['add']))
{
$a=$_POST['books'];
$qry2="UPDATE books SET bcopies = bcopies+1 where bid=".$a;
mysqli_query($conn, $qry2);
$qry3="INSERT INTO bookrecord (`bid`) VALUES ('".$a."')";
mysqli_query($conn, $qry3);
echo "<script>alert('Success')</script>";
}
?>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
<title>LibManager - add a book</title>
</head>

<body>
<table width="100%">
   <?php include("php/header.php");?>
  <tr>
     <?php include("php/menu.php"); ?>
    <td>
    <h2><center>Add an extra copy of an existing book</center></h2>
    	<center>

        <form method="post" action="badd2.php">
        <table cellpadding="13">
       <tr>
       <td>
          <select name="books" id="books">
           <?php
		   while($a = mysqli_fetch_array($all)){
		   echo"<option value=".$a['bid'].">".$a['bname']."</option>";
		   }
		   ?>
          </select>
         </td></tr><tr><td><center>
          <input type="submit" name="add" class="hvr-grow" value="add">
		</center></td></tr>
        </table>
        </form>
        </center>
    </td>
  </tr>
</table>
</body>
</html>
