<?php
include("php/sqlvar.php");
$book=mysqli_query($conn, $qrybk);
$member=mysqli_query($conn, $qrymem);
$register=mysqli_query($conn, $qryreq);
?>
<html>
<head>
<title>LibManager - Data log</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<table width="100%">
   <?php include("php/header.php");?>
  <tr>
     <?php include("php/menu.php"); ?>
    <td >
    <h2><center>Logs</center></h2>
                <table width="100%" border="1" >
                    <tr bgcolor="#000000">
                        <th>Member Name (ID)</th>
                        <th>Book Name (ID)</th>
                        <th>Date of Issue</th>
                        <th>Date of Return</th>
                        <th>Fine</th>
                        <th>Remarks</th>
                    </tr>
                  <tbody >
                <?php
                while($a = mysqli_fetch_array($register)){
				echo"<tr>";
				echo"<td>";
				$qry="select * from members where mid=".$a['mid'];
				$q1=mysqli_query($conn, $qry);
				$all=mysqli_fetch_array($q1);
				echo $all['mname']." (".$a['mid'].")";
				echo "</td>";;
				echo"<td>";
				$qry="select * from bookrecord where bookid=".$a['bookid'];
				$q1=mysqli_query($conn, $qry);
				$all=mysqli_fetch_array($q1);
				$qry="select * from books where bid=".$all['bid'];
				$q2=mysqli_query($conn, $qry);
				$al=mysqli_fetch_array($q2);
				echo $al['bname']." (".$a['bookid'].")";
				echo "</td>";
				echo"<td>";
				echo $a['idate'];
				echo "</td>";
				echo"<td>";
				echo $a['ireturn'];
				echo "</td>";
				echo"<td>";
				$fine=0;
					if($a['ireturn']==NULL)
					{
						$qq="SELECT DATEDIFF( NOW( ) , idate ) FROM register WHERE iid=".$a['iid'];
						$re=mysqli_query($conn, $qq);
						$a1=mysqli_fetch_array($re);
							if ($a1['DATEDIFF( NOW( ) , idate )']-7<=0)
							$fine=0;
							else
							$fine=($a1['DATEDIFF( NOW( ) , idate )']-7)*$finer;
					}
				echo $fine." /-";
				echo "</td>";
				echo "<td>";
				echo $a['remarks'];
				echo "</td>";
				echo"</tr>";

				}
				?>
                </tbody>
                </table>
                <br>
                <br>
                Note: fine is at the rate of rs. <?php echo $finer;?> per day after a free period of 7 days
                <br>
                Books can be renewed from the home page.
    </td>
  </tr>
</table>
</body>
</html>
