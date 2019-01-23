<?php
include("php/sqlvar.php");
if(isset($_POST['submit'])){
	$bid=$_POST['bid'];
	$mid=$_POST['mid'];

	$qry2="INSERT INTO register (`mid`,`bookid`,`idate`) VALUES('".$mid."','".$bid."','".$date."')" ;
	mysqli_query($conn, $qry2);

	$qry6="UPDATE bookrecord SET issued=1 where bookid=".$bid;
	mysqli_query($conn, $qry6);

	$qry7="UPDATE members SET mbook=1 where mid=".$mid;
	mysqli_query($conn, $qry7);

	echo "<script>alert('Success')</script>";
}
	//TO RETURN
if(isset($_GET['iid'])){
	$i=$_GET['iid'];
	$rem=$_GET['rem'];
	$qry8="SELECT * from register where iid=".$i;
	$run=mysqli_query($conn, $qry8);
	$arr=mysqli_fetch_array($run);
	$bk=$arr['bookid'];
	$mmbr=$arr['mid'];

	$rqry = "UPDATE register set ireturn = '".$date."' , remarks = '".$rem."' where iid = ".$i;
	mysqli_query($conn, $rqry);

	$rqry2="UPDATE bookrecord SET issued = 0 where bookid= ".$bk;
	mysqli_query($conn, $rqry2);

	$rqry3="UPDATE members SET mbook = 0 where mid= ".$mmbr;
	mysqli_query($conn, $rqry3);

	echo "<script>alert('Success')</script>";
}
if(isset($_GET['iid2'])){

	$i=$_GET['iid2'];

	$qry8="SELECT * from register where iid=".$i;
	$run=mysqli_query($conn, $qry8);
	$arr=mysqli_fetch_array($run);
	$bk=$arr['bookid'];
	$mmbr=$arr['mid'];


	$rqry = "UPDATE register SET remarks='REISSUED' , ireturn = '".$date."'  where iid = ".$i;
	mysqli_query($conn, $rqry);

	$rqry2="INSERT INTO register (`bookid`,`mid`,`idate`) VALUES('".$bk."','".$mmbr."','".$date."')";
	mysqli_query($conn, $rqry2);

	echo "<script>alert('Success')</script>";
}

$qry="select * from members where mbook=0";
$members=mysqli_query($conn, $qry);

$qry4="select * from bookrecord where issued=0";
$books=mysqli_query($conn, $qry4);

?>

<html>
<head>
<script type="text/javascript">

function fun(a){
	x=prompt("Please enter Remarks if any (for eg. pages torn of folds)","");
	window.location="welcome.php?iid="+a+"&rem="+x;
}
function asm(a){
	window.location="welcome.php?iid2="+a
}

</script>
<title>LibManager - Welcome</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<table width="100%">
   <?php include("php/header.php");?>
  <tr>
    <?php include("php/menu.php"); ?>
    <td>
    <h2><center>HOME</center></h2>
    <table width="100%" style="vertical-align:top">
    	<tr>
        	<td width="40%">
            	<center>
                	<h3>Issue a Book</h3>
                    <form method="post" action="welcome.php">
                      <select name="mid" id="mid">
                      <?php
					   while($a = mysqli_fetch_array($members)){
					   echo"<option value=".$a['mid'].">".$a['mname']." (".$a['mid'].")</option>";
					   }
					   ?>
                      </select>
                      <br />
                      <select name="bid" id="bid">
                      <?php
					   while($a = mysqli_fetch_array($books)){

						   $qry5="select bname from books where bid=".$a['bid'];
						   $booknm=mysqli_query($conn, $qry5);
						   $b= mysqli_fetch_array($booknm);
					   echo"<option value=".$a['bookid'].">".$b['bname']." (".$a['bookid'].")</option>";
					   }
					   ?>
                      </select>
                      <br />
                      <input type="submit" name="submit" class="hvr-grow" value="Issue"/>
                    </form>
            	</center>
            </td>
        	<td width="60%">
            	<h3><center>Return or Reissue a book</center></h3>
                <br>
                <form method="get" action="welcome.php">
                	 <center>
                   		<table border="1" width="100%">
                            <tr>
								<th>Member</th>
                                <th>Book</th>
                                <th>Fine</th>
                            </tr>
                            <?php
                             $qry="SELECT * from register where ireturn IS NULL";
							 $return = mysqli_query($conn, $qry);
							 while($c = mysqli_fetch_array($return))
							 	{
									echo "\n<tr>";
									echo "<td>";
										$qry="SELECT * from members where mid = ".$c['mid'];
							 			$mem = mysqli_query($conn, $qry);
										$m=mysqli_fetch_array($mem);
									echo $m['mname']."  (".$c['mid'].")";
									echo "</td>";
									echo "<td>";
										$qry="SELECT * from bookrecord where bookid = ".$c['bookid'];
							 			$book = mysqli_query($conn, $qry);
										$boo=mysqli_fetch_array($book);
										$qry="SELECT * from books where bid = ".$boo['bid'];
										$book = mysqli_query($conn, $qry);
										$bo=mysqli_fetch_array($book);
									echo $bo['bname']."  (".$c['bookid'].")";
									echo "</td>";
									echo "<td>";
										$qq="SELECT DATEDIFF( NOW( ) , idate ) FROM register WHERE iid=".$c['iid'];
										$re=mysqli_query($qq);
										$a1=mysqli_fetch_array($re);
											if ($a1['DATEDIFF( NOW( ) , idate )']-7<=0)
											$fine=0;
											else
											$fine=($a1['DATEDIFF( NOW( ) , idate )']-7)*$finer;
									echo $fine." /-";
									echo "</td>";
									echo "<td>";
									echo "<input type='button' value='Return' name='btnreturn' onclick=fun(".$c['iid'].") >";
									echo "<input type='button' value='ReIssue' name='btnreissue' onclick=asm(".$c['iid'].") >";
									echo "</td>";
									echo "</tr>";
								}
                        	?>
                        </table>
                	 </center>
                </form>

            </td>
        </tr>
    </table>
    </td>
  </tr>
</table>
</body>
</html>
