
<?php
include("php/sqlvar.php");
$all=mysqli_query($conn, $qrymem);
?>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
<title>LibManager - view Members</title>
</head>

<body>
<table width="100%">
   <?php include("php/header.php");?>
  <tr>
    <?php include("php/menu.php"); ?>
    <td>
    	<h2><center>View Members</center></h2>
        <table width="100%" border=1 style="border-collapse:collapse">
        <tr>
        	<th>S.No.</th>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Date of Joining</th>

        </tr>
		<?php
		$a=1;
		while($a = mysqli_fetch_array($all)){
		echo "<tr>";
		echo "<td>";
		echo $a['mid'];
		echo "</td>";
		echo "<td>";
		echo $a['mname'];
		echo "</td>";
		echo "<td>";
		echo $a['mph'];
		echo "</td>";
		echo "<td>";
		echo $a['mad'];
		echo "</td>";
		echo "<td>";
		echo $a['mdoj'];
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
