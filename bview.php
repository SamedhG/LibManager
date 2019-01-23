<?php
include("php/sqlvar.php");
$all=mysqli_query($conn, $qrybk);
?>
<html>
<head>
<title>LibManager - view books</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<table width="100%">
   <?php include("php/header.php");?>
  <tr>
     <?php include("php/menu.php"); ?>
    <td >
    <h2><center>View Books</center></h2>
    	<table width="100%" border=1 style="border-collapse:collapse">
        <tr>
        	<th>S.No.</th>
            <th>Name</th>
            <th>Author</th>
            <th>No. of Copies</th>
            <th>Publisher</th>
            <th>Supplier</th>
        </tr>
		<?php 
		$a=1;
		while($a = mysqli_fetch_array($all)){
		echo "<tr>";
		echo "<td>";
		echo $a['bid'];
		echo "</td>";
		echo "<td>";
		echo $a['bname'];
		echo "</td>";
		echo "<td>";
		echo $a['bauth'];
		echo "</td>";
		echo "<td>";
		echo $a['bcopies'];
		echo "</td>";
		echo "<td>";
		echo $a['bpub'];
		echo "</td>";
		echo "<td>";
		echo $a['bsup'];
		echo "</td>";
		echo "</tr>";
		}
		?>
        </table>
    </td>
  </tr>
</table>
</body>
</html>
