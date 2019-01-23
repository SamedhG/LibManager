
<?php
include("php/sqlvar.php");
$sbk = "select * from books where bname like '%".$_POST['bar']."%'";
$smb = "select * from members where mname like '%".$_POST['bar']."%'";
$sbook=mysqli_query($conn, $sbk);
$smembers=mysqli_query($conn, $smb);

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
    	<h2><center>Search results:</center></h2>
        <?php if(mysqli_num_rows($smembers)!=0){?>
        <table width="100%" border=1 style="border-collapse:collapse">
        <tr>
        	<th>S.No.</th>
            <th>Name</th>
            <th>Contact Number</th>
        </tr>
		<?php
		$a=1;
		while($a = mysqli_fetch_array($smembers)){
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
		echo "</tr>";
		}
		echo "</table> <br><br>";
		}
		else echo "No members where found";
		if(mysqli_num_rows($sbook)!=0){
		?>
        <table width="100%" border=1 style="border-collapse:collapse">
        <tr>
        	<th>S.No.</th>
            <th>Name</th>
            <th>Author</th>
            <th>No. of Copies</th>
        </tr>
		<?php
		$a=1;
		while($a = mysqli_fetch_array($sbook)){
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
		echo "</tr>";
	
		}
    echo "</table>";
		}
		else echo"<br> no books where found";
		?>


    </td>
  </tr>
</table>
</body>
</html>
