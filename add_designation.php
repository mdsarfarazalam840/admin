<?php
include 'dbcon.php';

$desiname = $_POST["desiname"];
// echo $uname;
// $pass = $_POST["pass"];
$query = "insert into designation (designation , status, action) values ('$desiname', 'OK', 'active')";
 mysqli_query($conn,$query);

    header("location:designation.php");

?>