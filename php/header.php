<?php
echo'<tr>
    <td width="25%"><a href="welcome.php"><img src="lmplogo.png" width="150" height="150"></a></td>
	<td width="75%" align="center" valign="top">
	  <table>
		</tr>
		<td align="center">
		<h1>Library Management System</h1>
		<table border 1>
		<form method="Post" action="search.php">
			<tr>
				<td><input type="text" placeholder="Search" name="bar"></td>
				<td><input type="submit" name="search" value="search"></td>
			</tr>
		</form>
		</table>
		</td>
		<td width="10%">
		<p align="right" >Welcome '.$_SESSION['name'].' <br></p>
		</td>
	     </tr>
	</table>
	</td>
	</td>
	</tr>';
?>
