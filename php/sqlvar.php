<?php
session_start();
$conn = mysqli_connect("localhost","root","12345678");
mysqli_select_db($conn,"libmanager");
$finer=10;
$qrybk="select * from books";
$qrybr="select * from bookrecord";
$qrymem="select * from members";
$qryreq="select * from register";
$date=date("Y-m-d");
if(! isset($_SESSION['name'])) {
  header("location: index.php");
}
?>
