<?php
include("php/sqlvar.php");

if(isset($_POST['submit'])){
	// security checks?
	$a=$_POST['name'];
	$b=$_POST['author'];
	$c=$_POST['noc'];
	$d=$_POST['pub'];
	$e=$_POST['sup'];

	$qry ="INSERT INTO books (`bname`, `bauth`, `bcopies`,`bpub`,`bsup`) VALUES ('".$a."','".$b."','".$c."','".$d."','".$e."' )";
	mysqli_query($conn, $qry);
	$qry1="SELECT MAX(bid) from books";
	$x=mysqli_query($conn, $qry1);
	$arr=mysqli_fetch_array($x);
	$bid=$arr['MAX(bid)'];
	$qry2="INSERT INTO bookrecord (`bid`) VALUES";

	for ($i=1 ;$i<=$c;$i++)
	{
		$qry2=$qry2." ('".$bid."'),";
	}

	$qry2=trim($qry2, ",");
	mysqli_query($conn, $qry2);
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
    <h2><center>Add a book</center></h2>
        <table width="100%" cellpadding="13">
        <form action="badd.php" name="add" method="post">
              <tr>
                <td width="35%"><p>Name :  </p></td>
                <td width="65%">
                <input name="name" type="text" class="tf" id="name"></td>
              </tr>
              <tr>
                <td><p>Author : </p></td>
                <td>
                <input name="author" type="text" class="tf" id="author"></td>
              </tr>
              <tr>
                <td><p>Copies : </p></td>
                <td>
									<!--this is dumb why did i do this haha, note to self change this -->
                  <select name="noc" id="noc">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select></td>
              </tr>
              <tr>
                <td><p>Publisher : </p></td>
                <td>
                <input name="pub" type="text" class="tf" id="pub"></td>
              </tr>
              <tr>
                <td><p>Supplier : </p></td>
                <td>
                <input name="sup" type="text" class="tf" id="sup"></td>
              </tr>
              <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" class="hvr-grow" value="add"></td>
              </tr>
         </form>
        </table>

    </td>
  </tr>
</table>
</body>
</html>
